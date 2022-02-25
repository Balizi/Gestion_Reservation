<?php

class Voyage{
    public static function gettAll()
    {
        $stmt=DB::Connect()->prepare('SELECT * FROM voyage');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    public static function getVilleDepart()
    {
        $stmt=DB::Connect()->prepare('SELECT ville_depart FROM voyage ORDER BY ville_depart');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    public static function getVilleArrive()
    {
        $stmt=DB::Connect()->prepare('SELECT ville_arrive FROM voyage ORDER BY ville_arrive');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    public static function searchVole($data)
    {
        try{
            $stmt=DB::Connect()->prepare('SELECT * FROM voyage WHERE ville_depart=:ville_depart AND ville_arrive =:ville_arrive');
            $stmt->bindParam(':ville_depart',$data['ville_depart']);
            $stmt->bindParam(':ville_arrive',$data['ville_arrive']);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch(PDOExecption $ex)
        {
            echo 'Error'.$ex->getMessage();
        }
    }

}

?>