<?php

require_once './controllers/HomeController.php';
// require_once './controllers/UserController.php';
require_once './autoload.php';
require_once './views/includes/headre.php';

$user=new HomeController();
$pages=['home','add','delete','update','reserver','deleteReservation','login','register','logout','reservation'];
if(isset($_GET['page']))
{
    if(in_array($_GET['page'],$pages))
    {
        $user->index($_GET['page']);
    }
    else
    {
        include('views/includes/404.php');
    }
}
else
{
    $user->index('home');
}
    require_once './views/includes/footer.php';

?>