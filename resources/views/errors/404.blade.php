<!DOCTYPE html>
<html>

<head>
    <title>404 | {!! Config::get('app.name') !!}</title>
    @include('bsb.partials.head')
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code">404</div>
        <div class="error-message">This page doesn't exist</div>
        <div class="button-place">
            <a href="/" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
        </div>
    </div>

    {!! Assets::add('default')->js() !!}
</body>

</html>
