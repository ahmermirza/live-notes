<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <select name="country" id="country" onchange="getStates(this.value)" class="form-select">
        <option>Select a country</option>
        @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>

    <select name="state" id="state" class="form-select">
        <option>Select a state</option>
    </select>
</body>
</html>


<script>
function getStates(countryId) {

    var Url = "/getstates/"+countryId;
    var statesElement = document.getElementById("state");
    statesElement.innerHTML = "";
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var states = JSON.parse(this.responseText);
            for(var i=0; i<=states.length; i++) {
                statesElement.innerHTML = statesElement.innerHTML + '<option value="' + states[i]['state_name'] + '">' + states[i]['state_name'] + '</option>';
            }
        }
    };
    xhttp.open("GET", Url, true);
    xhttp.send();
}


  // $("#country").change(function(){
  //     var countryId = $(this).val();  
  //     $.ajax({
  //       type:'GET', 
  //       url: "/getstates/"+countryId, 
  //       success: function(states){
  //       if(states) {
  //         $("#state").empty();
  //         $.each(states, function(key, value){
  //         $("#state").append('<option value="'+key+'">'+value.state_name+'</option>');
  //         });
  //       }
  //     }});
  // });
</script>