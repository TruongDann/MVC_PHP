<?php

/*
 * ke thua tu class model 
 */

class HomeModel extends Model
{
    protected $_table = 'product';

    function tableFill()
    {
        return 'product';
    }

    function fieldFill()
    {
        return '';
    }

    function primaryKey()
    {
        return 'id';
    }

    public function findUserByEmail($email)
    {
        $result =$this->db->table('users')->where('email', ' = ', $email)->first();
        return $result;
    }

    public function getListProduct()
    {

        // $result =  $this->db->insert('product', $data);
        // $result = $this->db->table('product')->orderBy('id', 'DESC')->whereLike('name', '%quang%')->limit(3)->get();
        $result = $this->db->table('product as p')->join('users as u', 'p.user_id = u.id')->get();
        return $result;
        // $this->db->where('id', '>', 3);
    }

    public function getDetailProduct($name)
    {
        $this->db->table('product')->whereLike('name', $name)->get();
    }
    public function insertProduct($data)
    {
        $this->db->table('product')->insert($data);
        return $this->db->lastId();
        // $this->db->table('product')->where('id', '=', 194)->update($data);
    }
    public function deleteProduct($id)
    {
        $this->db->table('product')->where('id', '=', $id)->delete();
    }
}
