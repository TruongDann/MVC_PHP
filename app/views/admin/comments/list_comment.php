
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
          
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-between mt-5 mx-4">
                <div class="pb-3">
                <h6>Danh Sách Bình Luận</h6>
            </div>
                   <form action="<?= _WEB_ROOT . $action?>" method="post">
                   <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Tìm kiếm bình luận" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary mb-0" type="submit" id="button-addon2">Tìm Kiếm</button>
                    </div>
                   </form>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Người Dùng</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bình Luận</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản Phẩm</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Tải Lên</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($comments as $comment)
                                <td>
                                    <div class="px-3 py-1">
                                        <div >
                                            <h6 class="mb-0 text-sm">{{$comment['id']}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ucfirst($comment['role'])}}</p>
                                    <p class="text-xs text-secondary mb-0">{{$comment['name_user']}}</p>
                                </td>
                                <td class="align-middle text-sm">
                                    <p class="text-xs font-weight-bold mb-0" style="word-break: break-word; overflow: hidden; text-overflow: ellipsis; max-width: 20ch;">{{$comment['content']}}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs">{{$comment['name_product']}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$comment['created_at']}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="<?= _WEB_ROOT ?>comments/delete?id={{$comment['id']}}" class="btn btn-outline-danger btn-sm mb-0" onclick="return confirmDeleteProduct(event)" data-toggle="tooltip" data-original-title="Delete user">
                                        Xóa
                                    </a>
                                    <a href="<?= _WEB_ROOT ?>comments/detail?id={{$comment['id']}}" class="btn btn-outline-primary btn-sm mb-0">
                                        Trả Lời
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>