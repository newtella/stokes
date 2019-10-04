<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;

use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $doctors = User::Doctors()->paginate(5);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
                
            ]
        );

        $notification = 'El medico se ha creado correctamente';
        return redirect('/doctors')->with(compact('notification'));
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
    public function edit($id)
    {
        $doctor = User::Doctors()->findorFail($id);

        return view('doctors.edit')->with(compact('doctor'));
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

        $user = User::Doctors()->findorFail($id);

        $data = $request->only('name', 'email', 'dpi', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save();

        $notification = 'Se ha actualiado la informacion del medico correctamente';
        return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctorName = $doctor->name;
        $doctor->delete();

        $notification = "El medico $doctorName ha sido eliminado correctamente";

        return redirect('/doctors')->with(compact('notification'));
    }
}
