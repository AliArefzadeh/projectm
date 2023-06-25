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
                    <div> {{$humid->created_at}}</div>
                    <div> {{$humid->description}}</div>
                    <div class=\"clearfix\"></div>
                </div>
            @endforeach

        </div>


    </div>
    @guest()
        <x-login></x-login>
    @endguest()

    @auth()
        <form action="{{route('logout')}}" method="GET">
        <div style="background-color: #5e38fa;border-radius: 10px; color: white; padding: 15px; margin-top: 20px">
            <h4>You're logged in!</h4>
            <div style="background-color: #e7e6ee;padding: 5px;border-radius: 5px;color: #181818;margin: 5px">
               Welcome dear <a style="color: #181818" href="{{route('dashboard')}}">{{auth()->user()->name}} </a>:)
            </div>
            <x-primary-button style="margin: 5px" class="ml-3">
                {{ __('Log out') }}
            </x-primary-button>
        </div>
        </form>
    @endauth
</div>
