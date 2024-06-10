<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">
                <input type="checkbox" id="checkAll" class="input-checkbox" value="">
            </th>
            <th>Tên ngôn ngữ</th>
            <th>Canonical</th>
            <th>Tình trạng</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($languages) && is_object($languages))
            @foreach ($languages as $language)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" class="input-checkbox checkBoxItem" value="{{ $language->id }}">
                    </td>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->canonical }}</td>
                    <td class="js-switch-{{ $language->id }}">
                        <input type="checkbox" value="{{ $language->publish }}" class="js-switch status "
                            data-field="publish" data-model="Language" {{ $language->publish == 2 ? 'checked' : '' }}
                            data-modelId="{{ $language->id }}" />
                    </td>
                    <td>
                        <a href="{{ route('language.edit', $language->id) }}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('language.delete', $language->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<span class="text-center">
    {{ $languages->links('pagination::bootstrap-4') }}
</span>
