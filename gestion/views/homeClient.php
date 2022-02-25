<?php
    $voyageure=new voyageurController();
    $vg=$voyageure->getAllVoyageur();
    // echo $vg['nom'];
    // die(print_r($vg));
?>
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span>Aérienne</span></h2>
        </div>

        <div class="sidebare-menu">
            <ul>
                <li>
                    <a href="homeVoyage">
                        <i class="las la-plane-departure"></i>
                        <span>Voyage</span>
                    </a>
                </li>
                <li>
                    <a href="reservation.html">
                        <i class="las la-ticket-alt"></i>
                        <span>Reservation</span>
                    </a>
                </li>
                <li>
                    <a href="homeClient" class="active">
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
                <img src="./public/img/pic.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4></h4>
                    <a href="<?php echo BASE_URL;?>logout"><small>Déconexion</small></a>
                </div>
            </div>
        </header>
    </div>
    <main role="main" style="width: 80%;" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3>Client</h3>
        <hr>
        <div class="table-responsive">
            <a href="homeClient" class="btn btn-sm btn-secondary mr-2 mb-2">
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
                        <th>Email</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date Naissance</th>
                        <th>Télephone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($vg as $vo):?>
                  <tr >
                    <th scope="row"><?= $vo['id_Voyageur'];?></th>
                    <td><?= $vo['email']; ?></td>
                    <td><?= $vo['nom'];?></td>
                    <td><?= $vo['prenom']?></td>
                    <td><?= $vo['datenaissance']?></td>
                    <td><?= $vo['telephone']?></td>
                    <td class="d-flex flex-row">
                        <div class="d-flex flex-row m-auto">
                            <form action="updateClient" method="post">
                                <input type="hidden" name="id" value="<?=$vo['id_Voyageur'];?>">
                                <button type="submit" name="submit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            </form>
                            <form action="deleteClient" method="post" class="ml-1">
                                <input type="hidden" name="id" value="<?=$vo['id_Voyageur'];?>">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
        </div>
        
    </main>