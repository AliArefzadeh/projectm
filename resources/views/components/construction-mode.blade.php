@auth()
    <form action="{{route('alarm.store')}}" method="post" id="form2">
        @csrf
        {{--<label class="switch">
            <input type="checkbox" name="construction" value="off" id="switch"  onclick="tgl()">
            <span class="slider round"></span>
        </label>--}}

        <div class="mainx">
            <h5 style="color: white">construction mode:</h5>
            <label class="switch menu-button-wrapper" for="">
                <input name="construction" type="hidden" value="off">
                {{--<input type="checkbox" class="menu-button" name="construction" value="on" id="switch" onclick="tgl()" onchange="submit()">--}}
                <input type="checkbox" class="menu-button" name="construction" value="on"
                       id="switch" {{$lastAlarm->construction ==0 ? '' : "onchange=submit() checked"}}>
                <span class="slider round"></span>
                <span class="item-list">

                   <span><input class="inputLed" type="submit" name="led"
                                value="LED on"><i {{$lastAlarm->construction==1 &&$lastAlarm->led=="on" ? 'class=gg-check-o' : '' }}></i></span>
                    <span> <input class="inputLed" type="submit" name="led"
                                  value="LED off"><i {{$lastAlarm->construction==1 &&$lastAlarm->led=="off" ? 'class=gg-check-o' : '' }}></i></span>


                    {{--<div><a href="">LED on<i class="gg-check-o"></i></a></div>--}}
                    {{--<div><a href="">LED off<i class="gg-check-o"></i></a></div>--}}

                </span>
            </label>
        </div>
        {{--<input type="checkbox" name="construction" value="on" id="switch" checked onclick="tgl()" /><label class="tog" for="switch">Toggle</label>--}}
        {{--<button id="btn1" value="submit">construction</button>--}}
    </form>
@endauth()

@guest()
    <form action="{{route('alarm.store')}}" method="post" id="form2">
        @csrf
        {{--<label class="switch">
            <input type="checkbox" name="construction" value="off" id="switch"  onclick="tgl()">
            <span class="slider round"></span>
        </label>--}}

        <div class="mainx">
            <h5 style="color: white">construction mode:</h5>
            <label class="switch menu-button-wrapper" for="">
                <input name="construction" type="hidden" value="off">
                {{--<input type="checkbox" class="menu-button" name="construction" value="on" id="switch" onclick="tgl()" onchange="submit()">--}}
                <input type="checkbox" class="menu-button" name="construction" value="on"
                       id="switch" {{$lastAlarm->construction ==0 ? '' : "onchange=submit() checked"}}>
                <span class="slider round"></span>
                <span class="item-list">

                   <span><input class="inputLed" type="submit" name="led"
                                value="LED on"><i {{$lastAlarm->construction==1 &&$lastAlarm->led=="on" ? 'class=gg-check-o' : '' }}></i></span>
                    <span> <input class="inputLed" type="submit" name="led"
                                  value="LED off"><i {{$lastAlarm->construction==1 &&$lastAlarm->led=="off" ? 'class=gg-check-o' : '' }}></i></span>


                    {{--<div><a href="">LED on<i class="gg-check-o"></i></a></div>--}}
                    {{--<div><a href="">LED off<i class="gg-check-o"></i></a></div>--}}

                </span>
            </label>
        </div>
        {{--<input type="checkbox" name="construction" value="on" id="switch" checked onclick="tgl()" /><label class="tog" for="switch">Toggle</label>--}}
        {{--<button id="btn1" value="submit">construction</button>--}}
    </form>
@endguest
