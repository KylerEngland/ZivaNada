<!DOCTYPE html>
<html lang="hr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Živa Nada</title>
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/favicon/site.webmanifest">
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
    type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />

  <style>
    body {
      background-image: url("assets/img/riva.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      height: 100vh;
      position: relative;
      /* Add this to make the ::before pseudo-element position correctly */
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /* background-color: rgba(108, 117, 125, 0.6); */
      background-color: rgba(33, 37, 41, 0.6);

    }

    .middle-text {
      color: #fff;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      display: flex;
      flex-direction: column;
    }

    .middle-text h1 {
      font-size: 5rem;
    }

    .middle-text span {
      font-size: 1.5rem;
      font-weight: 300;
      line-height: 1.1;
      font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

    }

    .middle-text-subheading {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 10rem;
    }
  </style>
</head>

<body>

  <?php include_once('includes/navbar.php'); ?>


  <div class="middle-text">
    <h1>Živa Nada</h1>
    <span>Kristova Crkva</span>
    <div class="middle-text-subheading">
      <a class="btn btn-primary btn-lg" href="vrijednosti.php">Saznaj vise &raquo;</a>
    </div>
  </div>

</body>

</html>