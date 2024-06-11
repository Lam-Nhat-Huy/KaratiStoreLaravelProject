<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình SEO</h5>
    </div>
    <div class="ibox-content">
        <div class="seo-container">
            <div class="meta-title">
                Lộ trình học Laravel từ A – Z cho người mới - CodeGym
            </div>

            <div class="canonical">
                https://nhathuy2004.id.vn/
            </div>

            <div class="meta-description">
                Học Laravel từ A đến Z giúp tối ưu hóa việc lập trình cũng như quản lý source code .
                Thực chất, Laravel là Framework PHP đã được nhiều lập trình viên đánh giá ...
            </div>
        </div>

        <div class="seo-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb10">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <label for="" class="control-label text-lefy">Tiêu đề SEO
                                    <span class="text-danger" class="count_meta-title">0
                                        ký
                                        tự</span>
                                </label>
                                <input value="{{ old('meta_title', $postCatalogue->meta_title ?? '') }}" type="text"
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
                                <label for="" class="control-label text-lefy">Từ khóa SEO
                                </label>
                                <input value="{{ old('meta_keyword', $postCatalogue->meta_keyword ?? '') }}"
                                    type="text" name="meta_keyword" class="form-control" placeholder=""
                                    autocomplete="off">

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
                                <label for="" class="control-label text-lefy">Mô tả SEO
                                    <span class="text-danger" class="count_meta-description">0
                                        ký
                                        tự</span>
                                </label>

                                <textarea name="meta_description" class="form-control"></textarea>

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
                                <label for="" class="control-label text-lefy">Đường dẫn
                                </label>

                                <input value="{{ old('canonical', $postCatalogue->canonical ?? '') }}" type="text"
                                    name="canonical" class="form-control" placeholder="" autocomplete="off">

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
