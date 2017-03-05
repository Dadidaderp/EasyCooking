<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo Configuration::$APPLICATION_TITLE; ?></title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include("View/menu.php"); ?>
  <h2>Se connecter</h2>
  <form action="?p=connexion" method="POST" id="formInscription">
    <?php if (isset($err)) {
    echo $err;
  } ?>
      <div class="form-group">
       <label for="exampleInputEmail1">Email address</label>
       <input type="email" class="form-control" name="mail" id="exampleInputEmail1" placeholder="Email">
     </div>
     <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
     </div>
     <button type="submit" class="btn btn-default">Se connecter</button>
  </form>
</body>
</html>
