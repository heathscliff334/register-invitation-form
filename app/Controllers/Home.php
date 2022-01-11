<?php

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\HomeModel;

class Home extends BaseController{
    public function __construct(){
        $this->home = new HomeModel();
    }
    public function index(){
        if(isset($_GET['invitation-number']) && isset($_GET['activated'])){
            $custCode = $_GET['invitation-number'];
            $activated = $_GET['activated'];
            $user = $this->home->getUser($custCode);
            if($user){
                if($user['is_active'] == 0){
    
                    $data = array(  'title' => 'Point IS - Registration Form',
                                    'user' => $user);
                    // echo "<script>console.log('Invitation Number :".$custCode."')</script>";
                    // echo "<script>console.log('Activated :".$activated."')</script>";
                    return view('home/home', $data);
                } else {
                    $data = array(  'title' => 'Point IS - Account Activated',
                                    'content' => 'Your account has been activated.');
                    return view('home/default_page', $data);
                }

            }else {
                $data = array(  'title' => 'Point IS - Not Found',
                                'content' => 'Your invitation number is not found.');
                return view('home/default_page', $data);
            }
            
        } else {
            $data = array(  'title' => 'Point IS - Not Found',
                            'content' => 'Sorry, the page you are looking for could not be found.');
            return view('home/default_page', $data);   
        }
        
    }
    public function submitForm(){
        $res = array();
        if(!empty($_POST['custId']) && !empty($_POST['fullName']) && !empty($_POST['birthday']) && !empty($_POST['password']) && !empty($_POST['phone'])){
            $fullName = $_POST['fullName'];
            $phone = $_POST['phone'];
            $birthday = $_POST['birthday'];
            $password = $_POST['password'];
            $custCode = $_POST['custId'];
            $expDate = date('Y-m-d',strtotime('+1 year'));
            $data = array(
                'nama_cst'  => strtoupper($fullName),
                'birthday'  => $birthday,
                'password'  => md5($password),
                'telp'      => $phone,
                'exp_poin'  => $expDate,
                'is_active' => 1
            );
            $update = $this->home->updateUser($data, $custCode);
            if($update){
                $res['error'] = false; 
                $res['status'] = 'success';
                $res['kode_cust'] = $custCode;
                $res['data']=$data;
                echo json_encode($res);
            } else {
                $res['error'] = true; 
                $res['status'] = 'failed to update db';
                $res['kode_cust'] = $custCode;
                echo json_encode($res);
            }

        } else {
            $res['errorMessage'] ="* Cannot be blank";
            $res['error'] = true; 
            $res['status'] = 'failed';
            echo json_encode($res);
        }
    }
}
