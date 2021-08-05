<div id="updateModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" method="post" id="updateForm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Edit Data Pengalaman Kerja</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <strong>POSISI</strong>
                    <input type="text" name="posisi" class="form-control" value="" placeholder="Masukkan Posisi Kerja">
                </div>
                <div class="form-group">
                    <strong>PERUSAHAAN</strong>
                    <input type="text" name="perusahaan" class="form-control" value="" placeholder="Masukkan Nama Perusahaan">
                </div>
                <div class="form-group">
                    <strong>DESKRIPSI</strong>
                    <input type="text" name="deskripsi" class="form-control" value="" placeholder="Masukkan Deskripsi">
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Edit</button>
              </div>
          </div>
      </form>
    </div>
</div>