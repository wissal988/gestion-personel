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

if (isset($_POST['send'])) {
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
        $sql = "INSERT INTO demande_conge 
        VALUES (0,:type_conge,:fonction, :affectation,:exercice,:nbr_jours,:date_d,:date_f,:date_r,:date_p,:date_jour_f,:date_jour_s,:num_titre) ";
        $requete = $conn->prepare($sql);
        $requete->execute([
            'type_conge' => $type_conge,
            'fonction' => $fonction,
            'affectation' => $affectation,
            'exercice' => $exercice,
            'nbr_jours' => $nbr_jours,
            'date_d' => $date_d,
            'date_f' => $date_f,
            'date_r' => $date_r,
            'date_p' => $date_p,
            'date_jour_f' => $date_jour_f,
            'date_jour_s' => $date_jour_s,
            'num_titre' => $num_titre,
        ]);
        $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
        var_dump($reponse);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
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
      <form  class="form" action="" method="post">
       <div class="gender-box">
          <div class="gender-option">
            <div class="gender" >
              <input type="radio" id="check-male"  name="type_conge" onclick="toggleField(false)" />
              <label> annuel detente</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female"  name="type_conge"onclick="toggleField(true)" />
              <label >recuperation</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other"  name="type_conge" onclick="toggleField(false)"/>
              <label >exceptionel</label>
            </div>
          </div>
        </div> 
        
<div id="simple" style="display: block;">
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
          <input type="number" placeholder=""  name="nbr_jours"required />

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
        <button name="send">Submit</button>
      </form>
    </section>
    <script>
      function toggleField(show) {
  var recuperation = document.getElementById("recuperation");
  if (show) {
    recuperation.style.display = "block";
  } else {
    recuperation.style.display = "none";
  }
}
      
    </script>
  </body>
</html>
