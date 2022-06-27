<?php 
namespace App\Controllers;
use App\Controllers\MyController;
class UserController extends MyController
{
    public function index(){
        $data = ['title'=>'Register'];
        return view('user/register',$data);
    }
    public function logout(){
        session('loggedUser');
        session()->destroy();
        return redirect()->to('/');
    }
    public function save_register(){
        if ($imagefile = $this->request->getFile('avatar')) {
            if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                $newName = $imagefile->getName();
                $imagefile->move('public/uploads', $newName);
            }
        }
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            'confirm_password' => 'required|min_length[5]|max_length[12]|matches[password]',
        ]);
        if
        (!$validation){
            return redirect('register', ['validation' => $this->validator]);
        }else{
            $data = [
            'name'=>$this->request->getpost('name'),
            'email'=>$this->request->getpost('email'),
            'password' => $this->request->getpost('password'),
            'avatar'=> $newName,
         ];
         $this->user->AddField($data);
      }
      return redirect()->to('/');
    }
    public function check_login(){
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[user.email]',
                'errors' => [
                    'required' => 'email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered on our server'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'password is required',
                    'min_length' => 'password has not have at least 5 characters in length',
                    'max_length' => 'password must not have more than 12 characters in length',
                ]
            ]
        ]);
        if (!$validation) {
            return view('login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $_COOKIE['email'] = $email;
            $_COOKIE['password'] = $password;
            setcookie("email", $email, time() + (86400 * 30), "/"); //;
            setcookie("password", $password, time() + (86400 * 30), "/"); //
            $user_info = $this->user->where('email', $email)->first();
            $check_password = $this->user->where('password', $password)->first();
            if ($check_password) {
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to(base_url('user_main'));
            } else {
                session()->setFlashdata('fail', 'incorrect password');
                return redirect()->to(base_url('login'))->withInput('status', 'unsuccessful');
            }
        }
    }
    function checkuser(){
        $email =$this->request->getpost('email');
        $getcheck = $this->user->getWhere(['email' => $email]);
        $a = 0;
            foreach ($getcheck->getResult() as $row) {
                $a =$row->email;
            }
        if($a !=0){
             echo "<span style='color:red;'>email already exist </span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }else{
            echo "<span style='color:green'> User available for Registration .</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
    }
    function checkusername()
    {
        $name = $this->request->getpost('name');
        $getcheck = $this->user->getWhere(['name' => $name]);
        $a = 0;
        foreach ($getcheck->getResult() as $row) {
            $a = $row->name;
        }
        if ($a != 0) {
            echo "<span style='color:red;'>name already exist </span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        } else {
            echo "<span style='color:green'> User available for Registration .</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
    }
    function checkuserlog()
    {
        $email = $this->request->getpost('email');
        $getcheck = $this->user->getWhere(['email' => $email]);
        $a = 0;
        foreach ($getcheck->getResult() as $row) {
            $a = $row->email;
        }
        if ($a != 0) {
            echo "<span style='color:green;'>Correctly input</span>";
        } else {
            echo "<span style='color:red'>incorrectly email</span>";
        }
    }
    function checkuserpass()
    {
        $password = $this->request->getpost('password');
        $getcheck = $this->user->getWhere(['password' => $password]);
        $a = 0;
        foreach ($getcheck->getResult() as $row) {
            $a = $row->password;
        }
        if ($a != 0) {
            echo "<span style='color:green;'>Correctly input</span>";
        } else {
            echo "<span style='color:green'>incorrectly email</span>";
        }
    }
    function check(){
        $data = [
            'title'=>'welcom',
            'error'=>'incorrect email or password',
        ];
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $_COOKIE['email'] = $email;
        $_COOKIE['password'] = $password;
        setcookie("email", $email, time() + (86400 * 30), "/"); //;
        setcookie("password", $password, time() + (86400 * 30), "/"); //
        $user_info = $this->user->where('email', $email)->first();
        $check_password = $this->user->where('password', $password)->first();
        if ($check_password) {
            $user_id = $user_info['id'];
            session()->set('loggedUser', $user_id);
            return redirect()->to(base_url('employee_view'));
        } else {
           return view('welcome',$data);
        }
    }
}  