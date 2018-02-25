<div class="modal fade" id="create-item" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModal">Tambah Perlombaan</h4>
            </div>
            <div class="modal-body">
              <form action="/daftars">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Nama Atlit</label>
                  <select name="atlit" id="atlit" data-sch="funday" style="width:100%"  class="js-example-basic-single atlit">
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
                  <label>Umur Atlit</label>
                  <input class="form-control" type="text" name="umur" value="">
                  <input type="hidden" name="user" value="{{ Auth::user() -> id }}" required="required">
                </div>
                <div class="form-group">
                  <label>Kelompok Umur</label>
                  <select name="umur" data-sch="funday" style="width:100%"  class="js-example-basic-single">
                  </select>
                </div>

                <br>
                <!-- <textarea name="details" rows="8" cols="60"></textarea> -->
                <button type="submit" data-toggle="modal" data-target="#create-item" class="btn-bot btn-primary-bot crud-submit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
