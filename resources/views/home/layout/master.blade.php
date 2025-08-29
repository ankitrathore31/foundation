<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/logo1.png')}}" type="image/x-icon">
    <title>DAYARAM CHARITABLE FOUNDATION</title>

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
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- ✅ Only Bootstrap Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

</head>

<body>

    @include('home.sidebar.sidebar')

    @yield('content')

    @include('home.footer.footer')

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- Ionicons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
