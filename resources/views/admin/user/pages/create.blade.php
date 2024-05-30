@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo']['create']['title']])

<div class="wrapper wrapper-content">
    <div class="row" style="margin-top: 77px; padding: 42px;">
        <form action="{{ route('user.store') }}" method="POST">
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
                                        <input value="{{ old('email') }}" type="text" name="email"
                                            class="form-control" placeholder="" autocomplete="off">

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
                                        <input value="{{ old('name') }}" type="text" name="name"
                                            class="form-control" placeholder="" autocomplete="off">

                                        @error('name')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @php
                                $userCategory = ['[Chọn nhóm thành viên]', 'Quản trị viên', 'Cộng tác viên'];
                            @endphp

                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Nhóm thành viên <span
                                                class="text-danger">(*)</span></label>
                                        <select name="user_category_id" class="form-control">
                                            @foreach ($userCategory as $key => $item)
                                                <option @if (old('user_category_id') == $key) selected @endif
                                                    value="{{ $key }}">{{ $item }}</option>
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
                                        <input value="{{ old('birthday') }}" type="date" name="birthday"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

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
                                        <label for="" class="control-label text-right">Nhập lại mật khẩu <span
                                                class="text-danger">(*)</span></label>
                                        <input type="password" name="re_password" class="form-control" placeholder=""
                                            autocomplete="off">
                                        @error('re_password')
                                            <label id="firstname-error" class="error mt-2 text-danger"
                                                for="firstname">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

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
                                        <input value="{{ old('address') }}" type="text" name="address"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb10">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Ghi chú</label>
                                        <input value="{{ old('description') }}" type="text" name="description"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-right">Số điện thoại</label>
                                        <input value="{{ old('phone') }}" type="number" name="phone"
                                            class="form-control" placeholder="" autocomplete="off">
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
    var province_id = '{{ old('province_id') }}';
    var district_id = '{{ old('district_id') }}';
    var ward_id = '{{ old('ward_id') }}';
</script>
