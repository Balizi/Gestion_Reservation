<?php

    if(isset($_POST['find']))
    {
        $test=new voyageController();
        $tmp=$test->findProduit();
        // die(print_r($tmp));
    }
    else
    {
        $test=new voyageController();
        $tmp=$test->getAllVoyage();
        // die(print_r($tmp));
    }

?>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span>Aérienne</span></h2>
        </div>

        <div class="sidebare-menu">
            <ul>
                <li>
                    <a href="homeVoyage" class="active">
                        <i class="las la-plane-departure"></i>
                        <span>Voyage</span>
                    </a>
                </li>
                <li>
                    <a href="homeReservation">
                        <i class="las la-ticket-alt"></i>
                        <span>Reservation</span>
                    </a>
                </li>
                <li>
                    <a href="homeClient" >
                        <i class="las la-users"></i>
                        <span>Client</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                <!-- Dashboard -->
            </h2>
            <div class="user-wrapper">
                <img src="./public/img/re.png" width="40px" height="40px" alt="">
                <div>
                    <h4></h4>
                    <a href="<?php echo BASE_URL;?>logout"><small>Déconexion</small></a>
                </div>
            </div>
        </header>
    </div>
    <main role="main" style="width: 80%;" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3>Voyage</h3>
        <hr>
        <div class="table-responsive">
            <a href="addVoyage" class="btn btn-sm btn-primary mr-2 mb-2">
                <i class="fas fa-plus"></i>
            </a>
            <a href="homeVoyage" class="btn btn-sm btn-secondary mr-2 mb-2">
                <i class="fas fa-home"></i>
            </a>
            <form method="post" class="float-right mb-2 d-flex flex-row">
                <input type="number" min="1" class="form-control" name="search" placeholder="Recherche par N°">
                <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <table class="table table-sm table-dark">
                <thead>
                    <tr class="table-active">
                        <th>#</th>
                        <th>Date Départ</th>
                        <th>Ville Départ</th>
                        <th>Date d'arrivée</th>
                        <th>Ville d'arrivée</th>
                        <th>Prix Voyage</th>
                        <th>Nomber de Place</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tmp as $vg):?>
                  <tr >
                    <th scope="row"><?= $vg['idV'];?></th>
                    <td><?= $vg['date_depart'];?></td>
                    <td><?= $vg['ville_depart'];?></td>
                    <td><?= $vg['date_arrive'];?></td>
                    <td><?= $vg['ville_arrive'];?></td>
                    <td><?= $vg['prix_voyage'].' $';?></td>
                    <td><?= $vg['nomber_place'];?></td>
                    <td class="d-flex flex-row">
                        <div class="d-flex flex-row m-auto">
                            <form action="updateVoyage" method="post">
                                <input type="hidden" name="id" >
                                <button type="submit" name="submit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                <input type="hidden" name="id" value="<?= $vg['idV'];?>">
                            </form>
                            <form action="deleteVoyage" method="post" class="ml-1">
                                <input type="hidden" name="id" value="<?= $vg['idV'];?>">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </main>