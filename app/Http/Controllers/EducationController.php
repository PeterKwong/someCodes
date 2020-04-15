<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    
  public function bladeIndex($locale)
    {


      return view('education.4cs');
 
    }


    public function fourCs($locale)
    {


      return view('education.4cs');
 
    }

    public function diamondCarat($locale)
    {


      return view('education.diamondCarat');
 
    }

    public function diamondColor($locale)
    {


      return view('education.diamondColor');
 
    }
    public function diamondCut($locale)
    {


      return view('education.diamondCut');
 
    }
    public function diamondClarity($locale)
    {


      return view('education.diamondClarity');
 
    }


    public function diamondShape($locale)
    {


      return view('education.diamondShape');
 
    }

    public function diamondHeartAndArrow($locale)
    {


      return view('education.diamondHeartAndArrow');
 
    }

    public function diamondProportion($locale)
    {


      return view('education.diamondProportion');
 
    }

    public function diamondSymmetry($locale)
    {


      return view('education.diamondSymmetry');
 
    }

    public function diamondPolish($locale)
    {


      return view('education.diamondPolish');
 
    }

    public function diamondFluorescence($locale)
    {


      return view('education.diamondFluorescence');
 
    }

    //certs
    public function gradingEyeClean($locale){



      return view('education.gradingEyeClean');
      
    }
    
    public function giaReport($locale)
    {


      return view('education.giaReport');
 
    }

    public function diamondCertificate($locale)
    {


      return view('education.diamondCertificate');
 
    }



}
