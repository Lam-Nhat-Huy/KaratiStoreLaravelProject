<!DOCTYPE html>
<html>

<head>
    @include('admin.dashboard.components.head')
</head>

<body>
    <div id="wrapper">
        @include('admin.dashboard.components.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('admin.dashboard.components.navbar')
            @include($template)
            @include('admin.dashboard.components.footer')
        </div>
    </div>
    @include('admin.dashboard.components.script')
</body>

</html>
