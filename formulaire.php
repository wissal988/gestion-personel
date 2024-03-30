
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
            <div class="gender">
              <input type="radio" id="check-male" name="gender"  >
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
          <input type="text" placeholder="" required />
        </div>

        <div class="input-box">
          <label>prenom</label>
          <input type="text" placeholder="" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>fonction</label>
            <input type="text" placeholder="" required />
          </div>
          <div class="input-box">
            <label>affectation</label>
            <input type="text" placeholder="" required />
          </div>
        </div>
        
        <div class="input-box address">
          <label>exercice</label>
          <input type="text" placeholder="" required />
          <label>nombre de jours demande</label>
          <input type="text" placeholder="" required />

          <div class="column">
            <div class="input-box">
            <label> date de depart</label>
            <input type="date" placeholder="" required />
            </div>
            <div class="input-box">
            <label> date de fin de conge</label>
            <input type="date" placeholder="" required />
          </div>
            <div class="input-box">
            <label> date de reprise</label>
            <input type="date" placeholder="">
          </div>
        </div>
        <div id="recuperation" style="display: none;">
        <div class="input-box">
          <label>la date de permanance </label>
          <input type="date" placeholder=""  />
        </div>
        <div class="input-box">
          <label>la date du jour ferie</label>
          <input type="date" placeholder=""  />
        </div>
        <div class="input-box">
          <label>la date des heures supplementaire</label>
          <input type="date" placeholder=""  />
        </div>
        <div class="input-box">
          <label>numero du titre de conge</label>
          <input type="number" placeholder=""  />
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
