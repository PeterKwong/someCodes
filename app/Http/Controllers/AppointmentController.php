<?php

namespace App\Http\Controllers;

use App\Mail\Appointment;
use App\Mail\CronJob;
use App\Http\Support\Telegram;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    use Telegram;

    public function appointment(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'phone' => 'required| numeric | min:0'
      ]);

      $appointment = $request->all();

      $title = '** Appointment **' . "\n";

      $this->sendArray($appointment, $title);

      // dd(print_r($appointment));
      \Mail::to(['appointment@tingdiamond.com'])->send(new Appointment($appointment));


      return response()
        ->json(
          ['saved' => true,
        'message' => trans('frontHeader.appointmentSuccess')
        ]
        );

    }

    public function cronDone($data)
    {
      // $this->validate($request,[
      //   'name' => 'required',
      //   'phone' => 'required'
      // ]);

      // $appointment = $request->all();

      // dd(print_r($appointment));
      \Mail::to(['system@tingdiamond.com'])->send(new CronJob($data));

      return response()
        ->json(
          ['saved' => true,
        'message' => trans('frontHeader.appointmentSuccess')
        ]
        );

    }
}
