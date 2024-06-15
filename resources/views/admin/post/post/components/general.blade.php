<div class="row mb10">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-lefy">Tiêu đề nhóm bài
                viết <span class="text-danger">(*)</span></label>
            <input value="{{ old('name', $post->name ?? '') }}" type="text" name="name" class="form-control"
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
            <textarea name="description" class="form-control ck-editor" id="ckDescription" data-height="150">{{ old('description', $post->description ?? '') }}</textarea>

        </div>
    </div>
</div>

<div class="row mb10">
    <div class="col-lg-12">
        <div class="form-row">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <label for="" class="control-label text-lefy">Nội dung</label>
                <a href="" class="multipleUploadImageCkeditor" data-target="ckContent">Upload nhiều ảnh</a>
            </div>
            <textarea name="content" class="form-control ck-editor" id="ckContent" data-height="500">{{ old('content', $post->content ?? '') }}</textarea>

        </div>
    </div>
</div>
