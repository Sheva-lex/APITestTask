<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('/css/css-admin/app.min.css') }}" rel="stylesheet">
    <style>
        .alert {
            position: relative;
            top: 0;
            right: 0;
            width: auto;
        }
    </style>
    @yield('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body>
<div id="wrapper">
    @include(Auth::user()->role.'.parts.sidebar')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom m-t-n-md">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary mt-3 ml-2" href="#"><i
                            class="fas fa-bars"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="button-profile">
                        Приветствую, {{ Auth::user()->name }}!
                    </li>

                    <li class="button-logout">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Выход
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="wrapper wrapper-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <div class="alert-icon">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5 0C3.35478 0 0 3.3544 0 7.5C0 11.6452 3.3544 15 7.5 15C11.6452 15 15 11.6456 15 7.5C15 3.35478 11.6456 0 7.5 0ZM7.5 14C3.91591 14 0.99999 11.0841 0.99999 7.5C0.99999 3.91588 3.91591 0.99999 7.5 0.99999C11.0841 0.99999 14 3.91591 14 7.5C14 11.0841 11.0841 14 7.5 14Z"
                                fill="#C93939"/>
                            <path
                                d="M7.50001 6.14575C7.22389 6.14575 7 6.36961 7 6.64576V10.8636C7 11.1397 7.22386 11.3636 7.50001 11.3636C7.77616 11.3636 8.00002 11.1397 8.00002 10.8636V6.64573C7.99999 6.36958 7.77613 6.14575 7.50001 6.14575Z"
                                fill="#C93939"/>
                            <path
                                d="M7.49999 3.63635C6.94859 3.63635 6.5 4.08495 6.5 4.63635C6.5 5.18774 6.94859 5.63634 7.49999 5.63634C8.05139 5.63634 8.49998 5.18774 8.49998 4.63635C8.49998 4.08495 8.05139 3.63635 7.49999 3.63635Z"
                                fill="#C93939"/>
                        </svg>
                    </div>
                    {!! session('error') !!}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger col-6">
                    <div class="alert-icon">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5 0C3.35478 0 0 3.3544 0 7.5C0 11.6452 3.3544 15 7.5 15C11.6452 15 15 11.6456 15 7.5C15 3.35478 11.6456 0 7.5 0ZM7.5 14C3.91591 14 0.99999 11.0841 0.99999 7.5C0.99999 3.91588 3.91591 0.99999 7.5 0.99999C11.0841 0.99999 14 3.91591 14 7.5C14 11.0841 11.0841 14 7.5 14Z"
                                fill="#C93939"/>
                            <path
                                d="M7.50001 6.14575C7.22389 6.14575 7 6.36961 7 6.64576V10.8636C7 11.1397 7.22386 11.3636 7.50001 11.3636C7.77616 11.3636 8.00002 11.1397 8.00002 10.8636V6.64573C7.99999 6.36958 7.77613 6.14575 7.50001 6.14575Z"
                                fill="#C93939"/>
                            <path
                                d="M7.49999 3.63635C6.94859 3.63635 6.5 4.08495 6.5 4.63635C6.5 5.18774 6.94859 5.63634 7.49999 5.63634C8.05139 5.63634 8.49998 5.18774 8.49998 4.63635C8.49998 4.08495 8.05139 3.63635 7.49999 3.63635Z"
                                fill="#C93939"/>
                        </svg>
                    </div>
                    <ul class="list-danger">
                        @foreach ($errors->all() as $error)
                            <li class="list-danger__item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

</div>
{{--<div class="footer">--}}
{{--    <div class="text-center">Made in © 2021</div>--}}
{{--</div>--}}
<script src="{{ mix('js/js-admin/app.min.js') }}"></script>
@yield('scripts')
</body>
</html>
