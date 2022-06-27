<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\MyModel;

class EmployeeModel extends MyModel
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name','age','address','phone_number','department_name','gender','salary_rate','identify_number','avatar'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    public function __construct()
    {
        parent::__construct($this->table);
    }
}
