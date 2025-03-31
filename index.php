<?php
    session_start();
    if(!isset($_SESSION['login'])){
        $_SESSION['login'] = FALSE;
    }
    if(!isset($_SESSION['username'])){
        $_SESSION['username'] = "UNKNOWN";
    }
?>


<!DOCTYPE html>
<?php

    $server="localhost";
    $user="root";
    $password="";
    $link=mysqli_connect($server, $user, $password, "mysticfixers");

    if(isset($_POST['btn'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $email=$_POST['email'];
        $telefon=$_POST['telefon'];
        $sql="INSERT INTO users(username, password, role, email, telefon) VALUES ('$username', '$password', 'user', '$email', '$telefon')";
        $result=mysqli_query($link, $sql);
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM blogposts WHERE id=$id";
        $result=mysqli_query($link, $sql);
    }
    

    function displaylogin(){
        ?>
        <div id="selection">
            <div id="login">
                <form action="index.php?location=login" method="POST">
                    <h1>Logga in</h1>
                    <input type="text" name="username" placeholder="Användarnamn" required>
                    <input type="password" name="password" placeholder="Lösenord" required>
                    <input type="submit" name="login" value="Logga in">
                </form>
            </div>
        </div>
        <?php
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $page = $_GET['location'];
    if($page=='home'){
        echo '<title>Mystic Fixers - Hem</title>';
    } elseif($page=='omoss'){
        echo '<title>Mystic Fixers - Om Oss</title>'; 
    } elseif($page=='login'){
        echo '<title>Mystic Fixers - Logga in</title>'; 
    } elseif($page=='faq'){
        echo '<title>Mystic Fixers - FAQ</title>'; 
    } elseif($page=='report'){
        echo '<title>Mystic Fixers - Formulär</title>'; 
    } elseif($page=='blog'){
        echo '<title>Mystic Fixers - Blog</title>'; 
    } else{
        echo '<title>Mystic Fixers</title>'; 
    } 
    ?>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Cream+Soda&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif+Caption:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    <div id="background">
        <div id="fadebox"></div>
        <img src="pexels-photo-1655901.jpeg" alt="">
    </div>
    <div id="nav">
        <div id="navbox">
            <div id="logo">m</div>
            <a href="index.php?location=home">Hem</a>
            <a href="index.php?location=blog">Blog</a>
            <a href="index.php?location=login">Internt</a>
        </div>
    </div>
    <?php
        if(isset($_GET['location'])){
            $location = $_GET['location'];
        } else{
            $location = 'home';
        }
        if($location=='home'){
            ?>    
            <div id="homecontent">
                    <p>Problem med spöken, förbannelser eller saker som rör sig av sig själva? Vi fixar det!</p>
                    <h1>Mystic Fixers</h1>
                    <div id="homecontentButtons">
                        Välkommen! Hur kan vi hjälpa dig?
                        <a id="akut" href="tel:666">Akut hjälp!</a>
                        <a href="index.php?location=report">Rapportera ett övernaturligt ärende</a>
                        <a href="index.php?location=blog">Se våra tidigare fall</a>
                    </div>
                </div>
            <?php
        } elseif($location=='omoss'){
            ?>
            <div id="omosscontent">
                <h1>Om oss</h1>
                <p>Välkommen till Mystic Fixers - experterna på att lösa det övernaturliga! Vi är ett team av erfarna utredare, mediet och teknikspecialister som hanterar allt från envisa spöken och mystiska skuggor till förbannade föremål och okända energier. Oavsett om du upplever märkliga ljud, plötsliga temperaturförändringar eller andra oförklarliga fenomen, står vi redo att hjälpa dig. Med en kombination av vetenskapliga metoder och gammal visdom ser vi till att din omgivning blir trygg igen. Mystic Fixers - för paranormala problem utan naturliga lösningar.</p>
            </div>
            <?php
        } elseif($location=='login'){
            if($_SESSION['login']==TRUE){
                ?>
                <div id="selection">
                    <h1>Du är inloggad som&nbsp;<?=$_SESSION['username']?>.</h1>
                    <div id="logoutbutton"><a href="logout.php" style="color:red;">Logga ut</a></div>

                    <h1>Ärenden</h1>
                    <?php
                    $sql = "SELECT * FROM tickets ORDER BY id ASC";
                    $result=mysqli_query($link, $sql);
                    while($rad=mysqli_fetch_assoc($result)){
                        $id=$rad['id'];
                        ?>
                            <div class=post>
                                <div class="status"><?=$rad['status']?></div>
                                <div class="kontaktuppgifter">
                                    <h3>Uppgifter</h3>
                                    <p><?=$rad['name']?></p>
                                    <p><?=$rad['email']?></p>
                                    <p><?=$rad['phone']?></p>
                                </div>
                                <div class="desc">
                                    <h3 style="width:100%; padding-left: 20px;">Beskrivning</h3>
                                    <p style="width: 100%; padding-left: 20px;">Plats: <?=$rad['plats']?></p>
                                    <p style="width: 100%; padding-left: 20px;">Datum: <?=$rad['datum']?></p>
                                    <p style="width: 100%; padding-left: 20px;"><?=$rad['description']?></p>
                                </div>
                                
                                
                                <img src="ticketimages/<?=$rad["image"]?>">
                                <?php if($_SESSION['login']==True){?><a style="color:red; padding:5px;" href="deleteticket.php?id=<?=$rad['id']?>">Ta bort ärende</a><?php }?>
                                <?php
                                    if(isset($_POST['status'])){
                                        $status = $_POST['status'];
                                        $sql="UPDATE tickets SET status='$status' WHERE id=$id";
                                        $result=mysqli_query($link, $sql);
                                        $_POST['status'] = '';
                                        header("Location: index.php?location=login");
                                    }
                                ?>
                                <div class="buttonsbar">
                                    <form action="index.php?location=login" method="POST">
                                        <h3>Ändra status:</h3>
                                        <input type="submit" name="status" value="Pågående utredning">
                                        <input type="submit" name="status" value="Väntar på kunds svar">
                                        <input type="submit" name="status" value="Avslutat - Löst">
                                        <input type="submit" name="status" value="Avslutat - Oförklarigt">
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    ?> 

                </div>

                <?php
            } else{
                if(isset($_POST['login'])){
                    $sql="SELECT username FROM users";
                    $result=mysqli_query($link, $sql);
                    $usernames=[];
                    while($rad=mysqli_fetch_assoc($result)){
                        $usernames[] = $rad['username'];
                    }
                    $username=$_POST['username'];
                    $password=md5($_POST['password']);
                    if(in_array($username, $usernames)){
                        $sql="SELECT password FROM users WHERE username = '$username'";
                        $result=mysqli_query($link, $sql);
                        $rad=mysqli_fetch_assoc($result);
                        if($rad['password']==$password){
                            $_SESSION['login'] = TRUE;
                            $_SESSION['username'] = $username;
                            header("Location: index.php?location=login");
                            exit();
                        } else{
                            displaylogin();
                            ?><div style="color:red;z-index:10;">Fel användarnamn eller lösenord</div><?php

                        }
                    } else{
                        displaylogin();
                        ?><div style="color:red;z-index:10;">Fel användarnamn eller lösenord</div><?php
                    }
                } else{
                    displaylogin();
                } 
            }

        } elseif($location=='faq'){
            ?>
            <div id="faqcontent">
                <h2>Vanliga frågor:</h2>
                <p>Q: Hur vet jag om jag behöver er hjälp?<br>A: Rapportera ditt fall så överväger vi. </p>
                <p>Q: Hur snabbt agerar ni?<br>A: Det beror på fallet, vanligtvist inom 48h.</p>
                <p>Q: Är det sant att spöken gillar att spela på Ouija-brädor?<br>A: Det beror på spöket.</p>
                <p>Q: Finns verkligen spöken?<br>A: Ja.</p>
                <p>Q: Jag hittade något slemmigt i min sons sovrum, är det spökslemm?<br>A: Vi är redan påväg.</p>
            </div>
            <?php
        } elseif($location=='report'){
            if(isset($_POST['send'])){
                $name=$_POST['namn'];
                $email=$_POST['e-post'];
                $phone=$_POST['phone'];
                $datum=$_POST['datum'];
                $plats=$_POST['plats'];
                $description=$_POST['description'];
                $photo=$_POST['photo']['name'];
                $file_name = $_FILES['photo']['name'];
                $tempname = $_FILES['photo']['tmp_name'];
                $folder = 'ticketimages/'.$file_name;
                $sql = "INSERT INTO tickets(name, email, phone, plats, datum, description, image, status) VALUES ('$name','$email','$phone', '$plats', '$datum', '$description', '$file_name', 'Nytt')";
                $result = mysqli_query($link, $sql);
                move_uploaded_file($tempname, $folder);
            }
            ?>
            <div id="report">
                
                <?php
                    if(isset($_POST['send'])){
                        ?>
                            <h1>Tack, vi har nu tagit emot anmälan!</h1>
                        <?php
                    } else{
                        ?><form action="index.php?location=report" method="POST" enctype="multipart/form-data">
                            <h2>Har du paranormala problem? Fyll i detta formulär!</h2>
                            <p>Kontaktinformation</p>
                            <input type="text" name="namn" placeholder="Ditt namn:" required>
                            <input type="text" name="e-post" placeholder="E-post:" required>
                            <input type="text" name="phone" placeholder="Telefonnummer:" required>
                            <p>Beskriv ditt problem.</p>
                            <input type="text" name="plats" placeholder="Plats för händelsen:" required>
                            <input type="date" name="datum" placeholder="Datum:" required>
                            <input type="text" name="description" placeholder="Skriv här:" required>
                            <p>Bild på problem:</p>
                            <input type="file" name="photo" style="outline:none;">
                            <input type="submit" name="send" value="Skicka"style="width: 100px;">
                            <p></p>
                        </form>
                <?php
                    }
                ?>
                
                
            </div>
            <?php
        } elseif($location=='blog'){
            if(isset($_POST['post'])){
                $file_name = $_FILES['image']['name'];
                $tempname = $_FILES['image']['tmp_name'];
                $folder = 'images/'.$file_name;
                $title=$_POST['title'];
                $caption=$_POST['caption'];
                $sql = "INSERT INTO blogposts(title, image, caption) VALUES ('$title', '$file_name', '$caption')";
                $result = mysqli_query($link, $sql);
                move_uploaded_file($tempname, $folder);
            }
            ?>
            <div id="blog">
                <h1 style="width:100%; color:white; text-align:center;">Blogsida</h1>
                <?php
                if($_SESSION['login']==TRUE){
                    ?>
                    <div id="skapapost">
                        <form action="index.php?location=blog" method="POST" enctype="multipart/form-data">
                            <h1>Skapa inlägg</h1>
                            <input type="text" name="title" placeholder="Titel">
                            <input type="file" name="image">
                            <input type="text" name="caption" placeholder="Undertext">
                            <input type="submit" name="post" value="Lägg upp"></button>
                        </form>
                    </div>
                    <?php
                    
                } ?>
                <?php
                $sql = "SELECT * FROM blogposts ORDER BY id ASC";
                    $result=mysqli_query($link, $sql);
                    while($rad=mysqli_fetch_assoc($result)){
                        ?>
                            <div class=post>
                                <h2><?=$rad["title"]?></h2>
                                <img src="images/<?=$rad["image"]?>">
                                <p><?=$rad["caption"]?></p>
                                <?php if($_SESSION['login']==True){?><a style="color:red;" href="deletepost.php&id=<?=$rad['id']?>">Ta bort</a><?php }?>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <?php
        }else{
            ?><div id="notfound"><h1>404 : Not found</h1></div><?php
        }
        ?>
    <div id="footer">
        <h1></h1>
        <div id="footbar">
            <div id="footerstuff">
                <div>
                   <a href="index.php?location=faq">FAQ</a>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a href="index.php?location=omoss">Om oss</a> 
                </div>
                
                <p>&copy;Mystic Fixers 2025</p>
            </div>
        </div>
    </div>
</body>
</html>