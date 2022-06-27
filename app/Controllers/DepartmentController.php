<?php

namespace App\Controllers;
use App\Controllers\MyController;
class DepartmentController extends MyController
{
    public function index(){
        $data = [
            'title'=>'Department view',
        ];
        $data['department'] = $this->department->paginate('6','department');
        $email = $_COOKIE['email'];
        $data['avatar'] = $this->user->getWhere(['email' => $email]);
        $data['pager'] = $this->department->pager;
        return view('department/view_department',$data);
    }
    public function add_department(){
        $data = [
            'title'=>'Add Department view',
        ];
        $email = $_COOKIE['email'];
        $data['avatar'] = $this->user->getWhere(['email' => $email]);
        return view('department/add_department',$data);
    }
    public function save_department(){
        $data=[
            'department_name'=>$this->request->getpost('department_name'),
        ];
        $this->department->AddField($data);
        return redirect()->to('department_view');
    }
    public function edit_department($id){
       $data=[
           'title'=>'Edit Department view',
       ];
        $email = $_COOKIE['email'];
        $data['avatar'] = $this->user->getWhere(['email' => $email]);
       $data['department']=$this->department->find($id);
    //    echo '<pre/>';
    //    print_r($data['department']);
    //    die();
       return view('department/edit_department',$data);
    }
    public function update_department($id){
        $data = [
            'department_name' =>$this->request->getpost('department_name'),
        ];
        $this->department->EditField($id,$data);
        return redirect()->to('department_view');
    }
    public function delete_department($id){
        $this->department->DeleteField($id);
      return redirect()->to('department_view');
    }
    public function checkdepart(){
        $department = $this->request->getpost('department_name');
        $getcheck = $this->department->getWhere(['department_name' => $department]);
        $a = 0;
        foreach ($getcheck->getResult() as $row) {
            $a = $row->department_name;
        }
        if ($a != 0) {
            echo "<span style='color:red;'>incorrectly input</span>";
        } else {
            echo "<span style='color:green'>correctly email</span>";
        }
    }
}