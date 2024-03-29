<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav justify-content">
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('registro.pacienteview') }}">Registro Paciente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pacientes.listar') }}">Lista De Pacientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('busqueda.paciente') }}">Buscar Pacientes</a>
        </li>
        @endguest
    </ul>
    <br>
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="card-header text-center">Listar Pacientes</h3>
                        <div class="card-body">
                            <table class="table test">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>RUT</th>
                                    <th>Diagnóstico</th>
                                    <th>Tratamiento</th>
                                    <th>Medicamento</th>
                                    <th>Cada cuántas horas</th>
                                    <th>Por cuántos días</th>
                                </thead>
                                @forelse ($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->ID_PACIENTE }}</td>
                                    <td>{{ $paciente->VCH_NOMBRE }}</td>
                                    <td>{{ $paciente->VCH_RUT }}</td>
                                    <td>{{ $paciente->VCH_DIAGNOSTICO }}</td>
                                    <td>{{ $paciente->VCH_TRATAMIENTO }}</td>
                                    <td>{{ $paciente->VCH_MEDICAMENTO }}</td>
                                    <td>{{ $paciente->VCH_CADA_HORA }}</td>
                                    <td>{{ $paciente->INT_DIAS }}</td>
                                    <td>
                                        <a href="{{ route('paciente.edit', $paciente->ID_PACIENTE) }}"
                                            class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('paciente.show', $paciente->ID_PACIENTE) }}"
                                            class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No hay pacientes registrados</td>
                                </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
