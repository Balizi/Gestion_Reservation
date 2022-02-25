<?php

class adminContoller
{
    public function Auth()
    {
        if(isset($_POST['sr']))
        {
            $data['username']=$_POST['username'];
            $res=Admin::Login($data);
            if($res->username === $_POST['username']  && password_verify($_POST['password'],$res->password))
            {
                $_SESSION['adminLogged']=true;
                $_SESSION['username']=$res->username;
                Redirect::to('homeVoyage');
            }else{
                echo $res;
                echo "<script>alert('no');</script>";
                Redirect::to('login');
            }
        }
    }

    public function register()
    {
        if(isset($_POST['submit']))
        {
            $optins=[
                'cost'=>12
            ];
            $password= password_hash($_POST['password'],PASSWORD_BCRYPT,$optins);
            $data=array(
                'fullname'=>$_POST['fullname'],
                'username'=>$_POST['username'],
                'password'=>$password
            );
            // die(print_r($data));
            $res=Admin::CreateAdmin($data);
            if($res==='OK')
            {
                Session::set('success','Compte crie');
                Redirect::to('login');
            }
        }
    }


    public static function logout()
    {
        session_destroy();
    }

}

?>