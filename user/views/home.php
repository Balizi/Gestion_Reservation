<?php

  require_once 'app/classes/Redirect.php';

  $home=new HomeController();


  $user=new UserController();
  $depart=$user->gettVilleDepart();
  $arriver=$user->gettVilleArriver();
  if(isset($_POST['search']))
  {
    $sr=new UserController();
    $dt=$sr->searchVole();
    $ser='search';
  }
  if(isset($_POST['redirect']))
  {
    // die(var_dump($_SESSION));
    if(isset($_SESSION['Userlogged']) && $_SESSION['Userlogged']===true)
    {
      Redirect::to('reserver');
    }
    else if(isset($_GET['page']) && $_GET['page'] ==='register')
    {
      $home->index('register');
    }
    else
    {
      $home->index('login');
      echo "<script> document.getElementById('sec').style.display='none'; </script>";
      // echo "<script>alert('yes');</script>";
    }
  }

  $vd;
  $va;
  $dt;

?>

    <link rel="stylesheet" href="./public/css/style.css">
    <title>Hello, world!</title>
  </head>
<body>

<div class="sec" id="sec">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap
          </a>
        </div>
      </nav>
      <h1>your experience start Here</h1>


      <div class="col-md-6 card" >
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="true" href="#">HORAIRES</a>
            </li>
          </ul>
        </div>
        <form method="post" action="home">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <label for="prenom">Ville Départ*</label>
                <select name="ville_depart" class="form-select" aria-label="Default select example" required>
                  <option selected disabled>Ville Départ</option>
                    <?php foreach($depart as $re):?>
                        <option  value="<?php echo $re['ville_depart'];?>"> <?php echo $re['ville_depart'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="mat">Aller Simple*</label>
                  <input type="date" name="datearive" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="prenom">Ville d'arrivée*</label>
                <select name="ville_arrive" class="form-select" aria-label="Default select example" required>
                  <option selected disabled>Ville d'arrivée</option>
                    <?php foreach($arriver as $ar):?>
                        <option   value="<?php echo $ar['ville_arrive'];?>"> <?php echo $ar['ville_arrive'];?></option>
                    <?php endforeach;?>
                </select>
              </div>
              <div class="col">
                <div class="form-group" id="test">
                  <label for="mat" >Aller Retoure*</label>
                  <input type="date" autocomplete="off"  name="datearive" class="form-control" >
                </div>
              </div><br>
              <div class="mt-3">
                <input type="radio" onclick="chose()" id="rd1" name="r1" checked>
                <label >Aller Simple</label>
                <input type="radio" onclick="chose()" id="rd2" name="r1" >
                <label >Aller Retoure</label>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <button style="width: 100px;" type="submit" name="search" class="btn btn-primary">Chercher</button>
            </div>  
          </div> 
        </form>
      </div>
    </div>
    <?php if(!empty($dt)){?>
        <div class="col-md-6 end mt-4">
            <label for="formGroupExampleInput" class="form-label "><h3>Résultats :</h3></label>
            <div class="d-flex justify-content-center mt-4">
                <div class="col-md-3 bg-info card-header">Départ le : 2000/03/16</div>
                <div class="col-md-4 bg-info card-header" style="margin-left: 20px;">Relation : <?php echo $_POST['ville_depart'];?>-<?php echo $_POST['ville_arrive'];?></div>
        </div>
        <div class="table-responsive">

        
        <table class="table caption-top mt-3">
            <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Départ</th>
                <th scope="col">Arrivé</th>
                <!-- <th scope="col">Handle</th> -->
                <!-- <th scope="col">Handle</th> -->
                <!-- <th scope="col">Handle</th> -->
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($dt as $in):?>
                    <tr>
                        <!-- <th scope="row"><?php echo $in['idV'];?></th> -->
                        <td><?php $date= $in['date_depart']; $date=strtotime($date);echo date('H:i:s',$date);?></td>
                        <td><?php $date= $in['date_arrive'];$date=strtotime($date); echo date('H:i:s',$date);?></td>
                        <!-- <td><?php $vd=$in['ville_depart'] ?></td> -->
                        <!-- <td><?php  ?></td> -->
                        <!-- <td><?php  ?></td> -->
                        <!-- <td><a href="<?php //echo BASE_URL;?>reserver" name="" class="btn bg-warning">ACHETER EN LIGNE</a></td> -->
                        <form action="" method="post">
                          <td><button type="submit" name="redirect" class="btn bg-warning">ACHETER EN LIGNE</button></td>
                        </form>
                    </tr>
                    <?php endforeach;?>
            </tbody>
            
        </table>
        </div>
    <?php }if(empty($dt) && isset($_POST['search'])){?>
        <label for="formGroupExampleInput" class="form-label "><h3>Résultats :</h3></label>
        <div class="alert alert-info"></div>
    <?php }?>
</div>

<script src="./public/js/main.js"></script>