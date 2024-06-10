@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo']['create']['title']])

@php
    $url = $config['method'] == 'create' ? route('user.store') : route('user.update', $users->id);
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
                            <p>Nhập thông tin chung của người sử dụng</p>
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
                                        <label for="" class="control-label text-right">Email <span
                                                class="text-danger">(*)</span></label>
                                        <input value="{{ old('email', $users->email ?? '') }}" type="text"
                                            name="email" class="form-control" placeholder="" autocomplete="off">

                                        @error('email')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Họ tên <span
                                                class="text-danger">(*)</span></label>
                                        <input value="{{ old('name', $users->name ?? '') }}" type="text"
                                            name="name" class="form-control" placeholder="" autocomplete="off">

                                        @error('name')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Nhóm thành viên <span
                                                class="text-danger">(*)</span></label>
                                        <select name="user_category_id" class="form-control">
                                            @foreach ($userCatalogues as $userCatalogue)
                                                <option
                                                    {{ $userCatalogue == old('user_category_id', isset($userCatalogue->user_category_id) ? $userCatalogue->user_category_id : '') ? 'selected' : '' }}
                                                    value="{{ $userCatalogue->id }}">
                                                    {{ $userCatalogue->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('user_category_id')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Ngày sinh</label>
                                        <input
                                            value="{{ old('birthday', isset($users->birthday) ? date('Y-m-d', strtotime($users->birthday)) : '') }}"
                                            type="date" name="birthday" class="form-control" placeholder=""
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            @if ($config['method'] == 'create')
                                <div class="row mb10">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-right">Mật khẩu <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="password" name="password" class="form-control" placeholder=""
                                                autocomplete="off">
                                            @error('password')
                                                <label id="firstname-error" class="error mt-2 text-danger"
                                                    for="firstname">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-right">Nhập lại mật khẩu
                                                <span class="text-danger">(*)</span></label>
                                            <input type="password" name="re_password" class="form-control"
                                                placeholder="" autocomplete="off">
                                            @error('re_password')
                                                <label id="firstname-error" class="error mt-2 text-danger"
                                                    for="firstname">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Ảnh đại diện</label>
                                        <input type="text" name="image" class="form-control input-image"
                                            data-upload="Images" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin liên hệ</div>
                        <div class="panel-description">Nhập thông tin liên hệ của người dùng</div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Thành phố</label>
                                        <select name="province_id" class="form-control provinces location"
                                            data-target="districts">
                                            <option value="0">[Chọn thành phố]</option>
                                            @if (isset($provinces))
                                                @foreach ($provinces as $province)
                                                    <option @if (old('province_id') == $province->code) selected @endif
                                                        value="{{ $province->code }}">{{ $province->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Quận/Huyện</label>
                                        <select name="district_id" class="form-control districts location"
                                            data-target="wards">
                                            <option value="0">[Chọn Quận/Huyện]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right ">Phường/Xã</label>
                                        <select name="ward_id" class="form-control wards">
                                            <option value="0">[Chọn Phường/Xã]</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Địa chỉ</label>
                                        <input value="{{ old('address', $users->address ?? '') }}" type="text"
                                            name="address" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Ghi chú</label>
                                        <input value="{{ old('description', $users->description ?? '') }}"
                                            type="text" name="description" class="form-control" placeholder=""
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Số điện thoại</label>
                                        <input value="{{ old('phone', $users->phone ?? '') }}" type="number"
                                            name="phone" class="form-control" placeholder="" autocomplete="off">
                                    </div>
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

<script>
    var province_id = '{{ isset($users->province_id) ? $users->province_id : old('province_id') }}';
    var district_id = '{{ isset($users->district_id) ? $users->district_id : old('district_id') }}';
    var ward_id = '{{ isset($users->ward_id) ? $users->ward_id : old('ward_id') }}';
</script>
