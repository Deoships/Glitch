<?php
 session_start(); 

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/hype.png">
    <link rel="stylesheet" href="../css/profile.css">
    <title>GLITCH</title>
</head>
<body> 
    <div class="container">
        <header>
            <div class="main-menu">
                <ul class="main-menu main-menu_left">
                    <li class="main-menu__item"><a href="./main.html" class="main-menu__link">Aboutus</a></li>
                    <li class="main-menu__item"><a href="./main.html" class="main-menu__link">Zone</a></li>
                    <li class="main-menu__item"><a href="./contacts.html" class="main-menu__link">Contacts</a></li>
                </ul> 
                <ul class="main-menu main-menu_center">
                <li class="main-menu__item"><a href="./main.html" class="main-menu__link"><div class="main-menu__link_img"></div></a></li>
                </ul>
                <ul class="main-menu main-menu_right">
                    <li class="main-menu__item">
                        <p>
                        <?php 

                            echo($_SESSION['user']['nick']);
                        
                        ?>
                    </p>
                    </li>
                </ul>
            </div>
    </header>
    <section>
        <div class="booking">
            <form  action="../php/reserv.php" method="post">
                <h2>Booking</h2>
                <p>
                    <label class="start"> Session star  </label>
                    <input type="time" name="time_start" >
                </p>
                <p>
                    <label class="end" > Session end  </label>
                    <input type="time" name="time_end" >
                </p>

                <p>
                    <label class="tarif">Tarif</label>
                    <select type="text" name="list">
                        <option type="text">Noob</option>
                        <option type="text">Pro</option>
                        <option type="text">God</option>
                    </select>
                    <label class="equipment">Equipment</label>
                    <select type="text" name="list1">
                        <option type="text">computer</option>
                        <option type="text">notebook</option>
                        <option type="text">consol</option>
                    </select>
                </p>
                <input type="submit" style="margin-left: 75px;">
            </form>
        </div>
        <div class="pay">
                <h1><?php echo $_SESSION['price']; ?>  $</h1>
            <button><a class="button-text">Pay</a></button>
        </div>
    </section>
    <footer>
        <div class="info">
            <div class="info_number"><h3>+7 (666) 666 66 66</h3></div>
            <div class="info_adress"><h3>Steven Bernson, Attorney at Law <br>1556 Broadway, suite 416<br>New York, NY, 10120, USA</h3></div>
            <div class="info_icons"><div class="info_icons_facebook"></div>
            <div class="info_icons_twitter"></div>
            <div class="info_icons_insta"></div></div>
        </div>
    </footer>
</div>

</body>
</html>