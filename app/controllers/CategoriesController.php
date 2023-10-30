<?php
class CategoriesController extends Controller
{
    public $categories, $checkLogin, $data = [];

    public function __construct()
    {
        $this->categories = $this->model('CategoriesModel');
    }

    public function add()
    {
        // Hiển thị giao diện thêm danh mục
        $this->data['content'] = 'admin/categories/add';
        $this->data['sub_content']['title'] = 'Thêm Danh Mục';
        $this->data['sub_content']['action'] = 'categories/post_category';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function get_category()
    {
        // Lấy thông tin từ session và hiển thị giao diện thêm danh mục
        $this->data['sub_content']['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->data['content'] = 'admin/categories/add';
        $this->data['sub_content']['action'] = 'categories/post_category';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function post_category()
    {
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'name_category' => 'required|min:5|max:30',
                'content' => 'required|min:10|max:255',
            ]);

            $request->messages([
                'name_category.required' => 'Tên danh mục không được để trống',
                'name_category.min' => 'Tên danh mục phải có ít nhất 5 ký tự',
                'name_category.max' => 'Tên danh mục không được dài quá 30 ký tự',
                'content.required' => 'Mô tả danh mục không được để trống',
                'content.min' => 'Mô tả danh mục phải có ít nhất 10 ký tự',
                'content.max' => 'Mô tả danh mục không được dài quá 255 ký tự',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                // Nếu thông tin không hợp lệ, lưu thông báo lỗi vào session và chuyển hướng trở lại giao diện thêm danh mục
                Session::flash('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response = new Response();
                $response->redirect('them-danh-muc');
            }

            $data = $request->getFields();
            $result = $this->categories->insertCategories($data);

            if ($result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Thêm danh mục thành công');
                $response = new Response();
                $response->redirect('danh-sach-danh-muc');
            }
        }
    }

    public function list()
    {
        // Lấy danh sách danh mục và hiển thị giao diện danh sách danh mục
        $this->data['sub_content']['categories'] = $this->categories->getListCategories();
        $this->data['sub_content']['title'] = 'Danh Sách Danh Mục';
        $this->data['content'] = 'admin/categories/list';
        $this->data['sub_content']['action'] = 'danh-sach-danh-muc';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function delete()
    {
        $request = new Request();
        $id = $request->getFields();

        // Xóa danh mục và chuyển hướng đến danh sách danh mục
        $this->categories->deleteCategories($id['id']);
        $response = new Response();
        $response->redirect('danh-sach-danh-muc');
    }

    public function update()
    {
        $request = new Request();
        $id = $request->getFields();
        $id = $id['id'];

        $this->data['sub_content']['action'] = "sua-danh-muc?id=$id";
        $this->data['sub_content']['categories'] = $this->categories->getDetailCategories($id);
        $this->data['sub_content']['title'] = 'Sửa Danh Mục';
        $this->data['content'] = 'admin/categories/add';
        $this->render('layouts/admin_layout', $this->data);

        if ($request->isPost()) {
            $request->rules([
                'name_category' => 'required|min:5|max:30',
                'content' => 'required|min:10|max:255',
            ]);

            $request->messages([
                'name_category.required' => 'Tên danh mục không được để trống',
                'name_category.min' => 'Tên danh mục phải có ít nhất 5 ký tự',
                'name_category.max' => 'Tên danh mục không được dài quá 30 ký tự',
                'content.required' => 'Mô tả danh mục không được để trống',
                'content.min' => 'Mô tả danh mục phải có ít nhất 10 ký tự',
                'content.max' => 'Mô tả danh mục không được dài quá 255 ký tự',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                // Nếu thông tin không hợp lệ, lưu thông báo lỗi vào session và chuyển hướng trở lại giao diện sửa danh mục
                Session::flash('msg', 'Đã có lỗi xảy ra, vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response = new Response();
                $response->redirect("sua-danh-muc?id=$id");
            }

            $data = $request->getFields();
            $result = $this->categories->updateCategories($data, $id);

            if ($result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Cập nhật danh mục thành công');
                $response = new Response();
                $response->redirect('danh-sach-danh-muc');
            }
        }
    }
}
