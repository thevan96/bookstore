@extends('admin.layout') @section('title', 'Sách')

@section('css')
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/paper-dashboard.css') }}" rel="stylesheet" />
    <!--Datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection()

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sách</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('books.create') }}" class="btn btn-info">Thêm sách mới</a>
                    <div class="table-responsive">
                        <table class="table">
                        </table>
                    </div>
                </div>
            </div>
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
        <script src=" {{ asset('assets/admin/js/plugins/chartjs.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/paper-dashboard.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- Boot box-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

    @routes
    <script>
        const deleteBookAjax = id => {
            return $.ajax({
                method: 'delete',
                url: route('books.destroy', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const deleteBook = id => {
            bootbox.confirm({
                message: "Bạn có thực sự muốn xóa danh mục này ?",
                buttons: {
                    confirm: {
                        label: 'Có',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Không',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {
                    if (result) {
                        deleteBookAjax(id).done(result => {
                            drawTable();
                            $.notify({
                                message: result.success
                            }, {
                                type: 'success'
                            });
                        }).fail((jqXHR, textStatus, errorThrown) => {
                            console.log(textStatus + ': ' + errorThrown);
                        });
                    }
                }
            });

        };

        const drawTable = () => {
            $('table').DataTable({
                ajax: route('books.index'),
                columns: [{
                        'data': 'id',
                        'title': 'Id'
                    },
                    {
                        'data': 'title',
                        'title': 'Tên sách'
                    },
                    {
                        'data': 'author',
                        'title': 'Tác giả'
                    },
                    {
                        'data': 'available_quantity',
                        'title': 'Số lượng'
                    },
                    {
                        'data': 'sale',
                        'title': 'Giảm giá'
                    },
                    {
                        'data': 'price',
                        'title': 'Giá tiền'
                    },
                    {
                        'data': 'created_at',
                        'title': 'Ngày tạo'
                    },
                    {
                        'data': 'updated_at',
                        'title': 'Ngày cập nhật'
                    },
                    {
                        'title': '...',
                        render: function(data, type, row, meta) {
                            let url = route('books.edit', row.id);
                            return `
                                    <a href='${url}' title='Chỉnh sửa' <i class='fa fa-edit'></i></a>
                                    <a href='javascript:;' title='Xóa' onclick='deleteBook(${row.id})' <i class='fa fa-trash'></i></a>`;
                        }
                    }
                ],
                bDestroy: true,
                aaSorting: [
                    [0, 'desc']
                ],
            });
        };

        @if(Session::has('success'))
            $.notify({
                message: '{{ Session::get('success') }}'
            }, {
                type: 'success'
            });
        @endif

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            drawTable();
        });

    </script>
@endsection()
