<!-- Bootstrap -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- jquery-validation -->
<script src="<?= base_url() ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<!-- <script src="<?= base_url() ?>/assets/plugins/chart.js/Chart.min.js"></script> -->

<!-- PAGE SCRIPTS -->
<!-- <script src="<?= base_url() ?>/assets/dist/js/pages/dashboard2.js"></script> -->

<script>
  $(function() {
    $("#example1").DataTable();;
  });

  // FORMAT ANGKA SAJA
  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>