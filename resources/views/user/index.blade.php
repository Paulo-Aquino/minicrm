@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop


@section('content')
@include('layouts/flash-message')
<section class="content">
    <div class="container-fluid">
      <div class="card">
          <div class="card-body">





    <div class="table-responsive table-bordered">
        <table id="listado_1" class="table" style="width: 100%;">

            <thead>
                <tr style="text-align: center;">
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Actualización</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        
            </tbody>
        </table>
    </div>




</div>
</div>

</div><!-- /.container-fluid -->
</section>


<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Esta seguro que desea eliminar este usuario ?</p>
          <input type="hidden" id="input_modal" value="">
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" onclick="deleteEvent()" class="btn btn-success">SI</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
        </div>
      </div>
    </div>
  </div>


  <form action="" method="post" id="form_delete">
    @method('DELETE')
    {{ csrf_field() }}
  </form>


@stop
@section('js')
<script>

var route_delete = '{{url('user')}}';

    $(document).ready(function() {
        $('#listado_1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('user.serverside') }}',
            columnDefs: [{
                targets: [0, 1, 2],
                className: 'mdl-data-table__cell--non-numeric'
            }],
            "columns" : [
            { "data" : "name" },
       { "data" : 'email'},
       { "data" : "role" },
       { "data" : "created_at" },
       { "data" : "updated_at" },
       { "data" : function(x){
           btn_edit = ` <a class="btn btn-warning btn-sm" href="{{url('/')}}/user/${x.id}/edit"  role="button"><svg class="bi bi-pen" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                   <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                   <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                 </svg></a>
                                 <button class="btn btn-danger btn-sm" onclick="deleteModal(${x.id})"  type="button">
                                       <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                       <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                       </svg>
                                 </button>
                                 <a class="btn btn-info btn-sm" href="{{url('/')}}/user/${x.id}"   role="button">
                                    <i class="fas fa-eye"></i>
                                 </a>`;
              return   btn_edit;                 
       }}
      ]
        });
    });


    function deleteModal(id){
    let route = route_delete+'/'+id
    $('#form_delete').prop('action',route);
    $('#deleteModal').modal('show');
}

function deleteEvent(){
    id = $('#form_delete').submit();
}


</script>
@stop