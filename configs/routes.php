<?php
$routes['default_controller'] = 'admin';
/**
 * đường dẫn ảo =>  Đường dẫn thật
 */

 // Đăng nhập
$routes['dang-nhap'] = 'admin/login';
$routes['dang-nhap-google'] = 'admin/loginGoogle';
$routes['dang-ky'] = 'register';

$routes['san-pham'] = 'product';
$routes['them-san-pham'] = 'product/add';
$routes['danh-sach-san-pham'] = 'product/list';
$routes['xoa-san-pham'] = 'product/delete';
$routes['sua-san-pham'] = 'product/update';
$routes['trang-chu'] = 'admin/page';
$routes['danh-sach-don-hang'] = 'orders/list';
$routes['danh-sach-binh-luan'] = 'comments/list';
$routes['danh-sach-danh-muc'] = 'categories/list';
$routes['them-danh-muc'] = 'categories/add';
$routes['sua-danh-muc'] = 'categories/update';
$routes['xoa-danh-muc'] = 'categories/delete';
$routes['them-nguoi-dung'] = 'users/add';
$routes['sua-nguoi-dung'] = 'users/update';
$routes['xoa-nguoi-dung'] = 'users/delete';
$routes['danh-sach-nguoi-dung'] = 'users/list';
$routes['cap-nhat-don-hang'] = 'orders/update';
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';

/**
 * Trang Cliens
 */

$routes['ds-san-pham'] = 'clientproduct/products';
$routes['chi-tiet-san-pham'] = 'clientproduct/detail';
$routes['gio-hang'] = 'cart/cart';


