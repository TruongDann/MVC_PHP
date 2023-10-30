<?php
class CartController extends Controller
{
    public $products, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
    }

    public function cart(){
        if(Session::data('cart') === false){
            $this->data['sub_content']['carts'] = [];
        }else{
            $this->data['sub_content']['carts'] = Session::data('cart');
        }

        $this->data['content'] = 'client/products/shopping-cart';
      
        $this->render('layouts/client_layout', $this->data);
       
    }
    public function addToCart(){
        $request = new Request();
    
        $id = $request->getFields();
        $id = $id['id'];
        $quality = isset($_POST['quality']) ? $_POST['quality'] : 1;
        $this->data = $this->products->getDetailProduct($id);
        
        $item = [
            'id' => $this->data['id'],
            'name' => $this->data['name'],
            'price' => $this->data['price'],
            'thumbnail' => $this->data['thumbnail'],
            'quality' => $quality,
        ];
        
        if (Session::data('cart') === false) {
            Session::data('cart', [$id => $item]);
        } else {
            $cart = Session::data('cart');
            if (isset($cart[$id])) {
                $cart[$id]['quality'] += $quality;
            } else {
                $cart[$id] = $item;
            }
            Session::data('cart', $cart);
        }
    
       
        $totalPrice = 0;
        $cart = Session::data('cart');
        foreach ($cart as $item) {
            $productPrice = $item['price'];
            $quantity = $item['quality'];
            $subtotal = $productPrice * $quantity;
            $totalPrice += $subtotal;
        }
        Session::data('totalPrice', $totalPrice);
        $response = new Response();
        $response->redirect("chi-tiet-san-pham?id=$id");
    }
    public function delete()
    {
        $request = new Request();
        $id = $request->getFields();

        // Xóa danh mục và chuyển hướng đến danh sách danh mục
        $this->products->deleteproducts($id['id']);
        $response = new Response();
        $response->redirect('danh-sach-danh-muc');
    }

    public function update()
    {
        $request = new Request();
        $id = $request->getFields();
        $id = $id['id'];

        $this->data['sub_content']['action'] = "sua-danh-muc?id=$id";
        $this->data['sub_content']['products'] = $this->products->getDetailproducts($id);
        $this->data['sub_content']['title'] = 'Sửa Danh Mục';
        $this->data['content'] = 'admin/products/add';
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

             $this->data = $request->getFields();
            $result = $this->products->updateproducts( $this->data, $id);

            if ($result) {
                // Nếu thành công, lưu thông báo và chuyển hướng đến danh sách danh mục
                Session::flash('msg', 'Cập nhật danh mục thành công');
                $response = new Response();
                $response->redirect('danh-sach-danh-muc');
            }
        }
    }
}
