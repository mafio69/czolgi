<div class="modal fade" id="modalGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Czy jesteś pewien?</h4>
            </div>
            <div class="modal-body">
                <form id="frmNovelty" method="post" name="frmNovelty" class="form-horizontal" novalidate="">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <h4>Czy napewno chcesz usunąć wpis z encyklopedii :</h4>
                    <h4 id="tytulGallery"></h4>

                    <div class="form-group">

                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-danger" id="deleteGallery" name="description"
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