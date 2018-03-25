
<!-- col 9 main -->
</div>

<?php require_once(VIEWPATH . 'frontend/shared/footer.php'); ?>

<!-- WRAPPER -->
</div>

<!-- SCRIPTS -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/moment.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/select2.full.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/vendor/lightslider.min.js') ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/js/vendor/lightgallery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/vendor/bootstrap-slider.min.js') ?>"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<?php if (isset($script_files) && count($script_files) > 0): ?>
    <?php foreach ($script_files as $s_file): ?>
        <script type="text/javascript" src="<?php echo $s_file; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('.loader-wrapper').hide();

    });
</script>


</body>
</html>
