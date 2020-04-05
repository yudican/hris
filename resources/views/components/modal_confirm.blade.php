<div id="confirm-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Konfirmasi Hapus</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin hapus data ini.?</p>
      </div>
      <div class="modal-footer">
        <form id="form-confirm" action="#" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check pr-2"></i>Ya, Hapus</button>
        </form>
        <button class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="fa fa-times pr-2"></i>Batal</a>
      </div>
    </div>
  </div>
</div>