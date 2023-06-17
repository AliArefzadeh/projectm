@extends('layout')

@section('content')
    <!--content-->

    <x-construction-mode></x-construction-mode>


    {{--humidity input section--}}

    <!--led on/off-->
    <!--led on/off-->
    <!--این بخش در صفحه دیگری قرار داشت-->



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

            {{--filter section--}}
            <div class="filter">
                <div style="margin-right: 0px;margin-left: 15px;padding:5px;">
                    <label for="inputCity" style="font-size: 15px;margin-right: 20px">sorted by: </label>
                    <select name="sortBy" {{--class="form-control"--}}>
                        <option {{request()->query('sortBy') == "created_at" ? 'selected' : ''}} value="created_at">recent</option>
                        <option {{request()->query('sortBy') == "forced" ? 'selected' : ''}} value="forced">manually activated</option>
                        <option {{request()->query('sortBy') == "construction" ? 'selected' : ''}} value="construction"> construction mode</option>
                    </select>
                </div>
                <input type="hidden" value="{{request()->query('q')}}" name="q">
                <div style="padding: 5px">
                    <label for="inputState" style="font-size: 15px/*;display: block*/"> </label>
                    <select id="inputState" name="length" {{--class="form-control"--}}>
                        <option {{request()->query('length') == null ? 'selected' : ''}} value="">همه</option>
                        <option {{request()->query('length') == 1 ? 'selected' : ''}} value="1">کمتر از یک دقیقه</option>
                        <option {{request()->query('length') == 2 ? 'selected' : ''}} value="2">1 تا 5 دقیقه</option>
                        <option {{request()->query('length') == 3 ? 'selected' : ''}} value="3">بیش از 5 دقیقه</option>
                    </select>
                </div>

            </div>


            <button id="send">search</button>
        </form>

        {{--filter section--}}



        <div class="send">

            <!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->
        </div>


        <!--results-->
        <div class="result" id="select">

            @if(is_string($alarms))
                <div class="results">
                    <div class="result" style="color: black">Waiting for your selection...</div>
                </div>
            @elseif(is_object($alarms))
                @foreach($alarms as $alarm )
                    <div class="results" style="color: black">
                        <div class='result1'>LED: {{$alarm->led}}</div>
                        <div class='result1'>{{$alarm->created_at}}</div>
                        <div class='result1'>{{$alarm->manual==1 ?'manual change' : 'auto saved'}}</div>
                        <div class='result1'>{{$alarm->construction==1 ?'construction on' : 'construction off'}}</div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
        </div>


    </div>

@endsection
