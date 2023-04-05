@component('mail::message')
# Hey! One of your posts was liked!

<b>{{ $liker->username }}</b> liked your post.

@component('mail::button', ['url' => route('posts.show', $post)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
