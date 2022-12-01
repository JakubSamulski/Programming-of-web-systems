<html>
    <body>
        <?php 
        
        function validatePhone(){
            if (preg_match("/[+][\d]{2}\s[\d]{3}[-][\d]{3}[-][\d]{3}/", $_GET["phone"])!=1){
                header("Location: http://localhost:3000/List9/report.html");
                die();
            }
        }
        validatePhone();
        echo "hello <br>" . 'we once said "we don\'t want more derailments" but it is what it is' . "<br>";
        // backslash as escape character

        
        $name = $_GET["Name"];

        echo "thanks" . $name . "for reporting derailment <br>";
        $place = $_GET["Place"];
        $place = strtolower(trim($place));

        if($place=="swojczyce"){
            echo "tam jeszcze nie ma tramwaju <br>";
        }
        else
        {
            echo "derailment at " . $place . "<br>";
        }

        echo "Report recived from " . $_SERVER['REMOTE_ADDR'];


        $pattern="/adam/";
        echo "<br>" . preg_replace($pattern, "Ewa", "adam ma kota");

        ?>
    </body>
</html>