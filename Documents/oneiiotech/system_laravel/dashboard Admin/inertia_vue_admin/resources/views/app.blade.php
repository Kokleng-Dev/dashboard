<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    {{-- <title>Inertia Js</title> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon_png.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/dist/css/bootstrap.min.css') }}?verson={{time()}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-icons/bootstrap-icons.css')}}?versionFile={{time()}}">
    <link href="{{asset('select2/dist/css/select2.min.css')}}?versionFile={{time()}}" rel="stylesheet"/>
    <link href="{{asset('DataTables/datatables.css')}}?versionFile={{time()}}" rel="stylesheet"/>
    <link href="{{asset('daterangepicker/daterangepicker.css')}}?versionFile={{time()}}" rel="stylesheet"/>
    <link href="{{asset('summernote8/summernote-lite.css')}}?versionFile={{time()}}" rel="stylesheet"/>
    @vite('resources/js/app.js')
    @inertiaHead
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}?versionFile={{time()}}">
  </head>
  <body>
    @inertia
    @routes

    <!-- Add this to your layout file -->
    <script src="{{ asset('assets/js/jquery.min.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('assets/sweetAlert/sweetalert.min.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('assets/fontawesomes/script.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('select2/dist/js/select2.min.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('daterangepicker/moment.min.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('daterangepicker/daterangepicker.js') }}?versionFile={{time()}}"></script>
    <script src="{{ asset('summernote8/summernote-lite.min.js') }}?versionFile={{time()}}"></script>
    {{-- <script src="{{ asset('assets/datatables/custom.js') }}?verson={{time()}}"></script> --}}
    <script src="{{ asset('assets/js/custom.js')}}?versionFile={{time()}}"></script>
  </body>
</html>