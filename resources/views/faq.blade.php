<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQs</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/landingpage/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

        body {
            /* background-color: #000; */
            font-family: 'Open Sans', sans-serif;
        }

        .container h1 {
            color: #000;
            text-align: center;
            margin-bottom: 5px;
        }

        details {
            background-color: #303030;
            color: #fff;
            font-size: 1.5rem;
        }

        summary {
            padding: .5em 1.3rem;
            list-style: none;
            display: flex;
            justify-content: space-between;
            transition: height 1s ease;
        }

        summary::-webkit-details-marker {
            display: none;
        }

        summary:after {
            content: "\002B";
        }

        details[open] summary {
            border-bottom: 1px solid #aaa;
            margin-bottom: .5em;
        }

        details[open] summary:after {
            content: "\00D7";
        }

        details[open] div {
            padding: .5em 1em;
        }
    </style>
</head>

<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="#" class="logo">PIR Management System</a>
            <ul>
                <li><a href="/"><img src="/landingpage/iconnote.svg" alt=""> FAQ</a></li>
                <li><a href="/login"><img src="/landingpage/iconlogin.svg" alt=""> Login</a></li>
            </ul>
        </header>
        <div class="content">
            <div class="container">
                <h1>Frequently Asked Questions</h1>
                @foreach ($faqs as $item)
                    <details>
                        <summary>{{ $item->question }}</summary>
                        <div>{{ $item->answer }}</div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
</body>

</html>
