@extends('adminlte::page')

@section('title', 'Ver Usuario')

@section('content_header')
    <h1>Ver Usuario</h1>
@stop


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">




                <form>
            

    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="name" value="{{$data->name}}" name="name" minlength="3" maxlength="50"
                                placeholder="Nombre" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" minlength="5"
                                maxlength="191" placeholder="Email" value="{{$data->email}}" readonly>
                        </div>

                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                         <label>Rol de Usuario</label>
                          <select class="form-control" id="role" name="role" disabled>
                              <option value="Administrador"  {{$data->role === 'Administador' ? "selected": '' }} >Administrador</option>
                              <option value="Auditor"  {{$data->role === 'Auditor'  ? "selected": '' }}>Auditor</option>
                              <option value="Editor"  {{$data->role === 'Editor'  ? "selected": '' }}>Editor</option>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Fecha Creación</label>
                        <input type="text" class="form-control" id="website" name="website" minlength="5"
                            maxlength="255" placeholder="Website" value="{{date('d/m/Y H:i:s',strtotime($data->created_at))}}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha Modificación</label>
                        <input type="text" class="form-control" id="website" name="website" minlength="5"
                            maxlength="255" placeholder="Website" value="{{date('d/m/Y H:i:s',strtotime($data->updated_at))}}" readonly>
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