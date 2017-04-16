<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Popraw NEWS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="form-errors" class="clearfix"></div>

            <div class="modal-body">
                <div id="formErrorsEdit" class="alert-danger">

                </div>
                <form id="formAdd" method="post" action="/admin/nowosci">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nazwa">Tytuł News</label>
                        <input required type="text" autofocus class="form-control" id="tytulNewsEdit" value=""
                               aria-describedby="nazwaHelp"
                               name="tytulNews" placeholder="Wpisz tytuł News">
                        <small id="nazwaHelp" class="form-text text-muted">Wpisz poprawny tytuł.</small>
                    </div>
                    <div class="form-group">
                        <label for="nazwa"> Pod Tytuł News</label>
                        <input required type="text" autofocus class="form-control" id="podtytulNewsEdit" value=""
                               aria-describedby="nazwaHelp"
                               name="podtytulNews" placeholder="Wpisz pod tytuł news">
                        <small id="nazwaHelp" class="form-text text-muted">Wpisz poprawny pod tytuł.</small>
                    </div>
                    <div class="form-group">
                        <label for="nazwa">Tekst News</label>
                        <textarea required class="form-control" rows="4" id="tekstNewsEdit"
                                  aria-describedby="tekstNewsHelp"
                                  name="tekstNews" placeholder="Wpisz tekst News"></textarea>
                        <small id="tekstNewsHelp" class="form-text text-muted">Wprowadź tekst News.</small>
                    </div>
                    <input type="hidden" id="idNewsEdit" value="">
                    <div class="form-group">
                        <span id="userEdit">
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-edit" class="btn btn-primary" value="Popraw">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>

            </div>
        </div>
    </div>
</div>