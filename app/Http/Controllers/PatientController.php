<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::all();
        return $patients;
    }

    public function store(Request $request){
        $patient = Patient::create($request->all());
        return response()->json($patient,201);

    }

    public function update(Request $request, string $id){
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return response()->json($patient,200);
    }

    // Funcion para cambiar estatus
    public function updateStatus(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        // Actualiza el estado del paciente
        $newStatus = $request->input('status');
        $patient->update(['status' => $newStatus]);

        return response()->json($patient, 200);
    }

    // Usar en PostMan metodo Put y en el cuerpo lleva lo siguiente
    //  {
    //     "status": "inactive"
    //  }

}
