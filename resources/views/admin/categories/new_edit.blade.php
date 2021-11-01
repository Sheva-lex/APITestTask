@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        @if(isset($category))
                            Редагувати категорію
                        @else
                            Створити категорію
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
                          action="@if(isset($category)){{ route('admin.categories.update', $category->id) }}@else{{ route('admin.categories.store') }}@endif"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @else
                            @method('POST')
                        @endif
                        <div class="tab-content">

                            <div class="form-group col-12">
                                <div class="form-group">
                                    <label for="name">Назва</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           value="{{ old('name', isset($category->name) ? $category->name : '') }}">
                                    @error('name')
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
                                           value="{{ old('priority', isset($category->priority) ? $category->priority : '') }}">
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
                                        {{ isset($category->is_active) && $category->is_active == true ? 'checked' : '' }}>
                                    @error('is_active')
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
                                    <img src="{{ isset($category->image) ? asset($category->image) : '' }}"
                                         id="image-tag" width="200px"/>

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

                                        $("#image").change(function () {
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
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-default"><i
                                            class="far fa-times-circle"></i> Отменить</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection


