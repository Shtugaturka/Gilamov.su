<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $keywords }}"/>
    <meta name="description" content="{{ $description }}"/>
    <link href="{{ $canonical }}" rel="canonical" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(87450622, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/87450622" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<header class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="/" class="navbar-brand">Gilamov.SU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapsed navbar-collapse collapse justify-content-end" id="navbarResponsive">
            <?php echo menu('topmenu','include/topmenu'); ?>
        </div>
    </div>
</header>


@yield('content')

<hr class="hr-border">

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li><i class="fa fa-terminal" aria-hidden="true"></i></li>
                    <?php echo menu('bottommenu','include/bottommenu'); ?>
                </ul>
                <p class="">Made by <a href="https://gilamov.su">Gilamov Danis</a>.</p>
            </div>
        </div>
    </div>
</footer>
<div class="btn btn-outline-primary" id="button-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></div>
</body>
<script async src="{{ mix('/js/category.js') }}"></script>
</html>
