<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class MyController extends BaseController
{
    public $employee;
    public $department;
    public $user;
    public function __construct()
    {
        $this->employee = new EmployeeModel();
        $this->department = new DepartmentModel();
        $this->user = new UserModel();
    }
}
