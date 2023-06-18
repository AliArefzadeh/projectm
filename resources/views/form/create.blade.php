@extends('layout')

@section('content')
    <!--content-->

    <x-construction-mode></x-construction-mode>


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
            <form action="{{route('alarm.update',$lastHumidity)}}" method="post"
                  style="margin-bottom: 25px; margin-top: 25px;">
                @csrf
                <input type="text" name="onoff" id="onoff" style="display: none"
                       value="{{$lastAlarm->led=="off" ? 'off' :'on'}}">
                <button value="submit" id="led">led on/off</button>
                <div class="{{$lastAlarm->led=="off" ? 'red led' :'green led'}} "></div>
            </form>


            {{--<div class="{{$lastAlarm->led=="on" ? '' :''}}"></div>--}}
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
            <input type="number" min="2021" max="2023" value="2022" id="fyear" name="fyear">
            <input type="number" min="1" max="12" value="9" id="fmon" name="fmon">
            <input type="number" min="1" max="31" value="7" id="fday" name="fday">
            <br>
            <input type="number" min="2021" max="2023" value="2023" id="lyear" name="lyear">
            <input type="number" min="1" max="12" value="9" id="lmon" name="lmon">
            <input type="number" min="1" max="31" value="9" id="lday" name="lday">
            <br>
            <button id="send">search</button>
        </form>
        <div class="send">

            <!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->
        </div>


        <!--results-->
        <div class="result" id="select">

            @if(is_string($humidities))
                <div class="results">
                    <div class="result" style="color: black">waiting for your selection</div>
                </div>
            @elseif(is_object($humidities))
                @foreach($humidities as $humidity )
                    <div class="results" style="color: black">
                        <div class='result1'>{{$humidity->humidity}}%RH</div>
                        <div class='result1'>{{$humidity->created_at}}</div>
                        <div class='result1'>{{$humidity->led ?? ''}}</div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
        </div>


    </div>

@endsection
