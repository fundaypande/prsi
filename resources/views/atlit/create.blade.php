<div class="modal fade" id="create-item" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModal">Tambah Perlombaan</h4>
            </div>
            <div class="modal-body">
              <form action="/atlits">
                {{ csrf_field() }}
                <div class="form-group">
                  <label>Nama Atlit</label>
                  <input name="name" type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" style="width:100%"  class="js-example-basic-single">
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label><br>
                  <input type="date" name="ttl" required="required">
                  <input type="hidden" name="user" value="{{ Auth::user() -> id }}" required="required">
                </div>
                <div class="form-group">
                  <label for="school" class="col-md-4 control-label">School Name</label><br>
                        <select name="school" data-sch="funday" style="width:100%"  class="js-example-basic-single">
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
