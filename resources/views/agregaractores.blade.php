@extends('layouts.fondo')

@section('general')
<!-- Estilo personalizado -->
<style>
    .form-container {
        background-color: rgba(0, 0, 0, 0.6);
        padding: 30px;
        border-radius: 15px;
        max-width: 600px;
        margin: 0 auto;
        color: white;
    }

    .form-label {
        font-size: 18px;
        font-weight: bold;
    }

    .form-control, select {
        background-color: #333;
        color: white;
        border: 1px solid #444;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
    }

    .form-control:focus, select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-submit {
        font-size: 18px;
        font-weight: bold;
        background-color: #007bff;
        border: none;
        padding: 15px 30px;
        border-radius: 5px;
        color: white;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
        font-weight: bold;
    }

    /* Ajusta el tamaño de la imagen de previsualización */
    .image-preview {
        display: none;
        max-width: 100%;
        height: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        object-fit: cover;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .container-title {
        text-align: center;
        color: white;
        font-family: 'Poppins', sans-serif;
        font-size: 40px;
        font-weight: bold;
        margin-bottom: 50px;
    }

    #titulo {
        font-family: fantasy;
    }
</style>

<!-- Título -->
<div class="container-title">
    <h1 id="titulo">AGREGAR ACTOR</h1>
</div>

<!-- Formulario -->
<div class="container">
    <div class="form-container">

        <form action="/guardar2" method="POST" enctype="multipart/form-data">
            @csrf
                
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error-message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Campo de nombre del actor -->
            <div class="form-group">
                <label class="form-label" for="nombre">NOMBRE DEL ACTOR:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <!-- Campo de biografía -->
            <div class="form-group">
                <label class="form-label" for="biografia">BIOGRAFÍA DEL ACTOR:</label>
                <textarea name="biografia" id="biografia" class="form-control" required rows="4"></textarea>
            </div>

            <!-- Campo de fecha de nacimiento -->
            <div class="form-group">
                <label class="form-label" for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>

            <!-- Campo de género -->
            <div class="form-group">
                <label class="form-label" for="genero">GÉNERO:</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <!-- Campo de nacionalidad -->
            <div class="form-group">
                <label class="form-label" for="nacionalidad">NACIONALIDAD:</label>
                <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
            </div>

            <!-- Campo de premios -->
            <div class="form-group">
                <label class="form-label" for="premios">PREMIOS/LOGROS (si tiene):</label>
                <textarea name="premios" id="premios" class="form-control" rows="3"></textarea>
            </div>

            <!-- Campo de foto -->
            <div class="form-group">
                <label class="form-label" for="foto">FOTO DEL ACTOR:</label>
                <input type="file" name="foto" id="foto" class="form-control" required onchange="mostrarImagen(event)">
                <img id="foto1" class="image-preview" src="" alt="Previsualización de la foto">
            </div>

            <!-- Botón de envío -->
            <div class="form-group text-center">
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-check"></i> Guardar Actor
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script para mostrar la previsualización de la imagen -->
<script>
    function mostrarImagen(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('foto1');
        
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';  // Asegúrate de que se muestre la imagen
            };

            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
