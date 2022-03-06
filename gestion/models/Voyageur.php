<?php

class Voyageur{


    static public function getAll()
    {
        $stmt=DB::Connect()->prepare('SELECT * FROM user');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    static public function getAllReservation()
    {
        $stmt=DB::Connect()->prepare('SELECT * FROM `reservation` ORDER BY idVoyage');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }


    static public function getVoyageur($data)
    {
        try
        {
            $stmt=DB::Connect()->prepare('SELECT * FROM Voyageur WHERE id_Voyageur =:id');
            $stmt->bindParam(':id',$data['id']);
            $stmt->execute();
            $employe=$stmt->fetch(PDO::FETCH_OBJ);
            return $employe;
        }
        catch(PDOException $e)
        {
            return 'Error'.$e->getMessage();
        }
    }

    static public function update($data)
    {
        $stmt=DB::Connect()->prepare('UPDATE Voyageur set email=:email,nom=:nom,prenom=:prenom,datenaissance=:datenaissance,telephone=:telephone WHERE id_Voyageur=:id');
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':datenaissance',$data['datenaissance']);
        $stmt->bindParam(':telephone',$data['telephone']);
        $stmt->bindParam(':id',$data['id_Voyageur']);
        $stmt->execute();
        if($stmt->execute())
        {
            return 'OK';
        }
        else{
            return 'error';
        }
    }

    static public function delete($data)
    {
        $id=$data['id'];
        try{
            $query="DELETE FROM voyageur WHERE id_Voyageur=:id";
            $stmt=DB::Connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            if($stmt->execute())
            {
                return 'OK';
            }
        }
        catch(PDOExecption $ex)
        {
            echo 'Error'.$ex->getMessage();
        }
    }


}

?>