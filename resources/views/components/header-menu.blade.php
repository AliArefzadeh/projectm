

<nav class="navbar navbar-inverse">
    <form class="navbar-form navbar-left" action="#" method="get">
        <div class="form-group">
            <input type="text" name="q" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="{{route('alarm.index')}}">Control Room</a></li>
            <li><a href="{{route('humidity.create')}}">Data Mangemant</a></li>
            <li class="active"><a href="{{route('index')}}">Home</a></li>
        </ul>
        <div class="navbar-header">
            <a class="navbar-brand" href="#">RHM</a>
        </div>
    </div>
</nav>


