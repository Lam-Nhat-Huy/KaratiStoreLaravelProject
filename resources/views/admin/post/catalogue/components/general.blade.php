<div class="row mb10">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-lefy">Tiêu đề nhóm bài
                viết <span class="text-danger">(*)</span></label>
            <input value="{{ old('name', $postCatalogue->name ?? '') }}" type="text" name="name" class="form-control"
                placeholder="" autocomplete="off">

            @error('name')
                <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $message }}</label>
            @enderror
        </div>
    </div>
</div>

<div class="row mb10">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-lefy">Mô tả ngắn</label>
            <textarea name="description" class="form-control ck-editor" id="ckDescription" data-height="150">{{ old('description', $postCatalogue->description ?? '') }}</textarea>

        </div>
    </div>
</div>

<div class="row mb10">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-lefy">Nội dung</label>
            <textarea name="content" class="form-control ck-editor" id="ckContent" data-height="500">{{ old('content', $postCatalogue->content ?? '') }}</textarea>

        </div>
    </div>
</div>