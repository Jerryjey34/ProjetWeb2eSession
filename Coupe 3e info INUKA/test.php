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
    // delete les groupes a la base
    $req->query('DELETE  FROM GroupA');
    $req->query('DELETE  FROM GroupB');

    for ($i = 0; $i < 4; $i++) {
        $req->query("INSERT INTO GroupA (nom) VALUES('$groupeA[$i]')");
        $req->query("INSERT INTO GroupB (nom) VALUES('$groupeB[$i]')");
    }
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
                <div class="logo_content">
                    <div class="logo">
                        <i class='bx bx-trophy'></i>
                        <div class="logo_name">Coupe 3e Info</div>
                    </div>
                    <i class='bx bx-menu' id="btn"></i>
                </div>
                <ul class="nav_list">
                    <li>
                        <a href="./accueil.php">
                            <i class='bx bx-home'></i>
                            <span class="links_name">Accueil</span>
                        </a>
                        <!-- <span class="tooltip">Dashboard</span> -->
                    </li>
                    <li>
                        <a href="./Match.php">
                            <i class='bx bx-football'></i>
                            <span class="links_name">Match</span>
                        </a>
                        <!-- <span class="tooltip">Dashboard</span> -->
                    </li>
                    <li>
                        <a href="./classement.php">
                            <i class='bx bx-abacus'></i>
                            <span class="links_name">Classement</span>
                        </a>
                        <!-- <span class="tooltip">Dashboard</span> -->
                    </li>

                    <li>
                        <a href="./Finale.php">
                            <i class='bx bx-trophy'></i>
                            <span class="links_name">Finale</span>
                        </a>
                        <!-- <span class="tooltip">Dashboard</span> -->
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-chevron-down-circle'></i>
                            <span class="links_name">Statistic</span>
                        </a>
                        <!-- <span class="tooltip">Dashboard</span> -->
                    </li>

                    <li>
                        <a href="logout.php">
                            <i class='bx bx-log-out-circle'></i>
                            <span class="links_name">Deconnection</span>
                        </a>
                        <!-- <span class="tooltip">Dashboard</span> -->
                    </li>
                </ul>
                <div class="profile_content">
                    <div class="profile">
                        <div class="profile_details">

                        </div>
                    </div>
                </div>
            </div>
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
                            <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

                                    <?php else: ?>

                                    <?php endif ?>
 
                                  <?php echo "<h3>".$_SESSION['username']." </h3>" ?>
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
                    <a href="" class="Next">Next&raquo;</a>
                     </div>
                </div>

                <div class="blog-cta">

                    <h1 class="tourUn"> 1er TOUR</h1>

                </div>


                <!-- <div class="groupeAetgroupeB"> -->
                <div class="GroupeA">
                    <h1>Groupe A</h1>
                </div>

                <table class="content-table-GroupeA">
                    <thead>
                        <tr>
                            <th>Groupe A</th>
                            <th>Equipe 1</th>
                            <th>S1</th>
                            <th></th>
                            <th>S2</th>
                            <th>Equipe 2</th>
                            <th></th>
                        </tr>
                    </thead>

                    <div class="hover_color">
                        <form action="./Traitements.php" method="POST">

                            <tbody>
                                <tr>
                                    <td>Match 1</td>
                                    <td>
                                        <?php
                                        // echo $groupeA[0];
                                        echo $reqGroupA[0]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc1" max="20" min="0" required"> 
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc2" max="20" min="0" required>
                                    </td>


                                    <td>
                                        <?php
                                        // echo $groupeA[1];
                                        echo $reqGroupA[1]['nom'];
                                        ?>
                                    </td>

                                    <td>

                                        <button class="BtnValider" value="ma1" name="ma" type="submit">Valider</button>
                                    </td>
                                </tr>

                        </form>


                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 2</td>
                                <td>
                                    <?php
                                    // echo $groupeA[2];
                                    echo $reqGroupA[2]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" name="sc3" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc4" max="20" min="0" required="">
                                </td>

                                <td>
                                    <?php
                                    // echo $groupeA[3];
                                    echo $reqGroupA[3]['nom'];
                                    ?>
                                </td>
                                <td>
                                    <button class="BtnValider" value="ma2" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>

                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 3</td>
                                <td>
                                    <?php
                                    echo $reqGroupA[0]['nom'];
                                    ?>

                                </td>

                                <td>
                                    <input class="InputScore" type="number" name="sc5" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc6" max="20" min="0" required="">
                                </td>
                                <td>
                                    <?php
                                    // echo $groupeA[2];
                                    echo $reqGroupA[2]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <button class="BtnValider" value="ma3" name="ma" type="submit"> Valider </button>
                                </td>
                            </tr>
                        </form>

                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 4</td>
                                <td>
                                    <?php
                                    // echo $groupeA[1];
                                    echo $reqGroupA[1]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" name="sc7" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc8" max="20" min="0" required="">
                                </td>

                                </td>
                                <td>
                                    <?php
                                    // echo $groupeA[3];
                                    echo $reqGroupA[3]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <button class="BtnValider" value="ma4" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>


                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 5</td>
                                <td>
                                    <?php
                                    // echo $groupeA[0];
                                    echo $reqGroupA[0]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" name="sc9" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc10" max="20" min="0" required="">
                                </td>

                                <td>

                                    <?php
                                    // echo $groupeA[3];
                                    echo $reqGroupA[3]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <button class="BtnValider" value="ma5" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>

                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 6</td>
                                <td>
                                    <?php
                                    // echo $groupeA[1];
                                    echo $reqGroupA[1]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" name="sc11" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc12" max="20" min="0" required="">
                                </td>

                                <td>
                                    <?php
                                    echo $groupeA[2];
                                    ?>
                                </td>

                                <td>
                                    <button class="BtnValider" value="ma6" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>

                            </tbody>
                        </form>
                </table>


                <div class="GroupeB">
                    <h1>Groupe B</h1>
                </div>

                <table class="content-table-GroupeB">
                    <thead>
                        <tr>
                            <th>Groupe B</th>
                            <th>Equipe 1</th>
                            <th>S1</th>
                            <th></th>
                            <th>S2</th>
                            <th>Equipe 2</th>
                            <th></th>
                        </tr>
                    </thead>



                    <form action="./Traitements.php" method="POST">
                        <tbody>
                            <tr>
                                <td>Match 7</td>
                                <td>
                                    <?php
                                    // echo $groupeB[0];
                                    echo $reqGroupB[0]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" name="sc13" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc14" max="20" min="0" required="">
                                </td>
                                <td>

                                    <?php
                                    // echo $groupeB[1];
                                    echo $reqGroupB[1]['nom'];
                                    ?>
                                </td>

                                <td>
                                    <button class="BtnValider" value="ma7" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>

                    </form>

                    <form action="./Traitements.php" method="POST">
                        <tr>
                            <td>Match 8</td>
                            <td>
                                <?php
                                // echo $groupeB[2];
                                echo $reqGroupB[2]['nom'];
                                ?>
                            <td>
                                <input class="InputScore" type="number" name="<?php echo $groupeB[2]; ?>" max="20" min="0" required="">
                            </td>
                            <td>-</td>

                            <td>
                                <input class="InputScore" type="number" name="<?php echo $groupeB[3]; ?>" max="20" min="0" required="">
                            </td>
                            <td>
                                <?php
                                // echo $groupeB[3];
                                echo $reqGroupB[3]['nom'];
                                ?>
                            </td>
                            <td>
                                <button class="BtnValider" value="ma8" name="ma" type="submit">Valider</button>

                            </td>
                        </tr>
                    </form>

                    <form action="./Traitements.php" method="POST">
                        <tr>
                            <td>Match 9</td>
                            <td>
                                <?php
                                // echo $groupeB[0];
                                echo $reqGroupB[0]['nom'];
                                ?>
                            <td>
                                <input class="InputScore" type="number" max="20" min="0" required="">
                            </td>
                            <td>-</td>

                            <td>
                                <input class="InputScore" type="number" name="<?php echo $groupeB[2]; ?>" max="20" min="0" required="">
                            </td>
                            <td>

                                <?php
                                // echo $groupeB[2];
                                echo $reqGroupB[2]['nom'];
                                ?>
                            </td>
                            <td>
                                <button class="BtnValider" value="ma9" name="ma" type="submit">Valider</button>
                            </td>
                        </tr>
                    </form>

                    <form action="./Traitements.php" method="POST">
                        <tr>
                            <td>Match 10</td>
                            <td>
                                <?php
                                // echo $groupeB[1];
                                echo $reqGroupB[1]['nom'];
                                ?>
                            <td>
                                <input class="InputScore" type="number" name=" <?php echo $groupeB[1]; ?>" max="20" min="0" required="">
                            </td>
                            <td>-</td>

                            <td>
                                <input class="InputScore" type="number" name=" <?php echo $groupeB[3]; ?>" max="20" min="0" required="">
                            </td>
                            <td>

                                <?php
                                // echo $groupeB[3];
                                echo $reqGroupB[3]['nom'];
                                ?>
                            </td>
                            <td>
                                <button class="BtnValider" value="ma10" name="ma" type="submit">Valider</button>
                            
                            </td>
                        </tr>
                    </form>

                    <form action="./Traitements.php" method="POST">
                        <tr>
                            <td>Match 11</td>
                            <td>
                                <?php
                                // echo $groupeB[0];
                                echo $reqGroupB[0]['nom'];
                                ?>
                            <td>
                                <input class="InputScore" type="number" name="<?php echo $groupeB[0]; ?>" max="20" min="0" required="">
                            </td>
                            <td>-</td>

                            <td>
                                <input class="InputScore" type="number" name=" <?php echo $groupeB[3]; ?>" max="20" min="0" required="">
                            </td>
                            <td>

                                <?php
                                // echo $groupeB[3];
                                echo $reqGroupB[3]['nom'];
                                ?>
                            </td>
                            <td>
                                <button class="BtnValider" value="ma11" name="ma" type="submit">Valider</button>

                            </td>
                        </tr>
                    </form>

                    <form action="./Traitements.php" method="POST">
                        <tr>
                            <td>Match 12</td>
                            <td>
                                <?php
                                // echo $groupeB[1];
                                echo $reqGroupB[1]['nom'];
                                ?>
                            <td>
                                <input class="InputScore" type="number" name=" <?php echo $groupeB[1]; ?> " max="20" min="0" required="">
                            </td>
                            <td>-</td>

                            <td>
                                <input class="InputScore" type="number" name=" <?php echo $groupeB[2]; ?> " max="20" min="0" required="">
                            </td>
                            <td>

                                <?php
                                // echo $groupeB[2];
                                echo $reqGroupB[2]['nom'];
                                ?>
                            </td>
                            <td>
                                <button class="BtnValider" value="ma12" name="ma" type="submit">Valider</button>
                            </td>
                        </tr>
                    </form>



                    <div class="Demi-finale">
                        <h1>Demi-Finale</h1>
                    </div>


                    </tbody>
                </table>

                <table class="content-table-Finale">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Equipe 1</th>
                            <th>S1</th>
                            <th></th>
                            <th>S2</th>
                            <th>Equipe 2</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 13</td>
                                <td>
                                    <?php
                                    echo $groupeB[0];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>

                                    <?php
                                    echo $groupeB[1];
                                    ?>
                                </td>

                                <td>
                                <button class="BtnValider" value="ma13" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>
                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 14</td>
                                <td>
                                    <?php
                                    echo $groupeB[0];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>

                                    <?php
                                    echo $groupeB[1];
                                    ?>
                                </td>

                                <td>
                                <button class="BtnValider" value="ma14" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>

                <div class="Petite-finale">
                    <h1>Troisieme Place</h1>
                </div>

                <table class="content-table-Petite-Finale">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Equipe 1</th>
                            <th>S1</th>
                            <th></th>
                            <th>S2</th>
                            <th>Equipe 2</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <form action="./Traitements.php" method="POST">

                            <tr>
                                <td>Match 15</td>
                                <td>
                                    <?php
                                    echo $groupeB[0];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>

                                    <?php
                                    echo $groupeB[1];
                                    ?>
                                </td>

                                <td>
                                <button class="BtnValider" value="ma15" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>

                <div class="Grande-Finale">
                    <h1>Grande Finale</h1>
                </div>

                <table class="content-table-Grande-Finale">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Equipe 1</th>
                            <th>S1</th>
                            <th></th>
                            <th>S2</th>
                            <th>Equipe 2</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="./Traitements.php" method="POST">
                            <tr>
                                <td>Match 16</td>
                                <td>
                                    <?php
                                    echo $groupeB[0];
                                    ?>
                                </td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" max="20" min="0" required="">
                                </td>
                                <td>

                                    <?php
                                    echo $groupeB[1];
                                    ?>
                                </td>

                                <td>
                                <button class="BtnValider" value="ma16" name="ma" type="submit">Valider</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
            </div> <!-- hover_color -->
            </table>

        </div><!-- Ballon image -->
        </form>
        </div>

        </div>
    </section>
</body>

</html>