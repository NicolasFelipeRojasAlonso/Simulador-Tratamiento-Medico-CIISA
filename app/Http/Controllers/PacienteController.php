<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{

        public function registropacientesForm()
        {
            return view('registropacientes');
        }

        public function registro(Request $request)
        {
            $request->validate([
                'nombre_paciente' => 'required|min:4',
                'rut_paciente' => 'required|min:3',
                'diagnostico' => 'required',
                'tratamiento' => 'required',
                'medicamento' => 'required',
                'cada_cuantas_horas' => 'required',
                'por_cuantos_dias' => 'required|numeric',
            ]);

            DB::table('tbl_paciente')->insert([
                'VCH_NOMBRE' => $request->nombre_paciente,
                'VCH_RUT' => $request->rut_paciente,
                'VCH_DIAGNOSTICO' => $request->diagnostico,
                'VCH_TRATAMIENTO' => $request->tratamiento,
                'VCH_MEDICAMENTO' => $request->medicamento,
                'VCH_CADA_HORA' => $request->cada_cuantas_horas,
                'INT_DIAS' => $request->por_cuantos_dias,
            ]);

            return redirect()->route('registro.pacienteview')->with('success', 'Paciente registrado exitosamente.');
        }

        public function buscandopaciente($mensaje = null, $pacientes = null)
        {
            if ($pacientes == null) {
                return view('searchpaciente', compact('mensaje', 'pacientes'));
            } else {
                return view('searchpaciente', compact('mensaje', 'pacientes'));
            }
        }

        public function search(Request $request)
        {
            $rules = [
                'rut_paciente' => 'required|string|min:1',
            ];

            $customMessages = [
                'required' => 'El campo es obligatorio',
                'string' => 'El campo debe ser alfanumérico',
                'min' => 'Debe tener al menos :min caracteres',
            ];

            $this->validate($request, $rules, $customMessages);

            $pacientes = DB::table('tbl_paciente')
                ->where('VCH_RUT', 'LIKE', "%" . $request->rut_paciente . "%")
                ->get();

            return $this->buscandopaciente('Búsqueda realizada', $pacientes);
        }

        public function listarPacientes() {
            $pacientes = DB::table('tbl_paciente')->get();
            return view('listarpacientes', compact('pacientes'));
        }

        public function edit($id)
{
    $paciente = DB::table('TBL_PACIENTE')->where('ID_PACIENTE', '=', $id)->first();
    return view('editpacientes', compact('paciente'));
}

public function update(Request $request, $id)
{
    $rules = [
        'VCH_DIAGNOSTICO' => 'required|string|min:3',
        'VCH_TRATAMIENTO' => 'required|string|min:3',
        'VCH_MEDICAMENTO' => 'required|string|min:3',
        'VCH_CADA_HORA' => 'required|string|min:1',
        'INT_DIAS' => 'required|int',
    ];

    $customMessages = [
        'required' => 'El campo es obligatorio',
        'string' => 'El campo debe ser alfanumérico',
        'min' => 'Debe tener al menos :min caracteres',
        'int' => 'Debe ser un número entero',
    ];

    $this->validate($request, $rules, $customMessages);

    DB::table('TBL_PACIENTE')
        ->where('ID_PACIENTE', $id)
        ->update($request->except(['_token', '_method']));

    return redirect()->route('busqueda.paciente', $id)->with('success', 'Paciente actualizado exitosamente.');
}

public function show($id)
{
    $paciente = DB::table('TBL_PACIENTE')->where('ID_PACIENTE', '=', $id)->first();
    return view('deletepacientes', compact('paciente'));
}

public function destroy($id)
{
    $id = DB::table('TBL_PACIENTE')->where('ID_PACIENTE', '=', $id)->delete();
    return redirect()->route('busqueda.paciente')->with('success', 'Paciente eliminado exitosamente.');
}

    }

