<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('includes/navbar')
    @if ($productos != null)
        <div class="container">
            <h1 class="display-2 text-center mt-5">Panel administracion de productos:</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Nuevo Producto
            </button>
        </div>
    @else
        <div class="container">
            <h2>No hay productos en sistema</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>


        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="text" placeholder="Nombre de producto" name="nombre" id=""
                            class="form-control mb-2">
                        <input type="text" placeholder="Precio Lp. 100.00" name="precio" id=""
                            class="form-control mb-2">
                        <select name="categoria" id="" class="form-control mb-2">
                            <option value="">Seleccione una categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria['idCategoria'] }}">{{ $categoria['nombre'] }}</option>
                            @endforeach
                        </select>
                        <textarea name="descripcion" placeholder="Descripcion de producto..." class="form-control" id="" cols="30"
                            rows="5"></textarea>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Producto" class="btn btn-primary" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
