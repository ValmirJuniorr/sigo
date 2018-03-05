@include('layouts.header')

{{--@include('components.loading')--}}

@yield('content')

@include('components.alert_errors')

@include('layouts.footer')



