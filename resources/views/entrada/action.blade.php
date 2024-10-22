<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">entrada</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{$entrada->id ? route('entrada.update',$entrada) : route('entrada.store')}}" method="post" enctype="multipart/form-data">
            @if($entrada->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $entrada->id }}">
            @endif
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre">DNI</label>
                        <input type="text" class="form-control" maxlength="8" minlength="8" name="nombre" value="{{$entrada->dni}}" required
                            placeholder="Ingrese nombre">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre">Eventos</label>
                        <select class="form-control" name="evento_id" id="">
                            @foreach($eventos as $evento)
                                <option value="{{$evento->id}}">{{$evento->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre">Pago</label>
                        <input type="number" class="form-control" name="descripcion" value="{{$entrada->pago}}"
                            placeholder="Ingrese descripción">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>