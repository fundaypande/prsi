<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModal">Edit Data Perlombaan</h4>
            </div>
            <div class="modal-body">
              <form action="/lombas">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Nama Lomba</label>
                  <input name="name" type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>No Acara</label>
                  <input style="" name="acara" type="text" placeholder="" class="form-control" value="">
                </div>

                <button type="submit" data-toggle="modal" data-target="#edit-item" class="btn btn-primary crud-submit-edit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
