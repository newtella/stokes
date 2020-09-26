<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController as BaseController;
use App\Http\Resources\AppointmentResource as AppointmentResource;
use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends BaseController
{
    public function index()
    {
        $appointments = Appointment::with('specialty','doctor','patient')->paginate(1);

        return $this->sendResponse(AppointmentResource::collection($appointments),
         'appointments retrieved successfully.');
    }
}
