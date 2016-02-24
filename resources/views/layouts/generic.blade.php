<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Taste of Prosperity</title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    @include ('layouts.generic-nav')

    <div class="header">
        <div class="burger-menu-wrapper">
            <a href="#" class="burger-menu"></a>
        </div>
    </div>

    <div class="wrapper onepcssgrid-1200">
        <section id="home">
            <div class="onerow">
                <div class="col12 last">
                  @yield('content')
                </div>
            </div>
        </section>
    </div>
</body>

<script src="{{ asset('js/jquery.js') }}"></script>
<!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

<script type="text/javascript">
    $(document).ready(function($) {
        $('.burger-menu').click(function(){
            $('.side-nav').toggleClass('active-side-nav');
            $('.burger-menu-wrapper').toggleClass('active-burger-menu');

        });

    });
</script>


</html>
