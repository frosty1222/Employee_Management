<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\MyModel;

class UserModel extends MyModel
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name','email','password','avatar'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    public function __construct()
    {
        parent::__construct($this->table);
    }
    public function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    public function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }
    public function passwordHash(array $data)
    {
        if (!isset($data['data']['password']))
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}
