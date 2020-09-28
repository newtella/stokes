<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController as BaseController;
use App\Http\Resources\AppointmentResource as AppointmentResource;
use App\Appointment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AppointmentController extends BaseController
{
    public function index()
    {
        $appointments = Appointment::with('specialty','doctor','patient')->paginate(1);

        return $this->sendResponse(AppointmentResource::collection($appointments),
         'appointments retrieved successfully.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'description' => 'required',
            'specialty_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'scheduled_date' => 'required',
            'scheduled_time' => 'required',
            'type' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $appointment = Appointment::create($input);

        return $this->sendResponse(new AppointmentResource($appointment), 'Appointment created successfully.');
    } 
   
    public function show($id)
    {
        $appointment = Appointment::find($id);
  
        if (is_null($appointment)) {
            return $this->sendError('Appointment not found.');
        }
   
        return $this->sendResponse(new AppointmentResource($appointment), 'Appointment retrieved successfully.');
    }
    
    public function update($id, Request $request)
    {
        $input = $request->all();

        $appointment = Appointment::findOrFail($id);
   
        $validator = Validator::make($input, [
            'description' => 'required',
            'specialty_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'scheduled_date' => 'required',
            'scheduled_time' => 'required',
            'type' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $appointment->description = $input['description'];
        $appointment->specialty_id = $input['specialty_id'];
        $appointment->doctor_id = $input['doctor_id'];
        $appointment->patient_id = $input['patient_id'];
        $appointment->scheduled_date = $input['scheduled_date'];
        $appointment->scheduled_time = $input['scheduled_time'];
        $appointment->type = $input['type'];

        $appointment->save();
   
        return $this->sendResponse(new AppointmentResource($appointment), 'Appointment updated successfully.');
    }
   
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
   
        return $this->sendResponse([], 'Appointment deleted successfully.');
    }
}
