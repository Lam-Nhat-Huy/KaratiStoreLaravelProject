<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình SEO</h5>
    </div>
    <div class="ibox-content">
        <div class="seo-container">
            <div class="meta-title">
                {{ old('meta_title') ?? 'Bạn chưa có tiêu đề SEO' }}
            </div>

            <div class="canonical">
                {{ old('canonical', $post->canonical ?? '') ? config('app.url') . old('canonical', $post->canonical ?? '') . config('apps.general.suffix') : 'https://duong-dan-cua-ban.html' }}
            </div>

            <div class="meta-description">
                {{ old('meta_description') ?? 'Bạn chưa có mô tả SEO' }}
            </div>
        </div>

        <div class="seo-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb10">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="" class="control-label text-left">Tiêu đề SEO
                                    <span class="text-danger" class="count_meta-title">0
                                        ký
                                        tự</span>
                                </label>
                                <input value="{{ old('meta_title', $post->meta_title ?? '') }}" type="text"
                                    name="meta_title" class="form-control" placeholder="" autocomplete="off">

                                @error('meta_title')
                                    <label id="firstname-error" class="error mt-2 text-danger"
                                        for="firstname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb10">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="" class="control-label text-left">Từ khóa SEO
                                </label>
                                <input value="{{ old('meta_keyword', $post->meta_keyword ?? '') }}" type="text"
                                    name="meta_keyword" class="form-control" placeholder="" autocomplete="off">

                                @error('meta_keyword')
                                    <label id="firstname-error" class="error mt-2 text-danger"
                                        for="firstname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb10">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="" class="control-label text-left">Mô tả SEO
                                    <span class="text-danger" class="count_meta-description">0
                                        ký
                                        tự</span>
                                </label>

                                <textarea name="meta_description" class="form-control">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>

                                @error('meta_description')
                                    <label id="firstname-error" class="error mt-2 text-danger"
                                        for="firstname">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb10">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="" class="control-label text-left">
                                    <span>Đường dẫn <span class="text-danger">(*)</span></span>
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" name="canonical"
                                        value="{{ old('canonical', $post->canonical ?? '') }}"
                                        class="form-control canonical" autocomplete="off"
                                        placeholder="Chỉ cần nhập tên trang ví dụ: trang-chu">

                                    @error('canonical')
                                        <label id="firstname-error" class="error mt-2 text-danger"
                                            for="firstname">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
