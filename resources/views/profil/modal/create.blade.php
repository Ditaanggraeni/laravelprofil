<div id="createModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Tambah Profile</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <strong>NAMA</strong>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <strong>TEMPAT LAHIR</strong>
                    <input type="text" name="tempat" class="form-control" value="{{ old('tempat') }}" placeholder="Masukkan Tempat Lahir">
                </div>
                <div class="form-group">
                    <strong>TANGGAL LAHIR</strong>
                    <input type="date" name="ttl" class="form-control" value="{{ old('ttl') }}" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <strong>ALAMAT</strong>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                    <strong>CONTENT</strong>
                    <input type="text" name="content" class="form-control" value="{{ old('content') }}" placeholder="Masukkan Content">
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