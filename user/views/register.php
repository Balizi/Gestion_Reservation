<?php
    
    // if(isset($_POST['submit']))
    // {
    //     $createUser=new UsersController();
    //     $createUser->register();
    // }
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
                            <input class="form-control" type="text" placeholder="Nom" name="nom" required>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" placeholder="Prenom" name="prenom" required>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="tel" placeholder="Télephone" name="telephone " required>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="email" placeholder="Email" name="email" >
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="password" placeholder="Mot de passe" name="pass" required>
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