<div class="stopka">
    © {{date('Y')}} <a class="btn-link" href="http://designmf.eu">DESIGNMF</a> | <button class="btn-link" data-toggle="modal" href="" data-target="#kontaktModal">Kontakt</button>
</div>


<!-- Modal -->
<div class="modal fade" id="kontaktModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formularz kontaktowy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="form-errorsK"></div>
                <form id="formKontakt" action="/konatkt">
                    <div class="form-group">
                        <label for="email">Email:</label>
                    <input type="email" placeholder="Email pole wymagane"  id="email" required class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="tresc">Treść:</label>
                    <textarea name="" id="tresc" name="tresc" cols="30" rows="10" required  class="form-control" placeholder="Treść , pole wymagane"></textarea>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                <button type="button" class="btn btn-primary" id="btn-kontakt">Wyślij</button>
            </div>
        </div>
    </div>
</div>

