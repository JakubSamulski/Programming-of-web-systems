<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report confirmed</title>
</head>

<body>
    <p>
        <?php
        $phoneNumber = $_POST["phoneNumber"];
        $phoneNumber = (int) $phoneNumber;
        echo "Your phone number is $phoneNumber <br>";
        echo gettype($phoneNumber) . " - " . $phoneNumber;
        echo "<br>";
        echo gettype((string) $phoneNumber) . " - " . $phoneNumber;
        echo "<br>";
        echo gettype($phoneNumber) . " - " . $phoneNumber;
        echo "<br>";
        settype($phoneNumber, 'string');
        echo gettype($phoneNumber) . " - " . $phoneNumber;
        echo "<br>";
        settype($phoneNumber, 'int');
        ?>
    </p>

    <p>
        <?php
        const SURNAME = "Kluska ";
        // surname = "other";
        define('NAME', $_POST["Name"] . " ");
        echo NAME;
        echo SURNAME;
        echo gettype(NAME);
        ?>
    </p>

    <p>
        <?php
        if ($phoneNumber > 500000000) {
            echo "Your number is very high <br>";
        }
        if ($phoneNumber < 500000000) {
            echo "Your number is very low <br>";
        }
        if ($phoneNumber == 500000000) {
            echo "Your number is just right <br>";
        }
        $phoneNumber++;
        echo "Incremented number: " . $phoneNumber . "<br>";
        $phoneNumber -= 1000;
        echo "Decremented number by 1000: " . $phoneNumber . "<br>";
        $modulo = $phoneNumber % 3;
        echo "Modulo 3: " . $modulo . "<br>";
        $result = 2 + 2 * 2;
        echo "2 + 2 * 2 = " . $result . "<br>";
        ?>
    </p>

    <p>
        <?php
        $url_length = strlen($_POST["url"]);
        $normal_array = array("Text1", "Text2", "Text3");
        $dictionary = array("Text1" => "Great", "Text2" => "Awesome", "Text3" => "Not bad");

        echo "Array elements: <br>";
        for ($i = 0; $i < count($normal_array); $i++) {
            echo $normal_array[$i] . "<br>";
        }

        echo "Dictionary values: <br>";
        foreach ($dictionary as $key => $value) {
            echo $key . " - " . $value . "<br>";
        }

        echo "Comment for today based on color length is: " . $dictionary[$normal_array[$url_length % 3]] . "<br>";

        echo "<br>";
        echo current($dictionary) . "-" . key($dictionary) . "<br>";
        echo next($dictionary)  . "-" . key($dictionary) . "<br>";
        echo next($dictionary)  . "-" . key($dictionary) . "<br>";
        echo reset($dictionary) . "-" . key($dictionary) . "<br>";
        ?>
    </p>

</body>

</html>