<!DOCTYPE html>
<html lang="en" class="overflow-hidden">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="mobile-web-app-capable" content="yes">
	<!-- Site Meta/SEO Data -->
    <meta name="author" content="District 420">
    <meta name="description" content="cryptocurrency website">
    <meta name="keywords" content="crypto, bitcoin, district 420, 420, district, money, investment, forex, trading, blockchain, investing, btc, invest, financialfreedom, startup, eth, stockmarket, stocks, investor, wealth, forextrader, cryptotrading, trader, binance, bitcoins, forexsignals, binaryoptions, cryptonews, sharemarket, market, bitcoinnews, cash, forexlifestyle">
	<!-- Site Title -->
	<title>@yield('title')</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/png" sizes="512x512" href="{{asset('')}}frontend/assets/images/favicon/android-chrome-512x512.png">
	<link rel="icon" type="image/png" sizes="192x192" href="{{asset('')}}frontend/assets/images/favicon/android-chrome-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('')}}frontend/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('')}}frontend/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}frontend/assets/images/favicon/favicon-16x16.png">
	<link rel="icon" type="image/x-icon" href="{{asset('')}}frontend/assets/images/favicon/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{asset('')}}frontend/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('')}}frontend/assets/plugins/slick-slider/css/slick.css">
	<link rel="stylesheet" href="{{asset('')}}frontend/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{asset('')}}frontend/assets/css/style.min.css">
	@yield('css')
</head>
<body>
	<!-- Preloader and page border section  -->
    @include('frontend.include.pageBorder')
	<!-- Header Section -->
    @include('frontend.include.header')

	<!-- Modal -->
    @include('frontend.include.modal')

	<main class="page-wrapper">	

        @yield('Content')
	
		<!-- Footer Section -->
        @include('frontend.include.footer')
	</main>

	<!-- All Scripts -->
	<script src="{{asset('')}}frontend/assets/js/jquery-1.12.4.min.js"></script>
	<script src="{{asset('')}}frontend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('')}}frontend/assets/plugins/slick-slider/js/slick.js"></script>
	<script src="{{asset('')}}frontend/assets/plugins/fontawesome/js/all.min.js"></script>
	<script src="{{asset('')}}frontend/assets/js/script.js"></script>

    @yield('js')

</body>
</html>