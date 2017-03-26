<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj NEWS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="form-errors" class="clearfix"></div>

            <div class="modal-body">
                <div id="formErrors" class="alert-danger">

                </div>
                <form id="formAdd" method="post" action="/admin/nowosci">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nazwa">Tytuł News</label>
                        <input required type="text" autofocus class="form-control" id="tytulNews" value="{{old('tytulNews')}}"
                               aria-describedby="nazwaHelp"
                               name="tytulNews" placeholder="Wpisz tytuł News">
                        <small id="nazwaHelp" class="form-text text-muted">Wpisz poprawny tytuł.</small>
                    </div>
                    <div class="form-group">
                        <label for="nazwa"> Pod Tytuł News</label>
                        <input required type="text" autofocus class="form-control" id="podtytulNews" value="{{old('podtytulNews')}}"
                               aria-describedby="nazwaHelp"
                               name="podtytulNews" placeholder="Wpisz pod tytuł news">
                        <small id="nazwaHelp" class="form-text text-muted">Wpisz poprawny pod tytuł.</small>
                    </div>
                    <div class="form-group">
                        <label for="nazwa">Tekst News</label>
                        <textarea required class="form-control" rows="4" id="tekstNews"
                                  aria-describedby="tekstNewsHelp"
                                  name="tekstNews" placeholder="Wpisz tekst News">{{old('tekstNews')}}</textarea>
                        <small id="tekstNewsHelp" class="form-text text-muted">Wprowadź tekst News.</small>
                    </div>
                    <input type="hidden" id="dataNews" value="{{date('Y-m-d')}}">
                    <input type="hidden" id="user_id" value="{{auth()->id()}}">
                    <div class="form-group">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-add" class="btn btn-primary" value="Dodaj">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>