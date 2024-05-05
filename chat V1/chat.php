<?php
$id = mysqli_connect("localhost","root","","chat");
if(isset($_POST["bout"])){
    $pseudo = $_POST["pseudo"];
    $message = $_POST["message"];
    $req = "insert into messages values (null, '$pseudo', '$message', now())";
    mysqli_query($id, $req);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header><h1>Chattez'en direct, ChatBox!</h1></header>
        <div class="messages">
            <ul>
                <?php
                  $req = 'SELECT * FROM messages ORDER BY date DESC';
                $res = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($res)){
                    echo "<li class='message'>".
                                            $ligne["date"]." - ".
                                            $ligne["pseudo"]." - ".
                                            $ligne["message"]. 
                        "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo :" required>
                <input type="text" name="message" placeholder="Message : " required><br>
                <input type="submit" value="Envoyer" name="bout">
            </form>
        </div>
    </div>
</body>
</html>