<?php

    if(isset($_POST['id']))
    {
        $dele=new ReservationController();
        $dele->Delete();
    }

?>