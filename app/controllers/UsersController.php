<?php

class UsersController extends Controller
{

    public $users, $data = [];

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
    }

    public function add()
    {
        $this->data['content'] = 'admin/users/add';
        $this->data['sub_content']['title'] = 'Thêm Người Dùng';
        $this->data['sub_content']['action'] = 'users/post_user';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function get_user()
    {

        $this->data['sub_content']['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->data['content'] = 'admin/users/add';
        $this->data['sub_content']['action'] = 'users/post_user';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function post_user()
    {
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'first_name' => 'required|min:2|max:30',
                'last_name' => 'required|min:2|max:30',
                'email' => 'required|email|min:6|unique:users:email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|match:password',
                'role' => 'required',
            ]);

            $request->messages([
                'first_name.required' => 'Vui lòng nhập tên',
                'first_name.min' => 'Tên phải có ít nhất 2 ký tự',
                'first_name.max' => 'Tên không được vượt quá 30 ký tự',
                'last_name.required' => 'Vui lòng nhập họ',
                'last_name.min' => 'Họ phải có ít nhất 2 ký tự',
                'last_name.max' => 'Họ không được vượt quá 30 ký tự',
                'email.required' => 'Vui lòng nhập địa chỉ email',
                'email.email' => 'Địa chỉ email không hợp lệ',
                'email.unique' => 'Địa chỉ email đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'confirm_password.required' => 'Vui lòng xác nhận mật khẩu',
                'confirm_password.match' => 'Mật khẩu xác nhận không khớp',
                'role.required' => 'Vui lòng chọn chức vụ',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect('them-nguoi-dung');
            }

            $data = $request->getFields();
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['password'] = $hashedPassword;
    
            $data = $request->except($data, ['first_name', 'last_name', 'confirm_password']); 
            $result = $this->users->insertUsers($data);

            if (!$result) {
                Session::flash('msg', 'Thêm người dùng thành công');
                $response  = new Response();
                $response->redirect('danh-sach-nguoi-dung');
            }
        }
    }
    public function list()
    {
        $this->data['sub_content']['users'] = $this->users->getListUsers();
        $this->data['content'] = 'admin/users/list';
        $this->render('layouts/admin_layout', $this->data);
    }


    public function delete()
    {
        $request = new Request();
        $id = $request->getFields();
        $this->users->deleteusers($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-danh-muc');
    }

    public function update()
    {
        $request = new Request();
        $id = $request->getFields();
        $id = $id['id'];

        $this->data['sub_content']['action'] = "sua-danh-muc?id=$id";
        $this->data['sub_content']['users'] = $this->users->getDetailusers($id);
        $this->data['sub_content']['title'] = 'Sửa Người Dùng';
        $this->data['content'] = 'admin/users/add';
        $this->render('layouts/admin_layout', $this->data);
        if ($request->isPost()) {
            $request->rules([
                'name_user' => 'required|min:5|max:30',
                'content' => 'required|min:10|max:255',
            ]);

            $request->messages([
                'name_user.required' => 'Tên sản phẩm không được để trống',
                'name_user.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
                'name_user.max' => 'Tên sản phẩm không được dài quá 30 ký tự',
                'content.required' => 'Mô tả sản phẩm không được để trống',
                'content.min' => 'Mô tả sản phẩm phải có ít nhất 10 ký tự',
                'content.max' => 'Mô tả sản phẩm không được dài quá 255 ký tự',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect("sua-nguoi-dung?id=$id");
            }

            $data = $request->getFields();
            $result = $this->users->updateCategories($data, $id);

            if (!$result) {
                Session::flash('msg', 'Cập nhật danh mục thành công');
                $response  = new Response();
                $response->redirect('danh-sach-nguoi-dung');
            }
        }
    }
}
