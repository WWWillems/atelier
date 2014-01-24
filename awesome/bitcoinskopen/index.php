<?php
    session_start();

    require('bitstamp.php');

    // store session data
    $_SESSION['views']+=1;

    /*$KEY = hash_hmac("sha256", "message", "");
    $SECRET = hash_hmac("sha256", "message", "");

    $bs = new Bitstamp($KEY, $SECRET, "");

    print("" . $KEY . "<br />");
    print("" . $SECRET . "<br />");*/



    function getBitstampTicker(){
        $url = "https://www.bitstamp.net/api/ticker/";

        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);

        // TEST DUMP
        // Will dump a beauty json :3
        //var_dump(json_decode($result, true));

        $response = json_decode($result);

        //print $response->{'bid'};

        return  $response->{'bid'};
    }

    getBitstampTicker();
 ?>

<!DOCTYPE html >
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>My test project</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <link rel="shortcut icon" href="/favicon.ico" />

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>


        <!-- MY CODE -->
        <script type="text/javascript">
            $(document).ready(function() {
                console.log("> Document ready!");


            });

        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div id="master_container">
        <header>
            <h4 id="currentPriceContainer">Price: <span id="currentPrice"><?php echo getBitstampTicker(); ?></span></h4>
        </header>

        <h3>Welkom!</h3>


        <div id="content">
            <form action="welcome.php" method="post">
                Aantal: <input type="text" name="txtAmount"><br>
                Adres: <input type="text" name="txtAddress"><br>
                <input type="submit">
            </form>
        </div>

        <footer>
            <?php
            print("This page has been viewed " . getPageViews() . " times");

            function getPageViews(){
                return $_SESSION['views'];
            }
            ?>
        </footer>
    </div>


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
