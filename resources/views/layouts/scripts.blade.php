<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>

<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Scripts-->

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
<!--end::Page Vendors -->

<script type="text/javascript">
    $(document).ready(function () {
        (function ($, DataTable) {
            // Datatable global configuration
            $.extend(true, DataTable.defaults, {
                ordering: false,
                language: {
                    // url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
                    "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing":   '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> <br> Sedang memproses...',
                    "sLengthMenu":   "Tampilkan _MENU_ entri",
                    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Cari:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                    }
                },
            });

        })(jQuery, jQuery.fn.dataTable);

        $.fn.datepicker.dates['id'] = {
            days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
            daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            today: "Hari Ini",
            clear: "Clear",
            format: "mm/dd/yyyy",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };

        $('#table').DataTable();

        $('.select2').select2({
            width: '100%'
        }).on('change', function() {
            $(this).valid();
        });

        $('.datepicker').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            autoclose: true,
            language : 'id',
            format   : 'yyyy-mm-dd'
        });
    });
</script>

@stack('page-scripts')