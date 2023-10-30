<?php
class ClientProductController extends Controller
{
    public $products, $comments, $categories, $data = [];

    public function __construct()
    {
        // Tạo đối tượng ProductModel và CategoriesModel để truy cập vào dữ liệu
        $this->products = $this->model('ProductModel');
        $this->comments = $this->model('CommentsModel');
        $this->categories = $this->model('CategoriesModel');
    }

    public function products()
    {
        // Lấy danh sách các danh mục và sản phẩm từ model
        $this->data['sub_content']['categories'] = $this->categories->getList();
        $request = new Request();
        $id = $request->getFields();

        if (isset($id['id_category_'])) {
            // Nếu có ID danh mục được chọn, lấy danh sách sản phẩm của danh mục đó
            $this->data['sub_content']['products'] = $this->products->getListProductsCategories(intval($id['id']));
        } else {
            // Ngược lại, lấy toàn bộ danh sách sản phẩm
            $this->data['sub_content']['products'] = $this->products->getListProducts();
        }

        $this->data['sub_content']['action'] = 'ds-san-pham';
        $this->data['content'] = 'client/products/products';
        // Render giao diện danh sách sản phẩm
        $this->render('layouts/client_layout', $this->data);
    }

    public function detail()
    {
        // Render giao diện chi tiết sản phẩm
        $this->data['content'] = 'client/products/product-detail';
        $request = new Request();
        $id = $request->getFields();
        
        $this->data['sub_content']['product'] = $this->products->getDetailProduct($id['id']);
    
        $this->data['sub_content']['comments']  = $this->comments->getListCommentsProduct($id['id']);
        $this->data['sub_content']['comments_reply']  = $this->comments->getDetailCommentsProductReply($id['id']);
        $this->render('layouts/client_layout', $this->data);
    }
}
