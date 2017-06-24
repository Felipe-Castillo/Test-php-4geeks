<!DOCTYPE html>
<html>

@include('admin.layouts.partials.htmlheader')

@yield('content')
@section('scripts')
    @include('admin.layouts.partials.scripts')
@show
@yield('pagescript')
</html>