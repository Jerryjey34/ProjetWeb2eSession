<?php

require_once './DBConnect/connect.php';

$req = DBConnect();

$req->query("DELETE FROM classGA");
$req->query("DELETE FROM classGB");

$sClassementA = "INSERT INTO classGA SELECT * FROM GroupA ORDER BY PT DESC";
$classementA = $req->query($sClassementA);

$sClassementB = "INSERT INTO classGB SELECT * FROM GroupB ORDER BY PT DESC";
$classementB = $req->query($sClassementB);

//fONCTION QUI RETOURNE L'EQUIPE GAGNANTE
function winner($eq1, $eq2)
{
    $conn = DBConnect();
    $sql = "SELECT victoire from Confrontation WHERE equipe1=$eq1 and equipe2=$eq2";
    if ($exec = $conn->query($sql)->fetchObject()) {
        return $exec->victoire;
    }
    return 0;
}



$conn = DBConnect();
$reqA = $conn->query("SELECT * FROM classGA LIMIT 2")->fetchAll();
$reqA2 = $conn->query("SELECT * FROM classGA LIMIT 2,2")->fetchAll();

if ($reqA[0]['PT'] == $reqA[1]['PT']) {
    $vic = winner($reqA[0]['id'], $reqA[1]['id']);

    // Verification si l'equipe gagnante est placee en deuxieme position
    if ($vic == $reqA[1]['id']) {
        $tempon = $reqA[0];
        $reqA[0] = $reqA[1];
        $reqA[1] = $tempon;
    }

    if ($vic == 0) {
        if ($reqA[1]['BP'] > $reqA[0]['BP']) {
            $tempon = $reqA[0];
            $reqA[0] = $reqA[1];
            $reqA[1] = $tempon;
        }

        if ($reqA[1]) {
            if ($reqA[1]['BP'] == $reqA[0]['BP']) {
                $tempon = $reqA[0];
                $reqA[0] = $reqA[1];
                $reqA[1] = $tempon;
            }
        }
    }



    if ($reqA2[0]['PT'] == $reqA2[1]['PT']) {
        $vic = winner($reqA2[0]['id'], $reqA2[1]['id']);

        // Verification si l'equipe gagnante est placee en deuxieme position
        if ($vic == $reqA2[1]['id']) {
            $tempon = $reqA2[0];
            $reqA2[0] = $reqA2[1];
            $reqA2[1] = $tempon;
        }

        if ($vic == 0) {
            if ($reqA2[1]['BP'] > $reqA2[0]['BP']) {
                $tempon = $reqA2[0];
                $reqA2[0] = $reqA2[1];
                $reqA2[1] = $tempon;
            }

            if ($reqA2[1]) {
                if ($reqA2[1]['BP'] == $reqA2[0]['BP']) {
                    $tempon = $reqA2[0];
                    $reqA2[0] = $reqA2[1];
                    $reqA2[1] = $tempon;
                }
            }
        }
    }
}



// partie b
$conn = DBConnect();
$reqB = $conn->query("SELECT * FROM classGB LIMIT 2")->fetchAll();
$reqB2 = $conn->query("SELECT * FROM classGB LIMIT 2,2")->fetchAll();

if ($reqB[0]['PT'] == $reqB[1]['PT']) {
    $vic = winner($reqB[0]['id'], $reqB[1]['id']);

    // Verification si l'equipe gagnante est placee en deuxieme position
    if ($vic == $reqB[1]['id']) {
        $tempon = $reqB[0];
        $reqB[0] = $reqB[1];
        $reqB[1] = $tempon;
    }

    if ($vic == 0) {
        if ($reqB[1]['BP'] > $reqB[0]['BP']) {
            $tempon = $reqB[0];
            $reqB[0] = $reqB[1];
            $reqB[1] = $tempon;
        }

        if ($reqB[1]) {
            if ($reqB[1]['BP'] == $reqB[0]['BP']) {
                $tempon = $reqB[0];
                $reqB[0] = $reqB[1];
                $reqB[1] = $tempon;
            }
        }
    }
}


if ($reqB2[0]['PT'] == $reqB2[1]['PT']) {
    $vic = winner($reqB2[0]['id'], $reqB2[1]['id']);

    // Verification si l'equipe gagnante est placee en deuxieme position
    if ($vic == $reqB2[1]['id']) {
        $tempon = $reqB2[0];
        $reqB2[0] = $reqB2[1];
        $reqB2[1] = $tempon;
    }

    if ($vic == 0) {
        if ($reqB2[1]['BP'] > $reqB2[0]['BP']) {
            $tempon = $reqB2[0];
            $reqB2[0] = $reqB2[1];
            $reqB2[1] = $tempon;
        }

        if ($reqB2[1]) {
            if ($reqB2[1]['BP'] == $reqB2[0]['BP']) {
                $tempon = $reqB2[0];
                $reqB2[0] = $reqB2[1];
                $reqB2[1] = $tempon;
            }
        }
    }
}
