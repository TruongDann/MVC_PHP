<?php

class ClientUserController extends Controller
{
    public $province, $checkLogin, $data;

    public function __construct()
    {
        $this->province  = $this->model('HomeModel');
        
    }

    public function index()
    {
       $this->login();
    }
    public function login()
    {   
        
            $this->data['action'] = 'clientUser/authLogin';
            $this->render('login/sign_in', $this->data);
    }

    public function page()
    {
        $this->data['content'] = 'client/home/index';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function authLogin()
    {
        $request = new Request();

        $request->rules([
            'email' => 'required|min:5|max:30',
            'password' => 'required|min:3',
        ]);

        if (!$request->validate()) {
            $this->data['errors'] = $request->errors();
            $this->render('login/sign_in');
        } else {
            $admin = $this->province->findUserByEmail($request->input('email'));
           
            if ($admin && password_verify($request->input('password'), $admin['password'])) {
              
                Session::data('user', $admin);
             
                if (isset($_POST['remember'])) {
                    setcookie('emailAdmin', $admin['email'], time() + 20);
                    setcookie('passwordAdmin', $admin['password'], time() + 20);
                }
                Session::data('msg', 'Đăng Nhập Thành Công');
                $response  = new Response();
                $response->redirect('ds-san-pham');
            } else {
               
                $this->data['errors'] = ['Thông tin đăng nhập không chính xác'];
                $this->render('login/sign_in');
             
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
