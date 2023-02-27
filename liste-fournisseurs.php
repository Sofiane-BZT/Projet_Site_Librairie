<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="script.js" defer></script>
    <title>Affichage Liste Fournisseurs</title>
</head>
<body class="bg-secondary">


<?php
include "header-connecte.php";
?>

<?php
include "connexion.php";
?>

<div class="table-responsive-md w-90 border-primary bg-primary-subtle m-5 rounded">
  <table class="table">

<tbody  >
        <tr>
            <th scope=col>ID</th>
            <th scope=col>Nom</th>
            <th scope=col>Code</th> 
            <th scope=col>Raison_S</th>
            <th scope=col>Rue</th>
            <th scope=col>CP</th>
            <th scope=col>Localité</th>
            <th scope=col>Pays</th>
            <th scope=col>Tél</th>
            <th scope=col>Url</th>
            <th scope=col>E-mail</th>
            <th scope=col>Fax</th>
        </tr><BR>
<?php

            try{
                  $requete = $BD->prepare("SELECT * FROM Fournisseur");
                  $requete->execute();

                  while($obj = $requete->fetch(PDO::FETCH_OBJ)){

                  ?>
                  <tr>
                     <th scope=row><?= $obj->Id_fournisseur ?></th>
                     <td><?=$obj->Nom_fournisseur ?></td>
                      <td><?=$obj->Code_fournisseur ?></td>
                      <td><?=$obj->Raison_sociale ?></td>
                      <td><?=$obj->Rue_fournisseur ?></td>
                      <td><?=$obj->Code_postal ?></td>
                      <td><?=$obj->Localite ?></td>
                      <td><?=$obj->Pays ?></td>
                      <td><?=$obj->Tel_fournisseur ?></td>
                      <td><?=$obj->Url_fournisseur ?></td>
                      <td><?=$obj->Email_fournisseur?></td>
                      <td><?=$obj->Fax_fournisseur ?></td>
                      <td><?=$obj->Nb_pages ?></td>
                      <?php if($_SESSION['statut'] != 0){

                      echo "<td><a href='modif-fournisseur.php?id=<?= $obj->Id_fournisseur?>'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                           </svg></a></td>";


                     echo "<td><a href='delete-four-traitement.php?id=<?= $obj->Id_fournisseur?>'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg text-danger' viewBox='0 0 16 16'>
                        <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                         </svg></a></td>";
                      }
                      ?>
                      </tr>
              <?php
              }
            } catch (PDOException $e){

              die("<p> Echec de la connexion. Erreur[".$e->getCode()."] : ".$e->getMessage()."</p>");
}
?>
            </tbody> 
            </table>
          </div>
          </body>
          </html>