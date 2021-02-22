<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    
  public function bladeIndex($locale)
    {


      return view('frontend.education.4cs');
 
    }


    public function fourCs($locale)
    {


      return view('frontend.education.4cs');
 
    }

    public function diamondCarat($locale)
    {


      return view('frontend.education.diamondCarat');
 
    }

    public function diamondColor($locale)
    {


      return view('frontend.education.diamondColor');
 
    }
    public function diamondCut($locale)
    {


      return view('frontend.education.diamondCut');
 
    }
    public function diamondClarity($locale)
    {


      return view('frontend.education.diamondClarity');
 
    }


    public function diamondShape($locale)
    {


      return view('frontend.education.diamondShape');
 
    }

    public function diamondHeartAndArrow($locale)
    {


      return view('frontend.education.diamondHeartAndArrow');
 
    }

    public function diamondProportion($locale)
    {


      return view('frontend.education.diamondProportion');
 
    }

    public function diamondSymmetry($locale)
    {


      return view('frontend.education.diamondSymmetry');
 
    }

    public function diamondPolish($locale)
    {


      return view('frontend.education.diamondPolish');
 
    }

    public function diamondFluorescence($locale)
    {


      return view('frontend.education.diamondFluorescence');
 
    }

    //certs
    public function gradingEyeClean($locale){



      return view('frontend.education.gradingEyeClean');
      
    }
    
    public function giaReport($locale)
    {


      return view('frontend.education.giaReport');
 
    }

    public function diamondCertificate($locale)
    {


      return view('frontend.education.diamondCertificate');
 
    }



}
