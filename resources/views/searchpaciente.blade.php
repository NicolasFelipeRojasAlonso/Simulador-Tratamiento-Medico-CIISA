<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscar Pacientes</title>
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
                <a class="nav-link" href="{{ route('busqueda.paciente') }}">Buscar Paciente</a>
            </li>
        @endguest
    </ul>
    <br>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Buscar Paciente</h3>
                        <div class="card-body">
                            <form action="{{ route('Search.paciente') }}" method="GET">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="RUT del Paciente" id="rut_paciente"
                                        class="form-control" name="rut_paciente" required autofocus>
                                    @if ($errors->has('rut_paciente'))
                                        <span class="text-danger">{{ $errors->first('rut_paciente') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Buscar</button>
                                </div>
                            </form>
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <table class="table test">
                                <thead>
                                    <td>ID</td>
                                    <td>Nombre</td>
                                    <td>RUT</td>
                                    <td>Diagnóstico</td>
                                    <td>Tratamiento</td>
                                    <td>Medicamento</td>
                                    <td>Cada cuántas horas</td>
                                    <td>Por cuántos días</td>
                                    <td></td>
                                    <td></td>
                                </thead>
                                @if (!empty($pacientes))
                                    @foreach ($pacientes as $paciente)
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
                                    @endforeach
                                @else
                                    <thead>
                                        <td>Pacientes no encontrados</td>
                                    </thead>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
