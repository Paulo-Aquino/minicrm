@extends('adminlte::page')

@section('title', 'Editar Empresa')

@section('content_header')
    <h1>Editar Empresa</h1>
@stop


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">


                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type='button' class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <div class="alert-text">
                        @foreach ($errors->all() as $err)
                        <span>{{ $err }}</span>
                        @endforeach
                    </div>
                </div>

                @endif


                <form action="{{route('company.update',['company'=>$data->id])}}" method="POST" autocomplete="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')

    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="name" value="{{old('name',$data->name)}}" name="name" minlength="3" maxlength="255"
                                placeholder="Nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" minlength="5"
                                maxlength="255" placeholder="Email" value="{{old('email',$data->email)}}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Website</label>
                            <input type="text" class="form-control" id="website" name="website" minlength="5"
                                maxlength="255" placeholder="Website" value="{{old('website',$data->website)}}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Subir Logo</label><br>
                            <input type="file" accept="image/jpeg,image/png,image/jpg,image/png,image/webp"  class="form-control-file"
                                                name="logo" id="logo">
                            <small id="emailHelp" class="form-text text-muted">Solo se aceptan imagenes en formato: jpeg,png,jpg,webp y que no sea mayor a 10MB</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Logo</label><br>
                            <img src="{{asset($data->logo)}}" alt="..." class=" img-thumbnail border">
                        </div>

                    </div>

             
                      <div class="form-row">
                       <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                       </div>
                    </div>

                    
                </form>




            </div>
        </div>



    </div><!-- /.container-fluid -->
</section>
@stop


@section('js')
<script>




</script>
@stop