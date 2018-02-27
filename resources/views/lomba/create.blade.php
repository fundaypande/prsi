<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModal">Tambah Perlombaan</h4>
            </div>
            <div class="modal-body">
              <form action="/lombas">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Nama Perlombaan</label>
                  <input name="name" type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>No Acara</label>
                  <input style="border-color: red" name="acara" type="text" class="form-control" value="" placeholder="bodo">
                </div>
                <!-- <textarea name="details" rows="8" cols="60"></textarea> -->
                <button type="submit" data-toggle="modal" data-target="#create-item" class="btn-bot btn-primary-bot crud-submit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
