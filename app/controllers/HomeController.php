<?php
class HomeController extends Controller
{
    public $product, $data;

    public function __construct()
    {
        $this->product = $this->model('HomeModel');
    }

    public function index()
    {
       
        $this->data['content'] = 'client/home/index';
        $this->render('layouts/client_layout', $this->data);
    }
    public function logout()
    {
        // Thay thế Session::delete() bằng Session::data()

        Session::delete('user');
        $response  = new Response();
        $response->redirect('admin/login');
    }
}
