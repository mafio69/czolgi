<nav class="navbar navbar-toggleable-md navbar-light bg-faded naw">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Czolgi.info</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{$title == 'Home' ? 'active' :''}}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item {{$title == 'Tapety' ? 'active' :''}}">
                <a class="nav-link" href="/tapety">Tapety</a>
            </li>
            <li class="nav-item {{$title == 'Artykuły' ? 'active' :''}}">
                <a class="nav-link" href="/artykuly">Artykuły</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Szukaj">
            <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</nav>

