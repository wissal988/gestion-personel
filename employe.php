<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>employe</title>

  
  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="employe.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Source+Sans+Pro:wght@600;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">
      <div class="logo">
        <img src="baosem_logo-Photoroom.png" width="120px" height="100px">
      </div>
      <a href="#" class="btn">
        <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>

        <span>notifications</span>
      </a>
    </div>
  </header>

  <main>
    <article>

      
      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about">
        <div class="container">

          <div class="about-content">

            <h2 class="h2 section-title underline">informations importante</h2>

            <ul class="stats-list">

              <li class="stats-card">
                <p class="stats-text">vous avez</p>
                <p class="h3 stats-title">#</p>
                <p class="stats-text">jours de recuperation </p>
              </li>

              <li class="stats-card">
                <p class="stats-text">vous avez </p>
                <p class="h3 stats-title">#</p>
                <p class="stats-text">jours de conge</p>
              </li>

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service" id="services">
        <div class="container">

          <h2 class="h2 section-title underline">faire vos demandes</h2>

          <ul class="service-list">

            <li class="conge">
              <div class="service-card" >
                <a href="formulaire.html">
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


  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
