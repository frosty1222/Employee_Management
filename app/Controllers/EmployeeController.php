<?php

namespace App\Controllers;
use App\Controllers\MyController;
class EmployeeController extends MyController
{
    public function index()
    {
        $data = ['title'=>'Home'];
        return view('welcome',$data);
    }
    public function employee_list(){
        if(!isset($_COOKIE['email'])){
            return redirect()->to('/');
        }
        $data = ['title'=>'Employee List'];
        $email = $_COOKIE['email'];
        $data['avatar'] = $this->user->getWhere(['email' => $email]);
        $search2 = $this->request->getGet('maxage');
        $search3 = $this->request->getGet('minage');
        $searchs= $this->request->getGet('maxsalary');
        $search = $this->request->getGet('search');
        $searchde = $this->request->getGet('search1');
        $selectmax = $this->employee->searchminage('age');
        foreach($selectmax->getResult() as $row){
            $key = $row->age;
        }
        $selectmin = $this->employee->searchmaxage('age');
        foreach ($selectmin->getResult() as $row) {
            $key2 = $row->age;
        }
        $selectsalary = $this->employee->searchmaxsalary('salary_rate');
        foreach ($selectsalary->getResult() as $row) {
            $key3 = $row->salary_rate;
        }
        // $keyarr = array($key);
        // echo '<pre/>';
        // print_r();
        // die();
        // echo '<pre/>';
        // print_r($row->salary_rate);
        // die();
        
        if($search2){
            $search =$key;
             $data['employee'] = $this->employee->like('age', $search)->paginate(6, 'employee');
        }else if($search3){
            $search = $key2;
            $data['employee'] = $this->employee->like('age', $search)->paginate(6, 'employee');
        }else{
            $data['employee'] = $this->employee->paginate(6, 'employee');
        }
        if (is_numeric($search)) {
            $data['employee'] = $this->employee->like('age', $search)->paginate(6, 'employee');
        } else if (is_string($search)) {
            $data['employee'] = $this->employee->like('name', $search)->paginate(6, 'employee');
        } else {
            $data['employee'] = $this->employee->paginate(6, 'employee');
        }
        if($searchs){
            $search=$key3;
            $data['employee'] = $this->employee->like('salary_rate',$search)->paginate(6, 'employee');
        }else if($searchde){
            $data['employee'] = $this->employee->where('department_name', $searchde)->paginate(6, 'employee');
        }

        $data['pager']=$this->employee->pager;
        return view('sub_file/employee_list',$data);
    }
    public function employee_view()
    {
        $data = ['title' => 'Employee view'];
        $email = $_COOKIE['email'];
        $data['avatar'] = $this->user->getWhere(['email' => $email]);
        $search2 = $this->request->getGet('maxage');
        $search3 = $this->request->getGet('minage');
        $searchs = $this->request->getGet('maxsalary');
        $search = $this->request->getGet('search');
        $searchde = $this->request->getGet('search1');
        $selectmax = $this->employee->searchminage('age');
        foreach ($selectmax->getResult() as $row) {
            $key = $row->age;
        }
        $selectmin = $this->employee->searchmaxage('age');
        foreach ($selectmin->getResult() as $row) {
            $key2 = $row->age;
        }
        $selectsalary = $this->employee->searchmaxsalary('salary_rate');
        foreach ($selectsalary->getResult() as $row) {
            $key3 = $row->salary_rate;
        }
        if ($search2) {
            $search = $key;
            $data['employee'] = $this->employee->like('age', $search)->paginate(10, 'employee');
        } else if ($search3) {
            $search = $key2;
            $data['employee'] = $this->employee->like('age', $search)->paginate(10, 'employee');
        } else {
            $data['employee'] = $this->employee->paginate(10, 'employee');
        }
        if (is_numeric($search)) {
            $data['employee'] = $this->employee->like('age', $search)->paginate(10, 'employee');
        } else if (is_string($search)) {
            $data['employee'] = $this->employee->like('name', $search)->paginate(10, 'employee');
        } else {
            $data['employee'] = $this->employee->paginate(10, 'employee');
        }
        if($searchs){
            $search=$key3;
            $data['employee'] = $this->employee->like('salary_rate',$search)->paginate(6, 'employee');
        }else if($searchde){
            $data['employee'] = $this->employee->where('department_name', $searchde)->paginate(6, 'employee');
        }

        $data['pager']= $this->employee->pager;
        return view('sub_file/view_employee', $data);
    }
    public function add_employee(){
        $data = ['title'=>'Add'];
        $email = $_COOKIE['email'];
        $data['avatar'] = $this->user->getWhere(['email' => $email]);
        $data['department'] =$this->department->GetField();
        return view('admin/add_new_employee',$data);
    }
    public function delete_employee($id){
        $this->employee->DeleteField($id);
        return redirect()->to('employee_list');
    }
    public function save_employee(){
        if ($imagefile = $this->request->getFile('avatar')) {
            if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                $newName = $imagefile->getName();
                $imagefile->move('public/uploads', $newName);
            }
        }
        $data=[
            'name'=>$this->request->getpost('name'),
             'birth_of_date'=>$this->request->getpost('birth_of_date'),
             'address'=>$this->request->getpost('address'), 
             'phone_number'=>$this->request->getpost('phone_number'), 
             'department_name'=>$this->request->getpost('department_name'), 
             'gender'=>$this->request->getpost('gender'), 
             'salary_rate'=>$this->request->getpost('salary_rate'), 
             'identify_number'=>$this->request->getpost('identify_number'),
             'avatar'=> $newName,
        ];
        // echo '<pre/>';
        // print_r($data);
        // die();
        $dat = $this->employee->AddField($data);
        if(isset($dat)){
            return redirect()->to('employee_view');
        }
    }
    public function main_view(){
         $data= ['title'=>'Main View'];
         $email = $_COOKIE['email'];        
         $data['employee'] = $this->employee->paginate(6, 'employee');
         $data['avatar'] = $this->user->getWhere(['email'=>$email]);
        return view('sub_file/main_view',$data);
    }
    public function checkuserphone()
    {
        $phone = $this->request->getpost('phone_number');
        $getcheck = $this->employee->getWhere(['phone_number' => $phone]);
        $a=0;
        foreach ($getcheck->getResult() as $row) {
            $a = $row->phone_number;
        }
        if ($a != 0) {
            echo "<span style='color:red;'>incorrectly input</span>";
        } else {
            echo "<span style='color:green'>correctly input</span>";
        }
    }
    public function edit_employee($id){
        $data = ['title'=>'Edit Home',];
        $data['employee'] = $this->employee->find($id);
        return view('admin/edit_employee',$data);
    }
    public function update_employee($id) {
        if ($imagefile = $this->request->getFile('avatar')) {
            if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                $newName = $imagefile->getName();
                $imagefile->move('public/uploads', $newName);
            }
        }
        $data = [
            'name'=>$this->request->getpost('name'),
            'birth_of_date'=>$this->request->getpost('birth_of_date'),
            'address'=>$this->request->getpost('address'),
            'phone_number'=>$this->request->getpost('phone_number'),
            'department_id'=>$this->request->getpost('department_id'),
            'gender'=>$this->request->getpost('gender'),
            'salary_rate'=>$this->request->getpost('salary_rate'),
            'identify_number'=>$this->request->getpost('identify_number'),
            'avatar' => $newName,
        ];
        $this->employee->EditField($id,$data);
        return redirect()->to('employee_list');
    }
    public function employee_detail($id){
        $data = ['title' => 'Employee Detail'];
        $data['employee'] =$this->employee->find($id);
        return view('sub_file/employee_detail',$data);
    }
}
