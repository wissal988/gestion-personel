<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baosem";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("La connexion a échoué : ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Save'])) {
	  $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $type_conge = $_POST['type_conge'];
    $fonction = $_POST['fonction'];
    $affectation = $_POST['affectation'];
    $exercice = $_POST['exercice'];
    $nbr_jours = $_POST['nbr_jours'];
    $date_d = $_POST['date_d'];
    $date_f = $_POST['date_f'];
    $date_r = $_POST['date_r'];
    $date_p = $_POST['date_p'];
    $date_jour_f = $_POST['date_jour_f'];
    $date_jour_s = $_POST['date_jour_s'];
    $num_titre = $_POST['num_titre'];
    
            try {
                // Préparation et exécution de la requête d'insertion
                $sql = "INSERT INTO demande_conge (nom,prenom,type_conge, fonction, affectation,exercice,nbr_jours,date_d,date_f,date_r,date_p,date_jour_f,date_jour_snum_titre) 
                VALUES (:nom,:prenom,:type_conge,: fonction, :affectation,:exercice,:nbr_jours,:date_d,:date_f,:date_r,:date_p,:date_jour_f,:date_jour_,:snum_titre) ";
                $stmt = $conn->prepare($sql);
				$stmt->bindParam(':nss', $nss);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':type_conge', $type_conge);
                $stmt->bindParam(':fonction', $fonction);
                $stmt->bindParam(':affectation', $affectation);
                $stmt->bindParam(':exercice', $exercice);
                $stmt->bindParam(':nbr_jours', $nbr_jours);
                $stmt->bindParam(':date_d', $date_d);
                $stmt->bindParam(':date_f', $date_f);
                $stmt->bindParam(':date_r', $date_r);
                $stmt->bindParam(':date_p', $date_p);
                $stmt->bindParam(':date_jour_f', $date_jour_f);
                $stmt->bindParam(':date_jour_s', $date_jour_s);
                $stmt->bindParam(':num_titre', $num_titre);
                $stmt->execute();
				} catch (PDOException $e) {
				// Check if the error is related to a foreign key constraint violation
				if ($e->getCode() == '23000') {
				echo '<script>alert("Please enter your information first.")</script>';
				} else {
				echo '<script>alert("Unable to process data. Error: ' . $e->getMessage() . '")</script>';
    }
}
        }
    


// Sélection des données de la table 'demande'
$query = 'SELECT * FROM demande_conge';
$stmt = $conn->query($query);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Encodage des données en JSON
$json = json_encode($data);

// Envoyer les données JSON au client (décommentez les lignes ci-dessous si nécessaire)
// header('Content-Type: application/json');
// echo $json;
?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="formulaire.css" />
  </head>
  <body>
    <section class="container" style="display: block;">
      <header>demande de conge</header>
      <form action="#" class="form">
       <div class="gender-box">
          <div class="gender-option">
            <div class="gender"name="type_conge">
              <input type="radio" id="check-male"   >
              <label> annuel detente</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" onclick="displayField()" />
              <label >recuperation</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender"  />
              <label >exceptionel</label>
            </div>
          </div>
        </div> 
        <div class="input-box">
          <label>nom</label>
          <input type="text" placeholder="" name="nom"required />
        </div>

        <div class="input-box">
          <label>prenom</label>
          <input type="text" placeholder="" name="prenom" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>fonction</label>
            <input type="text" placeholder="" name="fonction"required />
          </div>
          <div class="input-box">
            <label>affectation</label>
            <input type="text" placeholder="" name="affectation"required />
          </div>
        </div>
        
        <div class="input-box address">
          <label>exercice</label>
          <input type="text" placeholder="" name="exercice" required />
          <label>nombre de jours demande</label>
          <input type="text" placeholder=""  name="nbr_jours"required />

          <div class="column">
            <div class="input-box">
            <label> date de depart</label>
            <input type="date" placeholder="" name="date_d"required />
            </div>
            <div class="input-box">
            <label> date de fin de conge</label>
            <input type="date" placeholder="" name="date_f"required />
          </div>
            <div class="input-box">
            <label> date de reprise</label>
            <input type="date" placeholder=""name="date_r">
          </div>
        </div>
        <div id="recuperation" style="display: none;">
        <div class="input-box">
          <label>la date de permanance </label>
          <input type="date" placeholder="" name="date_p" />
        </div>
        <div class="input-box">
          <label>la date du jour ferie</label>
          <input type="date" placeholder="" name="date_jour_f" />
        </div>
        <div class="input-box">
          <label>la date des heures supplementaire</label>
          <input type="date" placeholder="" name="date_jour_s" />
        </div>
        <div class="input-box">
          <label>numero du titre de conge</label>
          <input type="number" placeholder="" name="num_titre" />
        </div>
      </div>
        <button>Submit</button>
      </form>
    </section>
    <script>
      function displayField() {
        var field = document.getElementById("recuperation");
        field.style.display = (field.style.display == "block") ? "none" : "block";
      }
      
    </script>
  </body>
</html>
