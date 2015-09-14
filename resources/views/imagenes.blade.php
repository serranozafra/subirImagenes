<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
    <div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">Listado de Im&aacute;genes</div>
            <div class="panel-body">

                <p><a href="{{ route('imagenes.create') }}" class="btn btn-primary">Insertar Imagen</a></p>


                <table class="table table-bordered">
                    <tr>
                        <td>#id</td>
                        <td>nombre</td>
                        <td>imagen</td>
                    </tr>

                    @foreach($imagenes as $imagen)
                    <tr>
                        <td>{{ $imagen->id }}</td>
                        <td>{{ $imagen->name }}</td>
                        <td><img src='{{ url($imagen->resized_image) }}' /></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
