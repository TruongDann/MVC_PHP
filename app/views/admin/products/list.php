
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-3">
        <h6>Danh Sách Sản Phẩm</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="d-flex justify-content-between mx-4">
          <div class="dropdown">
            <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              Lọc theo loại
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <?php foreach ($categories as $category) {

              ?>
                <li><a class="dropdown-item" href="<?= _WEB_ROOT . $action . '?id_category = ' . $category['id'] ?>"><?= $category['name_category'] ?></a></li>


              <?php }  ?>
            </ul>
          </div>
          <button type="button" class="btn bg-gradient-default"><a href="<?= _WEB_ROOT ?>/them-san-pham">Thêm sản phẩm</a></button>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản Phẩm</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh Mục</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thông Tin</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá Cả</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá Giảm Giá</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                foreach ($products as $product) {
                ?>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="<?= _WEB_ROOT; ?>/public/uploads/products/2023_10/{{$product['thumbnail']}}" class="avatar avatar-sm me-3" alt="user1" >
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product['name']}}</h6>
                        <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                    <p class="text-xs text-secondary mb-0">{{$product['name_category']}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0" style="word-break: break-word; overflow: hidden; text-overflow: ellipsis; max-width: 20ch;">{{$product['content']}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs">{{$product['price']}}VND</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$product['sale_price']}}</span>
                  </td>
                  <td class="align-middle">
                    <a href="<?= _WEB_ROOT ?>sua-san-pham?id={{$product['id']}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Sửa

                    </a>
                  </td>
                  <td class="align-middle">
                    <a href="<?= _WEB_ROOT ?>xoa-san-pham?id={{$product['id']}}" class="btn btn-outline-danger btn-sm mb-0" onclick="return confirmDeleteProduct(event)" data-toggle="tooltip" data-original-title="Delete user">
                      Xóa
                    </a>
                  </td>
              </tr>
            <?php  }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>