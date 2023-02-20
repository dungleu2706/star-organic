<?php require_once "admin/adminFunction.php" ?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="stylesheet" href="css/galleries.css">
  <!-- <link rel="stylesheet" href="css/index_style.css"> -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style>
    body {
      background-color: #99FFFF;
    }

    /* .items a {
      padding: 7px 25px;
      font-size: 18px;
      font-weight: 500;
      cursor: pointer;
      color: #990000;
      border-radius: 50px;
      border: 2px solid #FF0000;
      transition: all 0.3s ease;
      margin-left: 100px;
    }

    .items a.active,
    .items a:hover {
      color: #fff;
      background: #990000;
    }

    .items {
      padding: 7px 25px;
      font-size: 18px;
      font-weight: 500;
      cursor: pointer;
      color: #007bff;
      border-radius: 50px;
      border: 2px solid #007bff;
      transition: all 0.3s ease;
      margin-left: 10px;
      margin-right: 10px;
    } */
  </style>
</head>

<body>
  <div>
    <h2>STAR ORGANIC'S PHOTO GALLERY</h2>
  </div>
  <div class="wrapper">
    <!-- filter Items -->
    <nav>
      <div class="items">
        <span class="item active" data-name="all">All</span>
        <?php
        $conn = connect();
        $category = $conn->query("SELECT DISTINCT category FROM gallery");
        foreach ($category as $value) : ?>
        <span class="item" data-name="<?=$value['category']?>"><?=$value['category']?></span>
        <?php endforeach; $conn->close(); ?>
        <a class="item" href="index.php">Home</a>
      </div>
    </nav>
    <!-- filter Images -->
    <div class="gallery">
      <?php
      $gallery = admin_displayGallery('');
      foreach ($gallery as $pic) : ?>
        <div class="image" data-name="<?= $pic['category'] ?>"><span><img src="<?= $pic['imgURL'] ?>" alt=""></span></div>
      <?php endforeach ?>
    </div>
  </div>
  <!-- fullscreen img preview box -->
  <div class="preview-box">
    <div class="details">
      <span class="title">Image Category: <p></p></span>
      <span class="icon fas fa-times"></span>
    </div>
    <div class="image-box"><img src="" alt=""></div>
  </div>
  <div class="shadow"></div>
  <script src="js/script.js"></script>

</body>

</html>