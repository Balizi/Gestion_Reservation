<?php
    
    if(isset($_POST['submit']))
    {
        $createUser=new adminContoller();
        $createUser->register();
    }
    // print_r($employes);
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Inscription</h3>
                </div>
                <div class="card-body bg-lghit">
                    <form method="post" class="mr-1" >
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nom & Prenom" name="fullname" >
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" placeholder="Email" name="username" >
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="password" placeholder="Mot de passe" name="password" >
                        </div>
                        <button name="submit" class="btn btn-sm btn-primary mt-4">Inscription</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?=BASE_URL;?>login" class="btn btn-link">Conexion</a>
                </div>
            </div>
        </div>
    </div>
</div>