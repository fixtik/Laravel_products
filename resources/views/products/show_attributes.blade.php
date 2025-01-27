@isset($item->data)
    @if($item->data != '{}')
    @foreach($item->data as $key => $value)

    <tr>
        <td><input name="attr_key[]" value="{{$key}}"
                   id="attr_value[]`" type="text"></td>
        <td><input name="attr_value[]" value="{{$value}}"
                   id="attr_value[]" type="text"> </td>
    </tr>
    @endforeach
    @endif
@endisset
