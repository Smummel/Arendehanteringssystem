<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hej</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
            <a href="index.php?location=omoss">Om oss</a>
            <a href="">Logga in</a>
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
                        <a href="">Rapportera ett fall</a>
                        <a href="">Se våra tidigare fall</a>
                    </div>
                </div>
            <?php
        } elseif($location=='omoss'){
            ?>
            <div id="omosscontent">
                
            </div>
            <?php
        } elseif($location=='loggain'){
            ?>
            
            <?php
        } elseif($location=='faq'){
            ?>
            <div id="faqcontent">
                <h2>Vanliga frågor:</h2>
                <p>Q: Hur vet jag om jag behöver er hjälp?<br>A: Rapportera ditt fall så överväger vi. </p>
                <p>Q: Jag tror att jag är hemsökt, vad ska jag göra? <br>A: Rapportera ditt fall till oss, ring vårt nödnummer om det behövs.</p>
                <p>Q: Jag har en känsla av att någon tittar på mig när jag är ensam, men ser ingen. Är det något övernaturligt?<br>A: Ring nödnumret. </p>
                <p>Q: Är det sant att spöken gillar att spela på Ouija-brädor?<br>A: Nej, det är bara påhitt. Spöken spelar biljard.</p>
                <p>Q: Finns verkligen spöken?<br>A: Kolla på våra inlägg och avgör själv.</p>
            </div>
            <?php
        }
        ?>
    <div id="footer">
        <h1></h1>
        <div id="footbar">
            <div id="footerstuff">
                <a href="index.php?location=faq">FAQ</a>
                <p>&copy;Mystic Fixers 2025</p>
            </div>
        </div>
    </div>
</body>
</html>