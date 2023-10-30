<?php

class RegisterController extends Controller
{
   
    public $users, $data = [];

    public function __construct()
    {
        $this->users = $this->model('UsersModel');
    }

    public function index()
    {
        $this->register();
    }

    public function register()
    {
        $this->data['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->data['action'] = 'register/post_user';
        $this->render('login/sign_up', $this->data);
    }

    public function post_user()
    {
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'name' => 'required|min:2|max:30',
                'email' => 'required|email|min:6|unique:users:email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|match:password',
               
            ]);

            $request->messages([
                'name.required' => 'Vui lòng nhập tên',
                'name.min' => 'Tên phải có ít nhất 2 ký tự',
                'name.max' => 'Tên không được vượt quá 30 ký tự',
                'email.required' => 'Vui lòng nhập địa chỉ email',
                'email.email' => 'Địa chỉ email không hợp lệ',
                'email.unique' => 'Địa chỉ email đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'confirm_password.required' => 'Vui lòng xác nhận mật khẩu',
                'confirm_password.match' => 'Mật khẩu xác nhận không khớp',
              
            ]);

            $validate = $request->validate();
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect('dang-ky');
            }

            $data = $request->getFields();
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['password'] = $hashedPassword;
    
            $data = $request->except($data, ['first_name', 'last_name', 'confirm_password']); 
            $result = $this->users->insertUsers($data);

            if (!$result) {
                Session::flash('msg', 'Thêm người dùng thành công');
                $response  = new Response();
                $response->redirect('dang-nhap');
            }
        }
    }
    public function logout()
    {
        // Thay thế Session::delete() bằng Session::data()

        Session::delete('admin');
        $response  = new Response();
        $response->redirect('admin/login');
    }
}
