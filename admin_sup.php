
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="superadmin.css">
        <title>superadmin menu</title>
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
                        <a href="superadmin.html" class="nav__link active">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Acceuil</span>
                        </a>
                        <div  class="nav__link collapse">
                            <ion-icon name="business-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Définition</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="admin-sup.php" class="collapse__sublink">Société</a>
                                <a href="#" class="collapse__sublink">Structure</a>
                                <a href="#" class="collapse__sublink">Roles</a>
                            </ul>
                        </div>
                    
                        
                        <a href="#" class="nav__link">
                            <ion-icon name="calendar-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Congés</span>
                        </a>
                        <a href="#" class="nav__link">
                            <ion-icon name="ribbon-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Formaion</span>
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
       
       
    <div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <h2>Description de la Societe:</h2>
        </div>
        <div class="acote">
        <a href="edit_d.php" class="btn btn-primary">Modifier</a>
        </div>
        <div class="user--info">
            <img src="baosem_logo.png" alt="">
            
        </div>

       
    </div>  
    
    <div class="info--wrapper">
        <p>Raison Sociale:</p>
        <div class="box">
        <p>Boasem</p></div>
        <p>Durée de la Société:</p>
        <div class="box"><p>20 ans</p></div>
        <p>Adresse du siege:</p>
        <div class="box"><p> Deli Brahim</p></div>
        <p>Activite Principale:</p>
        <div class="box"><p>publication</p></div>
        <p>Effectif salarié:</p>
        <div class="box"><p>80</p></div>
        <p>Activite:</p>
        <div class="box"><p>commerce</p></div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="superadmin.js"></script>
        
</script>
</body>
</html>