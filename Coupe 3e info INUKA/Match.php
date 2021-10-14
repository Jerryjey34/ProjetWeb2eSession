<?php
session_start();

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
    $conn = DBConnect();
    // delete les groupes a la base
    $req->query('DELETE  FROM GroupA');
    $req->query('DELETE  FROM GroupB');



    $reinitialiser = "UPDATE Confrontation set equipe1=0,equipe2=0,victoire=0";
    $conn->query($reinitialiser);


    for ($i = 0; $i < 4; $i++) {
        $req->query("INSERT INTO GroupA (nom) VALUES('$groupeA[$i]')");
        $req->query("INSERT INTO GroupB (nom) VALUES('$groupeB[$i]')");
    }
    header('Location:./tirage.php');
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
                    <h1 class="listesEquipes">Listes des équipes</h1>

                    <table class="content-table-listesEquipes">
                        <thead>
                            <tr>
                                <th>Lot#1 </th>
                                <th>Lot#2 </th>
                                <th>Lot#3 </th>
                                <th>Lot#4 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img class="logo" src="./Images/logo equipes/brazil.png" alt=""> Bresil</td>
                                <td><img class="logo" src="./Images/logo equipes/france.png" alt=""> France</td>
                                <td><img class="logo" src="./Images/logo equipes/spain.svg" alt=""> Espagne</td>
                                <td><img class="logo" src="./Images/logo equipes/portugal.svg" alt=""> Portugal</td>
                            </tr>
                            <tr>
                                <td> <img class="logo" src="./Images/logo equipes/argentina.svg" alt=""> Argentine</td>
                                <td> <img class="logo" src="./Images/logo equipes/italia.png" alt=""> Italie</td>
                                <td> <img class="logo" src="./Images/logo equipes/germany.png" alt=""> Allemagne</td>
                                <td> <img class="logo" src="./Images/logo equipes/haiti.png" alt=""> Haiti</td>
                            </tr>
                        </tbody>
                    </table>



                    <div class="blog-cta">
                        <form action="" method="post">
                            <button class="button_go_to" type="submit" name="btn_tirage">Tirage</button>
                        </form>
                    </div>



                </div><!-- Ballon image -->
                </form>
            </div>

        </div>
    </section>
</body>

</html>