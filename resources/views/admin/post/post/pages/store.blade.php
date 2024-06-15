@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo'][$config['method']]['title']])

@php
    $url = $config['method'] == 'create' ? route('post.store') : route('post.update', $post->id);
@endphp

<div class="wrapper wrapper-content">
    <div class="row" style="margin-top: 77px; padding: 42px;">
        <form action="{{ $url }}" method="POST" autocomplete="on">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Thông tin chung</h5>
                        </div>
                        <div class="ibox-content">
                            @include('admin.post.post.components.general')
                            @include('admin.dashboard.components.album')
                            @include('admin.post.post.components.seo')
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    @include('admin.post.post.components.aside')
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success mb10 button-fix" name="send"
                        value="send">Lưu</button>
                </div>
        </form>
    </div>
</div>
