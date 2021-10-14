<?php
session_start();

$_SESSION['match'] = [null, null, null, null, null, null, null, null, null, null, null, null];
$_SESSION['score1m1'] = 0;
$_SESSION['score2m1'] = 0;

$_SESSION['score1m2'] = 0;
$_SESSION['score2m2'] = 0;

$_SESSION['score1m3'] = 0;
$_SESSION['score2m3'] = 0;

$_SESSION['score1m4'] = 0;
$_SESSION['score2m4'] = 0;

$_SESSION['score1m5'] = 0;
$_SESSION['score2m5'] = 0;

$_SESSION['score1m6'] = 0;
$_SESSION['score2m6'] = 0;

$_SESSION['score1m7'] = 0;
$_SESSION['score2m7'] = 0;

$_SESSION['score1m8'] = 0;
$_SESSION['score2m8'] = 0;

$_SESSION['score1m9'] = 0;
$_SESSION['score2m9'] = 0;

$_SESSION['score1m10'] = 0;
$_SESSION['score2m10'] = 0;

$_SESSION['score1m11'] = 0;
$_SESSION['score2m11'] = 0;

$_SESSION['score1m12'] = 0;
$_SESSION['score2m12'] = 0;



require_once './DBConnect/connect.php';
require './log.php';
$req = DBConnect();


$groupeA = [];
$groupeB = [];
$equipe = [
    'Bresil',
    'Argentine',
    'France',
    'Italie',
    'Espagne',
    'Allemagne',
    'Haiti',
    'Portugal'
];
$i = 0;
$j = 0;
$k = 0;
$l = 0;
for ($i = 0; $i < 4; $i++) {
    $rdm = rand(0, 1);
    $rdm = $rdm + $l;

    if ($rdm % 2 == 0) {
        $groupeA[$j] = $equipe[$rdm];
        $groupeB[$k] = $equipe[$rdm + 1];
        $j++;
        $k++;
    } else {

        $groupeA[$j] = $equipe[$rdm];
        $groupeB[$k] = $equipe[$rdm - 1];
        $j++;
        $k++;
    }
    $l = $l + 2;
}

//selection des groups a la base
$reqGroupA = $req->query("SELECT * FROM GroupA");
$reqGroupA = $reqGroupA->fetchAll();

$reqGroupB = $req->query("SELECT * FROM GroupB");
$reqGroupB = $reqGroupB->fetchAll();

if (isset($_POST['btn_tirage'])) {
    session_start();
    session_destroy();

    // delete les groupes a la base
    $req->query('DELETE  FROM GroupA');
    $req->query('DELETE  FROM GroupB');

    for ($i = 0; $i < 4; $i++) {
        $req->query("INSERT INTO GroupA (nom) VALUES('$groupeA[$i]')");
        $req->query("INSERT INTO GroupB (nom) VALUES('$groupeB[$i]')");
    }
    // header('Location:./classement.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOX ICONS CDN LINK -->
    <link rel="stylesheet" href="./style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Projet tournoie Inuka - Match</title>
</head>

<body>

    <section class="container_principale">

        <div class="containerUn">



            <div class="sidebar">
                <?php include "./nav.php"; ?>
            </div>


            <div class="containerdeux">

                <div class="main_content">
                    <div class="info_content">
                        <h3>Tournoi Inuka</h3>
                    </div>

                    <div class="user">
                        <li>
                            <!-- <a href="#"> -->
                            <i class='bx bxs-user'>
                                <span class="user links_name">
                                    <?php if (!isset($_SESSION['username'])) : header("location: logout.php"); ?>

                                    <?php else : ?>

                                    <?php endif ?>

                                    <?php echo "<h3>" . $_SESSION['username'] . " </h3>" ?>
                                </span>
                            </i>
                            <!-- </a> -->
                            <!-- <span class="tooltip">Dashboard</span> -->
                        </li>
                    </div>
                </div>


                <div class="MatchImages">
                    <table class="content-table-Groupe">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Groupe A </th>
                                <th>Groupe B </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1e tête de série (TDS)</td>
                                <td>
                                    <?php
                                    // echo $groupeA[0];
                                    echo $reqGroupA[0]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    // echo $groupeB[0];
                                    echo $reqGroupB[0]['nom'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>2e tête de série (TDS)</td>
                                <td>
                                    <?php
                                    // echo $groupeA[1];
                                    echo $reqGroupA[1]['nom'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    // echo $groupeB[1];
                                    echo $reqGroupB[1]['nom'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>3e tête de série (TDS)</td>
                                <td>
                                    <?php
                                    // echo $groupeA[2];
                                    echo $reqGroupA[2]['nom'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    // echo $groupeB[2];
                                    echo $reqGroupB[2]['nom'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>4e tête de série (TDS)</td>
                                <td>
                                    <?php
                                    // echo $groupeA[3];
                                    echo $reqGroupA[3]['nom'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    // echo $groupeB[3];
                                    echo $reqGroupB[3]['nom'];
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- Button Next pour allez a la page des matches du premier tour -->
                    <div class="NextndPrevious">
                        <!-- <div>
                    <a href="" class="Previous">&laquo;Previous</a>
                     </div> -->
                        <div>
                            <a href="./MatchGroupeA.php" class="Next">Next&raquo;</a>
                        </div>
                    </div>

                </div><!-- Ballon image -->
                </form>
            </div>

        </div>
    </section>
</body>

</html>