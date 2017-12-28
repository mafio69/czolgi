<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj Komentarz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>
            <div id="form-errors"></div>
            <div class="modal-body">
                <form action="/admin/komentarze/add" id="form" method="post">
                    <div class="form-group row">
                        <label for="tytulKom" class="col-2 col-form-label">Tytuł</label>
                        <div class="col-10">
                            <input type="text" value="{{$gallery->nazwaGaleria}}" class="form-control" name="tytulKom" id="tytulKom">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tekstKom" class="col-2 col-form-label">Tekst</label>
                        <div class="col-10">
                            <textarea name="tekstKom" id="tekstKom" required class="form-control"  rows="6"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="autorKom" class="col-2 col-form-label">Podpis</label>
                        <div class="col-10">
                            <input type="text" class="form-control" required name="autorKom" id="autorKom">
                        </div>
                    </div>
                    <input type="hidden"  value="{{$gallery->id}}" name="galleries_id" id="galleries_id">
                    {{csrf_field()}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                <input type="submit" id="btn-save" class="btn btn-primary" value="Dodaj komentarz">

            </div>
        </div>
    </div>
</div>