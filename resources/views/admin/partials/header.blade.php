<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $generalSetting->site_title ?? '' }}
        @if (!empty($generalSetting->site_title) && !empty(trim($__env->yieldContent('title'))))
            -
        @endif
        @yield('title')
    </title>
    <link rel="shortcut icon"
        href="
   {{ $websiteSetting && $websiteSetting->favicon ? asset('storage/setting/' . $websiteSetting->favicon) : asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="{{ asset('assets/admin/js/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sortable.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.css') }}">
</head>

<body>
