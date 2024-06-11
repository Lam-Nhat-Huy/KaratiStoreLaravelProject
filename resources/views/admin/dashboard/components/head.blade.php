<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>KaratiStore Admin | Login</title>
<link href="{{ asset('admin') }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('admin') }}/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="{{ asset('admin') }}/css/animate.css" rel="stylesheet">
<link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">
<link href="{{ asset('admin') }}/css/custom.css" rel="stylesheet">
<script src="{{ asset('admin') }}/js/jquery-3.1.1.min.js"></script>


@if (isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $key => $value)
        {!! '<link rel="stylesheet" href="' . $value . '">' !!}
    @endforeach
@endif

<script>
    var BASE_URL = 'http://localhost:8000/'
</script>
