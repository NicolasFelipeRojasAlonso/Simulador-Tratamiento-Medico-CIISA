<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar Paciente</title>
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
                        <h3 class="card-header text-center">Eliminar Paciente</h3>
                        <div class="card-body">
                            <form action="{{ route('destroy.paciente', $paciente->ID_PACIENTE) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="ID" id="ID_PACIENTE" class="form-control" name="ID_PACIENTE" value="{{ $paciente->ID_PACIENTE }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nombre del Paciente" id="VCH_NOMBRE" class="form-control" name="VCH_NOMBRE" value="{{ $paciente->VCH_NOMBRE }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="RUT del Paciente" id="VCH_RUT" class="form-control" name="VCH_RUT" value="{{ $paciente->VCH_RUT }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Diagnóstico del Paciente" id="VCH_DIAGNOSTICO" class="form-control" name="VCH_DIAGNOSTICO" value="{{ $paciente->VCH_DIAGNOSTICO }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Tratamiento del Paciente" id="VCH_TRATAMIENTO" class="form-control" name="VCH_TRATAMIENTO" value="{{ $paciente->VCH_TRATAMIENTO }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Medicamento del Paciente" id="VCH_MEDICAMENTO" class="form-control" name="VCH_MEDICAMENTO" value="{{ $paciente->VCH_MEDICAMENTO }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Cada Cuántas Horas" id="VCH_CADA_HORA" class="form-control" name="VCH_CADA_HORA" value="{{ $paciente->VCH_CADA_HORA }}" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Por Cuántos Días" id="INT_DIAS" class="form-control" name="INT_DIAS" value="{{ $paciente->INT_DIAS }}" readonly>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
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
