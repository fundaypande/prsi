<div class="modal fade" id="edit-item" role="dialog" aria-labelledby="simpleModal">
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
                  <label>Nama Atlit</label>
                  <select name="atlit" data-sch="funday" style="width:100%"  class="js-example-basic-single atlit">
                  </select>
                </div>
                <div class="form-group">
                  <label>Perlombaan</label>
                  <select name="lomba" data-sch="funday" style="width:100%"  class="js-example-basic-single">
                  </select>
                </div>
                <div class="form-group">
                  <label>Best Time</label>
                  <input class="form-control" type="text" name="best_time" value="">
                </div>
                <div class="form-group">
                  <label>Kelompok Umur</label>
                  <select name="umur" data-sch="funday" style="width:100%"  class="js-example-basic-single">
                  </select>
                </div>

                <br>
                <button type="submit" data-toggle="modal" data-target="#edit-item" class="btn btn-primary crud-submit-edit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
