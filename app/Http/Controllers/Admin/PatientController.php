<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;

use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $patients = User::Patients()->paginate(5);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dpi' => 'nullable|digits:13',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:8'
        ];
        $this->validate($request, $rules);

        User::create(
            $request->only('name', 'email', 'dpi', 'address', 'phone') +
            [ 
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
                
            ]
        );

        $notification = 'El paciente se ha creado correctamente';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dpi' => 'nullable|digits:13',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:8'
        ];
        $this->validate($request, $rules);

        $user = User::Patients()->findorFail($id);

        $data = $request->only('name', 'email', 'dpi', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save();

        $notification = 'Se ha actualiado la informacion del paciente correctamente';
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        $patientName = $patient->name;
        $patient->delete();

        $notification = "El paciente $patientName ha sido eliminado correctamente";

        return redirect('/patients')->with(compact('notification'));
    }
}
