@extends('admin.layout')

@section('title', 'Đơn hàng')

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
                    <h4 class="card-title">Đơn hàng</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-data">
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
                    <input type="hidden" id="orderId">
                    <div class="form-group col">
                        <label for="name">Tên người đặt</label>
                        <input type="text" class="form-control" id="name" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="address">Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" id="address" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="status">Trạng thái</label>
                        <select id="status" class="form-control">
                          <option value="new" selected>Đơn hàng mới</option>
                          <option value="confirming">Đang xác nhận</option>
                          <option value="confirmed">Đã xác nhận</option>
                          <option value="transported">Đang vận chuyển</option>
                          <option value="complete">Hoàn tất</option>
                          <option value="fail">Thất bại</option>
                          <option value="destroy">Hủy</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="email">Email</label>
                        <input type="tel" class="form-control" id="email" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="" cols="30" rows="10" class="form-control" readonly></textarea>
                    </div>
                    <div class="form-group col">
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tên sách</th>
                              <th scope="col">Số lượng</th>
                              <th scope="col">Thành tiền</th>
                            </tr>
                          </thead>
                          <tbody id="order_book">
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        const setData = data => {
            $('#orderId').val(data.order.id);
            $('#name').val(data.order.name);
            $('#address').val(data.order.address);
            $('#status').val(data.order.status);
            $('#phone').val(data.order.phone);
            $('#email').val(data.order.email);
            $('#notes').text(data.order.notes);
            $.each(data.order_book, (index, value) => {
                temp = index;
                $('#order_book').append(
                    `
                        <tr>
                          <th scope="row">${++index}</th>
                          <td>${data.order.books[temp++].title}</td>
                          <td>${value.quantity}</td>
                          <td>${value.price_each}</td>
                        </tr>
                    `
                );
            });
        };

        const updateStatusOrderAjax = (id, status) => {
            return $.ajax({
                method: 'patch',
                url: route('orders.update', id),
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({'status': status}),
            });
        };

        const deleteOrderAjax = id => {
            return $.ajax({
                method: 'delete',
                url: route('orders.destroy', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        const detailOrderAjax = id => {
            return $.ajax({
                method: 'get',
                url: route('orders.show', id),
                contentType: 'application/json',
                dataType: 'json'
            });
        };

        $('#status').change(() => {
            let status = $('#status').val();
            let id = $('#orderId').val();
            updateStatusOrderAjax(id, status).done(result => {
                drawTable();
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        });

        const detailOrder = id => {
            $('.modal-title').text('Chi tiết đơn hàng');
            $('#modal_publisher').modal('show');
            detailOrderAjax(id).done(result => {
                setData(result);
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(textStatus + ': ' + errorThrown);
            });
        };

        const deleteOrder = id => {
            bootbox.confirm({
                message: "Bạn có thực sự muốn xóa đơn hàng này ?",
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
                        deleteOrderAjax(id).done(result => {
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
            $('#table-data').DataTable({
                ajax: route('orders.index'),
                columns: [
                    {
                        'data': 'id',
                        'title': '#'
                    },
                    {
                        'data': 'name',
                        'title': 'Người đặt'
                    },
                    {
                        'data': 'status',
                        'title': 'Trạng thái',
                        render : function(data, type, row, meta) {
                            let status = {
                                'new' : 'Đơn hàng mới',
                                'confirming': 'Đang xác nhận',
                                'confirmed': 'Đã xác nhận',
                                'transported': 'Đang vận chuyển',
                                'complete': 'Hoàn tất',
                                'fail': 'Thất bại',
                                'destroy': 'Hủy bỏ'
                            };
                            return status[row.status];
                        }
                    },
                    {
                        'data': 'phone',
                        'title': 'Số điện thoại'
                    },
                    {
                        'data': 'email',
                        'title': 'Email'
                    },
                    {
                        'data': 'created_at',
                        'title': 'Ngày đặt'
                    },
                    {
                        'title': '...',
                        render: function(data, type, row, meta) {
                            let url = route('books.edit', row.id);
                            return `
                                    <a href='javascript:;' title='Chi tiết' onclick='detailOrder(${row.id})' <i class='fa fa-info'></i></a>
                                    <a href='javascript:;' title='Xóa' onclick='deleteOrder(${row.id})' <i class='fa fa-trash'></i></a>
                            `;
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
