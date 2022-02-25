<?php


class voyageController{

    public function getAllVoyage()
    {
        $voyage=voyage::getAll();
        return $voyage;
    }


    public function addVoyage()
    {
        if(isset($_POST['add']))
        {
            $data=array('date_depart'=>$_POST['datedepart'],
                    'ville_depart'=>$_POST['villeDepart'],
                    'date_arrive'=>$_POST['datearive'],
                    'ville_arrive'=>$_POST['villearive'],
                    'prix_voyage'=>$_POST['prix'],
                    'nomber_place'=>$_POST['nbplace']
                    );
            $res=voyage::add($data);
            if($res=='OK')
            {
                Redirect::to('homeVoyage');
            }
        }
    }

    public function getOneVoyage()
    {
        if(isset($_POST['id']))
        {
            $data=array('id'=>$_POST['id']);
            $voya=voyage::getVoyage($data);
            return $voya;
        }
    }

    public function updateVoyage()
    {
        if(isset($_POST['upp']))
        {
            $data=array('date_depart'=>$_POST['datedepart'],
                    'ville_depart'=>$_POST['villeDepart'],
                    'date_arrive'=>$_POST['datearive'],
                    'ville_arrive'=>$_POST['villearive'],
                    'prix_voyage'=>$_POST['prix'],
                    'nomber_place'=>$_POST['nbplace'],
                    'id'=>$_POST['id']
                    );   
            $res=voyage::update($data);
            if($res=='OK')
            {
                Redirect::to('homeVoyage');
            }
        }
    }

    public function deleteVoyage()
    {
        if(isset($_POST['id']))
        {
            $data['id']=$_POST['id'];
            $result=voyage::delete($data);
            if($result==='OK')
            {
                // header('location:'.BASE_URL);
                // Session::set('Success','Produit Supprimé');
                Redirect::to('homeVoyage');
            }else{
                echo $result;
            }
        }
    }


    public function findProduit()
    {
        if(isset($_POST['search']))
        {
            $data=array('search'=>$_POST['search']);
        }
        $produit=voyage::searchProduit($data);
        return $produit;
    }


}


?>