<?php
    if(isset($_POST['sr']))
    {
        echo "<script>alert('click');</script>";
        $createUser=new adminContoller();
        $createUser->Auth();
    }
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Conexion</h3>
                </div>
                <div class="card-body bg-lghit">
                    <form method="post" class="mr-1"  >
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="username" name="email" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control mt-2" type="password" placeholder="Mot de passe" name="password" required>
                        </div>
                        <button type="submit" name="sr" class="btn btn-sm btn-primary mt-4">Conexion</button>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                    </form>
                </div>
                <div class="card-footer">
                    <!-- <h3 class="text-center">Conexion</h3> -->
                    <a href="<?php echo BASE_URL;?>register" class="btn btn-link" >Inscription</a>
					<!-- <a href="<?php echo BASE_URL;?>register" class="btn btn-link">Inscription</a> -->
				</div>
            </div>
        </div>
    </div>
</div>