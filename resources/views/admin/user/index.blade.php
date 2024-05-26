<div class="col-lg-9">
    <h2>{{ config('apps.user.title') }}</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="active">
            {{ config('apps.user.title') }}
        </li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12" style="margin-top: 19px">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{ config('apps.user.user_table') }}</h5>
                @include('admin.user.components.toolbox')
            </div>

            @include('admin.user.components.filter')
            @include('admin.user.components.table')



        </div>
    </div>
</div>

</div>
