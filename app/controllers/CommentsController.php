<?php

class CommentsController extends Controller
{

    public $users, $checkLogin, $comments, $data = [];

    public function __construct()
    {
        $this->comments = $this->model('CommentsModel');
    }


    public function get_user()
    {
        $this->data['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->data['action'] = 'users/post_user';
        $this->render('client/product_detail', $this->data);
    }

    public function post_comment()
    {
        if (!Session::data('user') && !Session::data('admin')) {
            $response = new Response();
            $response->redirect('dang-nhap');
        }
        $request = new Request();
        $data = $request->getFields();
        $id = $data['id_product'];
        if ($request->isPost()) {
            $request->rules([
                'content' => 'min:10|max:255',
            ]);

            $request->messages([
                'content.min' => 'Bình luận sản phẩm phải có ít nhất 10 ký tự',
                'content.max' => 'Bình luận sản phẩm không được dài quá 255 ký tự',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());

                $response  = new Response();
                $response->redirect('chi-tiet-san-pham?id=' . $id);
            }
            if (Session::data('user')) {
                $dataUser = (Session::data('user'));
            } else if (Session::data('admin')) {
                $dataUser = (Session::data('admin'));
            }
            $data['id_user'] = $dataUser['id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTimestamp = time();
            $date = date('Y-m-d H:i:s', $currentTimestamp);
            $data['created_at']  = $date;
            if (empty($data['id_reply'])) {
                $data = $request->except($data, ['id_reply']);
            }
            $result = $this->comments->insertComment($data);

            if (!$result) {
                if (Session::data('user')) {
                    $response  = new Response();
                    $response->redirect('chi-tiet-san-pham?id=' . $id);
                } else if (Session::data('admin')) {
                    $response  = new Response();
                    $response->redirect('danh-sach-binh-luan?id=' . $id);
                }
            }
        }
    }

    public function detail()
    {
        // Render giao diện chi tiết sản phẩm
        $this->data['sub_content']['title'] = 'Chi Tiết Bình Luận';
        $this->data['content'] = 'admin/comments/detail';
        $id = $_GET['id'];
        $this->data['sub_content']['comment']  = $this->comments->getDetailComment($id);

        $this->render('layouts/admin_layout', $this->data);
    }
    public function list()
    {

        $request = new Request();

        $find = $request->getFields();

        if (isset($find['name'])) {
            $this->data['sub_content']['comments'] = $this->comments->getCommentsProduct($find['name']);
        } else {
            $this->data['sub_content']['comments'] = $this->comments->getListComments();
        }

        $this->data['sub_content']['title'] = 'Danh Sách Bình Luận';
        $this->data['content'] = 'admin/comments/list_comment';
        $this->data['sub_content']['action'] = 'danh-sach-binh-luan';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function delete()
    {

        $request = new Request();

        $id = $request->getFields();
        $this->comments->deleteComment($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-binh-luan');
    }
}
