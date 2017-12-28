<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Czolgi.info - 404</title>
</head>
<style>
    html {
        max-height: 100%;
        height: 100%;
    }

    body {
        max-height: 100%;
        height: 100%;
        background-color: #373839;
        color: white;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        align-content: space-between;
    }

    .primary {
        height: 25%;
        text-align: center;
    }

    a {
        color: antiquewhite;
        text-decoration: none;
        font-size: 4rem;
        transition: all 1s;
    }

    a:hover {
        text-transform: uppercase;
        color: #d1a66c;
        text-decoration: underline;
    }

</style>

<body>
<div class="primary">
    <div>
        <h1>Przepraszam nie ma takiej strony. </h1>
        <h1>Kod błędu 404</h1>
        <p>
            <a href="http://www.czolgi.info">Czolgi.info</a>
        </p>
    </div>
    <div>
        <h2>{{ $exception->getMessage() }}</h2>
    </div>
</div>
</body>
</html>