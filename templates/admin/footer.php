<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.2
    </div>
</footer>

<!-------------------------------------------------------------------- MODAL ------------------------------------------------------------------------>

<!--------------------------------------------------- LAPORAN KEHADIRAN ANAK -------------------------------------------------------------------->
<div class="modal fade" id="lap-kehadiran-anak">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Kehadiran Anak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/kehadiran-anak.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>



<!--------------------------------------------------- LAPORAN PEMBERIAN IMUNISASI -------------------------------------------------------------------->
<div class="modal fade" id="lap-pemberian-imunisasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Pemberian Imunisasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/pemberian-imunisasi.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>




<!--------------------------------------------------- LAPORAN PEMBERIAN VITAMIN -------------------------------------------------------------------->
<div class="modal fade" id="lap-pemberian-vitamin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Pemberian Vitamin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/pemberian-vitamin.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>




<!--------------------------------------------------- LAPORAN PERKEMBANGAN GIZI BERAT BADAN -------------------------------------------------------------------->
<div class="modal fade" id="lap-perkembangan-gizi-bb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Perkambangan Gizi Berat Badan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/perkembangan-gizi-bb.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>


<!--------------------------------------------------- LAPORAN PERKEMBANGAN GIZI TINGGI BADAN -------------------------------------------------------------------->
<div class="modal fade" id="lap-perkembangan-gizi-tb">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Perkambangan Gizi Tinggi Badan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/perkembangan-gizi-tb.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>



<!--------------------------------------------------- LAPORAN KEMATIAN ANAK -------------------------------------------------------------------->
<div class="modal fade" id="lap-kematian-anak">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Kematian Anak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/kematian-anak.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>



<!--------------------------------------------------- LAPORAN KEHADIRAN IBU -------------------------------------------------------------------->
<div class="modal fade" id="lap-kehadiran-ibu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Kehadiran Ibu Hamil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/kehadiran-ibu-hamil.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>




<!--------------------------------------------------- LAPORAN IBU HAMIL MELAHIRKAN -------------------------------------------------------------------->
<div class="modal fade" id="lap-ibu-melahirkan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Ibu Hamil Melahirkan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/ibu-hamil-melahirkan.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>



<!--------------------------------------------------- LAPORAN KEMATIAN IBU HAMIL -------------------------------------------------------------------->
<div class="modal fade" id="lap-kematian-ibu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Kematian Ibu Hamil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('laporan/kematian-ibu-hamil.php') ?>" target="_blank" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" class="form-control" name="tgl1" required value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tgl2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center text-center">
                    <button type="submit" name="cetak" class="btn bg-gradient-primary"><i class="fa fa-eye"> Preview</i></button>
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal"><i class="fa fa-times"> Batal</i></button>
                </div>
            </form>

        </div>
    </div>
</div>