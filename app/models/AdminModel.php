<?php

/*
 * ke thua tu class model 
 */

class AdminController extends Model
{
    protected $_table = 'users';

    function __construct()
    {
        parent::__construct();
    }

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

    public function findUserByUsername($username)
    {
        $query = $this->where('username', ' = ', $username);

        return $query->first();
    }

    public function findUserByEmail($email)
    {
        $query = $this->where('email', ' = ', $email);

        return $query->first();
    }







}
