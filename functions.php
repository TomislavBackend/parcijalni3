<?php
    function brojacZnakova($word)
    {
        $word = strtolower($word); // turn string to lower case
        $word = str_split($word); // podijeli string na slova niza/polja

        $suglasnik = 0;
        $samoglasnik = 0;

        foreach($word as $character)
        {
            switch($character)
            {
                case "a":
                case "e":
                case "i":
                case "o":
                case "u":
                    $samoglasnik++;
                    break;
                default:
                    $suglasnik++;
                    break;
            }
        }
        return array($samoglasnik, $suglasnik);
    }






?>