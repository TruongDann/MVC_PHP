<?php

class OrdersController extends Controller
{

    public $products, $orders, $data = [];

    public function __construct()
    {
       
        $this->orders = $this->model('OrdersModel');
    }


    public function list()
    {
        $this->data['sub_content']['orders'] = $this->orders->getListOrder();
        $this->data['content'] = 'admin/orders/list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function delete()
    {
       
        $request = new Request();

        $id = $request->getFields();
        $this->orders->deleteOrder($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-don-hang');
    }


    public function update()
    {
        $request = new Request();
        $data = $request->getFields();
        $result = $this->orders->updateOrder($data, $data['id']);
            if (!$result) {
                Session::flash('msg', 'Cập nhật trạng thái thành công');
                $response = new Response();
                $response->redirect('danh-sach-don-hang');
            }
        
    }
}
