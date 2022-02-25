<?php

class UserController{
    
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
            return $res;
        }
    }

}

?>