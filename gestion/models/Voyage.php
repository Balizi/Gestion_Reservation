<?php

class voyage{

    static public function getAll()
    {
        $stmt=DB::Connect()->prepare('SELECT * FROM voyage');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }


    static public function add($data)
    {
        $quey='INSERT INTO voyage(date_depart,ville_depart,date_arrive,ville_arrive,prix_voyage,nomber_place) VALUES(:date_depart,:ville_depart,:date_arrive,:ville_arrive,:prix_voyage,:nomber_place)';
        $stmt=DB::Connect()->prepare($quey);
        $stmt->bindParam(':date_depart',$data['date_depart']);
        $stmt->bindParam(':ville_depart',$data['ville_depart']);
        $stmt->bindParam(':date_arrive',$data['date_arrive']);
        $stmt->bindParam(':ville_arrive',$data['ville_arrive']);
        $stmt->bindParam(':prix_voyage',$data['prix_voyage']);
        $stmt->bindParam(':nomber_place',$data['nomber_place']);
        if($stmt->execute())
        {
            return 'OK';
        }
    }

    public static function getVoyage($data)
    {
        try
        {
            $stmt=DB::Connect()->prepare('SELECT * FROM voyage WHERE idV =:id');
            $stmt->bindParam(':id',$data['id']);
            $stmt->execute();
            $voyag=$stmt->fetch(PDO::FETCH_OBJ);
            return $voyag;
        }
        catch(PDOException $e)
        {
            return 'Error'.$e->getMessage();
        }
    }

    static public function update($data)
    {
        $stmt=DB::Connect()->prepare('UPDATE voyage set date_depart=:date_depart , ville_depart=:ville_depart , date_arrive=:date_arrive , ville_arrive=:ville_arrive , prix_voyage=:prix_voyage , nomber_place=:nomber_place WHERE idV=:id');
        $stmt->bindParam(':date_depart',$data['date_depart']);
        $stmt->bindParam(':ville_depart',$data['ville_depart']);
        $stmt->bindParam(':date_arrive',$data['date_arrive']);
        $stmt->bindParam(':ville_arrive',$data['ville_arrive']);
        $stmt->bindParam(':prix_voyage',$data['prix_voyage']);
        $stmt->bindParam(':nomber_place',$data['nomber_place']);
        $stmt->bindParam(':id',$data['id']);

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
            $query="DELETE FROM voyage WHERE idV=:id";
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

    static public function searchProduit($data)
    {
        $search=$data['search'];
        try{
            $query="SELECT * FROM voyage WHERE idV LIKE ?";
            $stmt=DB::Connect()->prepare($query);
            $stmt->execute(array('%'.$search.'%'));
            return $stmt->fetchAll();
        }
        catch(PDOExecption $ex)
        {
            echo 'Error'.$ex->getMessage();
        }
    }


}


?>