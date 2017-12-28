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
                <a title="Strona startowa" class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{$title == 'Encyklopedia' ? 'active' :''}}">
                <a title="Encyklopedia czołgów" class="nav-link" href="/encyklopedia">Encyklopedia</a>
            </li>
            <li class="nav-item {{$title == 'Tapety' ? 'active' :''}}">
                <a title="Tapety z czołgami" class="nav-link" href="/tapety">Tapety</a>
            </li>
            <li class="nav-item {{$title == 'Artykuły' ? 'active' :''}}">
                <a title="Artykuły o czołgach" class="nav-link" href="/artykuly">Artykuły</a>
            </li>
            <li class="nav-item {{$title == 'Księga gości' ? 'active' :''}}">
                <a title="Księga gości" class="nav-link" href="/ksiega">Księga</a>
            </li>
			<li class="nav-item">
                <a title="Galerie zdjęć" class="nav-link" href="http://www.galerie.czolgi.info">Galerie</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="/encyklopedia-szukaj">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Szukaj">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</nav>

