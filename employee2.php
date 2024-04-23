
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Source+Sans+Pro:wght@600;700&display=swap"
    rel="stylesheet">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="employee.css">
        
        <title>employee</title>
    </head>
    <body id="body-pd">

        <!--SIDE BAR-->
        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                    </div>
                    <div class="nav__list">
                        <a href="employee.php" class="nav__link ">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Acceuil</span>
                        </a>
                        <div  class="nav__link collapse">
                        <ion-icon name="notifications-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">notifications</span>
                        </div>
                    
                        
                        <a href="employee2.php" class="nav__link active" >
                            <ion-icon name="calendar-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Congés</span>
                        </a>
                        <a href="#" class="nav__link">
                            <ion-icon name="ribbon-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Formaion</span>
                        </a>
                        <a href="#" class="nav__link">
                             <ion-icon name="finger-print-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Abscences</span>
                        </a>
                        <a href="#" class="nav__link">
                            <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Historique</span>
                        </a>
                    </div>
                </div>

                
            </nav>
        </div>
       
        
      <!-- 
        - #SERVICE
      -->

      <section class="section-service" id="services">
        <div class="container">

          <h2 class="h2 section-title underline">faire vos demandes</h2>

          <ul class="service-list">

            <li class="conge">
              <div class="service-card" >
                <a href="formulaire.php">
                <div class="card-icon">
                  <ion-icon name="document-text-outline"></ion-icon>
                </div>

                <h3 class="h3 title">demande de conge(annuel...) </h3>

                <button class="card-btn" aria-label="Show More" >
                  <ion-icon name="chevron-forward-outline"></ion-icon>
                </button>
                  </a>
              </div>
            </li>
            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="documents-outline"></ion-icon>
                </div>

                <h3 class="h3 title">demande de conge  de maternite</h3>

                

                <button class="card-btn" aria-label="Show More">
                  <ion-icon name="chevron-forward-outline"></ion-icon>
                </button>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="document-attach-outline"></ion-icon>               
                 </div>

                <h3 class="h3 title">demande de conge de maladie</h3>


                <button class="card-btn" aria-label="Show More">
                  <ion-icon name="chevron-forward-outline"></ion-icon>
                </button>

              </div>
            </li>

          </ul>

        </div>
      </section>


       
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="employee.js"></script>
        
</script>
</body>
</html>
