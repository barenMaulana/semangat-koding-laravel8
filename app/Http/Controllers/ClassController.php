<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        $data =[
            "title" => "Kelas Semangat Koding | membangun indonesia"
        ];
        return view("pages.class",$data);
    }
}
