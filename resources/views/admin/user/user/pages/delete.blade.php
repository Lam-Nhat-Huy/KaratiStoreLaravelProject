@include('admin.dashboard.components.breadcrumb', ['title' => $config['seo']['delete']['title']])
<div class="wrapper wrapper-content">
    <div class="row" style="margin-top: 77px; padding: 42px;">
        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Bạn đang muốn xóa thành viên có email là: <strong>{{ $user->email }}</strong></p>
                            <p>Lưu ý: Không thể khôi phục thành viên sao khi xóa. Hãy chắc chắn khi muốn thực hiện chức
                                năng này</p>
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
                                        <input value="{{ old('email', $user->email ?? '') }}" type="text"
                                            name="email" class="form-control" placeholder="" autocomplete="off"
                                            readonly>

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
                                        <input value="{{ old('name', $user->name ?? '') }}" type="text"
                                            name="name" class="form-control" placeholder="" autocomplete="off"
                                            readonly>

                                        @error('name')
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

            <div class="text-right">
                <button type="submit" class="btn btn-danger mb10" name="send" value="send">Xóa</button>
            </div>
        </form>
    </div>
</div>
