<!DOCTYPE html>
<html>
    <head>
        <title>Le coureur nordique</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('css/foundation.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/timePicker.css') }}" />

        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


        <style>
            #feedback { font-size: 1.4em; }
            .selectable .ui-selecting { background: #FECA40; }
            .selectable .ui-selected { background: #F39814; color: white; }
            .selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
            .selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
            
            .contenu {
                overflow: auto;
            }

            html {
                overflow: scroll;
            }
            
            .off-canvas-list hr {
                display: none;
            }

            td div{ 
                width:100%;
                height:10px;}
            .emp1{background:blue;}
            .emp2{background:red;}
            .emp3{background:green;}
            .emp4{background:teal;}
            td, th{
                width:40px;
                margin-bottom:10px;
            }
            tr > td{
                padding-bottom:10px;
            }

            hr {
                margin-top: 10px;
                margin-bottom: 10px;
            }
        </style>

        <script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/jquery.cookie.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.timePicker.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-validation/dist/jquery.validate.js') }}"></script>


    </head>
    <body>
        <div class="row off-canvas-wrap">
                @section('header')
                    <h1><img src="{{ URL::asset('image/logo.png') }}" alt="le coureur nordique"/></h1>
                @show
                  <div class="inner-wrap">

                    <div class="hide-for-medium-up top-bar">
                        <section class="left-small">
                            <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
                        </section>
                    </div>

                    <div class="medium-3 columns">
                        <ul class="show-for-medium-up side-nav">
                            @section('sidebar')
                                @if (Auth::check())
                                    @include('layout.menu')
                                @endif
                            @show
                        </ul>
                    </div>

                    <!-- Off Canvas Menu -->
                    <div class="left-off-canvas-menu">
                            <ul class="off-canvas-list">
                                @section('sidebar')
                                    @if (Auth::check())
                                        @include('layout.menu')
                                    @endif
                                @show
                            </ul>
                    </div>
                    <div class="contenu">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                  <!-- close the off-canvas menu -->
                  <a class="exit-off-canvas"></a>

                </div>
        </div>
        
        <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
        <script src="{{ URL::asset('js/foundation/foundation.abide.js') }}"></script>
        <script src="{{ URL::asset('js/foundation/foundation.joyride.js') }}"></script>
        <script src="{{ URL::asset('js/foundation/foundation.alert.js') }}"></script>
        
        
        <script>
            $(document).foundation();         
            $(document).ready(function(){
                $("#fade").delay(3000).fadeOut(1500);
            });
        </script>

        
        
    </body>
</html>