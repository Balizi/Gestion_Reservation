<?php



class ReservationController
{


    public function addReservation()
    {
        if(isset($_POST['add']))
        {
            $nb=intval($_POST['inc']);
            for($i=1;$i<=$nb;$i++)
            {
                $data=array('nom'=>$_POST['nom'.$i],
                            'prenom'=>$_POST['prenom'.$i],
                            'datenaissance'=>$_POST['datenaissance'.$i],
                            'idVoyage'=>$_POST['idd'],
                            'idUser'=>$_POST['idUser2']
                    );
                Reservation::add($data);
                
            }
            echo "<script>alert('Réservation Effectué');</script>";
        }
    }

    public function seeReservation()
    {
        if(isset($_POST['check']))
        {
            $data=array(
                'id'=>$_POST['idValue']
            );
            return Reservation::Reservation($data);
        }
    }

    public function deleteReservation()
    {
        if(isset($_POST['id']))
        {
            $data['id']=$_POST['id'];
            $result=Reservation::delete($data);
            if($result==='OK')
            {
                Redirect::to('reserver');
                echo "<script>alert('Réservation Annuler');</script>";
            }else{
                echo $result;
            }
        }
    }


    public function checkNbPlace()
    {
        if(isset($_POST['reserver']))
        {
            $data=array(
                'idV'=>$_POST['idV']
            );
            return Reservation::Check($data);
            // die(var_dump(Reservation::Check($data)));
        }
        
    }


}

?>