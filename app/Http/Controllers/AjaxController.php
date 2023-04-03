<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index()
    {
        $countries = DB::table('country')->get();
        return view('randomform', compact('countries'));
    }
    
    public function getStates($contryId)
    {
        $states = DB::table('states')->select('state_name')->where('country_id', $contryId)->get();
        return response()->json($states);
    }
}