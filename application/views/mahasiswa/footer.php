<footer class="footer text-right">
    2018 © Highdmin. - Coderthemes.com
</footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- jQuery  -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>

<!-- Flot chart -->
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/curvedLines.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.axislabels.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

<!-- Dashboard Init -->
<script src="<?php echo base_url(); ?>assets/pages/jquery.dashboard.init.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.js"></script>

  <!-- plugin js -->
        <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$('#datetimepicker').datetimepicker({
    format: 'dd-mm-yyyy'
});

</script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>


<!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.js"></script>

<!-- Sweet Alert Js  -->
        <script src="<?php echo base_url(); ?>assets/plugins/sweet-alert/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.sweet-alert.init.js"></script>


<script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();
                $('#datawali').DataTable();
                $('#dataverifmhs').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'textarea' );
                CKEDITOR.replace( 'textarea_subjudul' );

            </script>
            <script type="text/javascript">
                //Auto Close Timer
        $('#sa-timer').click(function () {
            swal({
                title: 'Mohon Tunggu',
                text: 'Data pendaftaran Yudisium Anda, sedang diproses.',
                timer: 10000,
                confirmButtonClass: 'btn btn-confirm mt-2'
            }).then(
                function () {
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                        console.log('Terimakasih.')
                    }
                }
            )
        });
            </script>

            <script type="text/javascript">
                //Auto Close Timer
        $('#sign-kti').click(function () {
            swal({
                title: 'Mohon Tunggu',
                text: 'Data pendaftaran KTI Anda, sedang diproses.',
                timer: 10000,
                confirmButtonClass: 'btn btn-confirm mt-2'
            }).then(
                function () {
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                        console.log('Terimakasih.')
                    }
                }
            )
        });
            </script>

            <script type="text/javascript">
                //Auto Close Timer
        $('#kti-timer').click(function () {
            swal({
                title: 'Mohon Tunggu',
                text: 'Pengajuan permohonan tanda tangan Anda, sedang diproses.',
                timer: 10000,
                confirmButtonClass: 'btn btn-confirm mt-2'
            }).then(
                function () {
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                        console.log('Terimakasih.')
                    }
                }
            )
        });
            </script>
           <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>

        <script>
            $(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:
                    // $('input:submit').removeAttr('disabled');
                }
            }
            );
    });</script>

</body>
</html>
