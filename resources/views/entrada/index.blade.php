@extends('plantilla.app')
@section('contenido')
<!--CONTENIDO-->
<!-- TABLA -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">entradas <button class="btn btn-primary" onclick="nuevo()"><i class="fas fa-file"></i> Nuevo</button> 
                        <a href=""
                                class="btn btn-success"><i class="fas fa-file-csv"></i> CSV</a></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('entrada.index')}}" method="get">
                            <div class="input-group">
                                <input name="texto" type="text" class="form-control" value="{{$texto}}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i>
                                        Buscar</button>
                                </div>
                            </div>
                        </form>
                        @if(Session::has('mensaje'))
                        <div class="alert alert-info alert-dismissible fade show mt-2">
                            <span class="alert-icon"><i class="fa fa-info"></i></span>
                            <span class="alert-text">{{Session::get('mensaje')}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @else
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2">
                            <span class="alert-icon"><i class="fa fa-info"></i></span>
                            <span class="alert-text">{{Session::get('mensaje')}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @else
                        @endif

                        @if(count($registros)==0)
                        <div class="alert alert-secondary mt-2" role="alert">
                            No hay registros para mostrar
                        </div>
                        @endif
                        <div class="mt-2 table-responsive">
                            <table class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Opciones</th>
                                        <th style="width: 30%">Evento</th>
                                        <th style="width: 30%">DNI</th>
                                        <th style="width: 30%">Pago</th>

                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($registros)==0)
                                    <tr>
                                        <td colspan="7">No hay resultados</td>
                                    </tr>
                                    @else
                                    @foreach($registros as $reg)
                                    <tr>
                                        <td><button class="btn btn-warning btn-sm" onclick="editar({{$reg->id}})"><i class="fas fa-edit"></i> </button>
                                            <button type="button" data-toggle="modal" data-target="#modal-eliminar-{{$reg->id}}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </td>
                                        <td>{{$reg->evento->nombre}}</td>
                                        <td>{{$reg->dni}}</td>
                                        <td>S/{{$reg->pago}}</td>
 
                                      
                                    </tr>
                                    @include('entrada.delete')
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>                            
                        </div>
                        <div class="table-responsive">
                        <!-- Links de navegación -->
                        {{ $registros->links() }}     
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- FIN TABLA -->
<!--MODAL UPDATE-->
<div class="modal fade" id="modal-action" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
    </div>
</div>
<!--FIN MODAL UPDATE-->

<!--FIN CONTENIDO-->
@endsection
@push('scripts')
<script>
    $('#liAlmacen').addClass("menu-open");      
    $('#lientrada').addClass("active");
    $('#aAlmacen').addClass("active");

    function nuevo(){
      $.ajax({
            method: 'get',
            url: `{{url('entrada/create')}}`,  //Alt + 96 `
            success: function(res){
              $('#modal-action').find('.modal-dialog').html(res);
              $("#textoBoton").text("Guardar");
              $('#modal-action').modal("show");              
            }
          });
    }

    function editar(id){
      $.ajax({
            method: 'get',
            url: `{{url('entrada')}}/${id}/edit`,
            success: function(res){
              $('#modal-action').find('.modal-dialog').html(res);
              $("#textoBoton").text("Editar");
              $('#modal-action').modal("show");              
            }
          });
    }

</script>
@endpush