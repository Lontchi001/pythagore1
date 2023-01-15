<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet1', 'root', '');
if (isset($_GET['id']) and $_GET['id'] > 0) {
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM user WHERE id = ? ');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/all.min.css" rel="stylesheet">
  <script src="vendor/bootstrap.bundle.min.js"></script>
  <script src="vendor/all.min.js"></script>
  <link rel="stylesheet" href="css/styleC.css">
  <script>function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }</script>
  <title>accueil</title>
</head>

<body style="background:#b9afafa2">



  <div class="topnav" id="myTopnav">
  <a href="javascript:void(0);" id="ico" onclick="myFunction()"> 
  <i class="fas fa-window-close"></i></a> 
      <br>
    <a href="http://localhost:8080/Projet/Accueil.php#"><i class="fas fa-home"></i> Accueil</a>
    
   
    <?php
  if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
    ?>
    <a href="http://localhost:8080/Projet/compte_edit.php?id=<?php echo $userinfo['id']?>"><i class="far fa-edit"></i> Editer profil</a>
    <a href="déconnexion.php" id="dec" align="center"> Se déconnecter</a>
    <?php
  }
    ?>
  </div>
  <a href="javascript:void(0);" id="icon" onclick="myFunction()"> 
      <i class="fa fa-bars"></i></a>
    <h5 style="float: right; margin: 18px 18px 0px 0;";> <strong>Email:</strong>   <?php echo $userinfo['email']; ?></h5>
  <!-- image -->
  <br /><br />
  <?php if (!empty($userinfo['tof'])) { ?>

  <img style="border-radius: 50%; border: .5px solid #31313556;;" src="images/avatar/<?php echo $userinfo['tof'];?>" width="150px" height="140px">
  <?php
  } ?>
  <?php if (empty($userinfo['tof'])) { ?>

  <img style="border-radius: 50%; border: .5px solid #31313556;;" src="images/avatar/Capture.JPG" width="150px" height="140px">
  <?php
  } ?>

  <br /><br />




  <h2 style="align:center;">Profil de: <strong>
      <?php echo $userinfo['Nom'] . " " . $userinfo['Prénom']; ?>
    </strong>
    

  </h2>
  <div class="content-body">
    <!-- row -->
    <div class="container-fluid">
      <div class="row">
        <div>
          <div class="col-lg-12 ">
            <div class="card">
              <div class="row" >
                <div class="profile-personal-info pt-4">
                  <h4 class="text-primary mb-4" style="padding-bottom: 10px;padding-top: 10px;">Informations personnelles</h4>
                  <hr>
                  <div class="row mb-4">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                      <h5 class="w-500">Nom <span class="">:</span>
                      </h5>
                    </div>
                    <div class="col-lg-9 col-sm-6 col-6"><span>
                        <?php echo $userinfo['Nom']; ?>
                      </span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                      <h5 class="">Prénom <span class="">:</span>
                      </h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                        <?php echo $userinfo['Prénom']; ?>
                      </span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                      <h5 class="f-w-500">Date de naissance <span class="pull-right">:</span>
                      </h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                        <?php echo $userinfo['datedenaissance']; ?>
                      </span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                      <h5 class="f-w-500">Lieu de naissance <span class="pull-right">:</span>
                      </h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                        <?php echo $userinfo['Lieu']; ?>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Sexe <span class="pull-right">:</span>
                    </h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['Sexe']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                    </h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['email']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Téléphone <span class="pull-right">:</span>
                    </h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['telephone']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Pays <span class="pull-right">:</span></h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['pays']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Ville <span class="pull-right">:</span></h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['Ville']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Plus grand diplôme<span class="pull-right">:</span></h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['Diplome']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Année d'obtention <span class="pull-right">:</span></h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['Annee']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Formation désirée <span class="pull-right">:</span></h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['Formation']; ?>
                    </span>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <h5 class="f-w-500">Pseudo <span class="pull-right">:</span></h5>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>
                      <?php echo $userinfo['pseudo']; ?>
                    </span>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
    
   

<a class="btn btn-dark" id="btn" href="compte-p.php?id= <?php echo $userinfo['id']; ?>">Imprimer</a>

              
</body>

</html>
<?php
}
?>