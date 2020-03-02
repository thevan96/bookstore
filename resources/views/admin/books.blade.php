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

        <!--  Google Maps Plugin    -->
        <script src=" https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/admin/js/plugins/chartjs.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/paper-dashboard.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- Boot box-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

    @routes
    <script>
        const resetData = () => {
            $('#genre_id').val('-1');
            $('#genre_name').val('');
        };

        const getData = () => {
            let genres = {};
            genres.id = $('#genre_id').val();
            genres.name = $('#genre_name').val();
            return genres;
        };

        const setData = data => {
            $('#genre_id').val(data.id);
            $('#genre_name').val(data.name);
        };

        const setValidated = data => {
            $('#genre_name_error').text(data.warning);
            $('#genre_name').addClass('is-invalid');
            $('#genre_name_error').addClass('invalid-feedback');
        };

        const resetValidated = () => {
            $('#genre_name_error').text('');
            $('#genre_name').removeClass('is-invalid');
            $('#genre_name_error').removeClass('invalid-feedback');
        };

        const createGenreAjax = data => {
            return $.ajax({
                method: 'post',
                url: route('genres.store'),
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
            });
        };

        const updateGenreAjax = (id, data) => {
            return $.ajax({
                method: 'put',
                url: route('genres.update', id),
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
            });
        };

        const getGenreAjax = id => {
            return $.ajax({
                method: 'get',
                url: route('genres.show', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const deleteGenreAjax = id => {
            return $.ajax({
                method: 'delete',
                url: route('genres.destroy', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const createGenre = () => {
            resetData();
            $('.modal-title').text('Thêm sách mới');
            $('#genre_name').attr('placeholder', 'Tên danh mục sách');
            $('#modal_genre').modal('show');
        };

        const updateGenre = id => {
            $('.modal-title').text('Cập nhật danh mục');
            getGenreAjax(id).done(result => {
                setData(result.data);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
            $('#modal_genre').modal('show');
        };

        const deleteGenre = id => {
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
                        deleteGenreAjax(id).done(result => {
                            $('#modal_genre').modal('hide');
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

        const saveGenre = () => {
            let data = getData();
            if (data.id === '-1') {
                createGenreAjax(data).done(result => {
                    if (!$.isEmptyObject(result.warning)) {
                        setValidated(result);
                    } else {
                        resetValidated();
                        $('#modal_genre').modal('hide');
                        drawTable();
                        $.notify({
                            message: result.success
                        }, {
                            type: 'success'
                        });
                    }
                }).fail((jqXHR, textStatus, errorThrown) => {
                    console.log(textStatus + ': ' + errorThrown);
                });
            } else {
                updateGenreAjax(data.id, data).done(result => {
                    if (!$.isEmptyObject(result.warning)) {
                        setValidated(result);
                    } else {
                        resetValidated();
                        $('#modal_genre').modal('hide');
                        drawTable();
                        $.notify({
                            message: result.success
                        }, {
                            type: 'success'
                        });
                    }
                }).fail((jqXHR, textStatus, errorThrown) => {
                    console.log(textStatus + ': ' + errorThrown);
                });
            }
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
                        'data': 'description',
                        'title': 'Mô tả'
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
                            return `
                                <a href='javascript:;' title='Chỉnh sửa' onclick='updateGenre(${row.id})' <i class='fa fa-edit'></i></a>
                                <a href='javascript:;' title='Xóa' onclick='deleteGenre(${row.id})' <i class='fa fa-trash'></i></a>`;
                        }
                    }
                ],
                bDestroy: true,
                aaSorting: [
                    [0, 'desc']
                ],
            });
        };

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
