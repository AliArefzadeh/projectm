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


            <div class="{{$lastAlarm->led=="on" ? '' :''}}"></div>
            <!--برای اینکه صفحه رفرش نشود و نتایج به درستی نمایش داده شوند در تگ form قرار نگرفته-->

        </div>
    </div>
