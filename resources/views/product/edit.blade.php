<x-app-layout>
    <div>
        <form method="POST" action="{{ route('products.update', $item->id) }}">
            @method('PATCH')
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @include('product.messeges')

                <h1>Редактировать {{$item->name}}</h1>

                @include('product.item_form')
                <h2>Атрибуты</h2>

                <table id="attributes" class="col-md-12">
                    @include('product.show_attributes')
                    @include('product.dinamic_attribute')
                </table>

            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <x-primary-button type="submit" class="btn-primary">Сохранить</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
