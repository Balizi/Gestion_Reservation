<?php


class Reservation
{

    public static function add($data)
    {
        $quey='INSERT INTO reservation(nom,prenom,datenaissance,idVoyage,idUser) VALUES(:nom,:prenom,:datenaissance,:idVoyage,:idUser)';
        $stmt=DB::Connect()->prepare($quey);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':datenaissance',$data['datenaissance']);
        $stmt->bindParam(':idVoyage',$data['idVoyage']);
        $stmt->bindParam(':idUser',$data['idUser']);
        $stmt->execute();
    }


    public static function Check($data)
    {
        try{
            $db=new PDO('mysql:dbname=reservation;host=localhost','root','');
            $query='SELECT * FROM reservation WHERE idVoyage=?';
            $stmt=$db->prepare($query);
            $stmt->execute(array($data['idV']));
            $nb=$stmt->rowCount();
            return $nb;
        }
        catch(PDOExecption $ex)
        {
            echo 'Error'.$ex->getMessage();
        }
    }

    public static function Reservation($data)
    {
        $query="SELECT vo.ville_depart,vo.date_depart,vo.ville_arrive,vo.date_arrive,re.nom,re.prenom,re.NumRes,us.telephone,us.email from voyage as vo JOIN reservation as re on vo.idV=re.idVoyage JOIN user as us on re.idUser=us.id where us.id=:id";
        $stmt=DB::Connect()->prepare($query);
        $stmt->bindParam(':id',$data['id']);
        $stmt->execute();
        // echo '<pre>';
        return $stmt->fetchAll();
    }

    static public function delete($data)
    {
        $id=$data['id'];
        try{
            $quey='DELETE FROM reservation WHERE NumRes=:id';
            $stmt=DB::Connect()->prepare($quey);
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