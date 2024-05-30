<div class="ibox-content">
    <div class="filter">
        <div class="perpage">
            <select name="perpage" class="form-control input-sm mr10">
                @for ($i = 20; $i < 200; $i++)
                    <option value="{{ $i }}">{{ $i }} bản ghi</option>
                @endfor
            </select>
        </div>

        <div class="action">
            <select name="user_category_id" class="form-control mr10">
                <option value="0">Chọn nhóm thành viên</option>
                <option value="1">Quản trị viên</option>
            </select>

            <div class="input-group mr10">
                <input type="text" name="keyword" value="" placeholder="Nhập từ khóa mà bạn muốn tìm kiếm"
                    class="form-control">
                <div class="input-group-append">
                    <button type="submit" name="search" value="search" class="btn btn-primary mb-0 btn-sm">Tìm
                        kiếm</button>
                </div>
            </div>
            <a href="{{ route('user.create') }}" class="btn btn-danger"><i class="fa fa-plus"></i>Thêm Mới</a>
        </div>

    </div>
</div>
