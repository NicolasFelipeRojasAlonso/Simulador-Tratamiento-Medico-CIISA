<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Paciente</title>
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
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="card-header text-center">Registro de Paciente</h3>
                        <div class="card-body">
                            <form action="{{ route('registro.paciente') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nombre del Paciente" id="nombre_paciente"
                                        class="form-control" name="nombre_paciente" required autofocus>
                                    @if ($errors->has('nombre_paciente'))
                                        <span class="text-danger">{{ $errors->first('nombre_paciente') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Rut del Paciente" id="rut_paciente"
                                        class="form-control" name="rut_paciente" required>
                                    @if ($errors->has('rut_paciente'))
                                        <span class="text-danger">{{ $errors->first('rut_paciente') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Diagnóstico" id="diagnostico"
                                        class="form-control" name="diagnostico" required>
                                    @if ($errors->has('diagnostico'))
                                        <span class="text-danger">{{ $errors->first('diagnostico') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <textarea placeholder="Tratamiento" id="tratamiento"
                                        class="form-control" name="tratamiento" required></textarea>
                                    @if ($errors->has('tratamiento'))
                                        <span class="text-danger">{{ $errors->first('tratamiento') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Medicamento" id="medicamento"
                                        class="form-control" name="medicamento" required>
                                    @if ($errors->has('medicamento'))
                                        <span class="text-danger">{{ $errors->first('medicamento') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Cada cuantas horas" id="cada_cuantas_horas"
                                        class="form-control" name="cada_cuantas_horas" required>
                                    @if ($errors->has('cada_cuantas_horas'))
                                        <span class="text-danger">{{ $errors->first('cada_cuantas_horas') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Por cuántos días" id="por_cuantos_dias"
                                        class="form-control" name="por_cuantos_dias" required>
                                    @if ($errors->has('por_cuantos_dias'))
                                        <span class="text-danger">{{ $errors->first('por_cuantos_dias') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Registrar</button>
                                </div>
                            </form>
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
