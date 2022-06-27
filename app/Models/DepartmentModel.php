<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\MyModel;

class DepartmentModel extends MyModel
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['department_name'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    public function __construct()
    {
        parent::__construct($this->table);
    }
}
