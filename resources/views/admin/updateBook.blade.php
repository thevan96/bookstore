@extends('admin.layout')
@section('title', 'Cập nhật sách')
@section('css')
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/paper-dashboard.css') }}" rel="stylesheet" />

    <!--Datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- Ckeditor -->
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

@endsection()
@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cập nhật thông tin sách</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="title">Tên sách <span>*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        placeholder="Tiêu đề sách" value="{{ old('title', $book->title) }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone">Tác giả <span>*</span></label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                        placeholder="Tác giả ..." value="{{ old('author', $book->author) }}">
                    @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genre_id">Thể loại <span>*</span></label>
                    <select class="custom-select form-control @error('genre_id') is-invalid @enderror" id="genre_id"
                        name="genre_id">
                        <option value="">-- Chọn thể loại --</option>
                        @foreach ($genres as $genre)
                            <option value="{{ old('genre_id', $genre->id) }}"
                                {{ $book->genre->id === $genre->id ? 'selected' : '' }}>
                                {{ $genre->name }} </option>
                        @endforeach
                    </select>
                    @error('genre_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="publisher_id">Nhà xuất bản <span>*</span></label>
                    <select class="custom-select form-control @error('publisher_id') is-invalid @enderror" id="publisher_id"
                        name="publisher_id">
                        <option value="">-- Chọn nhà xuất bản --</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ old('publisher_id', $publisher->id) }}"
                                {{ $book->publisher->id === $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('publisher_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Mô tả về sách</label>
                    <textarea name="description" id="description"
                        class="form-control @error('description') is-invalid @enderror"> {{ old('description') }}
                    {{ old('description', $book->description) }}
                    </textarea>
                    <script>
                        CKEDITOR.replace('description');
                        CKEDITOR.config.extraPlugins = "base64image";
                        CKEDITOR.config.height = 500;

                    </script>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="image">Ảnh bìa sách <span>*</span></label><br>
                    <image src="{{ old('image', $book->image) }}" style="width: 270px; height: 340px;" alt="image for book"
                        class="form-control @error('image') is-invalid @enderror" id="image-preview" name="image-preview">
                    </image><br>
                    <br>
                    <input type="file" id="image" name="image" accept="image/gif, image/jpeg, image/png">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <br>

                <div class="form-group">
                    <label for="publication_date">Ngày xuất bản <span>*</span></label>
                    <input id="publisher_date" type="date" name="publication_date"
                        class="form-control @error('publication_date') is-invalid @enderror"
                        value="{{ old('publication_date', $book->publication_date) }}">
                    @error('publication_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="available_quantity">Số lượng<span>*</span></label>
                    <input type="number" name="available_quantity"
                        class="form-control @error ('available_quantity') is-invalid @enderror" id="available_quantity"
                        placeholder="Số lượng sách" value="{{ old('available_quantity', $book->available_quantity) }}">
                    @error('available_quantity')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Giá bán <span>*</span></label>
                    <input type="number" class="form-control @error ('price') is-invalid @enderror" id="price"
                        placeholder="Giá bán sách (vnd)" name="price" value="{{ old('price', $book->price) }}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Tỉ lệ giảm giá <span>*</span> </label>
                    <input type="number" class="form-control @error ('sale') is-invalid @enderror" id="sale"
                        placeholder="Tỉ lệ giảm giá (%)" name="sale" value="{{ old('sale', $book->sale) }}">
                    @error('sale')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-info">Cập nhật sách</button>
        </div>
        @error('sale')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </form>
    </div>
    </div>
@endsection()
@section('js')

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.jquery.min.js') }}></script>

    <!-- Chart JS -->
    <script src=" {{ asset('assets/admin/js/plugins/chartjs.min.js') }}"> </script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/paper-dashboard.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script>
        let input = document.getElementById('image');
        input.onchange = function() {
            let file = input.files[0];
            let reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById('image-preview').src = reader.result;
            };
            reader.readAsDataURL(file);
        };

    </script>
@endsection()
