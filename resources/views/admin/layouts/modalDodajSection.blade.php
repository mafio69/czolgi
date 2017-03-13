<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj dział</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="form-errors" class="clearfix"></div>

            <div class="modal-body">
                <form method="post" action="{{url('dzialy')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nazwa">Nazwa</label>
                        <input required type="text" autofocus class="form-control" id="nazwa" value="{{old('nazwa')}}"
                               aria-describedby="nazwaHelp"
                               name="nazwa" placeholder="Wpisz nazwę działu">
                        <small id="nazwaHelp" class="form-text text-muted">Wpisz poprawną nazwę.</small>
                    </div>
                    <div class="form-group">
                        <label for="nazwa">Opis</label>
                        <textarea required class="form-control" rows="4" id="opis"
                                  aria-describedby="opisHelp"
                                  name="opis" placeholder="Wpisz opis">{{old('opis')}}</textarea>
                        <small id="opisHelp" class="form-text text-muted">Wprowadź krótki opis.</small>
                    </div>
                    <div class="form-group">
                        <label for="nazwa">Dział nadrzędny</label>
                        <select id="overriding" name="overriding" class="form-control">
                            @foreach($sections as $sect)
                                <option class="form-control"
                                        id="nazwa"
                                        value="{{$sect->id}}" aria-describedby="overridingHelp"
                                        name="overriding" placeholder="Wybierz dział nadrzędny">
                                    {{$sect->nazwa}}
                                </option>
                            @endforeach
                        </select>
                        <small id="overridingHelp" class="form-text text-muted">Wybierz dział nadrzędny.</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btn-save" class="btn btn-primary" value="Dodaj">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>