<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;

use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    //Validacion de la autenticacion
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Validacion de la data proveniente del cliente.
    private function performvalidation($request)
    {
        $rules = [
            'name' => 'required|min: 3'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un usuario.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.'
        ];
            
        $this->validate($request, $rules, $messages); 
    }
    
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function store(Request $request)
    {   
        $this->performvalidation($request);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        $notification = "La especialidad ha sido guardada correctamente.";

        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $this->performvalidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        $notification = "La especialidad ha sido actualizada correctamente correctamente.";

        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {   
        $specialtydeletedname = $specialty->name;
        
        $specialty->delete();

        $notification = "La especialidad ".$specialtydeletedname." ha sido eliminada correctamente.";
        
        return redirect('/specialties')->with(compact('notification'));
    }
}
