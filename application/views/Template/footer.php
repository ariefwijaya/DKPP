</div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Choirunnisa Qonitah (09031281320008)</b>
        </div>
        <strong>Copyright &copy; 2017 Dinas Ketahanan Pangan dan Peternakan Prov. Sumsel
      </footer>

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
	<!----
	<?php if($this->uri->segment('2')!='test' && $this->uri->segment('2')!='data_dokumen' && $this->uri->segment('2')!='data_masalah_solusi' && $this->uri->segment('2')!='detail_masalah_solusi' && $this->uri->segment('2')!='detail_dokumen'){?>
    <script src="<?php echo base_url();?>asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<?php } ?>
	---->
	<?php if($this->uri->segment('2')=='pengguna' || $this->uri->segment('2')=='profil'){?>
    <script src="<?php echo base_url();?>asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<?php } ?>
    <!-- jQuery UI 1.11.4 -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url();?>asset/raphael-min.js"></script>
    <script src="<?php echo base_url();?>asset/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>asset/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url();?>asset/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url();?>asset/moment.min.js"></script>
    <script src="<?php echo base_url();?>asset/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- DataTables -->
    <script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>asset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>asset/dist/js/app.min.js"></script>
	<?php if($this->uri->segment('2')==''){?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url();?>asset/dist/js/pages/dashboard.js"></script>
	<?php } ?>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>asset/dist/js/demo.js"></script>
	

	<script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
		$('#example2 thead').detach();
		$('#example3').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
		$('#example3 thead').detach();
		$('#example4').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
		  "pageLength": 20
        });
		$('#example4 thead').detach();
		$('#example7').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
		  "pageLength": 20
        });
		$('#example7 thead').detach();
      });
    </script>
<?php if($this->uri->segment('2')=='input_masalah_solusi' || $this->uri->segment('2')=='submit_masalah_solusi' || $this->uri->segment('2')=='edit_masalah_solusi' || $this->uri->segment('2')=='input_dokumen' || $this->uri->segment('2')=='edit_dokumen' || $this->uri->segment('2')=='input_kamus_istilah' || $this->uri->segment('2')=='edit_istilah' || $this->uri->segment('2')=='data_kasus' || $this->uri->segment('2')=='edit_revisi'|| $this->uri->segment('2')=='submit_kasus'|| $this->uri->segment('2')=='edit_solusi'){?>
	<!-- CK Editor -->
    <script src="<?php echo base_url('asset/plugins/ckeditor');?>/ckeditor.js"></script>
    <script>
      $(function () {
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
      });
    </script>
	<?php } ?>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>asset/plugins/select2/select2.full.min.js"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        $("#select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>