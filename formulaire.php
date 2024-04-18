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
    $nbr_jours = $_POST['nbr_jours'];
    $date_d = $_POST['date_d'];
    $date_f = $_POST['date_f'];
    $date_r = $_POST['date_r'];
    $date_p = $_POST['date_p'];
    $date_jour_f = $_POST['date_jour_f'];
    $date_jour_s = $_POST['date_jour_s'];
    $num_titre = $_POST['num_titre'];

    // Check if the end date is after the start date and if the number of days corresponds to the difference between the end and start dates
    if(strtotime($date_f) == strtotime("+$nbr_jours days", strtotime($date_d)) && strtotime($date_r) > strtotime($date_f) && strtotime($date_f) > strtotime($date_d)) {
        try {
            // Préparation et exécution de la requête d'insertion
            $sql = "INSERT INTO demande_conge 
            VALUES (0,:type_conge,:nbr_jours,:date_d,:date_f,:date_r,:date_p,:date_jour_f,:date_jour_s,:num_titre,0) ";
            $requete = $conn->prepare($sql);
            $requete->execute([
                'type_conge' => $type_conge,
                'nbr_jours' => $nbr_jours,
                'date_d' => $date_d,
                'date_f' => $date_f,
                'date_r' => $date_r,
                'date_p' => $date_p,
                'date_jour_f' => $date_jour_f,
                'date_jour_s' => $date_jour_s,
                'num_titre' => $num_titre,
            ]);
            // $reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($reponse);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Les dates ne sont pas valides. Veuillez corriger les dates.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande de congé</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>
<section class="container" style="display: block;">
    <header>Demande de congé</header>
    <form class="form" action="" method="post">
        <div class="gender-box">
            <div class="gender-option">
                <div class="gender">
                    <input type="radio" id="check-male" name="type_conge" value="annuel detente" onclick="toggleField(false)"  />
                    <label>Annuel détente</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-female" name="type_conge" value="recuperation" onclick="toggleField(true)"  />
                    <label>Récupération</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-other" name="type_conge" value="exceptionel" onclick="toggleField(false)" />
                    <label>Exceptionnel</label>
                </div>
            </div>
        </div>

        <div id="simple" style="display: block;">
            <div class="input-box address">
                <label>Nombre de jours demandés</label>
                <input type="number" placeholder="" name="nbr_jours" id="nbr_jours" required />

                <div class="column">
                    <div class="input-box">
                        <label>Date de départ</label>
                        <input type="date" placeholder="" name="date_d" id="date_d" onchange="updateEndDate()" required />
                    </div>
                    <div class="input-box">
                        <label>Date de fin de congé</label>
                        <input type="date" placeholder="" name="date_f" id="date_f" readonly />
                    </div>
                    <div class="input-box">
                        <label>Date de reprise</label>
                        <input type="date" placeholder="" name="date_r" />
                    </div>
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
      <div id="commentField" style="display:none;">
  <div class="input-box">
    <label>Description de votre cas</label>
    <textarea id="risonl" name="raison" rows="4" cols="50"></textarea>
  </div>
</div>
      <button type="submit" name="send">Submit</button>
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

  // Show or hide the comment field
  if (document.getElementById("check-other").checked) {
    document.getElementById("commentField").style.display = "block";
  } else {
    document.getElementById("commentField").style.display = "none";
  }
}
    

    function updateEndDate() {
        var startDate = document.getElementById("date_d").value;
        var days = parseInt(document.getElementById("nbr_jours").value);
        if (startDate && days) {
            var endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + days);
            document.getElementById("date_f").valueAsDate = endDate;
        }
    }
</script>
</body>
</html>
