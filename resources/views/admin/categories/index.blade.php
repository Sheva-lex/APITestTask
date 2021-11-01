@extends('admin.layouts.main')

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Список категорій</h5>
            <div class="ibox-tools">
                <a href="{{ route('admin.categories.create') }}"
                   class="btn btn-primary btn-rounded button-plus">
                    <i class="fa fa-plus"></i>
                    Добавити
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if ($categories->count())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Назва
                            </th>
                            <th>
                                Активна
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
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->is_active }}</td>
                                <td><img src="{{ isset($category->image) ? asset($category->image) : '' }}"/></td>
                                <td>{{ date('d.m.Y H:i:s', strtotime($category->created_at)) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col col-lg-2">
                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                               class="btn btn-info btn-sm mr-0 ml-0 border-0">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                        <div class="col col-lg-2">
                                            <form
                                                action="{{ route('admin.categories.destroy', ['category' => $category]) }}"
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
                    </table>
                </div>
            @else
                <div>Категорій немає ...</div>
            @endif
        </div>
    </div>
@endsection
