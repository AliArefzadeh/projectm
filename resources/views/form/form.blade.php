@extends('layout')

@section('content')
    <!--content-->


    <div class="menu" style="background-color: #559bd4; padding: 5px;margin: 20px 10px 30px 10px;border-radius: 10px;text-align: center">
        <form method="get" style="margin-bottom: 25px">
            <label>enter humidity :</label>
            <input type="number" name="humid" >
            <button id="btn1" value="submit">Save</button>
            <button id="clearNum" type="reset">Clear</button>
        </form>
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



    </div>



@endsection
