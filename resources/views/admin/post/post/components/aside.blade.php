<div class="ibox ">
    <div class="ibox-title">
        <h5>Chọn danh mục cha</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">Chọn Root nếu không có danh mục cha</span>

                    <select name="post_catalogue_id" class="form-control setupSelect2" id="">
                        @foreach ($dropdown as $key => $value)
                            <option
                                {{ $key == old('post_catalogue_id', isset($post->post_catalogue_id) ? $post->post_catalogue_id : '') ? 'selected' : '' }}
                                value="{{ $key }}">
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>

                    @error('post_catalogue_id')
                        <label id="firstname-error" class="error mt-2 text-danger"
                            for="firstname">{{ $message }}</label>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <label class="control-label">Danh mục phụ</label>
                    @php
                        $catalogue = [];
                        if (isset($post)) {
                            foreach ($post->post_catalogues as $key => $value) {
                                $catalogue[] = $value->id;
                            }
                        }
                    @endphp
                    <select multiple name="catalogue[]" class="form-control setupSelect2" id="">
                        @foreach ($dropdown as $key => $val)
                            <option @if (is_array(old('catalogue', isset($catalogue) && count($catalogue) ? $catalogue : [])) &&
                                    in_array($key, old('catalogue', isset($catalogue) ? $catalogue : []))) selected @endif value="{{ $key }}">
                                {{ $val }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn ảnh đại diện</h5>
    </div>
    <div class="ibox-content text-center">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-fluid image-target">
                        <img src="{{ old('image', $post->image ?? '/admin/img/no-img3.jpg') }}" alt=""
                            class="image img-thumbnail">
                        <input type="text" placeholder="chọn ảnh" name="image"
                            value="{{ old('image', $post->image ?? '') }}" class="upload-image form-control"
                            data-type="Images">
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ibox ">
    <div class="ibox-title">
        <h5>Cấu hình nâng cao</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb10">
                        <select name="publish" class="form-control setupSelect2" id="">
                            @foreach (config('apps.general.publish') as $key => $value)
                                <option
                                    {{ $key == old('publish', isset($post->publish) ? $post->publish : '') ? 'selected' : '' }}
                                    value="{{ $key }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <select name="follow" class="form-control setupSelect2" id="">
                        @foreach (config('apps.general.follow') as $key => $value)
                            <option
                                {{ $key == old('follow', isset($post->follow) ? $post->follow : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
