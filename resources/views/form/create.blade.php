@extends('layout')

@section('content')
    <!--content-->

    <form action="{{route('alarm.store')}}" method="get">
        @csrf
        {{--<label class="switch">
            <input type="checkbox" name="construction" value="off" id="switch"  onclick="tgl()">
            <span class="slider round"></span>
        </label>--}}

        <div class="mainx">
            <h5 style="color: white">construction mode:</h5>
            <label class="switch menu-button-wrapper" for="">
                <input type="checkbox" class="menu-button" name="construction" value="off" id="switch" checked onclick="tgl()">
                <span class="slider round"></span>
                <span class="item-list">

                    <span><input class="inputLed" type="submit" name="led" value="LED on"><i class="gg-check-o"></i></span>
                    <span> <input class="inputLed" type="submit" name="led" value="LED off">{{--<i class="gg-check-o"></i>--}}</span>

                    {{--<div><a href="">LED on<i class="gg-check-o"></i></a></div>--}}
                    {{--<div><a href="">LED off<i class="gg-check-o"></i></a></div>--}}

                </span>
            </label>
        </div>
        {{--<input type="checkbox" name="construction" value="on" id="switch" checked onclick="tgl()" /><label class="tog" for="switch">Toggle</label>--}}
        {{--<button id="btn1" value="submit">construction</button>--}}
    </form>




    <div class="menu"
         style="/*background-color: #559bd4;*/ color: white; padding: 5px;margin: 20px 10px 30px 10px;border-radius: 10px;text-align: center">
        <form action="{{route('humidity.store')}}" method="post" style="margin-bottom: 25px">
            @csrf
            <label>enter humidity :</label>
            <input type="number" name="humidity">

            <button id="btn1" value="submit">Save</button>
            <button id="clearNum" type="reset">Clear</button>
            <textarea name="description" id="" cols="65" rows="4"
                      style="display: block;text-align: center;margin:10px auto 0 auto;direction: rtl"></textarea>
        </form>
    </div>

    <!--led on/off-->
    <!--led on/off-->
    <!--این بخش در صفحه دیگری قرار داشت-->

    <div class="send">
        <h4 style="margin-bottom: 10px">manual on/off switch :</h4>
        <div
            style="text-align: center; margin-left: auto;margin-right: auto; position: center;display: inline-flex ">
            <form action="" method="get" style="margin-bottom: 25px; margin-top: 25px;">
                <input type="number" name="onoff" id="onoff" style="display: none" value="3">
            </form>
            <button value="submit" id="led">led on/off</button>
            <div class="red led"></div>
            <div class="green led"></div>
            <!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->

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
            <button id="send">search</button>
            <!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->
        </div>


        <!--results-->
        {{--<div class="result" id="select">
            <div class="results">
                <div class="result">Waiting for your selection...</div>
            </div>
        </div>--}}


    </div>

@endsection
