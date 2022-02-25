<?php
    if(isset($_POST['id']))
    {
        $one=new voyageurController();
        $vo=$one->getOneVoyageur();
    }
    else
    {
        Redirect::to('homeClient');
    }
    if(isset($_POST['update']))
    {
        $up=new voyageurController();
        $up->updateVoyageur();
    }


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="./style.css">

    <title>Pilot</title>
  </head>
  <body>

    <div class="container " style="margin-top: 140px; margin-left: auto; margin-right: auto;" >
        <div class="row my-4">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Modifier les information d'un client
                    </div>
                    <div class="card-body bg-light">
                        <a href="homeClient" class="btn btn-sm btn-secondary mr-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <form method="post">
                            <div class="form-group">
                                <label for="nom">Email*</label>
                                <input type="email" name="email" value="<?= $vo->email;?>" class="form-control" placeholder="Email" required>
                                <input type="hidden" name="id" value="<?= $vo->id_Voyageur;?>">
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom*</label>
                                <input type="text" name="nom" value="<?= $vo->nom;?>" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prenom*</label>
                                <input type="text" name="prenom" value="<?= $vo->prenom;?>" class="form-control" placeholder="Prenom" required>
                            </div>
                            <div class="form-group">
                                <label for="dns">Date Naissance*</label>
                                <input type="date" name="dns" value="<?= $vo->datenaissance;?>" class="form-control" placeholder="Date d'ariver" required>
                            </div>
                            <div class="form-group">
                                <label for="dns">Telephone*</label>
                                <input type="tel" name="telephone" value="<?= $vo->telephone;?>" class="form-control" placeholder="Télephone"  required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>