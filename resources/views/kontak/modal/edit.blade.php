<div id="updateModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" method="post" id="updateForm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Edit Data Contact</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <strong>NOMOR TELEPON</strong>
                    <input type="text" name="no_tlp" class="form-control" value="" placeholder="Masukkan No Telepon">
                </div>
                <div class="form-group">
                    <strong>EMAIL</strong>
                    <input type="text" name="email" class="form-control" value="" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <strong>INSTAGRAM</strong>
                    <input type="text" name="ig" class="form-control" value="" placeholder="Masukkan Instagram">
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