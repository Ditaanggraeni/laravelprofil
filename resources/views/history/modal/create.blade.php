<div id="createModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="{{ route('history.store') }}" method="POST">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Tambah History</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <strong>JENJANG</strong>
                    <input type="text" name="jenjang" class="form-control" value="{{ old('jenjang') }}" placeholder="Masukkan jenjang">
                </div>
                <div class="form-group">
                    <strong>SEKOLAH</strong>
                    <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah') }}" placeholder="Masukkan Sekolah">
                </div>
                <div class="form-group">
                    <strong>TANGGAL MASUK</strong>
                    <input type="date" name="tgl_masuk" class="form-control" value="{{ old('tgl_masuk') }}" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <strong>TANGGAL LULUS</strong>
                    <input type="date" name="tgl_lulus" class="form-control" value="{{ old('tgl_lulus') }}" placeholder="Masukkan Tanggal Lahir">
                </div>               
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </div>
      </form>
    </div>
</div>