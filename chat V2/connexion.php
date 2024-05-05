<?php
session_start();
$id = mysqli_connect("localhost","root","","chat");
if(isset($_POST["bouton"])){
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $req = "select * from user where mail='$mail' and mdp = '$mdp'";
    $res = mysqli_query($id, $req);
    if(mysqli_num_rows($res) == 1){
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["idu"] = $ligne["idu"];
        $_SESSION["mail"] = $mail;
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["pseudo"] = $ligne["pseudo"];
        $_SESSION["niveau"] = $ligne["niveau"];
        header("location:chat.php");
    }else{
        $erreur = "Erreur de login ou de mot de passe...";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
      <div class="row">

        <form action="" class="bg-dark" method="post">
    
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input class="form-control" type="email" name="mail" placeholder="Mail">
      
         
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input  class="form-control" type="password" name="mdp" placeholder="Mot de passe">
            <?php if(isset($erreur)) echo "<b>$erreur</b>";?>
       
          <div class="text-center mt-3">
            <button class="btn btn-warning" type="submit" value="Connexion" name="bouton">Connexion</button>
          </div>

        </form>
        
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
