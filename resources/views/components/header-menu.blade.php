

<nav class="navbar navbar-inverse">
    <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="#">Page 2</a></li>
            <li><a href="{{route('humidity.create')}}">Data Mangemant</a></li>
            <li class="active"><a href="{{route('index')}}">Home</a></li>
        </ul>
        <div class="navbar-header">
            <a class="navbar-brand" href="#">RHM</a>
        </div>
    </div>
</nav>


