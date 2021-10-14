<?php

session_start();

require_once './DBConnect/connect.php';
require_once './log.php';
$req = DBConnect();

$reqGroupA = $req->query("SELECT * FROM GroupA");
$reqGroupA = $reqGroupA->fetchAll();

$reqGroupB = $req->query("SELECT * FROM GroupB");
$reqGroupB = $reqGroupB->fetchAll();



// var_log($reqGroupA[0]['id']);
// var_log($reqGroupA[1]['id']);

function confrontation($eq1, $eq2, $victoire, $idMatch)
{
    $conn = DBConnect();
    $sqlC = "UPDATE Confrontation set equipe1=$eq1,equipe2=$eq2,victoire=$victoire WHERE idmatch=$idMatch";
    $conn->query($sqlC);
}


if (isset($_GET['eq1']) && isset($_GET['eq2'])) {
    $demi1 = htmlspecialchars(strip_tags($_GET['eq1']));
    $demi2 = htmlspecialchars(strip_tags($_GET['eq2']));
}


if (isset($_POST['ma'])) {

    switch ($_POST['ma']) {
        case 'ma1':
            $_SESSION['score1m1'] = $_POST['sc1'];
            $_SESSION['score2m1'] = $_POST['sc2'];
            $_SESSION['match'][0] = true;

            traitementMatch($_SESSION['score1m1'], $_SESSION['score2m1'], intval($reqGroupA[0]['id']), intval($reqGroupA[1]['id']), 'GroupA', 1);
            break;
        case 'ma2':
            $_SESSION['score1m2'] = $_POST['sc3'];
            $_SESSION['score2m2'] = $_POST['sc4'];
            $_SESSION['match'][1] = true;
            traitementMatch($_SESSION['score1m2'], $_SESSION['score2m2'], intval($reqGroupA[2]['id']), intval($reqGroupA[3]['id']), 'GroupA', 2);
            break;
        case 'ma3':
            $_SESSION['score1m3'] = $_POST['sc5'];
            $_SESSION['score2m3'] = $_POST['sc6'];
            $_SESSION['match'][2] = true;
            traitementMatch($_SESSION['score1m3'], $_SESSION['score2m3'], intval($reqGroupA[0]['id']), intval($reqGroupA[2]['id']), 'GroupA', 3);
            break;
        case 'ma4':
            $_SESSION['score1m4'] = $_POST['sc7'];
            $_SESSION['score2m4'] = $_POST['sc8'];
            $_SESSION['match'][3] = true;
            traitementMatch($_SESSION['score1m4'], $_SESSION['score2m4'], intval($reqGroupA[1]['id']), intval($reqGroupA[3]['id']), 'GroupA', 4);
            break;
        case 'ma5':
            $_SESSION['score1m5'] = $_POST['sc9'];
            $_SESSION['score2m5'] = $_POST['sc10'];
            $_SESSION['match'][4] = true;
            traitementMatch($_SESSION['score1m5'], $_SESSION['score2m5'], intval($reqGroupA[0]['id']), intval($reqGroupA[3]['id']), 'GroupA', 5);
            break;

        case 'ma6':
            $_SESSION['score1m6'] = $_POST['sc11'];
            $_SESSION['score2m6'] = $_POST['sc12'];
            $_SESSION['match'][5] = true;
            traitementMatch($_SESSION['score1m6'], $_SESSION['score2m6'], intval($reqGroupA[1]['id']), intval($reqGroupA[2]['id']), 'GroupA', 6);
            break;

        case 'ma7':
            $_SESSION['score1m7'] = $_POST['sc13'];
            $_SESSION['score2m7'] = $_POST['sc14'];
            $_SESSION['match'][6] = true;
            traitementMatch($_SESSION['score1m7'], $_SESSION['score2m7'], intval($reqGroupB[0]['id']), intval($reqGroupB[1]['id']), 'GroupB', 7);
            break;

        case 'ma8':
            $_SESSION['score1m8'] = $_POST['sc15'];
            $_SESSION['score2m8'] = $_POST['sc16'];
            $_SESSION['match'][7] = true;
            traitementMatch($_SESSION['score1m8'], $_SESSION['score2m8'], intval($reqGroupB[2]['id']), intval($reqGroupB[3]['id']), 'GroupB', 8);
            break;
        case 'ma9':
            $_SESSION['score1m9'] = $_POST['sc17'];
            $_SESSION['score2m9'] = $_POST['sc18'];
            $_SESSION['match'][8] = true;
            traitementMatch($_SESSION['score1m9'], $_SESSION['score2m9'], intval($reqGroupB[0]['id']), intval($reqGroupB[2]['id']), 'GroupB', 9);
            break;
        case 'ma10':
            $_SESSION['score1m10'] = $_POST['sc19'];
            $_SESSION['score2m10'] = $_POST['sc20'];
            $_SESSION['match'][9] = true;
            traitementMatch($_SESSION['score1m10'], $_SESSION['score2m10'], intval($reqGroupB[1]['id']), intval($reqGroupB[3]['id']), 'GroupB', 10);
            break;
        case 'ma11':
            $_SESSION['score1m11'] = $_POST['sc21'];
            $_SESSION['score2m11'] = $_POST['sc22'];
            $_SESSION['match'][10] = true;
            traitementMatch($_SESSION['score1m11'], $_SESSION['score2m11'], intval($reqGroupB[0]['id']), intval($reqGroupB[3]['id']), 'GroupB', 11);
            break;
        case 'ma12':
            $_SESSION['score1m12'] = $_POST['sc23'];
            $_SESSION['score2m12'] = $_POST['sc24'];
            $_SESSION['match'][11] = true;
            traitementFinal($_SESSION['score1m12'], $_SESSION['score2m12'], intval($reqGroupB[1]['id']), intval($reqGroupB[2]['id']), 'GroupB', 12);
            break;
        case 'ma13':
            $_SESSION['score1m13'] = $_POST['sc25'];
            $_SESSION['score2m13'] = $_POST['sc26'];
            $_SESSION['match'][12] = true;
            traitementFinal($_SESSION['score1m13'], $_SESSION['score2m13'], $demi1, $demi2, 'demi13');
            break;
        case 'ma14':
            $_SESSION['score1m14'] = $_POST['sc27'];
            $_SESSION['score2m14'] = $_POST['sc28'];
            $_SESSION['match'][13] = true;
            traitementFinal($_SESSION['score1m14'], $_SESSION['score2m14'], $demi1, $demi2, 'demi14');
            break;
        case 'ma15':
            $_SESSION['score1m15'] = $_POST['sc29'];
            $_SESSION['score2m15'] = $_POST['sc30'];
            $_SESSION['match'][14] = true;
            traitementFinal($_SESSION['score1m15'], $_SESSION['score2m15'], $demi1, $demi2, 'petiteFinale');
            break;
        case 'ma16':
            $_SESSION['score1m16'] = $_POST['sc31'];
            $_SESSION['score2m16'] = $_POST['sc32'];
            $_SESSION['match'][15] = true;
            traitementFinal($_SESSION['score1m16'], $_SESSION['score2m16'], $demi1, $demi2, 'grandeFinale');
            break;
    }
}




