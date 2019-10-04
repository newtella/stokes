<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkDay;


class ScheduleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function edit()
    {
        $days = [
            'Lunes', 'Martes', 'Miercoles', 
            'Jueves', 'Viernes', 'Sabado', 'Domingo'
        ];

        $morningtimes = [
            '00:00', '00:30','01:00', '01:30','02:00', '02:30',
            '03:00', '03:30','04:00', '04:30','05:00', '05:30',
            '06:00', '06:30','07:00', '07:30','08:00', '08:30',
            '09:00', '09:30','10:00', '10:30','11:00', '11:30',
        ];

        $afternoontimes = [
            '12:00', '12:30','13:00', '13:30','14:00', '14:30',
            '15:00', '15:30','16:00', '16:30','17:00', '17:30',
            '18:00', '18:30','19:00', '19:30','20:00', '20:30',
            '21:00', '21:30','22:00', '22:30','23:00', '23:30',
        ];
        return view('schedule', compact('days', 'morningtimes', 'afternoontimes'));
    }

    public function store(Request $request)
    {
        $active = $request->input('active') ?: [];
        $morning_start = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');
        for ($i=0; $i < 7; $i++) { 
            Workday::updateOrCreate([
                'day' => $i,
                'user_id' => auth()->id()
            ],
            [
                'active' => in_array($i, $active),
                'morning_start' => $morning_start[$i],
                'morning_end' => $morning_end[$i],
                'afternoon_start' => $afternoon_start[$i],
                'afternoon_end' => $afternoon_end[$i],
            ]);
        }
    }
}
