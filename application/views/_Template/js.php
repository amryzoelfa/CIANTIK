  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js') ?>"></script>

  <script type="text/javascript">
    function goBack() {
      window.history.back();
    }
  </script>

  <script src="<?php echo base_url('assets/plugin/jquery-ui/jquery-ui.min.js') ?>"></script>
  <script>
    $(document).ready(function() { // Ketika halaman selesai di load
      $('.input-tanggal').datepicker({
        dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
      });

      $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

      $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
          $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
          $('#form-tanggal').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
          $('#form-tanggal').hide(); // Sembunyikan form tanggal
          $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
        } else { // Jika filternya 3 (per tahun)
          $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
          $('#form-tahun').show(); // Tampilkan form tahun
        }

        $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
      })
    })
  </script>