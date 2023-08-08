<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('client/assets/img/icon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('client/assets/fonts/font-awesome-6-pro-main/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap-4.6.2-dist 2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/nqt.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/trazano.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/promotion.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/checkout.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/client/parts-detail.css')}}">
</head>
<body>
  @php
  $order = App\Models\Order::where('user_id', optional(Auth::user())->id)->where('status', 'new')->first();
  @endphp
    <div class="wrapper">
        <!-- header -->
        @include('client.layouts.header', ['order' => $order])
        <!-- end header  -->
        
        <div class="main-content">
            @yield('content')
        </div>

        @include('client.layouts.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('client/assets/js/select2.min.js')}}"></script>
    @yield('script')
</body>
</html>