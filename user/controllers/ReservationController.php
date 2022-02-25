<?php



class ReservationController
{


    public function addReservation()
    {
        if(isset($_POST['ar']))
        {
            $nb=intval($_POST['inc']);
            for($i=1;$i<=$nb;$i++)
            {
                $data=array('nom'=>$_POST['nom'.$i],
                            'prenom'=>$_POST['prenom'.$i],
                            'datenaissance'=>$_POST['datenaissance'.$i]
                    );
                Reservation::add($data);
            }
            
        }
    }

}

?>