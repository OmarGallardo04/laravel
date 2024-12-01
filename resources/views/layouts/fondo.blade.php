<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROYECTO FINAL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: rgb(3, 3, 66);
            color: white;
        }

        nav {
            background-color: dimgray;
            height: 100px;
            margin: 0;
            display: flex;
            justify-content: space-between; /* Para alinear los elementos a la izquierda y derecha */
            align-items: center;
            padding: 0 30px; /* Agregado para darle espacio a los lados */
        }

        .icon-container {
            display: flex;
            gap: 30px;
        }

        .icon-container i {
            font-size: 50px;
            color: white;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container input {
            padding: 15px;
            font-size: 16px;
            border-radius: 30px;
            border: 2px solid #9b9994;
            background-color: #2c2f38;
            color: white;
            transition: all 0.3s ease-in-out;
            width: 300px; /* Ajustado el ancho del campo de búsqueda */
        }

        .search-container input:focus {
            border-color: #302f2e;
            box-shadow: 0 0 10px rgba(170, 169, 164, 0.8);
            outline: none;
        }

        .search-container button {
            padding: 15px 20px;
            background-color: #969591;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .search-container button:hover {
            transform: scale(1.1);
            background-color: #9c9b96;
        }

        footer {
            background-color: rgb(42, 42, 44);
            color: white;
        }

        #hola {
            color: white;
        }

        .alert {
            margin-top: 20px;
        }
    </style>

    <div>
        @if (session('mensaje'))
            <div class="alert alert-danger" id="mensaje">
                {{ session('mensaje') }}
            </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const mensaje = document.getElementById('mensaje');
                if (mensaje) {
                    setTimeout(() => {
                        mensaje.remove();
                    }, 2000);
                }
            });
        </script>
    </div>
</head>

<body>
    <nav>
        <div class="icon-container">
            <a href="/"><i class="fa-solid fa-house"></i></a>
            <a href="peliculas"><i class="fa-solid fa-video"></i></a>
            <a href="actores"><i class="fa-solid fa-person"></i></a>
        </div>

        <!-- Formulario de búsqueda -->
        <div class="search-container">
            <form class="d-flex e " id="searchForm" onsubmit="return search()" role="search" >
            <input class="form-control me-2 " type="search" id="searchInput" placeholder="Buscar" aria-label="Search" style="display: flex; with: 100px; ">
            <button class="btn btn-outline-success h" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </nav>
<br>
<br>
<br>
<br>
    @yield('general')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <!-- Footer -->
    <footer class="text-center">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-outline btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-facebook-f" id="hola"></i>
                </a>
                <a class="btn btn-outline btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-twitter" id="hola"></i>
                </a>
                <a class="btn btn-outline btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-google" id="hola"></i>
                </a>
                <a class="btn btn-outline btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-instagram" id="hola"></i>
                </a>
                <a class="btn btn-outline btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-linkedin-in" id="hola"></i>
                </a>
                <a class="btn btn-outline btn-floating m-1" href="#!" role="button">
                    <i class="fab fa-github" id="hola"></i>
                </a>
            </section>

            <section>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Cartelera</h5>
                        <ul class="list-unstyled mb-0">
                            <li>Inicio</li>
                            <li>Peliculas</li>
                            <li>Actores</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Legales</h5>
                        <ul class="list-unstyled mb-0">
                            <li>Terminos y Condiciones</li>
                            <li>Aviso de Privacidad</li>
                            <li>Factura Electronica</li>
                            <li>Garantia Cinepolis</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">¿Quienes somos?</h5>
                        <ul class="list-unstyled mb-0">
                            <li>Omar Gallardo</li>
                            <li>Julieta Venegas</li>
                            <li>Daniela Contreras</li>
                            <li>Fatima Cisneros</li>
                            <li>Kamila Arredondo</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Contacto</h5>
                        <ul class="list-unstyled mb-0">
                            <li>5PRAM</li>
                            <li>CBTIS 65</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 : Proyecto Final
        </div>
    </footer>
</body>
<script>
    function search() {

    var query = document.getElementById('searchInput').value.trim().toLowerCase();


    var pages = {
        'peliculas': 'http://127.0.0.1:8000/peliculas',
        'actores': 'http://127.0.0.1:8000/actores',
        'Peliculas': 'http://127.0.0.1:8000/peliculas',

    };


    if (pages[query]) {
        window.location.href = pages[query];
    } else {
        alert('error pagina no encontrada');
    }
    return false;
}
</script>
</html>
