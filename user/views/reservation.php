<?php
    
    // echo "<script>alert('$id');</script>";
    // if(isset($_POST['check']))
    // {
    //   $id=$_POST['idValue'];
    //   $val=new ReservationController();
    //   $value=$val->seeReservation();
    // }

    // $val=new ReservationController();
    // $value=$val->seeReservation();

    // if(isset($_POST['submit']))
    // {
    //   $rr=$_POST['id'];
    //   echo "<script>alert('$rr');</script>";
    // }
    if(isset($_POST['anuller']))
    {
      $rr=$_POST['id'];
      echo "<script>alert('$rr');</script>";
    }else{
      $val=new ReservationController();
      $value=$val->seeReservation();
    }

?>    
    
    <link rel="stylesheet" href="./public/css/style2.css">
    <title>Hello, world!</title>
  </head>
<?php if(isset($_POST['check'])):?>
  <body>
    <nav class="navbar navbar-light bg-danger">
        <div class="container-fluid">
          <a class="navbar-brand" style="margin-left: 10px;"><h2>Aérienne</h2></a>
          <form class="d-flex" method="post" action="<?php echo BASE_URL;?>reserver">
            <button id="user" type="submit" > <i class="las la-arrow-left"></i></button>
            <a href="#" style="border-right:2px solid #fff ; height: 40px; margin: auto 10px auto 10px;" ></a>
            <button id="shop" type="submit" ><i class="las la-shopping-cart"></i></button>
            <a class="navbar-brand" href="<?php echo BASE_URL;?>logout" style="margin-left: 10px;"><h5>Déconnexion</h5></a>
          </form>
        </div>
    </nav>
    <?php if(!empty($value)):?>
      <div class="container">
          <h1>Mes Réservation</h1>
      </div>
      <div class="sec">
        <div class="col-md-6 end mt-4">
          <div class="table-responsive" >
            <table class="table caption-top mt-3">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Ville Depart</th>
                  <th scope="col">Date Depart</th>
                  <th scope="col">Ville Arrive</th>
                  <th scope="col">Date Arrive</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">telephone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Annulation</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($value as $va):?>
                  <tr>
                    <td><?= $va['ville_depart'];?></td>
                    <td><?= $va['date_depart'];?></td>
                    <td><?= $va['ville_arrive'];?></td>
                    <td><?= $va['date_arrive'];?></td>
                    <td><?= $va['nom'];?></td>
                    <td><?= $va['prenom'];?></td>
                    <td><?= $va['telephone'];?></td>
                    <td><?= $va['email'];?></td>
                    <td> 
                      <form action="delete" method="post">
                        <input type="hidden" name="id" value="<?= $va['NumRes'];?>">
                        <button name="anuller" type="submit" class="btn btn-info">Annuler</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php endif;?>
    <?php if(empty($value)):?>
      <div class="container">
          <h1>Aucune Réservation</h1>
      </div>
    <?php endif;?>
    <?php endif;?>


  <script src="main2.js"></script>