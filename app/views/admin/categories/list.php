
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>{{$title}}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Tên Danh Mục</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mô Tả</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Tạo</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày Cập Nhật</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    <div class="px-2 py-1">

                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$category['name_category']}}</h6>
                                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4">
                                    <p class="text-xs font-weight-bold mb-0" style="word-break: break-word; overflow: hidden; text-overflow: ellipsis; max-width: 30ch;">{{$category['content']}}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$category['created_at']}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$category['updated_at']}}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="<?= _WEB_ROOT ?>sua-danh-muc?id={{$category['id']}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit

                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a href="<?= _WEB_ROOT ?>xoa-danh-muc?id={{$category['id']}}" class="btn btn-outline-danger btn-sm mb-0" onclick="return confirmDeleteProduct(event)" data-toggle="tooltip" data-original-title="Delete user">
                                        Delete
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