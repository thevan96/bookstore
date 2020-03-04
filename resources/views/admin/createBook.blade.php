@extends('admin.layout')
@section('title', 'Thêm sách mới')
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
                    <h4 class="card-title">Sách mới</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('books.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Tên sách <span>*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề sách" value=""
                        required>
                </div>

                <div class="form-group">
                    <label for="telephone">Tác giả <span>*</span></label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Tác giả ...">
                </div>

                <div class="form-group">
                    <label for="genre_id">Thể loại <span>*</span></label>
                    <select class="custom-select" id="genre_id" name="genre_id">
                        <option value="0">-- Chọn thể loại --</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="publisher_id">Nhà xuất bản <span>*</span></label>
                    <select class="custom-select" id="publisher_id" name="publisher_id" required>
                        <option value="0">-- Chọn nhà xuất bản  --</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="description">Mô tả về sách</label>
                    <textarea name="description" id="description"></textarea>
                    <script>
                            CKEDITOR.replace( 'description' );
                            CKEDITOR.config.extraPlugins = "base64image";
                            CKEDITOR.config.height = 500;
                    </script>
                </div>

                <div class="form-group">
                    <label for="publication_date">Ngày xuất bản <span>*</span></label>
                    <input id="publisher_date" type="date" name="publication_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="available_quantity">Số lượng<span>*</span></label>
                    <input type="number" name="available_quantity" class="form-control" id="available_quantity" placeholder="Số lượng sách" required>
                </div>

                <div class="form-group">
                    <label for="price">Giá bán<span>*</span></label>
                    <input type="number" class="form-control" id="price" placeholder="Giá bán sách (vnd)" name="price">
                </div>

                <div class="form-group">
                    <label for="sale">Tỉ lệ giảm giá <span>*</span></label>
                    <input type="number" class="form-control" id="sale" name="sale" placeholder="Giảm giá">
                </div>
                <button type="submit" class="btn btn-info">Thêm sách mới</button>
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

    <!--  Google Maps Plugin    -->
    <script src=" https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/admin/js/plugins/chartjs.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/paper-dashboard.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
@endsection()
