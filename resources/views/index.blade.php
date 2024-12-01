@extends('layouts/fondo')

@section('general')
<style>
    h1 {
        color: white;
        font-size: 100px;
        font-family: fantasy;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px; /* Espacio entre los botones e imágenes */
        margin-top: 50px;
    }

    .btn-container a {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .btn-container img {
        width: 300px; /* Tamaño de las imágenes */
        height: auto;
        margin-bottom: 20px; /* Espacio entre la imagen y el botón */
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); /* Sombra para darle profundidad */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-container img:hover {
        transform: scale(1.05); /* Efecto de ampliación en la imagen */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); /* Aumentar sombra al pasar el mouse */
    }

    .btn-container button {
        font-family: fantasy;
        font-size: 30px;
        text-align: center;
        width: 200px;
        height: 200px;
        border-radius: 15px;
        border: none;
        background-color: #007bff;
        color: white;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-container button:hover {
        transform: scale(1.1); /* Aumentar tamaño del botón */
        background-color: #061525; /* Cambiar color de fondo del botón */
    }

    /* Agregar un estilo para los resultados */
    .result-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 30px;
    }

    .result-item {
        width: 200px;
        text-align: center;
        margin: 15px;
    }

    .result-item img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .pagination-container {
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }
</style>

<center><h1>CINEPOLIS</h1></center>

<div class="btn-container">
    <!-- Imagen a la izquierda de Peliculas -->
    <img src="https://cinepremiere.com.mx/wp-content/uploads/2024/02/Wicked-Poster-2.jpg" alt="Imagen Peliculas">

    <!-- Botón de Peliculas -->
    <a href="peliculas">
        <button class="btn btn-primary">
            <span style="font-family: fantasy; font-size: 30px;">PELICULAS</span>
        </button>
    </a>

    <!-- Botón de Actores -->
    <a href="actores">
        <button class="btn btn-primary">
            <span style="font-family: fantasy; font-size: 30px;">ACTORES</span>
        </button>
    </a>

    <!-- Imagen a la derecha de Actores -->
    <img src="https://cinepremiere.com.mx/wp-content/uploads/2024/02/Wicked-Poster-2.jpg" alt="Imagen Actores">
</div>




@endsection
