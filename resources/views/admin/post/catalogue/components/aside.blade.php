<div class="ibox ">
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-right">Chọn danh mục cha<span
                            class="text-danger">(*)</span></label>
                    <span class="text-danger notice">Chọn Root nếu không có danh mục cha</span>

                    <select name="parent_id" class="form-control setupSelect2" id="">
                        @foreach ($dropdown as $key => $value)
                            <option
                                {{ $key == old('parent_id', isset($postCatalogue->parent_id) ? $postCatalogue->parent_id : '') ? 'selected' : '' }}
                                value="{{ $key }}">
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>

                    @error('parent_id')
                        <label id="firstname-error" class="error mt-2 text-danger"
                            for="firstname">{{ $message }}</label>
                    @enderror
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
                        <img src="{{ old('image', $postCatalogue->image ?? '/admin/img/no-img3.jpg') }}" alt=""
                            class="image img-thumbnail">
                        <input type="text" name="image" value="{{ old('image', $postCatalogue->image ?? '') }}"
                            class="upload-image form-control" data-type="Images">
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ibox ">
    <div class="ibox-content">
        <div class="row mb10">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-right">Cấu hình nâng cao
                    </label>

                    <div class="mb10">
                        <select name="publish" class="form-control setupSelect2" id="">
                            @foreach (config('apps.general.publish') as $key => $value)
                                <option
                                    {{ $key == old('publish', isset($postCatalogue->publish) ? $postCatalogue->publish : '') ? 'selected' : '' }}
                                    value="{{ $key }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <select name="follow" class="form-control setupSelect2" id="">
                        @foreach (config('apps.general.follow') as $key => $value)
                            <option
                                {{ $key == old('follow', isset($postCatalogue->follow) ? $postCatalogue->follow : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
