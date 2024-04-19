<?php
session_start();
require_once('config.php');

$query1 = "SELECT * FROM conge_annuel";
$result1 = mysqli_query($con, $query1);


$query2 = "SELECT * FROM conge_requisition";
$result2 = mysqli_query($con, $query2);



$query3 = "SELECT * FROM conge_exept";
$result3 = mysqli_query($con, $query3);

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
                                <?php } ?>
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
            <div style="margin-top:inherit;">
                <button class="button-34" role="button" onclick="form()">Demandes reçues</button>
                <a href="formulaire.php" class="button-34" role="button">Faire votre demande de conge</a>
            </div>

                    <style>
                        .button-34 {
                        background: #5E5DF0;
                        border-radius: 999px;
                        box-shadow: #5E5DF0 0 10px 20px -10px;
                        box-sizing: border-box;
                        color: #FFFFFF;
                        cursor: pointer;
                        font-family: Inter,Helvetica,"Apple Color Emoji","Segoe UI Emoji",NotoColorEmoji,"Noto Color Emoji","Segoe UI Symbol","Android Emoji",EmojiSymbols,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans",sans-serif;
                        font-size: 16px;
                        font-weight: 700;
                        line-height: 24px;
                        opacity: 1;
                        outline: 0 solid transparent;
                        padding: 8px 18px;
                        user-select: none;
                        -webkit-user-select: none;
                        touch-action: manipulation;
                        width: fit-content;
                        word-break: break-word;
                        border: 0;
                        margin-bottom:30px;
                        }
                    </style>   
            </div>
            <div class="main-title">
                <div style="display:flex; justify-content:center; margin-left: 250px;">
                    <button class="button-36" role="button" onclick="showTable(1)">Gestion des congés annuels</button>
                    <button class="button-36" role="button" onclick="showTable(2)">Gestion des réquisitions</button>
                    <button class="button-36" role="button" onclick="showTable(3)">Gestion des congés exceptionnels</button>
                </div>    
            </div>
            <style>
                .button-36 {
                    margin-right:30px;
                    background-image: linear-gradient(92.88deg, #455EB5 9.16%, #5643CC 43.89%, #673FD7 64.72%);
                    border-radius: 8px;
                    border-style: none;
                    box-sizing: border-box;
                    color: #FFFFFF;
                    cursor: pointer;
                    flex-shrink: 0;
                    font-family: "Inter UI","SF Pro Display",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Open Sans","Helvetica Neue",sans-serif;
                    font-size: 16px;
                    font-weight: 500;
                    height: 4rem;
                    padding: 0 1.6rem;
                    text-align: center;
                    text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
                    transition: all .5s;
                    user-select: none;
                    -webkit-user-select: none;
                    touch-action: manipulation;
                    }

                .button-36:hover {
                    box-shadow: rgba(80, 63, 205, 0.5) 0 1px 30px;
                    transition-duration: .1s;
                    }

                @media (min-width: 768px) {
                .button-36 {
                    padding: 0 2.6rem;
                }
                }
            </style>
        
        <div class="container">
            <style>
                .table-container {
                    margin-top: 20px;
                    
                }

                .table-container table {
                    width: 100%;
                    border-collapse: collapse;
                }
                
                .table-container thead{
                    background-color: #00154d;
                    color: #fff;
                }
                .table-container th, .table-container td {
                    border: 1px solid black;
                    padding: 8px;
                }
            </style>

                <div id="table1" class="table-container" style="display:none;">
                
                             
                    <!-- Tableau pour la gestion des congés annuels -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID_Employé</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Département</th>
                                <th>Exercice</th>
                                <th>Nbr Jours autorisés</th>
                                <th>Nbr jrs consommés</th>
                                <th>Nbr jrs restants</th>
                            </tr>
                        </thead>
                        
                        <tbody style="background:#fff;">
                            <?php
                             while ($row1 = mysqli_fetch_assoc($result1)) {
                                $query11= "SELECT * FROM employees WHERE id_employees = " .$row1['d_employe'];
                                $result11 = mysqli_query($con, $query11);
                                if ($result11 && mysqli_num_rows($result11) > 0) {
                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                    $query111 = "SELECT * FROM departement WHERE id_departement = " .$row11['d_departement'];
                                    $result111 = mysqli_query($con, $query111);
                                    if ($result111 && mysqli_num_rows($result111) > 0) {
                                        while ($row111 = mysqli_fetch_assoc($result111)) {
                        ?>
                            <tr>
                                <td><?php echo $row11['id_employees'];?></td>
                                <td><?php echo $row11['nom'];?></td>
                                <td><?php echo $row11['prenom'];?></td>
                                <td><?php echo $row111['nom_departement'];?></td>
                                <td><?php echo $row1['exercice'];?></td>
                                <td><?php echo $row1['jrs_autoris'];?></td>
                                <td><?php echo $row1['jrs_consome'];?></td>
                                <td><?php echo $row1['jrs_restant'];?></td>
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

                <div id="table2" class="table-container" style="display:none;">
                
                <button class="button-40" role="button" onclick="ajouterNouvelleRequisition()">Ajouter une nouvelle réquisition <i class='bx bx-plus-medical'></i></button>
                <button class="button-40" role="button" onclick="Table(22)">Liste des réquisitions </button>
                
                <div id="table22" class="table-container" style="display:none;"> 
                <p style="color:#000;">Liste des requisitions</p>
                <table>
                        <thead>
                            <tr>
                                <th>ID_Employé</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Département</th>
                                <th>Jour de requisition</th>
                                <th>Effectué</th>
                            </tr>
                        </thead>
                        
                        <tbody style="background-color: white;">
                            <?php
                                $q = "SELECT * FROM requisition";
                                $r = mysqli_query($con, $q);
                                if ($r && mysqli_num_rows($r) > 0) {
                                    while ($rw = mysqli_fetch_assoc($r)) {
                                    $q1 = "SELECT * FROM employees WHERE id_employees = " .$rw['d_employe'];
                                    $r1 = mysqli_query($con, $q1);
                                    if ($r1 && mysqli_num_rows($r1) > 0) {
                                        while ($rw1 = mysqli_fetch_assoc($r1)) {
                                            $q2 = "SELECT * FROM departement WHERE id_departement = " .$rw1['d_departement'];
                                            $r2 = mysqli_query($con, $q2);
                                            if ($r2 && mysqli_num_rows($r2) > 0) {
                                               while ($rw2 = mysqli_fetch_assoc($r2)) {
                        ?>
                            <tr>
                                <td><?php echo $rw1['id_employees'];?></td>
                                <td><?php echo $rw1['nom'];?></td>
                                <td><?php echo $rw1['prenom'];?></td>
                                <td><?php echo $rw2['nom_departement'];?></td>
                                <td><?php echo $rw['jour'];?></td>
                                <td>
                                <?php 
                                if ($rw['effectuee'] == "0") {
                                    ?>
                                    <form action="conge.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $rw['id']; ?>">
                                        <input type="hidden" name="emp" value="<?php echo $rw1['id_employees']; ?>">
                                        <label for="eff">Effectué ?</label>
                                        <select name="eff" id="eff">
                                            <option value="oui">Oui</option>
                                            <option value="non">Non</option>
                                        </select>
                                        <input type="submit" name="submit" value="Envoyer">
                                    </form>
                                    <?php
                                } else if ($rw['effectuee'] == "1") {
                                    ?>
                                    Oui
                                    <?php
                                } else if ($rw['effectuee'] == "2") {
                                    ?>
                                    Non
                                    <?php
                                }
                                ?>
                                </td>    
                 
<style>
            input[type=radio] {
  --s: 1em;     /* control the size */
  --c: #009688; /* the active color */
  
  height: var(--s);
  aspect-ratio: 1;
  border: calc(var(--s)/8) solid #939393;
  padding: calc(var(--s)/8);
  background: 
     radial-gradient(farthest-side,var(--c) 94%,#0000) 
     50%/0 0 no-repeat content-box;
  border-radius: 50%;
  outline-offset: calc(var(--s)/10);
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  cursor: pointer;
  font-size: inherit;
  transition: .3s;
}
input[type=radio]:checked {
  border-color: var(--c);
  background-size: 100% 100%;
}

input[type=radio]:disabled {
  background: 
     linear-gradient(#939393 0 0) 
     50%/100% 20% no-repeat content-box;
  opacity: .5;
  cursor: not-allowed;
}

@media print {
  input[type=radio] {
    -webkit-appearance: auto;
    -moz-appearance: auto;
    appearance: auto;
    background: none;
  }
}         
          </style><style>
            input[type=radio] {
  --s: 1em;     /* control the size */
  --c: #009688; /* the active color */
  
  height: var(--s);
  aspect-ratio: 1;
  border: calc(var(--s)/8) solid #939393;
  padding: calc(var(--s)/8);
  background: 
     radial-gradient(farthest-side,var(--c) 94%,#0000) 
     50%/0 0 no-repeat content-box;
  border-radius: 50%;
  outline-offset: calc(var(--s)/10);
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  cursor: pointer;
  font-size: inherit;
  transition: .3s;
}
input[type=radio]:checked {
  border-color: var(--c);
  background-size: 100% 100%;
}

input[type=radio]:disabled {
  background: 
     linear-gradient(#939393 0 0) 
     50%/100% 20% no-repeat content-box;
  opacity: .5;
  cursor: not-allowed;
}

@media print {
  input[type=radio] {
    -webkit-appearance: auto;
    -moz-appearance: auto;
    appearance: auto;
    background: none;
  }
}         </style>                                
</td>
                            </tr>  
                       
                <?php
                if (isset($_POST['submit'])) {
                    $selectedOption = $_POST['eff'];
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $emp = $_POST['emp'];
                        if ($selectedOption == 'oui') {
                            $query = "UPDATE requisition SET effectuee = 1 WHERE id = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param('i', $id);
                            $stmt->execute();

                            $query0 = "SELECT * FROM requisition WHERE id = ?";
                            $stmt0 = $con->prepare($query0);
                            $stmt0->bind_param('i', $id);
                            $stmt0->execute();
                            $result0 = $stmt0->get_result();
                            $ligne = $result0->fetch_assoc();
                            $emp = $ligne['d_employe'];
                            $type = $ligne['type'];

                            $requete1 = "SELECT COUNT(*) as count FROM conge_requisition WHERE d_employee = ?";
                            $stat = $con->prepare($requete1);
                            $stat->bind_param('i', $emp);
                            $stat->execute();
                            $resultat = $stat->get_result();
                            $resultat = $resultat->fetch_assoc();

                            if ($resultat['count'] > 0) {
                                $requete2 = "SELECT * FROM conge_requisition WHERE d_employee = ?";
                                $stat2 = $con->prepare($requete2);
                                $stat2->bind_param('i', $emp);
                                $stat2->execute();
                                $resultat2 = $stat2->get_result();
                                $resultat2 = $resultat2->fetch_assoc();
                                $jrs_requisition = $resultat2['jrs_requisition'];
                
                                if ($type == "vendredi") {
                                    $auto = $jrs_requisition + 2;
                                } else {
                                    $auto = $jrs_requisition + 1;
                                }
                                $rest = $auto;
                
                                $requete3 = "UPDATE conge_requisition SET jrs_rest = ?, jrs_requisition = ? WHERE d_employee = ?";
                                   $stat3 = $con->prepare($requete3);
                                   $stat3->bind_param('iii', $rest, $auto, $emp);
                                   $stat3->execute();
                                // header('Location: conge.php');
                               // exit;
                            }
                            else 
                                if ($type == "vendredi") {
                                    $auto1 = 2;
                                    $rest1 = $auto1;
                                    $requete31 = "INSERT INTO conge_requisition (jrs_rest, jrs_requisition, d_employee) VALUES (?, ?, ?)";
                                    $stat31 = $con->prepare($requete31);
                                    $stat31->bind_param('iii', $rest1, $auto1, $emp);
                                    $stat31->execute();
                            
                                } else {
                                    $auto1 = 1;
                                    $rest1 = $auto1;
                                    $requete31 = "INSERT INTO conge_requisition (jrs_rest, jrs_requisition, d_employee) VALUES (?, ?, ?)";
                                    $stat31 = $con->prepare($requete31);
                                    $stat31->bind_param('iii', $rest1, $auto1, $emp);
                                    $stat31->execute();
                                }
                        } elseif ($selectedOption == 'non') {
                            $query = "UPDATE requisition SET effectuee = 2 WHERE id = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param('i', $id);
                            $stmt->execute();
                        }
                    }
                   
            }

                ?>
                <?php
                        }
                      }
                   }
                 }
                }   
             }
   
           
        
    
                        ?>
                        </tbody>

                        
                    </table>
                    <br><br><br><br>

                </div>
                <script>
                    function ajouterNouvelleRequisition() {
                        window.location.href = 'requisition.php';
                    }
               </script>
<style>
    .button-40 {
    margin-bottom:30px;  
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
                     <!--  pour la gestion  -->
                     <p style="color:#000;">Tableau des conges réquisitions</p>
                    <table>
                        <thead>
                            <tr>
                                <th>ID_Employé</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Departement</th>
                                <th>Nbr jours requisitionnés</th>
                                <th>Nbr jrs consommés</th>
                                <th>Nbr jrs restants</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                        <?php
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $query22 = "SELECT * FROM employees WHERE id_employees = " .$row2['d_employee'];
                            $result22 = mysqli_query($con, $query22);
                            if ($result22 && mysqli_num_rows($result22) > 0) {
                                while ($row22 = mysqli_fetch_assoc($result22)) {
                                $query222 = "SELECT * FROM departement WHERE id_departement = " .$row22['d_departement'];
                                $result222 = mysqli_query($con, $query222);
                                if ($result222 && mysqli_num_rows($result222) > 0) {
                                    while ($row222 = mysqli_fetch_assoc($result222)) {
                                 
                       
                        ?>
                                    <tr>
                                        <td><?php echo $row22['id_employees']; ?></td>
                                        <td><?php echo $row22['nom']; ?></td>
                                        <td><?php echo $row22['prenom']; ?></td>
                                        <td><?php echo $row222['nom_departement']; ?></td>
                                        <td><?php echo $row2['jrs_requisition']; ?></td>
                                        <td><?php echo $row2['jrs_consom']; ?></td>
                                        <td><?php echo $row2['jrs_rest']; ?></td>
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

                <div id="table3" class="table-container" style="display:none;">
                    <!-- Tableau pour la gestion des congés exceptionnels -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID_Employe</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Département</th>
                                <th>Nbr Jours autorisés</th>
                                <th>Nbr jrs consommés</th>
                                <th>Nbr jrs restants</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                        <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {
                                $query33 = "SELECT * FROM employees WHERE id_employees = " .$row3['d_emoloyee'];
                                $result33 = mysqli_query($con, $query33);
                                if ($result33 && mysqli_num_rows($result33) > 0) {
                                    while ($row33 = mysqli_fetch_assoc($result33)) {
                                    $query333 = "SELECT * FROM departement WHERE id_departement = " .$row33['d_departement'];
                                    $result333 = mysqli_query($con, $query333);
                                    if ($result333 && mysqli_num_rows($result333) > 0) {
                                        while ($row333 = mysqli_fetch_assoc($result333)) {
                        ?>
                            <tr>
                                <td><?php echo $row33['id_employees'];?></td>
                                <td><?php echo $row33['nom'];?></td>
                                <td><?php echo $row33['prenom'];?></td>
                                <td><?php echo $row333['nom_departement'];?></td>
                                <td><?php echo $row3['jrs_auto'];?></td>
                                <td><?php echo $row3['jrs_consom'];?></td>
                                <td><?php echo $row3['jrs_rest'];?></td>
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
                <?php
while ($row4 = mysqli_fetch_assoc($result4)) {
    $query44 = "SELECT * FROM employees WHERE id_employees = " . $row4['d_employee'];
    $result44 = mysqli_query($con, $query44);
    if ($result44 && mysqli_num_rows($result44) > 0) {
        while ($row44 = mysqli_fetch_assoc($result44)) {
            $query444 = "SELECT * FROM departement WHERE id_departement = " . $row44['d_departement'];
            $result444 = mysqli_query($con, $query444);
            while ($row444 = mysqli_fetch_assoc($result444)) {
                if ($row4['type_conge'] == 'annuel detente' && $row4['val_direction'] == '1' && $row4['val1_rh'] == '0') {
                    ?>
                    <h2>Congé Annuel</h2>
                    <table class="table-container" style="width:100%;">
                        <thead>
                        <tr>
                            <th>ID_Employe</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Departement</th>
                            <th>Nbr_jours</th>
                            <th>Date_debut</th>
                            <th>Date_fin</th>
                            <th>Date_reprise</th>
                            <th>Exercice</th>
                            <th>Premiere validation</th>
                        </tr>
                        </thead>
                        <tbody style="background-color: white;">
                        <tr>
                            <td><?php echo $row44['id_employees']; ?></td>
                            <td><?php echo $row44['nom']; ?></td>
                            <td><?php echo $row44['prenom']; ?></td>
                            <td><?php echo $row444['nom_departement']; ?></td>
                            <td><?php echo $row4['nbr_jours']; ?></td>
                            <td><?php echo $row4['date_d']; ?></td>
                            <td><?php echo $row4['date_f']; ?></td>
                            <td><?php echo $row4['reprise']; ?></td>
                            <td><?php echo $row4['exercice']; ?></td>
                            <td><form action="conge.php" method="post">
                                                    <input type="hidden" name="id_demande" value="<?php echo $row4['id_demande']; ?>">
                                                    <input type="hidden" name="emp" value="<?php echo $row44['id_employees']; ?>">
                                                    <label for="eff">Effectué ?</label>
                                                    <select name="eff" id="eff">
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                    <input type="submit" name="submit1" value="Envoyer">
                                                </form></td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                } else if ($row4['type_conge'] == 'exeptionel' && $row4['val_direction'] == '1' && $row4['val1_rh'] == '0') { ?>
                    <h2>Congé Exceptionnel</h2>
                    <table class="table-container">
                        <thead>
                        <tr>
                            <th>ID_Employe</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Departement</th>
                            <th>Nbr_jours</th>
                            <th>Date_debut</th>
                            <th>Date_fin</th>
                            <th>Date_reprise</th>
                            <th>Premiere validation</th>
                        </tr>
                        </thead>
                        <tbody style="background-color: white;">
                        <tr>
                            <td><?php echo $row44['id_employees']; ?></td>
                            <td><?php echo $row44['nom']; ?></td>
                            <td><?php echo $row44['prenom']; ?></td>
                            <td><?php echo $row444['nom_departement']; ?></td>
                            <td><?php echo $row4['nbr_jours']; ?></td>
                            <td><?php echo $row4['date_d']; ?></td>
                            <td><?php echo $row4['date_f']; ?></td>
                            <td><?php echo $row4['reprise']; ?></td>
                            <td>
                            <form action="conge.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row4['id_demande']; ?>">
                                                    <input type="hidden" name="emp" value="<?php echo $row44['id_employees']; ?>">
                                                    <label for="eff">Effectué ?</label>
                                                    <select name="eff" id="eff">
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                    <input type="submit" name="submit1" value="Envoyer">
                                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } else if ($row4['type_conge'] == 'recuperation' && $row4['val_direction'] == '1' && $row4['val1_rh'] == '0') { ?>
                    <h2>Congé de Récupération</h2>
                    <table class="table-container">
                        <thead>
                        <tr>
                            <th>ID_Employe</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Departement</th>
                            <th>Nbr_jours</th>
                            <th>Date_debut</th>
                            <th>Date_fin</th>
                            <th>Date_reprise</th>
                            <th>Premiere validation</th>
                        </tr>
                        </thead>
                        <tbody style="background-color: white;">
                        <tr>
                            <td><?php echo $row44['id_employees']; ?></td>
                            <td><?php echo $row44['nom']; ?></td>
                            <td><?php echo $row44['prenom']; ?></td>
                            <td><?php echo $row444['nom_departement']; ?></td>
                            <td><?php echo $row4['nbr_jours']; ?></td>
                            <td><?php echo $row4['date_d']; ?></td>
                            <td><?php echo $row4['date_f']; ?></td>
                            <td><?php echo $row4['reprise']; ?></td>
                            <td>
                            <form action="conge.php" method="post">
                                <input type="hidden" name="id_demande" value="<?php echo $row4['id_demande']; ?>">
                                <input type="hidden" name="emp_employe" value="<?php echo $row44['id_employees']; ?>">
                                <label for="eff">Effectué ?</label>
                                <select name="eff" id="eff">
                                    <option value="oui">Oui</option>
                                    <option value="non">Non</option>
                                </select>
                                <input type="submit" name="submit1" value="Envoyer">
                            </form>
                                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php
                }else if ($row4['type_conge'] == 'exeption' && $row4['val1_rh'] == '0') {
                    ?>
                    <h2> Demandes des congés exeptionnel</h2>
                    <table class="table-container" style="width:100%;">
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
                                        <form action="conge.php" method="post">
                                            <input type="hidden" name="id_demande" value="<?php echo $row4['id_demande']; ?>">
                                            <input type="hidden" name="emp" value="<?php echo $row44['id_employees']; ?>">
                                            <label for="eff">Effectué ?</label>
                                            <select name="eff" id="eff">
                                                <option value="oui">Oui</option>
                                                <option value="non">Non</option>
                                            </select>
                                            <input type="submit" name="submit1" value="Envoyer">
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                
            }
            }
        }
    }

?>
<?php
if (isset($_POST['submit1'])) {
    $selectedOption = $_POST['eff'];
    if (isset($_POST['id_demande'])) {
        $id = $_POST['id_demande'];

        if ($selectedOption == 'oui') {
            $query = "UPDATE demande_conge SET val1_rh = 1 WHERE id_demande = ?";
        } elseif ($selectedOption == 'non') {
            $query = "UPDATE demande_conge SET val1_rh = 2 WHERE id_demande = ?";
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


<p>validation finale  de la demande :</p>
<table class="table-container" style="width:100%;" id="employeesTable">
    <thead>
        <tr>
            <th>ID_Employe</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Type_demande</th>
            <th>Departement</th>
            <th>Date Debut</th>
            <th>Date fin</th>
            <th>Derniere Validation</th>
        </tr>
    </thead>
    <tbody style="background-color: white;">
    <?php
$db = new PDO('mysql:host=localhost;dbname=baosem', 'root', '');
$stm = $db->prepare('SELECT * FROM demande_conge');
$stm->execute();
$r = $stm->fetchAll();
foreach ($r as $line4) {
    if ( $line4['val_direct_general'] == '1' && $line4['val2_rh'] == '0'  ) {
    $requete44 = "SELECT * FROM employees WHERE id_employees = " . $line4['d_employee'];
    $resultat44 = mysqli_query($con, $requete44);
    if ($resultat44 && mysqli_num_rows($resultat44) > 0) {
        while ($line44 = mysqli_fetch_assoc($resultat44)) {
            $requete444 = "SELECT * FROM departement WHERE id_departement = " . $line44['d_departement'];
            $resultat444 = mysqli_query($con, $requete444);
            while ($line444 = mysqli_fetch_assoc($resultat444)) {
                    
                       
?>
                    <tr>
                        <td><?php echo $line44['id_employees']; ?></td>
                        <td><?php echo $line44['nom']; ?></td>
                        <td><?php echo $line44['prenom']; ?></td>
                        <td><?php echo $line4['type_conge']; ?></td>
                        <td><?php echo $line444['nom_departement']; ?></td>
                        <td><?php echo $line4['date_d']; ?></td>
                        <td><?php echo $line4['date_f']; ?></td>
                        <td>
                            <form action="conge.php" method="post">
                             <input type="hidden" name="id" value="<?php echo $line4['id_demande']; ?>">
                             <input type="hidden" name="emp" value="<?php echo $line44['id_employees']; ?>">
                             <label for="eff">Effectué ?</label>
                                <select name="eff" id="eff">
                                 <option value="oui">Oui</option>
                                 <option value="non">Non</option>
                                </select>
                             <input type="submit" name="submit2" value="Envoyer">
                             </form>
                        </td>
                    </tr>

<?php
                     }
                }
            }
        }
    }

?>
<?php
if (isset($_POST['submit2'])) {
    $selectedOption = $_POST['eff'];
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $emp = $_POST['emp'];
        if ($selectedOption == 'oui') {
            $query = "UPDATE demande_conge SET val2_rh = 1 WHERE id_demande = ?";
        } elseif ($selectedOption == 'non') {
            $query = "UPDATE demande_conge SET val2_rh = 2 WHERE id_demande = ?";
        }

        $stmt = $con->prepare($query);
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
        } else {
            echo "Erreur de préparation de la requête.";
        }

        $query0 = "SELECT * FROM demande_conge WHERE id_demande = ?";
        $stmt0 = $db->prepare($query0);

        if ($stmt0) {
            $stmt0->bindValue(1, $id, PDO::PARAM_INT);
            $stmt0->execute();
            $result0 = $stmt0->fetch(PDO::FETCH_ASSOC);
            $etat = $result0['val2_rh'];
            $type = $result0['type_conge'];
            $nbr = $result0['nbr_jours'];
            $exercice = $result0['exercice'];

            if ($etat == "1") {
                if ($type == 'annuel detente') {
                    $requete10 = "SELECT COUNT(*) as count FROM conge_annuel WHERE d_employe = ?";
                    $stat0 = $con->prepare($requete10);
                    $stat0->bind_param('i', $emp);
                    $stat0->execute();
                    $resultat0 = $stat0->get_result();
                    $resultat0 = $resultat0->fetch_assoc();

                    if ($resultat0['count'] > 0) {
                        $requete20 = "SELECT COUNT(*) as count FROM conge_annuel WHERE exercice = ? AND d_employe =?";
                        $stat20 = $con->prepare($requete20);
                        $stat20->bind_param('ii', $exercice, $emp);
                        $stat20->execute();
                        $resultat20 = $stat20->get_result();
                        $resultat20 = $resultat20->fetch_assoc();

                        if ($resultat20['count'] > 0) {
                            $requete30 = "SELECT * FROM conge_annuel WHERE exercice = ? AND d_employe = ?";
                            $stat30 = $con->prepare($requete30);
                            $stat30->bind_param('ii', $exercice, $emp);
                            $stat30->execute();
                            $resultat30 = $stat30->get_result();
                            $resultat30 = $resultat30->fetch_assoc();
                            $jrs_rest0 = $resultat30['jrs_restant'] - $nbr;
                            $jrs_consome0 = $resultat30['jrs_consome'] + $nbr;

                            $requete40 = "UPDATE conge_annuel SET jrs_restant = ?, jrs_consome = ? WHERE d_employe = ? AND exercice = ?";
                            $stat40 = $con->prepare($requete40);
                            $stat40->bind_param('iiii', $jrs_rest0, $jrs_consome0, $emp, $exercice);
                            $stat40->execute();
                        } else {
                            $requete30 = "SELECT * FROM conge_annuel WHERE  d_employe = ?";
                            $stat30 = $con->prepare($requete30);
                            $stat30->bind_param('i', $emp);
                            $stat30->execute();
                            $resultat30 = $stat30->get_result();
                            $resultat30 = $resultat30->fetch_assoc();
                            $jrs_rest0 = $resultat30['jrs_restant'] - $nbr;
                            $jrs_consome0 = $resultat30['jrs_consome'] + $nbr;

                            $requete310 = "INSERT INTO conge_annuel (jrs_restant, jrs_consome, d_employe) VALUES (?, ?, ?)";
                            $stat310 = $con->prepare($requete310);
                            $stat310->bind_param('iii', $jrs_rest0, $jrs_consome0, $emp);
                            $stat310->execute();
                        }
                    } else {
                        
                        $requete3110 = "INSERT INTO conge_annuel (exercice, jrs_consome, d_employe) VALUES (?, ?, ?)";
$stat3110 = $con->prepare($requete3110);

if ($stat3110) {
    $stat3110->bind_param('iii', $exercice, $nbr, $emp);
    $stat3110->execute();
} else {
    echo "Erreur de préparation de la requête: " . $con->error;
}
                    }
                } else if ($type == 'recuperation') {
                    $requete10 = "SELECT COUNT(*) as count FROM conge_requisition WHERE d_employee = ?";
                    $stat0 = $con->prepare($requete10);
                    $stat0->bind_param('i', $emp);
                    $stat0->execute();
                    $resultat0 = $stat0->get_result();
                    $resultat0 = $resultat0->fetch_assoc();

                    if ($resultat0['count'] > 0) {
                        $requete20 = "SELECT * FROM conge_requisition WHERE d_employee = ?";
                        $stat20 = $con->prepare($requete20);
                        $stat20->bind_param('i', $emp);
                        $stat20->execute();
                        $resultat20 = $stat20->get_result();
                        $resultat20 = $resultat20->fetch_assoc();
                        $jrs_rest0 = $resultat20['jrs_rest'] - $nbr;
                        $jrs_cons0 = $resultat20['jrs_consom'] + $nbr;

                        $requete30 = "UPDATE conge_requisition SET jrs_rest = ?, jrs_consom = ? WHERE d_employee = ?";
                        $stat30 = $con->prepare($requete30);
                        $stat30->bind_param('iii', $jrs_rest0, $jrs_cons0, $emp);
                        $stat30->execute();
                    }}
                 else if ($type == 'exeption') {
                    $requete310 = "INSERT INTO conge_exept (d_emoloyee, jrs_auto, jrs_rest, jrs_consom) VALUES (?, ?, ?, ?)";
                    $stat310 = $con->prepare($requete310);
                    $nb = $nbr;
                    $n = $nbr;
                    if ($stat310) {
                        $stat310->bind_param('iiii', $emp, $nbr, $nb, $n);
                        $stat310->execute();
                    } else {
                        echo "Erreur de préparation de la requête: " . $con->error;
                    }
                }
                }
            }
        }
    }

?>
        </div>
       </div>
     </main>

     
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="superadmin.js"></script>
    <script>
        function showTable(tableNumber) {
            // Masquer tous les tableaux
            document.getElementById('table1').style.display = 'none';
            document.getElementById('table2').style.display = 'none';
            document.getElementById('table3').style.display = 'none';
           
            // Afficher le tableau correspondant au bouton cliqué
            document.getElementById('table' + tableNumber).style.display = 'block';
        }
        function Table(number) {
    document.getElementById('table22').style.display = 'none';
    document.getElementById('table' + number).style.display = 'block';
}
    </script>  
</body>
</html>