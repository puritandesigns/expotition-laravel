<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $page_title ?? env('APP_NAME') }}</title>

        <!-- Styles -->
        <style>
            * {
              -webkit-box-sizing: border-box;
              -moz-box-sizing: border-box;
              box-sizing: border-box;
            }

            body {
                font-family: Yrsa, Garamond, serif;
                font-size: 16px;
                color: #222;
            }

            main,
            body > nav,
            .logo-wrap,
            body > aside,
            body > footer {
                width:95%;
                max-width: 760px;
                margin: auto;
                padding: 0 .5em;
            }

            p, ul {
                font-size: 1.5em;
                line-height: 1.5;
            }

            h1 {
                margin: .5em 0 .25em;
                font-size: 2.25em;
                line-height: 1;
            }

            h2 {
                font-size: 2em;
                margin: .25em 0 0;
            }

            h3 {
                font-size: 1.5em;
                margin: .5em 0 .25em;
            }

            a {
                color: #26644b;
            }
            a:visited {
                color: #536414
            }
            a:hover {

            }
            a:active {

            }

            .action a {
                display: inline-block;
            }

            .action a,
            button[type=submit] {
                padding: .5em .75em;
                border: 0 none;
                border-radius: 4px;
            }
            .action a,
            button[type=submit] {
                background-color: #26644b;
                color: #fff;
            }
            .action a:hover,
            button[type=submit]:hover {
                background-color: #536414;
            }

            .messages {
                margin: 0;
                padding: .5em .75em;
                border-radius: .35em;
                background-color: #c6dec5;
            }

            ul.messages li {
                list-style: none;
            }
        </style>
    </head>
    <body>
    <main>
        @if(! empty(session('messages')))
            <ul class="messages">
            @foreach(App\Support\Session::getMessages(false, true) as $messages)
                @foreach($messages as $message)
                    @foreach($message as $type => $text)
                        <li class="{{ $type }}">{{ $text }}</li>
                    @endforeach
                @endforeach
            @endforeach
            </ul>
        @endif

        @yield('content')
    </main>
    </body>
</html>
