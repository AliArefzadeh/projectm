<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>monitoring</title>
    {{--<script src="{{asset('OldProjectm/mainf.js')}}"></script>--}}

    {{--<link rel="stylesheet" href="{{asset('OldProjectm/main.css')}}">
    <link rel="stylesheet" href="{{asset('OldProjectm/pure.css')}}">

    <script src="{{asset('OldProjectm/jquery.min.js')}}"></script>--}}
    <link rel="icon" href="{{ asset('pics/6393411.png') }}">
    @vite('resources/js/app.js')



    <!--<script>
        $(document).ready(function () {
            setInterval(function () {
                $("#last").load("update.php");
                refresh();
            }, 2000);
        });


		  $(document).ready(function () {
            setInterval(function () {
                $("#updateSide").load("updateSide.php");
                refresh();
            }, 2000);
        });
    </script>
	<script>
        $(document).ready(function () {
            $('#send').click(function () {
                $.get("select.php",
                    {
                        fyear: $('#fyear').val(),
                        fmon: $('#fmon').val(),
                        fday: $('#fday').val(),
                        lyear: $('#lyear').val(),
                        lmon: $('#lmon').val(),
                        lday: $('#lday').val()
                    },
                    function (data) {
                        $('#select').html(data);
                    }
                );

            });
        });
-->

    <!--led-->

    <!-- $(document).ready(function () {
         $('#led').click(function () {
             $.get("ledrecieve.php",
                 {
                     onoff: $('#onoff').val(),

                 },
                 function (data) {
                     $('#switch').html(data);
                 }
             );

         });
     });
 </script>-->


</head>

<body>
<header>

    <div
        style="margin: 12px 155px 15px 155px;background-color: #6c29fa;padding: 20px 10px 20px 10px;border-radius: 7px">
        <div STYLE="text-align: center; font-size: x-large;color: white">Room Humidity Monitoring</div>
    </div>
    <div class="pure-menu-separator" style="margin-top:25px"></div>
    <div class="pure-menu-horizontal" style="background-color: #2a2d2d"></div>
</header>

<div class="main pure-g">

    <x-header-menu></x-header-menu>

    <div class="clearfix"></div>

    <!--sidebar-->
    <x-sidebar></x-sidebar>


    <!--content-->
    <div class="content pure-u-17-24 main1 ">

        <x-validation-errors></x-validation-errors>
        @if(session('alert'))
            <div class="alert alert-success" style="margin: 15px;border-radius: 5px;direction: rtl ">
                {{session('alert')}}
            </div>
        @endif

        @yield('content')



        <!--searchBar-->

        <!--footer-->
        <div class="footer">
            <p>contact: aliarefzadeh1999@gmail.com</p>
            <p>Created by ALI AREFZADEH. © 2022-2023</p>

        </div>

    </div>
</div>
</body>
</html>
