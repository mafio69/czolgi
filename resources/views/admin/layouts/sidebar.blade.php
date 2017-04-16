<nav>
    <h3>Nawigacja</h3>
    <ul class="nav flex-column">
        <li class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link " href="{{url('/admin/dzialy')}}">Działy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('/admin/artykuly')}}">Artykuły</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('/admin/ksiega-gosci')}}">Ksiega gości</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('/admin/nowosci')}}">Nowości</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">Encyklopedia</a>
            <div class="dropdown-menu">
                <a class="nav-link " href="{{url('/admin/encyklopedia')}}">Encyklopedia</a>
                <a class="nav-link " href="{{url('/admin/typyCzolgow')}}">Typy czołgów</a>
                <a class="nav-link " href="{{url('/admin/komentarze')}}">Komentarze</a>
            </div>
        <li class="nav-item">
            <a class="nav-link " href="{{url('/admin/users')}}">Użytkownicy</a>
        </li>
    </ul>
</nav>