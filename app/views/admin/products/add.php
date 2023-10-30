<?php ?>
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Thêm Sản Phẩm</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <form method="post" action="<?= _WEB_ROOT . $action; ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tên Sản Phẩm</label>
                                        <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" name="name" placeholder="Nhập tên sản phẩm..." value="<?= isset($product['name']) ? $product['name'] : old('name') ?>">
                                        <input type="text" style="display: none;" value="<?= isset($product['id']) ? $product['id'] : '' ?>" name="id">
                                        <?= form_error('name', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Loại</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                            <option value="">-- Chọn loại --</option>
                                            <?php foreach ($categories as $category) {
                                                $selected = isset($product['category_id']) && $product['category_id'] == $category['id'] ? 'selected' : '';
                                            ?>
                                                <option value="<?= $category['id'] ?>" <?= $selected ?>>
                                                    <?= $category['name_category'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('category_id', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ảnh Sản Phẩm</label>
                                        <input type="file" class="dropzone form-control form-control-alternative" name="thumbnail[]" multiple placeholder="Chọn ảnh sản phẩm..." value="<?= isset($product['thumbnail']) ? $product['thumbnail'] : old('thumbnail') ?>">

                                        <?= form_error('thumbnail', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Giá</label>
                                        <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" name="price" placeholder="Nhập giá sản phẩm..." value="<?= isset($product['price']) ? $product['price'] : old('price') ?>">
                                        <?= form_error('price', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Giá Khuyến Mãi</label>
                                        <input type="number" class="form-control form-control-alternative" id="exampleFormControlInput1" name="sale_price" placeholder="Nhập giá khuyến mãi sản phẩm..." value="<?= isset($product['sale_price']) ? $product['sale_price'] : old('sale_price') ?>">
                                        <?= form_error('sale_price', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label">Mô Tả</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" placeholder="Nhập mô tả sản phẩm..."><?= isset($product['content']) ? $product['content'] : old('content') ?></textarea>
                                        <?= form_error('content', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-primary btn-sm float-end">Thêm</button>
                            <button type="reset" class="btn btn-sm float-end mb-4 mx-4">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>