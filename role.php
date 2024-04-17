<?php
session_start();
require_once('config.php');
$querry = "select * from employees";
$result = mysqli_query($con,$querry);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="superadmin.css">
    <link rel="stylesheet" href="role.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Gestion des Roles</title>
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
                        <div  class="nav__link active collapse" >
                            <ion-icon name="business-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Définition</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="admin_sup.php"class="nav__link " class="collapse__sublink" >Société</a>
                                <a href="structure.php" class="collapse__sublink">Structure</a>
                                <a href="role.php" class="collapse__sublink">Roles</a>
                            </ul>
                        </div>
                    
                        
                        <a href="#" class="nav__link">
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
        <p class="font-weight-bold">Gestion des Roles</p>
        
        <div class="wrap">
         <div class="search">
         <input type="text"  id="searchInput" oninput="searchTable()" class="searchTerm" placeholder="Recherche....">
         <button type="submit" class="searchButton">
         <ion-icon name="search-outline"></ion-icon>
         </button>
         </div>
        </div>
        <a href="ajout.php"  class="btn btn-primary" style="background-color: #5372F0;color: #fff;padding: 20px 20px;border: none;border-radius: 5px;cursor: pointer;transition: background-color 0.3s; hight:45px;">Ajouter un element</a>
        
        </div>
                
    <div class="container">
   
    <table id="employeesTable">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date_naissance</th>
            <th>lieu_naissance</th>
            <th>Telephone</th>
            <th>E-mail</th>
            <th>Adresse</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?php echo $row['id_employees']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['date_n']; ?></td>
            <td><?php echo $row['lieu_n']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['adresse']; ?></td>
           
            <td><form action="ajout-role.php" method="POST">
                <input type="hidden" id="id" name="id"  value="<?php echo $row['id_employees']; ?>">
                <input type="hidden" id="nom" name="nom"  value="<?php echo $row['nom']; ?>">
                <input type="hidden" id="prenom" name="prenom"  value="<?php echo $row['prenom']; ?>"><br><br>
                <?php 
                if($_SESSION['role'] == 'superadmin'){
                $stmt = $con->prepare("SELECT * FROM role WHERE id = ".$row['id_employees']);
                $stmt->execute();
                $count = $stmt->store_result();
                $count = $stmt->num_rows;
            
                // If the element doesn't exist in the role table, display the "ajouter" button
                if ($count == 0) {
                    echo '<button type="submit" name="ajouter"><ion-icon name="add-circle"></ion-icon></button>';
                }}
                ?>
                
                </form></td> <?php }?>
            </tr>
            
                
         </tbody>

        </table>
    </diV>
    
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