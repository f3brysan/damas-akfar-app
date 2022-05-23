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

<!-- Flot chart --><script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.crosshair.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/curvedLines.js"></script>
<script src="<?php echo base_url(); ?>assets/flot-chart/jquery.flot.axislabels.js"></script>
<script src="<?php echo base_url(); ?>assets/canvas/canvasjs.min.js"></script>

<!-- KNOB JS -->
<!--[if IE]>

<![endif]-->
<script src="<?php echo base_url(); ?>assets/jquery-knob/jquery.knob.js"></script>

<!-- Dashboard Init -->
<script src="<?php echo base_url(); ?>assets/pages/jquery.dashboard.init.js"></script>

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

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

<!-- Counter Up  -->
<script src="<?php echo base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>


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
        <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        <script>
            $(document).ready(function() {
                // Untuk sunting
                $('#edit-data').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal          = $(this)

                    // Isi nilai pada field
                    modal.find('#id').attr("value",div.data('id'));

                });
            });
        </script>    



    </body>
    </html>
