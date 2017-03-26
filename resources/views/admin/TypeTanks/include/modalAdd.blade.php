<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert-danger" id="form-errors"></div>
                <form id="formModal">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Wpisz unikalny typ czołgu</label>
                        <input type="text" class="form-control" id="nameAdd"
                               placeholder="Wpisz typ czołgu, musi byc unikalny">
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" id="idTyp">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Rezygnuje</button>
                <button type="button" id="btn-save" value="" class="btn btn-primary"></button>
            </div>
        </div>
    </div>
</div>