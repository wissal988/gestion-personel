<?php

session_start();
require_once('config.php');

$db = new PDO('mysql:host=localhost;dbname=baosem', 'root', '');


$query4 = "SELECT * FROM demande_conge";
$result4 = mysqli_query($con, $query4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="superadmin.css">
    <link rel="stylesheet" href="conge.css">
    <link rel="stylesheet" href="conge_depar.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Gestion des conges</title>
</head>
<body id="body-pd">
   <!--SIDE BAR-->
   <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="#" class="nav__logo">BAOSEM</a>
                    </div>
                    <div class="nav__list">
                        <a href="superadmin.html" class="nav__link ">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Acceuil</span>
                        </a>
                        <div  class="nav__link collapse" >
                            <ion-icon name="business-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Définition</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <?php if($_SESSION['role']== 'admin'){?>
                                <a href="admin_sup.php"class="nav__link " class="collapse__sublink" >Société</a>
                                <?php }?>
                                <a href="structure.php" class="collapse__sublink">Structure</a>
                                <a href="role.php" class="collapse__sublink">Roles</a>
                            </ul>
                        </div>
                    
                        
                        <a href="#" class="nav__link active">
                            <ion-icon name="calendar-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Congés</span>
                        </a>
                        <a href="#" class="nav__link">
                            <ion-icon name="ribbon-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Formation</span>
                        </a>
                        <a href="#" class="nav__link">
                             <ion-icon name="finger-print-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Suivi Abscences</span>
                        </a>
                        <a href="#" class="nav__link">
                            <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Parametres</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="nav__link">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">DECONNECTER</span>
                </a>
            </nav>
        </div>
        <main class="main-container">
            <div class="info--wrapper">
                <div class="main-title">
                <p class="font-weight-bold">Gestion des Congés</p>
                <div class="info">
                <div class="annuel">
                    <p>Exercice:</p>
                    <button></button>
                </div>
                <div class="annuel">    
                    <p>Exeption</p>
                    <button></button>
                </div>
            </div>
            <div class="wrap">
            <div class="search">
                <input type="text"  id="searchInput" oninput="searchTable()" class="searchTerm" placeholder="Recherche....">
                <button type="submit" class="searchButton">
                 <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </div>
                
                </div>
            </div> 
            <div class="info--wrapper">
             
                
             
             <div class="info1">
                <a href="formulaire.php" class="button-40" role="button">Faire votre demande de conge</a>
    <?php
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $query44 = "SELECT * FROM employees WHERE id_employees = " . $row4['d_employee'];
        $result44 = mysqli_query($con, $query44);
        if ($result44 && mysqli_num_rows($result44) > 0) {
            while ($row44 = mysqli_fetch_assoc($result44)) {
                $query444 = "SELECT * FROM departement WHERE id_departement = " . $row44['d_departement'];
                $result444 = mysqli_query($con, $query444);
                while ($row444 = mysqli_fetch_assoc($result444)) {
                        if ($row4['type_conge'] == 'annuel detente' && $row4['val_direct_general'] == '0' && $row4['val1_rh']) {
                            ?>
                            <h2> Demandes des congés Annuels</h2>
                            <table class="table-container">
                                <thead>
                                    <tr>
                                        <th>ID_Employe</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Nbr_jours</th>
                                        <th>Date_debut</th>
                                        <th>Date_fin</th>
                                        <th>Date_reprise</th>
                                        <th>Exercice</th>
                                        <th>validation</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                    <tr>
                                        <td><?php echo $row44['id_employees']; ?></td>
                                        <td><?php echo $row44['nom']; ?></td>
                                        <td><?php echo $row44['prenom']; ?></td>
                                        <td><?php echo $row4['nbr_jours']; ?></td>
                                        <td><?php echo $row4['date_d']; ?></td>
                                        <td><?php echo $row4['date_f']; ?></td>
                                        <td><?php echo $row4['reprise']; ?></td>
                                        <td><?php echo $row4['exercice']; ?></td>
                                        <td>
                                            <?php
                                                ?>
                                                <form action="conge_dg.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row4['id_demande']; ?>">
                                                    <input type="hidden" name="emp" value="<?php echo $row44['id_employees']; ?>">
                                                    <label for="eff">Validée ?</label>
                                                    <select name="eff" id="eff">
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                    <input type="submit" name="submit" value="Envoyer">
                                                </form>
                                               
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        } else if ($row4['type_conge'] == 'recuperation' && $row4['val_direct_general'] == '0' && $row4['val1_rh'] == '1') {
                            ?>
                            <h2> Demandes des congés de recuperation</h2>
                            <table class="table-container">
                                <thead>
                                    <tr>
                                        <th>ID_Employe</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Nbr_jours</th>
                                        <th>Date_debut</th>
                                        <th>Date_fin</th>
                                        <th>Date_reprise</th>
                                        <th>validation</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                    <tr>
                                        <td><?php echo $row44['id_employees']; ?></td>
                                        <td><?php echo $row44['nom']; ?></td>
                                        <td><?php echo $row44['prenom']; ?></td>
                                        <td><?php echo $row4['nbr_jours']; ?></td>
                                        <td><?php echo $row4['date_d']; ?></td>
                                        <td><?php echo $row4['date_f']; ?></td>
                                        <td><?php echo $row4['reprise']; ?></td>
                                        <td>
                                        <?php
                                                ?>
                                                <form action="conge_dg.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row4['id_demande']; ?>">
                                                    <input type="hidden" name="emp" value="<?php echo $row44['id_employees']; ?>">
                                                    <label for="eff">Effectué ?</label>
                                                    <select name="eff" id="eff">
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                    <input type="submit" name="submit" value="Envoyer">
                                                </form>
                                                
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        } else if ($row4['type_conge'] == 'exeption' && $row4['val_direct_general'] == '0' && $row4['val1_rh'] == '1') {
                            ?>
                            <h2> Demandes des congés exeptionnel</h2>
                            <table class="table-container">
                                <thead>
                                    <tr>
                                        <th>ID_Employe</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Nbr_jours</th>
                                        <th>Date_debut</th>
                                        <th>Date_fin</th>
                                        <th>Date_reprise</th>
                                        <th>validation</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                    <tr>
                                        <td><?php echo $row44['id_employees']; ?></td>
                                        <td><?php echo $row44['nom']; ?></td>
                                        <td><?php echo $row44['prenom']; ?></td>
                                        <td><?php echo $row4['nbr_jours']; ?></td>
                                        <td><?php echo $row4['date_d']; ?></td>
                                        <td><?php echo $row4['date_f']; ?></td>
                                        <td><?php echo $row4['reprise']; ?></td>
                                        <td>
                                        <?php
                                                ?>
                                                <form action="conge_dg.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row4['id_demande']; ?>">
                                                    <input type="hidden" name="emp" value="<?php echo $row44['id_employees']; ?>">
                                                    <label for="eff">Effectué ?</label>
                                                    <select name="eff" id="eff">
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                    <input type="submit" name="submit" value="Envoyer">
                                                </form>
                                                
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                    }
                }
            }
        }
    
    ?>
    <?php
