<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Semangat Koding | membangun indonesia'
        ];
        return view('pages.home',$data);    
    }
}
