{{-- Delete Modal --}}
<div id="deleteModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" id="deleteForm" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Delete</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('DELETE')
                <h5 class="text-center">PERINGATAN!!</h5>
                <p class="text-center">Data akan terhapus secara permanen dan data yang terhubung dengan tabel ini akan ikut terhapus</p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
              </div>
          </div>
      </form>
    </div>
</div>