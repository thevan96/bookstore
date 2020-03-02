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
    <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/decoupled-document/ckeditor.js"></script>
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
        <form>
            <div class="form-group">
              <label for="title">Tên sách<span>*</span></label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề sách" value="" required>
            </div>

            <div class="form-group">
              <label for="telephone">Tác giả<span>*</span></label>

                <input type="text" value="" data-role="tagsinput">
                {{-- <select multiple data-role="tagsinput">
                    <option value="Amsterdam">Amsterdam</option>
                    <option value="Washington">Washington</option>
                    <option value="Sydney">Sydney</option>
                    <option value="Beijing">Beijing</option>
                    <option value="Cairo,Hanoi">Cairo,Hanoi</option>
                </select> --}}
              <input type="text" class="form-control" id="author" name="author" placeholder="Tác giả">
            </div>

            <div class="form-group">
              <label for="genre">Thể loại<span>*</span></label>
              <select class="custom-select" id="genre" name="genre" required>
                <option value="">-- Chọn thể loại --</option>
                <option value="1">Breakfast</option>
                <option value="2">Lunch</option>
                <option value="3">Dinner</option>
              </select>
            </div>

            <div class="form-group">
              <label for="description">Mô tả về sách</label>
                <div id="toolbar-container"></div>
                <div id="editor" class="form-control" style="height: 400px;">
                </div>
                <script>
                    DecoupledEditor
                        .create( document.querySelector( '#editor' ), {
                            height: '300px',
                            plugins: [ Base64UploadAdapter ],
                        } )
                        .then( editor => {
                            const toolbarContainer = document.querySelector( '#toolbar-container' );

                            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                        } )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>

            <div class="form-group">
              <label for="available_quantity">Số lượng<span>*</span></label>
              <input type="number" class="form-control" id="author" placeholder="Số lượng sách" required>
            </div>

            <div class="form-group">
              <label for="price">Giá bán<span>*</span></label>
              <input type="number" class="form-control" id="price" placeholder="Giá bán sách" required>
            </div>

            <div class="form-group">
              <label for="sale">Tỉ lệ giảm giá <span>*</span></label>
              <input type="number" class="form-control" id="sale" placeholder="Giảm giá" required>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
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
@endsection()
