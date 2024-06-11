@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo']['create']['title']])

@php
    $url = $config['method'] == 'create' ? route('language.store') : route('language.update', $languages->id);
@endphp

<div class="wrapper wrapper-content">
    <div class="row" style="margin-top: 77px; padding: 42px;">
        <form action="{{ $url }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin chung của ngôn ngữ</p>
                            <p>Lưu ý: Những trường được đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Tên ngôn ngữ<span
                                                class="text-danger">(*)</span></label>
                                        <input value="{{ old('name', $languages->name ?? '') }}" type="text"
                                            name="name" class="form-control" placeholder="" autocomplete="off">

                                        @error('name')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Canonical <span
                                                class="text-danger">(*)</span></label>
                                        <input value="{{ old('canonical', $languages->canonical ?? '') }}"
                                            type="text" name="canonical" class="form-control" placeholder=""
                                            autocomplete="off">
                                        @error('canonical')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>


                            </div>



                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Ảnh đại diện</label>
                                        <input type="text" name="image"
                                            value="{{ old('image', $language->image ?? '') }}"
                                            class="form-control upload-image" placeholder="" autocomplete="off"
                                            data-type="Images">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Ghi chú</label>
                                        <input value="{{ old('description', $languages->description ?? '') }}"
                                            type="text" name="description" class="form-control" placeholder=""
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success mb10" name="send" value="send">Lưu</button>
                </div>
        </form>
    </div>
</div>
