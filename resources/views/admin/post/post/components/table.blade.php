<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">
                <input type="checkbox" id="checkAll" class="input-checkbox" value="">
            </th>
            <th>Tên nhóm</th>
            <th>Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($posts) && is_object($posts))
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="input-checkbox checkBoxItem" value="{{ $post->id }}">
                    </td>
                    <td> {{ str_repeat('|----', $post->level > 0 ? $post->level - 1 : 0) . $post->name }}
                    </td>
                    <td class="js-switch-{{ $post->id }}">
                        <input type="checkbox" value="{{ $post->publish }}" class="js-switch status "
                            data-field="publish" data-model="Post" {{ $post->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $post->id }}" />
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
