<?php


class Reservation
{

    public static function add($data)
    {
        $quey='INSERT INTO reservation(nom,prenom,datenaissance) VALUES(:nom,:prenom,:datenaissance)';
        $stmt=DB::Connect()->prepare($quey);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':datenaissance',$data['datenaissance']);
        $stmt->execute();
    }
}



?>