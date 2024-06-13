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
        @if (isset($postCatalogues) && is_object($postCatalogues))
            @foreach ($postCatalogues as $postCatalogue)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="input-checkbox checkBoxItem" value="{{ $postCatalogue->id }}">
                    </td>
                    <td> {{ str_repeat('|----', $postCatalogue->level > 0 ? $postCatalogue->level - 1 : 0) . $postCatalogue->name }}
                    </td>
                    <td class="js-switch-{{ $postCatalogue->id }}">
                        <input type="checkbox" value="{{ $postCatalogue->publish }}" class="js-switch status "
                            data-field="publish" data-model="PostCatalogue"
                            {{ $postCatalogue->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $postCatalogue->id }}" />
                    </td>
                    <td>
                        <a href="{{ route('post.catalogue.edit', $postCatalogue->id) }}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('post.catalogue.delete', $postCatalogue->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<span class="text-center">
    {{ $postCatalogues->links('pagination::bootstrap-4') }}
</span>
