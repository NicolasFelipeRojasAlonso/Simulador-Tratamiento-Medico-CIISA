<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Paciente</title>
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
            <a class="nav-link" href="{{ route('pacientes.listar') }}">Lista De Parques</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('busqueda.paciente') }}">Buscar Paciente</a>
        </li>
        @endguest
    </ul>
    <br>

    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="card-header text-center">Editar Paciente</h3>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('update.paciente', $paciente->ID_PACIENTE) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="VCH_DIAGNOSTICO">Diagnóstico del Paciente</label>
                                    <input type="text" id="VCH_DIAGNOSTICO" class="form-control" name="VCH_DIAGNOSTICO"
                                        value="{{ $paciente->VCH_DIAGNOSTICO }}" required autofocus>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="VCH_TRATAMIENTO">Tratamiento</label>
                                    <input type="text" id="VCH_TRATAMIENTO" class="form-control" name="VCH_TRATAMIENTO"
                                        value="{{ $paciente->VCH_TRATAMIENTO }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="VCH_MEDICAMENTO">Medicamento</label>
                                    <input type="text" id="VCH_MEDICAMENTO" class="form-control" name="VCH_MEDICAMENTO"
                                        value="{{ $paciente->VCH_MEDICAMENTO }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="VCH_CADA_HORA">Cada Cuántas Horas</label>
                                    <input type="text" id="VCH_CADA_HORA" class="form-control" name="VCH_CADA_HORA"
                                        value="{{ $paciente->VCH_CADA_HORA }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="INT_DIAS">Por Cuántos Días</label>
                                    <input type="text" id="INT_DIAS" class="form-control" name="INT_DIAS"
                                        value="{{ $paciente->INT_DIAS }}" required>
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Guardar Cambios</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
