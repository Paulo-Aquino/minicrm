@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
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


                <form action="{{route('user.update',['user'=>$user->id])}}" method="POST" autocomplete="">
                    {{ csrf_field() }}
                    @method('PUT')

    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="name" value="{{old('name',$user->name)}}" name="name" minlength="3" maxlength="255"
                                placeholder="Nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" minlength="5"
                                maxlength="255" placeholder="Email" value="{{old('email',$user->email)}}" required>
                        </div>

                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                         <label>Rol de Usuario</label>
                          <select class="form-control" id="role" name="role">
                              <option value="Administrador"  {{old('role',$user->role) == 'Administador' ? "selected":'' }} >Administrador</option>
                              <option value="Auditor"  {{old('role',$user->role) == 'Auditor' ? "selected":'' }}>Auditor</option>
                              <option value="Editor"  {{old('role',$user->role) == 'Editor' ? "selected":'' }}>Editor</option>
                          </select>
                      </div>

                    </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" value=""
                                name="password" minlength="8" maxlength="255" placeholder="Contrseña">
                        </div>

                        <div class="form-group col-md-6">
                           <label>Confirmar Contraseña</label>
                           <input type="password" class="form-control" value=""
                               name="password_confirmation" minlength="8" maxlength="255" placeholder="Confirmar Contraseña">
                       </div>

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