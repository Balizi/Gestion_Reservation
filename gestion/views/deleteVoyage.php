<?php
    if(isset($_POST['id']))
    {
        $exitProduct = new voyageController();
        $exitProduct->deleteVoyage();
    }
    
?>