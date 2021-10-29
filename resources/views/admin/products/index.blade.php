@extends('admin.layouts.main')

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Список продуктів</h5>
            <div class="ibox-tools">
                <a href="{{ route('admin.products.create') }}"
                   class="btn btn-primary btn-rounded button-plus">
                    <i class="fa fa-plus"></i>
                    Добавити
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if ($products->count())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Категорія
                            </th>
                            <th>
                                Назва
                            </th>
                            <th>
                                Ціна
                            </th>
                            <th>
                                Активний
                            </th>
                            <th>
                                Топ
                            </th>
                            <th>
                                Картинка
                            </th>
                            <th>
                                Створено
                            </th>
                            <th>
                                Управління
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ isset($product->category->name) ? $product->category->name : 'Без категорії' }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->is_active }}</td>
                                <td>{{ $product->is_top }}</td>
                                <td><img src="{{ isset($product->image) ? asset($product->image) : '' }}"/></td>
                                <td>{{ date('d.m.Y H:i:s', strtotime($product->created_at)) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col col-lg-2">
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                               class="btn btn-info btn-sm mr-0 ml-0 border-0">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                        <div class="col col-lg-2">
                                            <form
                                                action="{{ route('admin.products.destroy', ['product' => $product]) }}"
                                                method="post" class="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Підтвердіть видалення')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="text-right">
                        <tr>
                            <td colspan="6">
                                {{--                                {{ $products->links() }}--}}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div>Продуктів немає ...</div>
            @endif
        </div>
    </div>
@endsection
