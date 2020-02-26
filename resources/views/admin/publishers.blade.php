@extends('admin.layout')
@section('title', 'Nhà xuất bản')
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
                    <h4 class="card-title">Nhà xuất bản sách</h4>
                </div>
                <div class="card-body">
                    <a href="javascript:;" class="btn btn-info" onclick="createPublisher()"> Tạo mới</a>
                    <div class="table-responsive">
                        <table class="table">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_publisher" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="publisher_id" value="-1">
                    <div class="form-group col">
                        <label for="publisher_name">Tên nhà xuất bản</label>
                        <input type="text" class="form-control" id="publisher_name" placeholder="Tên nhà xuất bản">
                        <div id="publisher_name_error"></div>
                    </div>
                    <div class="form-group col">
                        <label for="publisher_address ">Địa chỉ</label>
                        <input type="text" class="form-control" id="publisher_address" placeholder="Địa chỉ">
                        <div id="publisher_address_error"></div>
                    </div>
                    <div class="form-group col">
                        <label for="publisher_phone">Số điện thoại</label>
                        <input type="tel" class="form-control" id="publisher_phone" placeholder="Số điện thoại">
                        <div id="publisher_phone_error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="savePublisher()">Lưu</button>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

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
            $('#publisher_id').val('-1');
            $('#publisher_name').val('');
            $('#publisher_address').val('');
            $('#publisher_phone').val('');
        };

        const getData = () => {
            let publisher = {};
            publisher.id = $('#publisher_id').val();
            publisher.name = $('#publisher_name').val();
            publisher.address = $('#publisher_address').val();
            publisher.phone = $('#publisher_phone').val();
            return publisher;
        };

        const setData = data => {
            $('#publisher_id').val(data.id);
            $('#publisher_name').val(data.name);
            $('#publisher_address').val(data.address);
            $('#publisher_phone').val(data.phone);
        };

        const setValidated = data => {
            if (data.name) {
                $('#publisher_name_error').text(data.name);
                $('#publisher_name').addClass('is-invalid');
                $('#publisher_name_error').addClass('invalid-feedback');
            }

            if (data.address) {
                $('#publisher_address_error').text(data.address);
                $('#publisher_address').addClass('is-invalid');
                $('#publisher_address_error').addClass('invalid-feedback');
            }
            if (data.phone) {
                $('#publisher_phone_error').text(data.phone);
                $('#publisher_phone').addClass('is-invalid');
                $('#publisher_phone_error').addClass('invalid-feedback');
            }
        };

        const resetValidated = () => {
            $('#publisher_name_error').text('');
            $('#publisher_name').removeClass('is-invalid');
            $('#publisher_name_error').removeClass('invalid-feedback');

            $('#publisher_address_error').text('');
            $('#publisher_address').removeClass('is-invalid');
            $('#publisher_address_error').removeClass('invalid-feedback');

            $('#publisher_phone_error').text('');
            $('#publisher_phone').removeClass('is-invalid');
            $('#publisher_phone_error').removeClass('invalid-feedback');
        };

        const createPublisherAjax = data => {
            return $.ajax({
                method: 'post',
                url: route('publishers.store'),
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
            });
        };

        const updatePublisherAjax = (id, data) => {
            return $.ajax({
                method: 'put',
                url: route('publishers.update', id),
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
            });
        };

        const getPublisherAjax = id => {
            return $.ajax({
                method: 'get',
                url: route('publishers.show', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const deletePublisherAjax = id => {
            return $.ajax({
                method: 'delete',
                url: route('publishers.destroy', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const createPublisher = () => {
            resetData();
            resetValidated();
            $('.modal-title').text('Tạo mới nhà xuất bản');
            $('#modal_publisher').modal('show');
        };

        const updatePublisher = id => {
            resetValidated();
            $('.modal-title').text('Cập nhật nhà xuất bản');
            getPublisherAjax(id).done(result => {
                setData(result.data);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
            $('#modal_publisher').modal('show');
        };

        const deletePublisher = id => {
            bootbox.confirm({
                message: "Bạn có thực sự muốn xóa mục này ?",
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
                        deletePublisherAjax(id).done(result => {
                            $('#modal_publisher').modal('hide');
                            drawTable();
                            $.notify({message: result.success }, {type: 'success'});
                        }).fail((jqXHR, textStatus, errorThrown) => {
                            console.log(textStatus + ': ' + errorThrown);
                        });
                    }
                }
            });

        };

        const savePublisher = () => {
            let data = getData();
            if (data.id === '-1') {
                createPublisherAjax(data).done(result => {
                    if (!$.isEmptyObject(result.warning)) {
                        setValidated(result.warning);
                    } else {
                        resetValidated();
                        $('#modal_publisher').modal('hide');
                        drawTable();
                        $.notify({message: result.success }, {type: 'success'});
                    }
                }).fail((jqXHR, textStatus, errorThrown) => {
                    console.log(textStatus + ': ' + errorThrown);
                });
            }
            else {
                updatePublisherAjax(data.id, data).done(result => {
                    if (!$.isEmptyObject(result.warning)) {
                        setValidated(result.warning);
                    } else {
                        resetValidated();
                        $('#modal_publisher').modal('hide');
                        drawTable();
                        $.notify({message: result.success }, {type: 'success'});
                    }
                }).fail((jqXHR, textStatus, errorThrown) => {
                    console.log(textStatus + ': ' + errorThrown);
                });
            }
        };

        const drawTable = () => {
            $('table').DataTable({
                ajax: route('publishers.index'),
                columns: [
                    {
                        'data': 'id',
                    },
                    {
                        'data': 'name',
                        'title': 'Tên nhà xuất bản'
                    },
                    {
                        'data': 'address',
                        'title': 'Địa chỉ'
                    },
                    {
                        'data': 'phone',
                        'title': 'Số điện thoại'
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
                                                                    <a href='javascript:;' title='Chỉnh sửa' onclick='updatePublisher(${row.id})' <i class='fa fa-edit'></i></a>
                                                                    <a href='javascript:;' title='Xóa' onclick='deletePublisher(${row.id})' <i class='fa fa-trash'></i></a>`;
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

