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
        <div class="panel-heading">Insertar</div>
            <div class="panel-body">

                @if(isset($imagen))
                {!! Form::model($imagen,['route'=> ['imagenes.update',$imagen->id],'method'=>'PUT', 'enctype' => 'multipart/form-data']) !!}
                @else
                {!! Form::open(['route'=> 'imagenes.store','method'=>'POST','enctype' => 'multipart/form-data']) !!}
                @endif

                    <div class="form-group">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('path','Path') !!}
                        {!! Form::file('path') !!}
                        <p class="help-block">Example block-level help text here.</p>
                    </div>


                    <button type="submit" class="btn btn-primary">Continuar</button>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
