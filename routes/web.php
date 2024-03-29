<?php

use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('registropacientes');
});

Route::get('registro-pacienteview', [PacienteController::class, 'registropacientesForm'])->name('registro.pacienteview');
Route::post('registro-paciente', [PacienteController::class, 'registro'])->name('registro.paciente');

Route::get('busqueda-paciente', [PacienteController::class, 'buscandopaciente'])->name('busqueda.paciente');
Route::get('search-paciente', [PacienteController::class, 'search'])->name('Search.paciente');

Route::get('listar-pacientes', [PacienteController::class, 'listarPacientes'])->name('pacientes.listar');

Route::get('edit-paciente/{id}', [PacienteController::class, 'edit'])->name('paciente.edit');
Route::put('update-paciente/{id}', [PacienteController::class, 'update'])->name('update.paciente');

Route::resources(['paciente' => PacienteController::class,]);

Route::get('delete-paciente/{id}', [PacienteController::class, 'show'])->name('paciente.show');
Route::delete('destroy-paciente/{id}', [PacienteController::class, 'destroy'])->name('destroy.paciente');