if (isset($_POST['submit'])) {
    $selectedOption = $_POST['eff'];
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if ($selectedOption == 'oui') {
            $query = "UPDATE demande_conge SET val_direct_general = 1 WHERE id_demande = ?";
        } elseif ($selectedOption == 'non') {
            $query = "UPDATE demande_conge SET val_direct_general = 2 WHERE id_demande = ?";
        }

        $stmt = $con->prepare($query);
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
        } else {
            echo "Erreur de préparation de la requête.";
        }
    }
}
?>

<p>Etat des demandes :</p>
<table class="table-container" id="employeesTable">
    <thead>
        <tr>
            <th>ID_Employe</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Type_demande</th>
            <th>Niveau</th>
            <th>Etat de traitement</th>
        </tr>
    </thead>
    <tbody style="background-color: white;">
    <?php
$stm = $db->prepare('SELECT * FROM demande_conge');
$stm->execute();
$r = $stm->fetchAll();
foreach ($r as $line4) {
    $requete44 = "SELECT * FROM employees WHERE id_employees = " . $line4['d_employee'];
    $resultat44 = mysqli_query($con, $requete44);
    if ($resultat44 && mysqli_num_rows($resultat44) > 0) {
        while ($line44 = mysqli_fetch_assoc($resultat44)) {
            $requete444 = "SELECT * FROM departement WHERE id_departement = " . $line44['d_departement'];
            $resultat444 = mysqli_query($con, $requete444);
            while ($line444 = mysqli_fetch_assoc($resultat444)) {
                
             if ( $line4['val_direct_general'] == '1' ) { 
?>
                    <tr>
                        <td><?php echo $line44['id_employees']; ?></td>
                        <td><?php echo $line44['nom']; ?></td>
                        <td><?php echo $line44['prenom']; ?></td>
                        <td><?php echo $line4['type_conge']; ?></td>
                        <?php if ( $line4['val_direct_general'] == '1'  && $line4['val2_rh'] == '0') { ?> 
                            <td>Ressource Humaines</td>
                            <td>En attente</td>   
                        
                        <?php } else if ( $line4['val_direct_general'] == '1'  && $line4['val2_rh'] == '2') { ?> 
                            <td>Ressource Humaines</td>
                            <td>Refuse</td>   
                        <?php } else if ($line4['val2_rh'] == '1') { ?> 
                            <td>Ressource Humaines</td>
                            <td>Acceptee</td>   
                        <?php } ?>    
                    </tr>
<?php
                     }
                   }
                }
            }
        
        }

?>

    </tbody>
</table>

</div>

                </div>
            </div>

                    <style>
                       .button-40 {
                        margin-top: 23px;
    /* top: 16px; */
    margin-bottom: 46px;
    margin-left: 1200px;  
    background-color: #111827;
    border: 1px solid transparent;
    border-radius: .75rem;
    box-sizing: border-box;
    color: #FFFFFF;
    cursor: pointer;
    flex: 0 0 auto;
    font-family: "Inter var",ui-sans-serif,system-ui,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1.125rem;
    font-weight: 600;
    line-height: 1.5rem;
    padding: .75rem 1.2rem;
    text-align: center;
    text-decoration: none #6B7280 solid;
    text-decoration-thickness: auto;
    transition-duration: .2s;
    transition-property: background-color,border-color,color,fill,stroke;
    transition-timing-function: cubic-bezier(.4, 0, 0.2, 1);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: auto;
    }

    .button-40:hover {
    background-color: #374151;
    }

    .button-40:focus {
    box-shadow: none;
    outline: 2px solid transparent;
    outline-offset: 2px;
    }

    @media (min-width: 768px) {
    .button-40 {
        padding: .75rem 1.5rem;
    }
    }
                    </style>  
            
        </main>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="superadmin.js"></script>
        <script>
  function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let table = document.getElementById("employeesTable");
    let rows = table.rows;

    for (let i = 1; i < rows.length; i++) {
      let cells = rows[i].cells;
      let match = false;

      for (let j = 0; j < cells.length - 1; j++) {
        if (cells[j].innerText.toLowerCase().includes(input)) {
          match = true;
          break;
        }
      }

      if (match) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }
</script>
</body>
</html>
