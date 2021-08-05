<div id="updateModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" method="post" id="updateForm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Edit History Pendidikan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <strong>JENJANG</strong>
                    <input type="text" name="jenjang" class="form-control" value="" placeholder="Masukkan jenjang">
                </div>
                <div class="form-group">
                    <strong>SEKOLAH</strong>
                    <input type="text" name="sekolah" class="form-control" value="" placeholder="Masukkan Sekolah">
                </div>
                <div class="form-group">
                    <strong>TANGGAL MASUK</strong>
                    <input type="date" name="tgl_masuk" class="form-control" value="" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <strong>TANGGAL LULUS</strong>
                    <input type="date" name="tgl_lulus" class="form-control" value="}" placeholder="Masukkan Tanggal Lahir">
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