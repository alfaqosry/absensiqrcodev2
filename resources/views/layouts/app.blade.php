<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Absensi</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/light/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/customalfa.css') }}">
    <link href="{{ asset('frontend/light/assets/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/light/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/light/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('frontend/light/css/app-dark.css') }}" id="darkTheme" disabled>
    
</head>

<body class="vertical  light  ">
    <div class="wrapper">

        {{-- Top Bar --}}

        @include('layouts.topbar')


        {{-- Sidebar --}}

        @include('layouts.sidebar')

        {{-- End Sidebar --}}



        <main role="main" class="main-content" style="margin-bottom :80px;">
            @yield('content')


            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group list-group-flush my-n3">
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-box fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Package has uploaded successfull</strong></small>
                                            <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                            <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-download fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Widgets are updated successfull</strong></small>
                                            <div class="my-0 text-muted small">Just create new layout Index, form, table
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-inbox fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Notifications have been sent</strong></small>
                                            <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                <div class="list-group-item bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="fe fe-link fe-24"></span>
                                        </div>
                                        <div class="col">
                                            <small><strong>Link was attached to menu</strong></small>
                                            <div class="my-0 text-muted small">New layout has been attached to the menu
                                            </div>
                                            <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->
                            </div> <!-- / .list-group -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                                All</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Jam</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body px-5">
                            <div class="row align-items-center">
                                <div class="col-12 text-center">

                                    <div class="card bg-primary">
                                        <div class="card-body">
                                            <h2 class="text-white" id="clock"></h2>
                                        </div>
                                    </div>
                                   
                                       
                                   
                                 
                                </div>
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>

 </div> <!-- .wrapper -->



 
</main> <!-- main -->


<!-- Menu fixed mobile-->
<div class="fixed-buttom menubuttobar">
    <div class="card shadow cardmenubuttonbar">
        <div class="card-body" style="padding: 8px;">
            <div class="row d-flex justify-content-between">

                <div class="col-3 ml-4 text-center" style="padding-bottom: 0px !important;">
                    <a href="{{route('dashboard')}}" class="btn justify-content-center  nav-link" style="padding-bottom: 0px;">

                        <i class="fe fe-24 fe-home align-self-center"></i>
                    </a>
                    <p class="tulisanfixmenu mt-0" style="margin-bottom: 0px;">Home</p>
                </div>


                <div class="col-3 text-center">

                            <a  href="{{route('scan')}}" class="btn rounded-circle btn-primary " style="width: 75px;height: 75px;"><i
                                class="bx bx-qr-scan align-self-center  mt-3">Kamera scan</i></a>
                </div>

                <div class="col-3 text-center mr-4" style="padding-bottom: 0px !important;">
                    <a href="{{route('profile')}}" class="btn justify-content-center" style="padding-bottom: 0px;">
                        <i class="fe fe-24 fe-user align-self-center "></i>
                    </a>
                    <p class="tulisanfixmenu mt-0" style="margin-bottom: 0px;">User</p>
                </div>




            </div>
        </div>
    </div>
</div>



<!-- Modal -->
                      <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="logoutLabel">Apakah Anda ingin Logout ?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            
                            <div class="modal-footer">
                              <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
                              <a href="{{route('logout')}}" class="btn mb-2 btn-primary">Logout</a>
                            </div>
                          </div>
                        </div>
                      </div>
    <script src="{{ asset('frontend/light/js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('frontend/light/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('frontend/light/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('frontend/light/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/config.js') }}"></script>
    <script src="{{ asset('frontend/light/js/d3.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/topojson.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('frontend/light/js/datamaps.custom.js') }}"></script>
    <script src="{{ asset('frontend/light/js/Chart.min.js') }}"></script>

   
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('frontend/light/js/gauge.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/light/js/apexcharts.custom.js') }}"></script>
    <script src='{{ asset('frontend/light/js/jquery.mask.min.js') }}'></script>
    <script src='{{ asset('frontend/light/js/select2.min.js') }}'></script>
    <script src='{{ asset('frontend/light/js/jquery.steps.min.js') }}'></script>
    <script src='{{ asset('frontend/light/js/jquery.validate.min.js') }}'></script>
    <script src='{{ asset('frontend/light/js/jquery.timepicker.js') }}'></script>
    <script src='{{ asset('frontend/light/js/dropzone.min.js') }}'></script>
    <script src='{{ asset('frontend/light/js/uppy.min.js') }}'></script>
    <script src='{{ asset('frontend/light/js/quill.min.js') }}'></script>
    <script type="text/javascript">
        var d = new Date();
        var hours = d.getHours();
        var minutes = d.getMinutes();
        var seconds = d.getSeconds();
        var hari = d.getDay();
        var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        hariIni = namaHari[hari];
        var tanggal = ("0" + d.getDate()).slice(-2);
        var month = new Array();
        month[0] = "Januari";
        month[1] = "Februari";
        month[2] = "Maret";
        month[3] = "April";
        month[4] = "Mei";
        month[5] = "Juni";
        month[6] = "Juli";
        month[7] = "Agustus";
        month[8] = "September";
        month[9] = "Oktober";
        month[10] = "Nopember";
        month[11] = "Desember";
        var bulan = month[d.getMonth()];
        var tahun = d.getFullYear();
        var date = Date.now(),
            second = 1000;
    
        function pad(num) {
            return ('0' + num).slice(-2);
        }
    
        function updateClock() {
            var clockEl = document.getElementById('clock'),
                dateObj;
            date += second;
            dateObj = new Date(date);
            clockEl.innerHTML = '' + hariIni + '.  ' + tanggal + ' ' + bulan + ' ' + tahun + '. ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
        }
        setInterval(updateClock, second);
    </script>
    

    
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    <script src="{{ asset('frontend/light/js/apps.js') }}"></script>
</body>

</html>
