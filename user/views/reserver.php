    <link rel="stylesheet" href="./public/css/style2.css">
    <title>Hello, world!</title>
  </head>
<body>


<?php   
// if(isset($_SESSION['logged']) && $_SESSION['logged']===true)
// {
    // echo "<script>alert('yes');</script>";
    $user=new UserController();
    $depart=$user->gettVilleDepart();
    $arriver=$user->gettVilleArriver();
    if(isset($_POST['search']))
    {
        $a=$_POST['a'];
        $res=substr($a,0,1);
        $sr=new UserController();
        $all=$sr->searchVole();
    }
    if(isset($_POST['reserver']))
    {
        $re=$_POST['inc'];
        $var3=intval($re);
    }
    if(isset($_POST['ar']))
    {
       $dt=new ReservationController();
       $dt->addReservation();
    }
// }
    
?>

<nav class="navbar navbar-light bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASE_URL;?>home" style="margin-left: 10px;"><h2>Aérienne</h2></a>
        <form class="d-flex">
            <a href="#"  class="shop"><i class="las la-user"></i></a>
            <a href="#" style="border-right:2px solid #fff ; height: 40px; margin: auto 10px auto 10px;" ></a>
            <a href="#" class="shop"><i class="las la-shopping-cart"></i></a>
        </form>
    </div>
</nav>
<div class="container">
    <h1>Acheter mon billet</h1>
    <p>Pour mieux apprécier vos voyages, Aérienne met à votre disposition chaque jour et à chaque moment de la journée, des trains et des autocars vers vos destinations préférées.
        Ils relient toutes les villes du Royaume en trajets directs ou avec correspondances. Réservez sans tarder vos billets et pensez à anticiper vos achats pour profiter des meilleurs prix.
        Bon voyage sur nos lignes !
    </p>
    <form method="post" >
        <div class="card-body">
            <div class="row">
            <div class="col">
                <label for="prenom">Mon Trajet *</label>
                <select name="ville_depart" class="form-select" aria-label="Default select example" required>
                  <option selected disabled>Ville Départ</option>
                    <?php foreach($depart as $re):?>
                        <option  value="<?php echo $re['ville_depart'];?>"> <?php echo $re['ville_depart'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            
            <div class="col">
                <label for="prenom"></label>
                <select name="ville_arrive" class="form-select" aria-label="Default select example" required>
                  <option selected disabled>Ville d'arrivée</option>
                    <?php foreach($arriver as $ar):?>
                        <option   value="<?php echo $ar['ville_arrive'];?>"> <?php echo $ar['ville_arrive'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="col">
                <label for="prenom">Mes dates *</label>
                <input type="date" name="datearive" class="form-control" >
            </div>
            <div class="col">
                <div class="form-group" id="test">
                <label for="mat" ></label> 
                <input type="date"  name="datearive" class="form-control" >
                </div>
            </div>

            </div>
            <div class="row">
                <div class="col ">
                    <label for="prenom">Je choisis le nombre de passagers</label>
                    <div class="dropdown" >
                        <input type="text" id="textBox" name="a" class="textBox" value="1 Passager" readonly>
                        <i class="las la-user"></i>
                        <div class="wrapper option">
                            <span  class="minus">-</span>
                            <span  class="num">1</span>
                            <span  class="plus">+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer ">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button style="width: 100px;" type="submit" name="search" class="btn btn-primary">Rechercher</button>
            </div>  
        </div> 
    </form>

    <?php if(!empty($all)){ ?>
        <div id="table">
            <div class=" end mt-4">
                <div class="table-responsive" >
                <table class="table caption-top mt-3">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Date Depart</th>
                        <th scope="col">Ville Depart</th>
                        <th scope="col">Date Arrive</th>
                        <th scope="col">Ville Arrive</th>
                        <th scope="col">Prix</th>
                        <th>Réserver</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all as $in):?>
                            <tr>
                                <td scope="row"><?= $in['date_depart'];?></td>
                                <td><?= $in['ville_depart'];?></td>
                                <td><?= $in['date_arrive'];?></td>
                                <td><?= $in['ville_arrive'];?></td>
                                <td><?= $in['prix_voyage']." MAD";?></td>
                                <form method="post">
                                    <input type="hidden" name="inc" value="<?= $res;?>">
                                    <td><button type="submit" name="reserver" class="btn btn-info">Réserver</button></td>
                                </form>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<?php if(isset($_POST['reserver'])){?>
    <form method="post" id="info">
      <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                INFORMATION de VOYAGEUR
            </div>
            <div class="card-body">
                <?php for ($i = 1; $i <=$var3; $i++){ ?>
                    <input type="hidden" name="inc" value="<?= $var3;?>">
                    <br>
                    <div class="row">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nom*</label>
                            <input type="text" class="form-control" name="<?= 'nom'.$i; ?>" id="formGroupExampleInput" placeholder="Nom" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Prenom*</label>
                            <input type="text" class="form-control" name="<?= 'prenom'.$i; ?>" id="formGroupExampleInput2" placeholder="Prenom" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Date de Naissance*</label>
                            <input type="date" name="<?= 'datenaissance'.$i; ?>" class="form-control" >
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="card-footer">
                <button style="width: 100px;" type="submit" name="ar" class="btn btn-primary">Reserver</button>
            </div>
        </div>
      </div>

    </form>
<?php }?>

<script src="./public/js/main2.js"></script>