<?php


if(isset($_POST['id']))
{
    $exitProduct = new ReservationController();
    $exitProduct->deleteReservation();
}

?>