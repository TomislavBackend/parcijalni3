<?php
    include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcijalni Isipit - Osnove PHP-a</title>
</head>
<body>
    <div style="width: 50%; float: left";>
    <form action="" method="POST">
        <label for="word"> Upišite riječ: </label>
        </br>
        <input type="text" name = "word">
        </br>
        </br>
        <input type="submit" value="Pošalji">
    </div>

    <div style="width: 45%; float: right";>
        <table border="1" cellpadding = "7">
            <tr>
                <th>Riječ</th>
                <th>Broj slova</th>
                <th>Broj suglasnika</th>
                <th>Broj samoglasnika</th>
            </tr>
                <?php
                    $wordsJson = file_get_contents(__DIR__."words.json");
                    $letters = json_decode($wordsJson, true);
                    // var_dump($letters);
                    if(empty($_POST))
                    {
                        echo "upišite željenu riječ";
                    }
                    elseif(empty($_POST["word"]))
                    {
                        echo "polje ne smije biti prazno";
                    }
                    elseif(!empty($_POST["word"]) && ctype_alpha($_POST["word"]))
                    {
                        echo "upišite željenu riječ";
                        $word = $_POST["word"];
                        $letters[] = $_POST["word"];                     
                    }
                    else
                    {
                        echo "upišite riječ:";
                    }
                    $wordsJson = json_encode($letters);
                    file_put_contents(__DIR__."words.json", $wordsJson);

                    foreach($letters as $character)
                    {
                        $characterCount = strlen($character);
                        $samoglasnikCount = brojacZnakova($character)[0];
                        $suglasnikCount = brojacZnakova($character)[1];

                        echo '<tr>';
                        echo '<td>'.$character.'</td>';
                        echo '<td>'.$characterCount.'</td>';
                        echo '<td>'.$samoglasnikCount.'</td>';
                        echo '<td>'.$suglasnikCount.'</td>';
                        echo '</tr>';

                    }

                ?>

        </table>

    </div>
    
</body>
</html>