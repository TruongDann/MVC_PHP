<?php

class ProductController extends Controller
{

    public $products, $categories, $data = [];

    public function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoriesModel');
    }




    public function add()
    {

        $this->data['sub_content']['categories'] = $this->categories->getList();
        $this->data['content'] = 'admin/products/add';
        $this->data['sub_content']['title'] = 'Thêm Sản-Phẩm';
        $this->data['sub_content']['action'] = 'product/post_product';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function get_product()
    {
        $this->data['sub_content']['categories'] = $this->categories->getList();
        $this->data['sub_content']['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->data['content'] = 'admin/products/add';
        $this->data['sub_content']['action'] = 'product/post_product';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function post_product()
    {
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'name' => 'required|min:5|max:30',
                'price' => 'required|min:10000',
                'sale_price' => 'required|min:10000',
                'category_id' => 'required',
                'content' => 'required|min:10|max:255',
                'thumbnail' => 'image|size|resolution|upload_failed',
            ]);

            $request->messages([
                'name.required' => 'Tên sản phẩm không được để trống',
                'name.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
                'name.max' => 'Tên sản phẩm không được dài quá 30 ký tự',
                'price.required' => 'Giá sản phẩm không được để trống',
                'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 10000',
                'category_id.required' => 'Loại sản phẩm không được để trống',
                'sale_price.required' => 'Giá khuyến mãi sản phẩm không được để trống',
                'sale_price.min' => 'Giá khuyến mãi sản phẩm phải lớn hơn hoặc bằng 10000',
                'content.required' => 'Mô tả sản phẩm không được để trống',
                'content.min' => 'Mô tả sản phẩm phải có ít nhất 10 ký tự',
                'content.max' => 'Mô tả sản phẩm không được dài quá 255 ký tự',

                'thumbnail.image' => 'Ảnh sản phẩm phải là một tệp hình ảnh',
                'thumbnail.size' => 'Ảnh sản phẩm không đủ kích thước tối thiểu',
                'thumbnail.resolution' => 'Ảnh sản phẩm phải có chiều rộng tối thiểu 200px và chiều cao tối thiểu 200px',
                'thumbnail.upload_failed' => 'Tải ảnh sản phẩm lên không thành công',
            ]);
            
            $validate = $request->validate();
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());
              
                $response  = new Response();
                $response->redirect('them-san-pham');
            }
          
            $data = $request->getFields();
            $data['thumbnail'] =  $request->uploadImage($data['thumbnail']);
            $data['slug'] = $this->generateSlug($data['name']);
            $data = $request->except($data, ['id']); 
            $result = $this->products->insertProduct($data); 

            if (!$result) {
                Session::flash('msg', 'Thêm sản phẩm thành công');
                $response  = new Response();
                $response->redirect('danh-sach-san-pham');
                
            }
        }
    }
    public function list()
    {
        
        $this->data['sub_content']['categories'] = $this->categories->getList();

        $request = new Request();

        $id = $request->getFields();
        

        if (isset($id['id_category_'])) {
            $this->data['sub_content']['products'] = $this->products->getListProductsCategories(intval($id['id_category_']));
        } else {
            $this->data['sub_content']['products'] = $this->products->getListProducts();
        }

        $this->data['sub_content']['title'] = 'Danh Sách Sản Phẩm';
        $this->data['content'] = 'admin/products/list';
        $this->data['sub_content']['action'] = 'danh-sach-san-pham';
        $this->render('layouts/admin_layout', $this->data);
    }


    public function delete()
    {
       
        $request = new Request();

        $id = $request->getFields();
        $product = $this->model('ProductModel');
        $product->deleteProduct($id['id']);
        $response  = new Response();
        $response->redirect('danh-sach-san-pham');
    }

    public function update()
    {

       

       
        $request = new Request();

        $id = $request->getFields();
        $id = $id['id'];
      
        $this->data['sub_content']['action'] = "sua-san-pham?id=$id";
        $this->data['sub_content']['categories'] = $this->categories->getList();
        $this->data['sub_content']['product'] = $this->products->getDetailProduct($id);
        $this->data['sub_content']['title'] = 'Sửa Sản Phẩm';
        $this->data['content'] = 'admin/products/add';
        $this->render('layouts/admin_layout', $this->data);
        if ($request->isPost()) {
            $request->rules([
                'name' => 'required|min:5|max:30',
                'price' => 'required|numeric|min:18000',
                'sale_price' => 'required|numeric|min:18000',
                'category_id' => 'required',
                'content' => 'required|min:10|max:255',
                'thumbnail' => 'image|size|resolution|upload_failed',
            ]);

            $request->messages([
                'name.required' => 'Tên sản phẩm không được để trống',
                'name.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
                'name.max' => 'Tên sản phẩm không được dài quá 30 ký tự',
                'price.required' => 'Giá sản phẩm không được để trống',
                'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 10000',
                'category_id.required' => 'Loại sản phẩm không được để trống',
                'sale_price.required' => 'Giá khuyến mãi sản phẩm không được để trống',
                'sale_price.min' => 'Giá khuyến mãi sản phẩm phải lớn hơn hoặc bằng 10000',
                'content.required' => 'Mô tả sản phẩm không được để trống',
                'content.min' => 'Mô tả sản phẩm phải có ít nhất 10 ký tự',
                'content.max' => 'Mô tả sản phẩm không được dài quá 255 ký tự',

                'thumbnail.image' => 'Ảnh sản phẩm phải là một tệp hình ảnh',
                'thumbnail.size' => 'Ảnh sản phẩm không đủ kích thước tối thiểu',
                'thumbnail.resolution' => 'Ảnh sản phẩm phải có chiều rộng tối thiểu 200px và chiều cao tối thiểu 200px',
                'thumbnail.upload_failed' => 'Tải ảnh sản phẩm lên không thành công',
            ]);
           
            $validate = $request->validate();
            if (!$validate) {
                Session::flash('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
                Session::flash('errors', $request->errors());
                Session::flash('old', $request->getFields());
               
                $response  = new Response();
                $response->redirect("sua-san-pham?id=$id");
            }
          
            $data = $request->getFields();
            $data['thumbnail'] =  $request->uploadImage($data['thumbnail']);
            $data['slug'] = $this->generateSlug($data['name']);
            $result = $this->products->updateProduct($data, $id); 

            if (!$result) {
                Session::flash('msg', 'Sửa sản phẩm thành công');
                $response  = new Response();
                $response->redirect('danh-sach-san-pham');
                
            }
        }
    }

}
