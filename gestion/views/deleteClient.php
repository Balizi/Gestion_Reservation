<?php
    if(isset($_POST['id']))
    {
        $exitProduct = new voyageurController();
        $exitProduct->deleteVoyageur();
    }
    
?>