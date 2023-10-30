
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Thêm Danh Mục</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <form method="post" action="<?= _WEB_ROOT . $action; ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tên Danh Mục</label>
                                        <input type="name" class="form-control form-control-alternative" id="exampleFormControlInput1" name="name_category" value="<?= isset($categories['name_category']) ? $categories['name_category'] : old('name_category') ?>" placeholder="Nhập tên danh mục...">
                                        <input type="text" style="display: none;" value="<?= isset($categories['id']) ? $categories['id'] : '' ?>" name="id">
                                        <?= form_error('name_category', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label">Mô Tả</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"><?= isset($categories['content']) ? $categories['content'] : old('content') ?></textarea>
                                        <?= form_error('content', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-primary btn-sm float-end">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>