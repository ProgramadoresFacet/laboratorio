<!-- FOOTER -->
<script src="<?=base_url('assets/template/')?>js/jquery-1.11.1.min.js"></script>
<script src="<?=base_url('assets/template/')?>js/bootstrap.min.js"></script>
<script src="<?=base_url('assets/template/')?>js/chart.min.js"></script>
<script src="<?=base_url('assets/template/')?>js/chart-data.js"></script>
<script src="<?=base_url('assets/template/')?>js/easypiechart.js"></script>
<script src="<?=base_url('assets/template/')?>js/easypiechart-data.js"></script>
<script src="<?=base_url('assets/template/')?>js/bootstrap-datepicker.js"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>
<!-- FIN FOOTER -->
</html>