<!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Bacainfo</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
   <!-- Bootstrap 4 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
 
   <!-- Bootstrap Icons -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
 
 <!-- External Custom CSS -->
 <link rel="stylesheet" href="UI.css">
 </head>
 <body>
 
 <!-- Hero Section -->
 <section class="hero-section">
   <div class="container hero-content">
     <h1 class="display-4 font-weight-bold">Selamat Datang di Bacajuga<br>
     <div class="highlight-line"></div>
     <p class="lead">cari artikel yang kamu suka</p>
     <div class="btn-group-custom d-flex justify-content-center mt-4 flex-wrap">
       <!-- <a href="#" class="btn btn-outline-light mb-2 btn-smaller"> -->
         <!-- <i class="bi bi-play-circle"></i> Watch Our Video -->
       </a>
       <!-- <a href="tel:+62 815-5358-9753" class="btn btn-success mb-2 btn-smaller"> -->
         <!-- <i class="bi bi-telephone-fill"></i> Call Us Now<br> -->
         <!-- <small>+62 815-5358-9753</small> -->
       </a>
     </div>
   </div>
 </section>
 
 <!-- Artikel Section -->
 <div class="container mt-5">
   <div class="row">
 <?php
 include("koneksi.php");
 
 $sql = "SELECT * FROM article";
 $hasil = mysqli_query($koneksi, $sql);
 
 $jmlArtikel = mysqli_num_rows($hasil);
 if($jmlArtikel > 0) {
   while($row = mysqli_fetch_assoc($hasil)) {
     $wordLimit = 30;
     $words = explode(" ", $row["content"]);
     $artikel = implode(" ", array_slice($words, 0, $wordLimit));
     $id = $row["id"];
 ?>
     <div class="col-md-4 d-flex">
       <div class="article-card w-100">
         <h4><?= $row["title"]; ?></h4>
         <p>
           <?= $artikel ?>
           <?php if (count($words) > $wordLimit): ?>
             <a href="news.php?id=<?= $row['id']; ?>" class="btn btn-primary">baca</a>
           <?php endif; ?>
         </p>
       </div>
     </div>
 <?php
   }
 }
 ?>
   </div>
 </div>
 
 </body>
 </html>