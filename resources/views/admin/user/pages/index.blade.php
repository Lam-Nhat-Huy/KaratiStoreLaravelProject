@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo']['index']['title']])

<div class="row">
    <div class="col-lg-12" style="margin-top: 19px">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{ $config['seo']['index']['table'] }}</h5>
                @include('admin.user.components.toolbox')
            </div>
            @include('admin.user.components.filter')
            @include('admin.user.components.table')
        </div>
    </div>

</div>
