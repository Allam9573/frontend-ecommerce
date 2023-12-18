<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tienda en Línea</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Barra de navegación -->
    @include('includes/navbar')

    <!-- Contenido principal -->
    <div class="d-flex justify-content-around align-items-center w-100 vh-100">
        <div class="">
            <h2 class="display-3">Bienvenido a <br>Mi Tienda en Línea</h2>
            <h5 class="display-5">Descubre nuestros increíbles productos y encuentra las mejores ofertas.</h5>
            <a href="" class="btn btn-lg btn-success">Ver Mas</a>
        </div>
        <div class="">
            <img src="{{ asset('images/online-shopping.png') }}" alt="">
        </div>
    </div>
    <div class="py-5" style="background-color: whitesmoke">
        <div class="container mt-4">
            <h1 class="display-2 text-center text-secondary">Descubre nuestros <br> productos de temporada</h1>
            @if ($productos != null)
                <h2 class="mt-5">Lista de Productos:</h2>
                <form action="">
                    <select name="" id="" class="form-control">
                        <option value="">Buscar por categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria['idCategoria'] }}">{{ $categoria['nombre'] }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Filtrar" class="btn btn-primary mt-2">
                </form>

                <div class="row">
                    @foreach ($productos as $producto)
                        <div class="card text-center w-25 m-3">
                            <h4 class="my-2">{{ $producto['nombre'] }}</h4>
                            <p>Precio: Lps. {{ $producto['precio'] }}</p>
                            <p class="mx-5">Descripcion: {{ $producto['descripcion'] }}</p>
                            <button class="btn btn-success w-75 mx-auto mb-4">Agregar al Carrito</button>
                        </div>
                    @endforeach
                </div>
            @else
                <h3>No hay productos en sistema</h3>
                <p>Por favor registre un nuevo producto para mostrar en inventario</p>
            @endif


        </div>
    </div>

    <!-- Agrega los enlaces a los archivos JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
