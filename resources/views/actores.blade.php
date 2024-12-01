@extends('layouts.fondo')

@section('general')
<!-- Estilos personalizados -->
<style>
    /* Cargar fuentes de Google */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@300;400;700&display=swap');

    h1 {
        color: white;
        font-size: 100px;
        font-family: fantasy;
        font-weight: 600;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card-img-top {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        object-fit: cover;
        height: 200px; /* Ajustamos la altura de la imagen */
    }

    .card-body {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        border-radius: 0 0 15px 15px;
        padding: 20px;
        text-align: center;
        font-family: 'Roboto', sans-serif;
    }

    .card-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #ffc107; /* Un color dorado para el título */
    }

    .card-text {
        font-size: 16px;
        margin-bottom: 10px;
        color: #ddd; /* Texto gris claro */
    }

    .btn-custom {
        font-size: 16px;
        font-weight: bold;
    }

    .btn-edit {
        background-color: #ffc107;
        color: white;
        font-size: 14px;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
        font-size: 14px;
    }

    .btn-edit:hover, .btn-delete:hover {
        opacity: 0.8;
    }

    /* Efecto hover en la tarjeta */
    .card:hover {
        transform: translateY(-10px); /* Eleva la tarjeta al pasar el cursor */
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    /* Ajuste de los botones de edición y eliminación */
    .btn-group {
        display: flex;
        justify-content: space-between;
    }

    .btn-group .btn {
        width: 48%;
    }

    /* Aseguramos que las tarjetas no se solapen en pantallas pequeñas */
    .card-deck .card {
        margin-bottom: 20px;
    }
    
    /* Estilo personalizado para los botones con iconos */
    .btn-delete {
        background-color: #dc3545;
        color: white;
        font-size: 18px; /* Tamaño del ícono */
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-delete:hover {
        opacity: 0.8;
    }

    #mensaje {
        display: block;
        background-color: rgba(255, 99, 71, 0.8); /* Un color de fondo visible */
        color: white;
        font-weight: bold;
    }
</style>

<!-- Título -->
<div class="text-center mb-4">
    <h1>ACTORES</h1>
</div>

<!-- Contenedor de las tarjetas -->
<div class="container">
    <div class="row">
        @foreach ($actores as $actor)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="imagenes/actores/{{$actor->foto}}" class="card-img-top" alt="Imagen de la película">
                    <div class="card-body">
                        <h5 class="card-title">NOMBRE: {{$actor->nombre}}</h5>
                        <p class="card-text">BIOGRAFIA: {{$actor->biografia}}</p>
                        <p class="card-text">FECHA NACIMIENTO: {{$actor->fecha_nacimiento}}</p>
                        <p class="card-text">NACIONALIDAD: {{$actor->nacionalidad}}</p>
                        <p class="card-text">PREMIOS: {{$actor->premios}}</p>
                        <p class="card-text">GENERO: {{$actor->genero}}</p>

                        <!-- Botones de editar y eliminar -->
                        <div class="btn-group">
                            <form action="{{ route('borrar2', $actor) }}" method="POST" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            <a href="{{ route('editar2', $actor) }}" class="btn btn-edit btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Botón para agregar una nueva película -->
<div class="d-flex justify-content-center align-items-center mt-4">
    <a href="agregaractores">
        <button class="btn btn-primary btn-lg m-3 p-3" style="font-family: fantasy; font-size: 20px;">
            AGREGAR ACTOR
        </button>
    </a>
</div>

<!-- Script para mostrar el alerta de confirmación antes de eliminar -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const deleteForms = document.querySelectorAll('.form-delete');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenimos que el formulario se envíe de inmediato

            // Usamos SweetAlert2 para mostrar una alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡Esta acción no se puede deshacer!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Si el usuario confirma, enviamos el formulario
                }
            });
        });
    });
</script>

@endsection
