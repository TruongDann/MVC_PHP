<?php

class CommentsModel extends Model
{
    private $_table = 'comments';
    private $_field = "c.id, s.role, s.name AS 'name_user', p.name AS 'name_product', c.content, c.created_at ";

    function tableFill()
    {
        return 'comments';
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

    public function getListComments()
    {
        $data = $this->db->select($this->_field)
            ->table('comments c')
            ->join('users as s', 's.id = c.id_user')
            ->join('products as p', 'p.id = c.id_product') 
            ->get();
        return $data;
    }

    public function getListCommentsProduct($id)
    {
        $data = $this->db->select('s.name, c.id, c.content, c.created_at')->table('comments c')->join('users as s', 's.id = c.id_user')->where('c.id_product', '=', $id)->get();
        return $data;
    }

    public function getListCommentsNewUpload()
{
    $data = $this->db->select('s.name, c.id, c.content, c.created_at')
        ->table('comments c')
        ->join('users as s', 's.id = c.id_user')
        ->orderBy('c.created_at', 'DESC')
        ->limit(3) 
        ->get();

    return $data;
}

    public function getDetailCommentsProductReply($id)
    {
        $data = $this->db->select('s.name, c.id, c.id_reply, c.content, c.created_at')->table('comments c')->join('users as s', 's.id = c.id_user')->where('c.id_product', '=', $id)->where('(c.id_reply', 'IS NOT NULL OR', 'c.id = c.id_reply)')->get();
        return $data;
    }
    public function getCommentsProduct($name_product)
    {
        $data = $this->db->select($this->_field)
            ->table('comments c')
            ->join('users as s', 's.id = c.id_user')
            ->join('products as p', 'p.id = c.id_product') 
            ->whereLike('p.name', $name_product)
            ->get();
        return $data;
    }
    public function getDetailComment($id)
    {
        $data = $this->db->select('s.name, c.id, c.id_product, c.content, c.created_at')->table('comments c')->join('users as s', 's.id = c.id_user')->where('c.id', '=', $id)->first();
        return $data;
    }

    public function insertComment($data)
    {
        $this->db->table('comments')->insert($data);
    }

    public function updateComment($data, $id)
    {
        $this->db->table('comments')->where('id', '=', $id)->update($data);
    }

    public function deleteComment($id)
    {
        $this->db->table('comments')->where('id', '=', $id)->delete();
    }

    public function count()
    {
        $data = $this->db->select('COUNT(id) As soLuong')->table('comments')->get();
        return $data;
    }
}
