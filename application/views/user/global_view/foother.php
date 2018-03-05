        </div>
            
    </div>
	<!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.validate.js'); ?> "></script>
    <!-- Flot -->
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.spline.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.pie.js'); ?> "></script>

    <!-- Peity -->
    <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/peity-demo.js'); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>
    
    <!-- Ladda -->
    <script src="<?php echo base_url('assets/js/plugins/ladda/spin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/ladda/ladda.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/ladda/ladda.jquery.min.js'); ?>"></script>    

    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.min.js'); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url('assets/js/demo/sparkline-demo.js'); ?>"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url('assets/js/plugins/chartJs/Chart.min.js'); ?>"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js'); ?>"></script>
    <!-- Sweet alert -->
    <script src="<?php echo base_url('assets/js/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

    <!-- Data tables -->
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/plugins/dataTables/function_dataTables.js'); ?>"></script>
    
    <!-- js empleado -->
    <script src="<?php echo base_url('assets/js/validations/periodos_user_file.js'); ?>"></script>

    <script>
        $(document).ready(function() {

            $( document ).ajaxStart(function() {
                $('#myModalStatusBar').modal({backdrop: 'static', keyboard: false});
            });

            $( document ).ajaxStop(function() {
                $('#myModalStatusBar').modal('hide')
            });

        });
    </script>

</body>
</html>
