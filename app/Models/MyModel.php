<?php

/**
 * @author Van Dong
 * @Emai: lodong601@gmail.com
 * Create at: 16/02/2022
 */
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class MyModel extends Model{
    protected $table ='';
    function __construct($table)
    {
        $this->table = $table;
        $this->db = db_connect();
        $this->db->table($table);
        parent::__construct();
    }
    public function GetField()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->get();
        return $query;
    }
    public function AddField($data)
    {
        $builder = $this->db->table($this->table);
        $query = $builder->insert($data);
        return $query;
    }
    public function getId($value)
    {
        $builder = $this->table($this->table);
        $query = $builder->getWhere(['id' => $value]);
        return $query;
    }
    public function EditField($data, $id)
    {
        $builder = $this->table($this->table);
        $query = $builder->update($data, $id);
        return $query;
    }
    public function updateWhere($id, $data)
    {
        $builder = $this->table($this->table);
        $builder->where('id', $id);
        $query = $builder->update($id, $data);
        return $query;
    }
    public function DeleteField($id)
    {
        $builder = $this->table($this->table);
        $builder->where('id', $id);
        $query = $builder->delete();
        return $query;
    }
    public function checkuser($email){
         $builder = $this->table($this->table);
         $query = $builder->where('email', $email);
         return $query;
    }
    public function searchmaxage($key){
        $builder = $this->table($this->table);
        $builder->selectMax($key);
        $query = $builder->get();
        return $query;
    }
    public function searchmaxsalary($key)
    {
        $builder = $this->table($this->table);
        $builder->selectMax($key);
        $query = $builder->get();
        return $query;
    }
    public function searchminage($key)
    {
        $builder = $this->table($this->table);
        $builder->selectMin($key);
        $query = $builder->get();
        return $query;
    }
}