<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>QrCode Monitor</title>

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/light/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="{{ asset('frontend/light/css/feather.css') }}">
    <style>
        body {
            overflow: hidden;
            /* Hide scrollbars */
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }

        .valign {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        * {
            margin: 0;
            padding: 0;
        }


        .clock {
            position: absolute;
            margin: 0;
            top: 0;
            /* right: 0; */
            /* bottom: 0; */
            left: 0;
            width: 600px;
            height: 350px;

            text-align: center;
            color: #fff;
            font-family: 'Quicksand', 'Helvetica', Arial, sans-serif;
            font-weight: lighter;
        }

        .inside {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 500px;
            height: 250px;
            background-color: #000000;
        }

        .content {
            margin-top: 40px;
            width: auto;
            height: auto;
            text-align: center;
        }

        .days {
            color: rgba(0, 0, 0, 0.2);
        }

        .days span {
            margin-left: 10px;
            font-size: 1rem;
            color: rgba(0, 0, 0, 0.2);
        }

        .text {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin-top: 100px;
            font-size: 2.5em;
            color: #000000;
        }

        #time {
            font-size: 1.5rem;
        }

        #date {
            margin-top: 100px;
            margin-left: -100px;
        }

        #cal img {
            width: 30px;
            height: 30px;
        }

        span#day {
            position: absolute;
            margin-top: 5px;
            margin-left: 10px;
        }

        span#month {
            position: absolute;
            margin-top: 5px;
            margin-left: 45px;

        }

        span#year {
            position: absolute;
            margin-top: 5px;
            margin-left: 105px;

        }
    </style>
</head>

<body class="light ">
    <div class="clock">

    </div>
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">


            <div class="col-6 mx-auto text-center">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-7 ">
                                <div class="content">
                                    <p class='days'><span id="sun">SUN</span>&nbsp;<span
                                            id="mon">MON</span>&nbsp;<span id="tus">TUS</span>&nbsp;<span
                                            id="wed">WED</span>&nbsp;<span id="thu">THU</span>&nbsp;<span
                                            id="fri">FRI</span>&nbsp;<span id="sat">SAT</span></p>
                                    <br>
                                    <p class='text'><span id='hours'></span>:<span id='min'></span>:<span
                                            id='sec'></span>&nbsp;&nbsp;<span id='time'></span></p>
                                    <p id=date>
                                        <span id='cal'><i class="fe fe-24 fe-calendar"></i></span>
                                        <span id='day'></span>
                                        <span id='month'></span>
                                        <span id='year'></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-5 ">
                                <center>
                                    <canvas id="canvas"></canvas>
                                </center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="{{ mix('js/app.js') }}"></script>

    <script>
        // window.setTimeout(function() {
        //     fetch("{{ route('send-event') }}")
        //         .then(res => console.log('Success'))
        //         .catch(err => console.log('Failed'))
        // }, 3000);

        setInterval(function(){  fetch("{{ route('send-event') }}")
                .then(res => console.log('Success'))
                .catch(err => console.log('Failed')) }, 10000)

        // setTimeout(function() {
        //     fetch("{{ route('send-event') }}")
        //         .then(res => console.log('Success'))
        //         .catch(err => console.log('Failed'))
        // }, 5000);
    </script>
    <script>
        var daysofweek = ['sun', 'mon', 'tus', 'wed', 'thu', 'fri', 'sat'];
        var month = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        function clock() {
            // setting up my variables
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            var day = h < 11 ? 'AM' : 'PM';
            var daytoday = today.getDay();
            var date = today.getDate();
            var mon = today.getMonth();
            var year = today.getFullYear();

            // adding leading zeros to them
            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;

            // writing it down in the document
            document.getElementById('hours').innerHTML = h;
            document.getElementById('min').innerHTML = m;
            document.getElementById('sec').innerHTML = s;
            document.getElementById('time').innerHTML = day;
            // .style.color = '#000000'
            document.getElementById('' + daysofweek[daytoday] + '');
            document.getElementById('day').innerHTML = date;
            document.getElementById('month').innerHTML = month[mon];
            document.getElementById('year').innerHTML = year;

        }
        var inter = setInterval(clock, 400);
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            Echo.channel('absensi')
                .listen('MonitorqrEvent', (e) => {
                    console.log('event absensi')
                    console.log(e.order);
                });
        });
    </script> --}}



</body>



</html>
