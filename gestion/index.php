<?php
    require_once './views/includes/headre.php';
    require_once './controllers/homeController.php';
    require_once './controllers/voyageurController.php';
    require_once './controllers/adminController.php';
    require_once './autoload.php';

    $home =new HomeController();
    $pages=['addClient','deleteClient','homeClient','updateClient','homeVoyage','addVoyage','updateVoyage','deleteVoyage','login','register','logout','homeReservation'];
if(isset($_SESSION['adminLogged']) && $_SESSION['adminLogged']===true)
{
    if(isset($_GET['page']))
    {
        if(in_array($_GET['page'],$pages))
        {
            $home->index($_GET['page']);
        }
        else
        {
            include('./views/includes/404.php');
        }
    }else{
        $home->index('homeVoyage');
    }
    require_once './views/includes/footer.php';
    // $home->index($_GET['page']);
}else if(isset($_GET['page']) && $_GET['page'] ==='register'){
    $home->index('register');
}else{
    $home->index('login');
}


?>