<?php
require_once './models/Voyageur.php';
class voyageurController
{
    public function getAllVoyageur()
    {
        $voyageur=Voyageur::getAll();
        return $voyageur;
    }

    public function getOneVoyageur()
    {
        if(isset($_POST['id']))
        {
            $data=array('id'=>$_POST['id']);
            $emp=Voyageur::getVoyageur($data);
            return $emp;
        }
    }

    public function updateVoyageur()
    {
        if(isset($_POST['update']))
        {
            $data=array(
                'id_Voyageur'=>$_POST['id'],
                'email'=>$_POST['email'],
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'datenaissance'=>$_POST['dns'],
                'telephone'=>$_POST['telephone'],
            );
            $res=Voyageur::update($data);
            // die(print_r($data));
            if($res==='OK')
            {
                Redirect::to('homeClient');
            }else{
                echo $res;
            }
        }
    }

    public function deleteVoyageur()
    {
        if(isset($_POST['id']))
        {
            $data['id']=$_POST['id'];
            $result=Voyageur::delete($data);
            if($result==='OK')
            {
                // header('location:'.BASE_URL);
                // Session::set('Success','Produit Supprimé');
                Redirect::to('homeClient');
            }else{
                echo $result;
            }
        }
    }


}


?>