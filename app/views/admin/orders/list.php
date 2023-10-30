<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Danh Sách Đơn Hàng</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th data-sortable="" style="width: 29.3126%;"><a href="#" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</a></th>
                                <th data-sortable="" style="width: 43.6807%;"><a href="#" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Mua Hàng</a></th>
                                <th data-sortable="" style="width: 42.7447%;"><a href="#" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng Thái</a></th>
                                <th data-sortable="" style="width: 52.4168%;"><a href="#" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người Dùng</a></th>
                                <th data-sortable="" style="width: 59.5929%;"><a href="#" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản Phẩm</a></th>
                                <th data-sortable="" style="width: 29.0165%;"><a href="#" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tổng Tiền</a></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="customCheck1">
                                        </div>
                                        <p class="text-xs font-weight-bold ms-2 mb-0">#{{$order['id']}}</p>
                                    </div>
                                </td>
                                <td class="font-weight-bold px-4">
                                    <span class="my-2 text-xs">{{$order['created_at']}}</span>
                                </td>
                               <form method="post" action="<?= _WEB_ROOT?>cap-nhat-don-hang">
                               <td class="text-xs font-weight-bold px-4">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-check" aria-hidden="true"></i></button>
                                            <input type="hidden" name="id" value="{{$order['id']}}">
                                            <select class="form-control" name="status">
                                                <option>{{$order['status']}}</option>
                                                <option value="Đã Duyệt">Đã Duyệt</option>
                                                <option value="Chưa Duỵet">Chưa Duyệt</option>
                                            </select>
                                        
                                    </div>
                                </td>
                                <td class="text-xs font-weight-bold px-4">
                                    <span>{{$order['customer_name']}}</span>
                                </td>
                                <td class="text-xs font-weight-bold px-4">
                                    <span class="my-2 text-xs">Nike Sport V2</span>
                                </td>
                                <td class="text-xs font-weight-bold px-4">
                                    <span class="my-2 text-xs">{{number_format($order['total'])}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="<?= _WEB_ROOT ?>orders/delete?id={{$order['id']}}" class="btn btn-outline-danger btn-sm mb-0" onclick="return confirmDeleteProduct(event)" data-toggle="tooltip" data-original-title="Delete user">
                                        Xóa
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <button type="submit"  class="btn btn-outline-primary btn-sm mb-0">
                                        Cập Nhật
                                    </button>
                                </td>
                               </form>
                            </tr>
                            
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="dataTable-bottom px-3 pt-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dataTable-info text-xs p-2">
                            Showing 1 to 10 of 12 entries
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end p-2" style="margin:0 !important">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:;" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                                <li class="page-item active"><a class="page-link text-white" href="javascript:;">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:;">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>