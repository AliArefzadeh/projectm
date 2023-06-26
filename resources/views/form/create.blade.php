@extends('layout')

@section('content')
    <!--content-->
    <h3 class="top-lable">checking Humidities</h3>
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

    {{--<x-led-switch></x-led-switch>--}}

    <!--searchBar-->
    <div>
        <form method="get" class="search">
            <label> select your humidity time period</label>
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
                        <div class='result1'>{{$humidity->humidity}}%RH</div>
                        <div class='result1'>{{$humidity->created_at}}</div>
                        <div class='result1'>{{$humidity->led ?? 'no alarm'}}</div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
        </div>


    </div>

@endsection
