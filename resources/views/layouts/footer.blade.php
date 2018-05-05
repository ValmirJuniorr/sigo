

<!-- jQuery 3 -->
<script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('adminlte/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- data table -->
<script type="text/javascript" src="{{asset('js/datatable/datatable.min.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('js/highcharts/drilldown.js')}}"></script>

<script src="{{asset('js/highcharts/exporting.js')}}"></script>

<script src="{{asset('js/highcharts/highcharts.js')}}"></script>

<script src="{{asset('js/highcharts/highcharts-more.js')}}"></script>

<script src="{{asset('js/jquery-mask-plugin-master/dist/jquery.mask.min.js')}}"></script>

<script src="{{asset('select2/js/select2.min.js')}}"></script>

<script src="{{asset('js/transaction/transaction.js')}}"></script>]

<script>

    $('.dropdown-toggle').dropdown();

        $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
    });

    $('.date_mask').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.money').mask("##0,00", {reverse: true});
    $('.money2').mask("#,##0,00", {reverse: true});
    $('[data-toggle="tooltip"]').tooltip();

    $(document).ready(function() {
        $('.datatable_data').DataTable(
            {
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "language": {
                    "next": "Proximo",
                    "zeroRecords": "Nenhum resultado encontrado",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Procurar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Proximo",
                    }
                }
            }
        );

        $(".aparence").removeClass('hide');

        $('.select_2').select2();

    } );


</script>

@yield('custom-js')

</html>
