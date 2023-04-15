<head>
    <title>La carte commune</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    {{-- <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" /> --}}
    {{-- <noscript> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}" /> --}}
    {{-- </noscript> --}}
    @include('themelayouts.css.main')
    @include('themelayouts.css.noscript')

    
    <style>
        body {
            padding-top: 20px;
        }

        .card-deck {
            margin: 0 -15px;
            justify-content: space-between;
        }

        .card-deck .card {
            margin: 0 0 1rem;
            width: 100px;
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .card-deck .card {
                -ms-flex: 0 0 48.7%;
                flex: 0 0 48.7%;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .card-deck .card {
                -ms-flex: 0 0 32%;
                flex: 0 0 32%;
            }
        }

        @media (min-width: 992px) {
            .card-deck .card {
                -ms-flex: 0 0 24%;
                flex: 0 0 24%;
            }
        }

        .alert {
            position: fixed;
            top: 60px;
            right: 0px;
            padding: 10px;
            z-index: 100;
        }

        .alert{
            border-radius: 10px;
            font-size: 13px;
        }
        .alert-success {
            background: #d1e7dd;
            color: #0a3622;
            border: 2px solid #a3cfbb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #58151c;
            border: 2px solid #ad6067;
        }
    </style>
</head>
