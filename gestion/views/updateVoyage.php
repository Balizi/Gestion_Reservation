<?php

    if(isset($_POST['id']))
    {
        $add=new voyageController();
        $voo=$add->getOneVoyage();
    }
    else
    {
        echo "<script>alert('yes')</script>";
        Redirect::to('homeVoyage');
    }

    if(isset($_POST['upp']))
    {
        $upda=new voyageController();
        $upda->updateVoyage();
        // echo "<script>alert('No');</script>";
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
                        Modier un voyage
                    </div>
                    <div class="card-body bg-light">
                        <a href="homeVoyage" class="btn btn-sm btn-secondary mr-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <form method="post">
                            <div class="form-group">
                                <label for="nom">Date & Heure Départ*</label>
                                <input type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', strtotime($voo->date_depart));?>" name="datedepart" class="form-control" required>
                                <input type="hidden" name="id" value="<?= $voo->idV;?>">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Ville Départ*</label>
                                <input type="text" value="<?= $voo->ville_depart;?>" name="villeDepart" class="form-control" placeholder="ville départ" required>
                            </div>
                            <div class="form-group">
                                <label for="mat">Date & Heure d'arrivée*</label>
                                <input type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', strtotime($voo->date_arrive));?>" name="datearive" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="depart">Ville d'arrivée*</label>
                                <input type="text" value="<?= $voo->ville_arrive;?>" name="villearive" class="form-control" placeholder="ville d'arrivée" required>
                            </div>
                            <div class="form-group">
                                <label for="poste">Prix*</label>
                                <input type="number" value="<?= $voo->prix_voyage;?>" name="prix" min="1" class="form-control" placeholder="prix" required>
                            </div>
                            <div class="form-group">
                                <label for="poste">Nomber Place*</label>
                                <input type="number" value="<?= $voo->nomber_place;?>" name="nbplace" min="1" class="form-control" placeholder="Nombre Place" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="upp" class="btn btn-primary">Modifier</button>
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