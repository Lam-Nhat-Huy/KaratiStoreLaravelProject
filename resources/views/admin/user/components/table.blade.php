<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="checkAll" class="input-checkbox" value="">
            </th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($users) && is_object($users))
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="input-checkbox checkBoxItem" value="">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        <input type="checkbox" class="js-switch" checked />
                    </td>
                    <td>
                        <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<span class="text-center">
    {{ $users->links('pagination::bootstrap-4') }}
</span>
