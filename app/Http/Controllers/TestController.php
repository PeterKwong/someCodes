<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Appointment;


class TestController extends Controller
{
    public function test(){

      return response()
        ->json(
          ['sent' => true]
        );

    	// return response()->download(base_path('public/front_end/contact/Winnie_Kwong.vcf'));
    }
}
