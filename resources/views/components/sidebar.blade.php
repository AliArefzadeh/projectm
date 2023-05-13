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
            @foreach($humids as $humid)
                <div class='task'>
                    <div class='head'>{{$humid->humidity}} %RH</div>
                    <div> {{$humid->persian_time}}</div>
                    <div> {{$humid->description}}</div>
                    <div class=\"clearfix\"></div>
                </div>
            @endforeach

        </div>


    </div>
</div>
