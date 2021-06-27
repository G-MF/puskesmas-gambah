<!-- Delete Modal-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="<?= base_url('assets/img/hapus-icon.png') ?>" class="mb-3" style="width: 120px; height: 150px;">
                <h5><b>Data "<span id="name" style="text-decoration: underline;"></span>" Akan Dihapus, Lanjutkan?</b></h5>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="#" class="btn bg-gradient-danger text-white tombol-delete">
                    <i class="fa fa-check"> Ya</i>
                </a>
                <button class="btn bg-gradient-secondary text-white" type="button" data-dismiss="modal">
                    <i class="fa fa-times"> Batal</i>
                </button>
            </div>
        </div>
    </div>
</div>