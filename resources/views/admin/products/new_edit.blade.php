@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        @if(isset($product))
                            Редагувати продукт
                        @else
                            Створити продукт
                        @endif
                    </h5>
                    <div class="ibox-tools">
                        <a href="">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal"
                          action="@if(isset($product)){{ route('admin.products.update', $product->id) }}@else{{ route('admin.products.store') }}@endif"
                          method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                    @else
                        @method('POST')
                    @endif


                        <!-- nonetranslateble -->

                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="status_id">Категорія</label>
                                <div class="m-b-sm">
                                    <select type="number" class="form-control" name="category_id">
                                        @if(isset($categories))

                                                <option value="">
                                                    Не задана
                                                </option>
                                            @foreach($categories as $category)
                                                @if (isset($product->category_id))
                                                    <option
                                                        value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' :'' }}>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option
                                                        value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' :'' }}>{{ $category->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="name">Ціна</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       value="{{ old('name', isset($product->name) ? $product->name : '') }}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="description">Ціна</label>
                                <input type="text" name="description"
                                       class="form-control @error('description') is-invalid @enderror"
                                       id="description"
                                       value="{{ old('description', isset($product->description) ? $product->description : '') }}">
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="price">Ціна</label>
                                <input type="number" name="price"
                                       class="form-control @error('price') is-invalid @enderror"
                                       id="price"
                                       value="{{ old('price', isset($product->price) ? $product->price : '') }}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="priority">Пріорітетність</label>
                                <input type="number" name="priority"
                                       class="form-control @error('priority') is-invalid @enderror"
                                       id="priority"
                                       value="{{ old('priority', isset($product->priority) ? $product->priority : '') }}">
                                @error('priority')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="is_active">Статус активна</label>
                                <input type="checkbox" name="is_active"
                                       class="form-control @error('is_active') is-invalid @enderror"
                                       id="is_active"
                                       value="1"
                                        {{ isset($product->is_active) && $product->is_active == true ? 'checked' : '' }}>
                                @error('is_active')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="is_top">Топ</label>
                                <input type="checkbox" name="is_active"
                                       class="form-control @error('is_top') is-invalid @enderror"
                                       id="is_top"
                                       value="1"
                                    {{ isset($product->is_top) && $product->is_top == true ? 'checked' : '' }}>
                                @error('is_top')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="image">Картинка</label>
                                <input type="file" name="image"
                                       class="form-control @error('image') is-invalid @enderror"
                                       id="image"
                                       >
                                <img src="{{ isset($product->image) ? asset($product->image) : '' }}" id="image-tag" width="200px" />

                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#image-tag').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $("#image").change(function(){
                                        readURL(this);
                                    });
                                </script>

                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- END nonetranslateble -->

                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <input type="submit" value="Зберегти" name="submit" class="btn btn-success">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-default"><i
                                        class="far fa-times-circle"></i> Отменить</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
@endsection


