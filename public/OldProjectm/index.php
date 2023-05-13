<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>monitoring</title>

    <link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="pure.css">

	    <script src="jquery.min.js"></script>


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
    <div style="margin: 12px 155px 15px 155px;background-color: #6c29fa;padding: 20px 10px 20px 10px;border-radius: 7px">
        <div STYLE="text-align: center; font-size: x-large;color: white">Room Humidity Monitoring</div>
    </div>
    <div class="pure-menu-separator" style="margin-top:25px"></div>
    <div class="pure-menu-horizontal" style="background-color: #2a2d2d"></div>
</header>

<div class="main pure-g">

    <div class="clearfix"></div>

    <!--sidebar-->
    <div class="sidebar pure-u-6-24 " style="opacity: 86%">
        <div class="menu" style="background-color: #5e38fa;border-radius: 10px; color: white; padding: 15px">
            <div class="font1">previous measurements</div>

            <div id="updateSide" class="updateSide" style="color: #2a2d2d">
<!--این بخش توی یک صفحه دیگه قرار داشت-->
                 <div class='task'>
                   <div class='headt'>humidity</div>
                    <div> time</div>
                    <div class=\"clearfix\"></div>
                    </div>
               <div class='task'>
                    <div class='head'>$v[humidity] %RH</div>
                     <div> $v[time]</div>
                    <div class=\"clearfix\"></div>
                    </div>


            </div>


        </div>
    </div>


    <!--content-->
    <div class="content pure-u-17-24 main1 ">

        <div class="last">
            <div style="font-size: xx-large " class="font1">LATEST UPDATE</div>

            <div id="last">
                <!--این بخش توی یک صفحه دیگه قرار داشت-->
                <br>
                 <div class='clearfix'></div>
                <div style='display: inline-flex'>
                    <div class='inblock' style='direction: ltr' >reletive humidity :  </div>
                    <div class='last-update inblock'>
                        humidity %RH
                      </div>
                    <div class='loader' style='margin-left: 15px'></div>
                    </div>
            </div>

        </div>


<!--searchBar-->
        <div>
            <form method="get" class="search">
                <label> select your time period</label>
                <br>
                <div class="total">
                    <div> YEAR</div>
                    <div> MONTH</div>
                    <div> DAY</div>
                </div>
                <input type="number" min="2022" max="2022" value="2022" id="fyear" name="fyear">
                <input type="number" min="1" max="12" value="9" id="fmon" name="fmon">
                <input type="number" min="1" max="31" value="7" id="fday" name="fday">
                <br>
                <input type="number" min="2022" max="2022" value="2022" id="lyear" name="lyear">
                <input type="number" min="1" max="12" value="9" id="lmon" name="lmon">
                <input type="number" min="1" max="31" value="9" id="lday" name="lday">
                <br>
            </form>
            <div class="send">
                <button id="send" >search</button>
				<!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->


 <!--led on/off-->
                <!--led on/off-->
                <!--این بخش در صفحه دیگری قرار داشت-->
                <form action="ledrecieve.php" method="get" style="margin-bottom: 25px; margin-top: 25px;">
                    <input type="number" name="onoff" id="onoff" style="display: none" value="3">
                </form>
                <button value="submit" id="led">led on/off</button>
                <!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->

                <div id="switch" style="text-align: center; margin-left: auto;margin-right: auto; position: center;display: inline-block ">

                        <div style="border-radius: 10px; background-color:#62e829 ;margin-left: 10px;padding: 5px; width:65%;display: inline-block "> on </div>


                         <div style="border-radius: 10px; background-color:#B51945 ;margin-left: 10px;padding: 5px; width:65%;display: inline-block "> off </div>

                </div>

            </div>


            <!--results-->
            <div class="result" id="select">
             <div class="results">
             <div class="result">Waiting for your selection...</div>
             </div>
            </div>




        <!--footer-->
        <div class="footer">
            <p >contact: aliarefzadeh1999@gmail.com</p>
            <p>Created by ALI AREFZADEH. © 2022-2023</p>

        </div>

    </div>


</div>
</div>
</body>
</html>
