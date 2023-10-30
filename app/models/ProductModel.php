<?php

class ProductModel extends Model
{
    private $_table = 'products';
    private $_field = 'p.id, p.name, p.content, c.name_category, p.price, p.sale_price, p.thumbnail';

    function tableFill()
    {
        return 'products';

    } 
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }


    public function getList()
    {
        $data = $this->db->query("SELECT $this->_field FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getListTopProducts() {
        $data = $this->db->query("SELECT
          $this->_field,
          COUNT(od.product_id) AS soLuongBan,
          (COUNT(od.product_id) / (SELECT COUNT(*) FROM order_detail WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()))) * 100 AS tiLeBan
      FROM products AS p
      LEFT JOIN order_detail AS od ON p.id = od.product_id
      WHERE MONTH(od.created_at) = MONTH(CURRENT_DATE()) AND YEAR(od.created_at) = YEAR(CURRENT_DATE())
      GROUP BY p.name
      ORDER BY tiLeBan DESC")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
      }
      

    public function getListProducts()
    {
        $data = $this->db->select($this->_field)->table('products as p')->join('categories as c', 'p.category_id = c.id')->get();
        return $data;
    }

    public function getListProductsCategories($id)
    {
        $data = $this->db->select($this->_field)->table('products as p')->join('categories as c', 'p.category_id = c.id')->where('p.category_id', '=', $id)->get();
        return $data;
    }
    
    public function getDetailProduct($id)
    {
        $data = $this->db->table('products')->where('id', '=', $id)->first();
        return $data;
    }

    public function insertProduct($data)
    {
        $this->db->table('products')->insert($data);
    }

    public function updateProduct($data, $id)
    {
        $this->db->table('products')->where('id', '=', $id)->update($data);
    }

    public function deleteProduct($id)
    {
        $this->db->table('products')->where('id', '=', $id)->delete();
    }
    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('products')->get();
        return $data;
    }

}
