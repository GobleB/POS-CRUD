<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                display: inline-block;
                padding: 5px;
                width: inherit;
            }

            .title {
                font-size: 96px;
            }

            .content tr:first-child {
                text-decoration: underline;
            }

            button, button a {
                text-decoration: none;
                color: black;
            }

        </style>
    </head>
    <body>
        <nav>
            <a href="/">Home</a>
            <a href="/invoices">Invoices</a>
            <a href="/tools">Tools</a>
        </nav>
        <header>
            <h1>@yield('title')</h1>
        </header>
        <div class="content">

                @yield('content')

        </div>
    </body>
</html>
