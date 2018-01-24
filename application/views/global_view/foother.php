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

    <?php if (isset($NominaJs)){ ?>
    <script src="<?php echo base_url('assets/js/validations/nomina.js'); ?>"></script>
    <?php } ?>
    
    <!-- js empleado -->
    <script src="<?php echo base_url('assets/js/validations/empleados.js'); ?>"></script>

    <!-- Percepciones -->
    <script src="<?php echo base_url('assets/js/validations/percepciones.js'); ?>"></script>

     <!-- js Deducciones -->
    <script src="<?php echo base_url('assets/js/validations/deducciones.js'); ?>"></script>

     <!-- js Puesto -->
    <script src="<?php echo base_url('assets/js/validations/puesto.js'); ?>"></script>

    <!-- js Depto -->
    <script src="<?php echo base_url('assets/js/validations/depto.js'); ?>"></script>

    <!-- js Depto -->
    <script src="<?php echo base_url('assets/js/validations/periodos.js'); ?>"></script>

    <!-- js Periodos Modulo -->
    <script src="<?php echo base_url('assets/js/validations/m_periodo.js'); ?>"></script>

    <!-- js aportaciones -->
    <script src="<?php echo base_url('assets/js/validations/aportaciones.js'); ?>"></script>
    
    <!-- js tipo_empleado -->
    <script src="<?php echo base_url('assets/js/validations/tipo_empleado.js'); ?>"></script>

    <!-- js direccion -->
    <script src="<?php echo base_url('assets/js/validations/direccion.js'); ?>"></script>

    <?php if (isset($editarNominaJs)): ?>
        <!-- js para editar la nomina de un empleado-->
        <script src="<?php echo base_url('assets/js/validations/editar_nomina.js'); ?>"></script> 
    <?php endif ?>
    <!-- js direccion -->
    <script src="<?php echo base_url('assets/js/validations/nomina_extraudinaria.js'); ?>"></script>

</body>
</html>