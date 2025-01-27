<x-app-layout>
    <div class="py-12">
        <form method="GET" action="{{ route('products.create') }}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-primary-button class="btn-primary">Добавить</x-primary-button>
            </div>
        </div>
        </form>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>Артикул</th>
                        <th>Название</th>
                        <th>Статус</th>
                        <th>Атрибуты</th>
                    </tr>
                    @foreach($items as $item)
                        @php /** @var \app\Models\Product $item */ @endphp
                        <tr>
                            <td><a href="{{route('products.edit', $item->id)}}"> {{$item->article}}</a></td>
                            <td><a href="{{route('products.edit', $item->id)}}">{{$item->name}}</a></td>
                            <td>{{$item->status}}</td>
                            <td>
                                @if(!empty($item->data) and $item->data!='{}')
                                    @foreach($item->data as $key => $value)
                                            {{$key}} : {{$value}}<br>
                                    @endforeach
                                @endif
                            </td>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
