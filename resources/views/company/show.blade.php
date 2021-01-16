@extends('adminlte::page')

@section('title', 'Ver Empresa')

@section('content_header')
    <h1>Ver Empresa</h1>
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
                            <input type="text" class="form-control" id="name" value="{{$data->name}}" name="name" minlength="3" maxlength="255"
                                placeholder="Nombre" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" minlength="5"
                                maxlength="255" placeholder="Email" value="{{$data->email}}" readonly>
                        </div>


                        {{-- <div class="form-group col-md-6">
                            <label>Logo</label>
                            <input type="file" accept="image/jpeg,image/png" class="form-control-file"
                                                name="logo" id="image" readonly>
                        </div> --}}

                        <div class="form-group col-md-6">
                            <label>Website</label>
                            <input type="text" class="form-control" id="website" name="website" minlength="5"
                                maxlength="255" placeholder="Website" value="{{$data->website}}" readonly>
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
                        <div class="form-group col-md-6">
                            <label>Logo</label><br>
                            <img src="{{asset($data->logo)}}" alt="..." class=" img-thumbnail border">
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