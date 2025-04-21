<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>Detail Berita</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   
 </head>
 <body style="background-color: #f8f9fa;">
 
 <div class="container mt-5 mb-5">
 <?php
 include("koneksi.php");
 $sql ="SELECT a.id, a.date, a.title, a.content, a.picture, au.nickname
           FROM article a
           JOIN article_author aa ON a.id = aa.article_id
           JOIN author au ON aa.author_id = au.id";
 $hasil = mysqli_query($koneksi, $sql);
 ?>
 
 <?php
 while ($row = mysqli_fetch_assoc($hasil)) {?>
 
   <div class="card shadow-lg p-4 mx-auto mb-3" style="max-width: 800px; border-radius: 20px;">
   <img src="image/<?= $row['picture']; ?>" 
      class="card-img-top mb-3 rounded mx-auto d-block"
      style="max-width: 400px; height: auto;" 
      alt="Gambar Artikel">
     <div class="card-body">
       <h3 class="card-title"><?= $row["title"]; ?></h3>
       <h6 class="text-muted"><?= $row["nickname"]; ?> | <?= $row["date"]; ?></h6>
       <p class="card-text mt-3"><?= nl2br($row["content"]); ?></p>
 
     </div>
   </div>
 <?php } ?>
 </div>
 
 </body>
 </html>