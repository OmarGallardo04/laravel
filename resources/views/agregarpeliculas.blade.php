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
            max-width: 100%; /* Imagen más grande, ajustable al 100% del contenedor */
            height: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            object-fit: cover; /* Mantener la relación de aspecto */
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
        <h1 id="titulo">AGREGAR PELÍCULA</h1>
    </div>

    <!-- Formulario -->
    <div class="container">
        <div class="form-container">

            <form action="/guardar" method="POST" enctype="multipart/form-data">
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

                <!-- Campo de nombre de la película -->
                <div class="form-group">
                    <label class="form-label" for="nombre">NOMBRE DE LA PELÍCULA:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <!-- Campo de sinopsis -->
                <div class="form-group">
                    <label class="form-label" for="sinopsis">SINOPSIS DE LA PELÍCULA:</label>
                    <textarea name="sinopsis" id="sinopsis" class="form-control" required rows="4"></textarea>
                </div>

                <!-- Campo de categoría -->
                <div class="form-group">
                    <label class="form-label" for="categoria">CATEGORÍA DE LA PELÍCULA:</label>
                    <select name="categoria" id="categoria" class="form-control" required>
                        <option value="amor">AMOR</option>
                        <option value="accion">ACCIÓN</option>
                        <option value="terror">TERROR</option>
                        <option value="ficcion">FICCIÓN</option>
                        <option value="suspenso">SUSPENSO</option>
                    </select>
                </div>

                <!-- Campo de duración -->
                <div class="form-group">
                    <label class="form-label" for="duracion">DURACIÓN DE LA PELÍCULA (en minutos):</label>
                    <input type="number" name="duracion" id="duracion" class="form-control" required min="1">
                </div>

                <!-- Campo de fecha de estreno -->
                <div class="form-group">
                    <label class="form-label" for="fecha_estreno">FECHA DE ESTRENO:</label>
                    <input type="date" name="fecha" id="fecha_estreno" class="form-control" required>
                </div>


                <!-- Campo de foto -->
                <div class="form-group">
                    <label class="form-label" for="foto">FOTO DE LA PELÍCULA:</label>
                    <input type="file" name="foto" id="foto" class="form-control" required onchange="mostrarImagen(event)">
                    <img id="foto1" class="image-preview" src="" alt="Previsualización de la foto">
                </div>

                <!-- Campo para indicar si es para mayores de edad -->
                <fieldset class="form-group">
                    <legend class="form-label">¿Es película para mayores de edad?</legend>
                    <div>
                        <input type="radio" name="mayores_edad" value="1" id="mayores_edad_si">
                        <label for="mayores_edad_si" class="form-label">Sí</label>
                    </div>
                    <div>
                        <input type="radio" name="mayores_edad" value="0" id="mayores_edad_no">
                        <label for="mayores_edad_no" class="form-label">No</label>
                    </div>
                </fieldset>

                <!-- Botón de envío -->
                <div class="form-group text-center">
                    <button type="submit" class="btn-submit">
                        <i class="fa-solid fa-check"></i> Guardar Película
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
