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
                  <input name="name" type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select style="width:100%" name="jk" class="js-example-basic-single">
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
                        <select data-sch="funday" style="width:100%" name="school" class="js-example-basic-single">
                        </select>
                </div>
                <br>
                <button type="submit" data-toggle="modal" data-target="#edit-item" class="btn btn-primary crud-submit-edit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
