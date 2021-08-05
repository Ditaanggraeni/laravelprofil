<div id="updateModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" method="post" id="updateForm" enctype="multipart/form-data">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Edit Profile</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <strong>NAMA</strong>
                    <input type="text" name="nama" class="form-control" value="" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <strong>TEMPAT LAHIR</strong>
                    <input type="text" name="tempat" class="form-control" value="">
                </div>
                <div class="form-group">
                    <strong>TANGGAL LAHIR</strong>
                    <input type="text" name="ttl" class="form-control" value="">
                </div>
                <div class="form-group">
                    <strong>ALAMAT</strong>
                    <input type="text" name="alamat" class="form-control" value="" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                    <strong>CONTENT</strong>
                    <input type="string" name="content" class="form-control" value="" placeholder="Masukkan Content">
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