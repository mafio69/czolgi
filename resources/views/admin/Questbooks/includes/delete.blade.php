<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Czy jesteś pewien?</h4>
            </div>
            <div class="modal-body">
                <form id="frmquestbooks" method="post" name="frmquestbooks" class="form-horizontal" novalidate="">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <h4>Czy napewno chcesz usunąć wpis autora :</h4>
                    <h4 id="autorKsiega"></h4>
                    <div id="tekstKsiega">

                    </div>

                    <div class="form-group">

                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-danger" id="delete" name="description"
                                    placeholder="Description" value="">Usuń
                            </button>
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Rezygnuje
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>