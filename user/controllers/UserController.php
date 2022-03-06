<?php

require_once 'app/classes/Redirect.php';
require_once 'app/classes/Session.php';

class UserController{

    public function Auth()
    {
        if(isset($_POST['submit']))
        {
            $data['email']=$_POST['email'];


            // die(var_dump($_SESSION['user']));


            $res=User::Login($data);
            if($res==='OK')
            {
                Redirect::to('reserver');
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
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'telephone'=>$_POST['telephone'],
                'email'=>$_POST['email'],
                'password'=>$password
            );
            $res=User::CreateUser($data);
            if($res==='OK')
            {
                Redirect::to('login');
            }
        }
    }

    public static function logout()
    {
        session_destroy();
    }

    
    public function gettAllVoyage()
    {
        $test=Voyage::gettAll();
        return $test;
    }

    public function gettVilleDepart()
    {
        $villeDepart=Voyage::getVilleDepart();
        return $villeDepart;
    }

    public function gettVilleArriver()
    {
        $villeDepart=Voyage::getVilleArrive();
        return $villeDepart;
    }

    public function searchVole()
    {
        if(isset($_POST['search']))
        {
            $data=array(
                'ville_depart'=>$_POST['ville_depart'],
                'ville_arrive'=>$_POST['ville_arrive']
            );
            $res=Voyage::searchVole($data);
            Session::set('info','Compte Créer');
            return $res;
        }
    }

}

?>