function traitementMatch($sc1, $sc2, $id1, $id2, $type, $numeroMatch)
{
    $req = DBConnect();
    $equipe1 = $req->query("SELECT * FROM $type WHERE id=$id1");
    $equipe1 = $equipe1->fetchObject();

    $equipe2 = $req->query("SELECT * FROM $type WHERE id=$id2");
    $equipe2 = $equipe2->fetchObject();

    if ($sc1 > $sc2) {
        $sUpdate1 = "UPDATE $type SET 
        MJ=$equipe1->MJ+1,
        MG=$equipe1->MG+1,
        BP=$equipe1->BP+$sc1,
        BC=$equipe1->BC+$sc2,
        DF=$equipe1->DF+($sc1-$sc2),
        PT=$equipe1->PT+3
        WHERE id=$id1";
        $req->query($sUpdate1);


        $sUpdate2 = "UPDATE $type SET 
        MJ=$equipe2->MJ+1,
        MP=$equipe2->MP+1,
        BP=$equipe2->BP+$sc2,
        BC=$equipe2->BC+$sc1,
        DF=$equipe2->DF+($sc2-$sc1)
        WHERE id=$id2";
        $req->query($sUpdate2);

        confrontation($equipe1->id, $equipe2->id, $equipe1->id, $numeroMatch);
    } else if ($sc2 > $sc1) {
        $sUpdate1 = "UPDATE $type SET 
        MJ=$equipe1->MJ+1,
        MP=$equipe1->MP+1,
        BP=$equipe1->BP+$sc1,
        BC=$equipe1->BC+$sc2,
        DF=$equipe1->DF+($sc1-$sc2)
        WHERE id=$id1";

        $req->query($sUpdate1);

        $sUpdate2 = "UPDATE $type SET
        MJ=$equipe2->MJ+1,
        MG=$equipe2->MG+1,
        BP=$equipe2->BP+$sc2,
        BC=$equipe2->BC+$sc1,
        DF=$equipe2->DF+($sc2-$sc1),
        PT=$equipe2->PT+3
        WHERE id=$id2";
        $req->query($sUpdate2);
        confrontation($equipe1->id, $equipe2->id, $equipe2->id, $numeroMatch);
    } else if ($sc1 = $sc2) {
        $sUpdate1 = "UPDATE $type SET 
        MJ=$equipe1->MJ+1,
        MN=$equipe1->MN+1,
        BP=$equipe1->BP+$sc1,
        BC=$equipe1->BC+$sc2,
        DF=$equipe1->DF+($sc1-$sc2),
        PT=$equipe1->PT+1
        WHERE id=$id1";
        $req->query($sUpdate1);


        $sUpdate2 = "UPDATE $type SET
        MJ=$equipe2->MJ+1,
        MN=$equipe2->MN+1,
        BP=$equipe2->BP+$sc2,
        BC=$equipe2->BC+$sc1,
        DF=$equipe2->DF+($sc2-$sc1),
        PT=$equipe2->PT+1
        WHERE id=$id2";
        $req->query($sUpdate2);

        confrontation($equipe1->id, $equipe2->id, 0, $numeroMatch);
    }
}


function traitementFinal($score1, $score2, $equipe1, $equipe2, $match)
{

    if ($score1 > $score2) {
        $_SESSION[$match]['equipeG'] = $equipe1;
        $_SESSION[$match]['equipeP'] = $equipe2;
        header("Location:./Phase_Finale.php");
    } else if ($score2 > $score1) {
        $_SESSION[$match]['equipeG'] = $equipe2;
        $_SESSION[$match]['equipeP'] = $equipe1;
        header("Location:./Phase_Finale.php");
    } else {
        $_SESSION[$match]['equipeG'] = null;
        $_SESSION[$match]['equipeP'] = null;

        if ($match == 'demi13') {
            $_SESSION['match'][12] == false;
            header("Location:./Phase_Finale.php");
        }
        if ($match == 'demi14') {
            $_SESSION['match'][13] == false;
            header("Location:./Phase_Finale.php");
        }
    }
}
