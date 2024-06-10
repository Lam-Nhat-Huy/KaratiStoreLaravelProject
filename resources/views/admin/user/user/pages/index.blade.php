@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo']['index']['title']])

<div class="row">
    <div class="col-lg-12" style="margin-top: 19px">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{ $config['seo']['index']['table'] }}</h5>
                @include('admin.dashboard.components.toolbox', ['model' => 'User'])
            </div>
            @include('admin.user.user.components.filter')
            @include('admin.user.user.components.table')
        </div>
    </div>

</div>
