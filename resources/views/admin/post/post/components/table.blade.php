<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">
                <input type="checkbox" id="checkAll" class="input-checkbox" value="">
            </th>
            <th>Tiêu đề</th>
            <th>Tên nhóm</th>
            <th>Vị trí</th>
            <th>Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($posts) && is_object($posts))
            @foreach ($posts as $post)
                <tr id="{{ $post->id }}">
                    <td class="text-center">
                        <input type="checkbox" class="input-checkbox checkBoxItem" value="{{ $post->id }}">
                    </td>

                    <td>
                        <div class="main-title">{{ $post->name }}</div>
                        <div>
                            <span class="text-danger catalogue-text">Nhóm hiển thị:</span>
                            @foreach ($post->post_catalogues as $value)
                                @foreach ($value->post_catalogue_language as $item)
                                    <a class="catalogue-content"
                                        href="{{ route('post.index', ['post_catalogue_id' => $value->id]) }}"
                                        title="">{{ $item->name }}</a>
                                @endforeach
                            @endforeach
                        </div>
                    </td>
                    <td class="js-switch-{{ $post->id }}">
                        <input type="checkbox" value="{{ $post->publish }}" class="js-switch status "
                            data-field="publish" data-model="Post" {{ $post->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $post->id }}" />
                    </td>
                    <td>
                        <input style="width: 80px;" value="{{ $post->order }}" type="text" name="order"
                            class="form-control sort-order text-right" data-id="{{ $post->id }}" data-model="Post">
                    </td>
                    <td>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<span class="text-center">
    {{ $posts->links('pagination::bootstrap-4') }}
</span>
