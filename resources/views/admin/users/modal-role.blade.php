<div class="modal fade" id="modal-role" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Rubah Role User</h4>
            </div>
            <div class="modal-body">
              <p id="editP">Apakah anda yakin ingin mengubah role user</p>
              <form action="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <button type="button" data-dismiss="modal" id="cancel-role" class="btn btn-primary" name="cancel">Batal</button>
                <button type="submit" data-toggle="modal" data-target="#modal_delete" class="btn btn-danger crud-submit">Ubah</button>
              </form>
            </div>
        </div>
    </div>
</div>
