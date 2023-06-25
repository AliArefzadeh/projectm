@extends('layout')

@section('content')
    <!--content-->


    <div class="last">
        <div style="font-size: xx-large " class="font1">LATEST UPDATE</div>
        <div id="last">
            <!--این بخش توی یک صفحه دیگه قرار داشت-->
            <br>
            <div class='clearfix'></div>
            <div style='display: inline-flex'>
                <div class='inblock' style='direction: ltr'>reletive humidity :</div>
                <div class='last-update inblock'>
                    {{$lastHumidity->humidity}} %RH
                </div>
                <div class='loader' style='margin-left: 15px'></div>
            </div>
        </div>

    </div>

    <!--led on/off-->
    <!--led on/off-->
    <!--این بخش در صفحه دیگری قرار داشت-->

    <div class="send">
        {{--<h4 style="margin-bottom: 10px">manual on/off switch :</h4>--}}
        <div
            style="text-align: center; margin-left: auto;margin-right: auto; position: center;display: inline-flex ">
           {{-- <form action="{{route('alarm.update',$lastHumidity)}}" method="post"
                  style="margin-bottom: 25px; margin-top: 25px;">
                @csrf
                <input type="text" name="onoff" id="onoff" style="display: none"
                       value="{{$lastAlarm->led=="off" ? 'off' :'on'}}">
                <button value="submit" id="led">led on/off</button>
                <div class="{{$lastAlarm->led=="off" ? 'red led' :'green led'}} "></div>
            </form>--}}


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
            <input type="number" min="2021" max="2023" value="{{request()->query('fyear') ?? '2022'}}" id="fyear" name="fyear">
            <input type="number" min="1" max="12" value="{{request()->query('fmon') ?? '9'}}" id="fmon" name="fmon">
            <input type="number" min="1" max="31" value="{{request()->query('fday') ?? '17'}}" id="fday" name="fday">
            <br>
            <input type="number" min="2021" max="2023" value="{{request()->query('lyear') ?? '2023'}}" id="lyear" name="lyear">
            <input type="number" min="1" max="12" value="{{request()->query('lmon') ?? '9'}}" id="lmon" name="lmon">
            <input type="number" min="1" max="31" value="{{request()->query('lday') ?? '17'}}" id="lday" name="lday">
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
                    <div class="result" style="color: black">{{$humidities}}</div>
                </div>
            @elseif(is_object($humidities))
                @foreach($humidities as $humidity )
                    <div class="results" style="color: black">
                        <div class='result1' style="margin-left: 15px">{{$humidity->humidity}}%RH</div>
                        <div class='result1' style="margin-left: 15px">{{$humidity->created_at}}</div>
                        {{--<div class='result1'>{{$humidity->led ?? 'no alarm'}}</div>--}}
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
        </div>


    </div>

@endsection
