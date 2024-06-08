<form action="{{ route('user.index') }}" method="GET">
    <div class="ibox-content">
        <div class="filter">
            <div class="perpage">
                @php
                    $perpage = request('perpage') ?: old('perpage');
                @endphp
                <select name="perpage" class="form-control input-sm mr10">
                    @for ($i = 1; $i < 200; $i++)
                        <option {{ $perpage == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}
                            bản ghi</option>
                    @endfor
                </select>
            </div>

            @php
                $publishArray = ['Không công khai', 'Công khai'];
                $publish = request('publish') ?: old('publish');
            @endphp
            <div class="action">
                <select name="publish" class="form-control mr10 setupSelect2">
                    <option value="-1">Chọn tình trạng</option>
                    @foreach ($publishArray as $key => $val)
                        <option {{ $publish == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}
                        </option>
                    @endforeach
                </select>

                <select name="user_category_id" class="form-control setupSelect2">
                    <option value="0">Chọn nhóm thành viên</option>
                    <option value="1">Quản trị viên</option>
                </select>

                <div class="input-group mr10">
                    <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}"
                        placeholder="Nhập từ khóa mà bạn muốn tìm kiếm" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" name="search" value="search" class="btn btn-primary mb-0 btn-sm">Tìm
                            kiếm</button>
                    </div>
                </div>
                <a href="{{ route('user.create') }}" class="btn btn-danger"><i class="fa fa-plus"></i>Thêm Mới</a>
            </div>

        </div>
    </div>

</form>
