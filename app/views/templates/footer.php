<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy;2019 Jadwal Dosen All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url; ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url; ?>/dist/js/demo.js"></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js'></script>
<script src="<?= base_url; ?>/dist/js/timepicker.js"></script>
<!-- <script src="<?= base_url; ?>/dist/js/datepicker.js"></script> -->
<script src="<?= base_url; ?>/dist/js/datepicker-custom.js"></script>
<script>
  $(document).ready(function() {
    setDatePicker("#datepicker1")
    setDateRangePicker("#startdate", "#enddate")
    setMonthPicker("#monthpicker")
    setYearPicker("#yearpicker")
    setYearRangePicker("#startyear", "#endyear")
  })
</script>
</body>

</html>