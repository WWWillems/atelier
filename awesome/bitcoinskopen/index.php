<?php
    session_start();

    require('bitstamp.php');

    // store session data
    $_SESSION['views']+=1;

    /*$KEY = hash_hmac("sha256", "message", "");
    $SECRET = hash_hmac("sha256", "message", "");

    $bs = new Bitstamp($KEY, $SECRET, "");

    print("" . $KEY . "<br />");
    print("" . $SECRET . "<br />");

    print_r($bs->ticker());*/


   //header('Content-type: application/json');
    //$strJSON = file_get_contents('https://www.bitstamp.net/api/ticker/');
    //$objJSON = eval("(function(){return " + $strJSON + ";})()");
  // echo $strJSON
 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title></title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>


        <!-- MY CODE -->
        <script type="text/javascript">
            // 3
            $(document).ready(function() {
                $.ajax({
                    type: "GET",
                    url: "https://www.bitstamp.net/api/ticker/",
                    async: false,
                    beforeSend: function(x) {
                        if(x &amp;&amp; x.overrideMimeType) {
                            x.overrideMimeType("application/j-son;charset=UTF-8");
                        }
                    },
                    dataType: "json",
                    success: function(data){
                        //do your stuff with the JSON data

                        console.log("SUCCES");
                    }
                });


                $("#driver").click(function(event){
                    $.getJSON('https://www.bitstamp.net/api/ticker/', function(jd) {
                        json.parse(jd);

                        $('#stage').html('<p> High: ' + jd.high + '</p>');
                        $('#stage').append('<p>Low : ' + jd.low+ '</p>');
                        $('#stage').append('<p>Volume: ' + jd.volume+ '</p>');
                    });
                });
            });

            // 2
            $(document).ready(function() {
                $("#driver").click(function(event){
                    $.getJSON('https://www.bitstamp.net/api/ticker/', function(jd) {
                        json.parse(jd);

                        $('#stage').html('<p> High: ' + jd.high + '</p>');
                        $('#stage').append('<p>Low : ' + jd.low+ '</p>');
                        $('#stage').append('<p>Volume: ' + jd.volume+ '</p>');
                    });
                });
            });


            // 1
           /* $(document).ready(function(){
                var url = 'https://www.bitstamp.net/api/ticker/';
                $.ajax({
                    type: 'GET',
                    url: 'https://www.bitstamp.net/api/ticker/',
                    dataType: 'json',
                    success: jsonParser
                });

                $.getJSON(url, function(data){
                    function jsonParser(json){
                        $.each(function(k,v){
                            var last = v.last;
                            var high = v.high;
                            var low = v.low;
                            var time = v.timestamp;

                            //$('#container').append('<div><p id="last">'+last+'</p><p id="high">'+high+'</p><p id="low">'+low+'</p><p id="time">'+time+'</p></div>');
                        });
                    };
                });

            });*/



            //$('#container').append('<br/><p>End of code flag</p>');
        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <h3>Welkom!</h3>

        <h4 id="currentPrice"></h4>

        <p>
            <ul id="container">

            </ul>
        </p>

        <p>Click on the button to load result.html file:</p>
        <div id="stage">
            STAGE
        </div>
        <input type="button" id="driver" value="Load Data" />

        <form action="welcome.php" method="post">
            Aantal: <input type="text" name="txtAmount"><br>
            Adres: <input type="text" name="txtAddress"><br>
            <input type="submit">
        </form>

        <?php
            print("This page has been viewed " . getPageViews() . " times");

            function getPageViews(){
                return $_SESSION['views'];
            }
        ?>
     


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
