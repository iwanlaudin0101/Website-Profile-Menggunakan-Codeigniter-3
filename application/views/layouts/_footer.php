<footer class="main-footer">
    <strong>Copyright &copy; 2020 - Himpunan Mahasiswa Taliabu</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?= base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

<script src="<?= base_url() ?>assets/js/app.js"></script>

<script>
    $(function() {
        CKEDITOR.replace('editor1')
        $('.textarea').wysihtml5()
    })
</script>

<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({

            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
</body>

</html>