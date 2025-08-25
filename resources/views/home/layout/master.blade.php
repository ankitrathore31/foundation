<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DAYARAM FOUNDATION</title>

    {{-- ✅ SEO Meta Tags --}}
    <meta name="description"
        content="EverCare is a non-profit NGO website template built with Laravel. Support charity, donations, volunteering, and fundraising campaigns.">
    <meta name="keywords" content="NGO, Charity, Non-Profit, Fundraising, Donations, Laravel NGO Website">
    <meta name="author" content="EverCare Foundation">
    <meta name="robots" content="index, follow">

    {{-- ✅ Open Graph for Social Media --}}
    <meta property="og:title" content="EverCare - NGO & Charity Organization">
    <meta property="og:description"
        content="Support EverCare in making the world a better place. Donate, volunteer, and join our NGO initiatives.">
    <meta property="og:image" content="{{ asset('assets/images/ngo-banner.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- ✅ Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/fancyBox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}">
</head>

<body>


    @include('home.sidebar.sidebar')
    
    @yield('content')

    @include('home.footer.footer')
    {{-- ✅ Scripts --}}
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/bootstrap.min.js') }}"></script>

    {{-- Ionicons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="{{ asset('assets/scripts/slick.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fancyBox.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/scripts.js') }}"></script>

</body>

</html>
