<?php

class OrdersModel extends Model
{
    private $_table = 'orders';

    function tableFill()
    {
        return 'orders';

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
        $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getListOrder()
    {
        $data = $this->db->table('orders')->orderBy('id', 'DESC')->get();
        return $data;
    }  
    
    public function updateOrder($data, $id)
    {
        $this->db->table('orders')->where('id', '=', $id)->update($data);
    }

    public function deleteOrder($id)
    {
        $this->db->table('orders')->where('id', '=', $id)->delete();
    }
    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('orders')->get();
        return $data;
    }

}
