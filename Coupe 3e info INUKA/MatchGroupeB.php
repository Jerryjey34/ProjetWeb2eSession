<?php
include_once "./Traitements.php";
require_once './DBConnect/connect.php';
$req = DBConnect();


//selection des groups a la base
$reqGroupA = $req->query("SELECT * FROM GroupA");
$reqGroupA = $reqGroupA->fetchAll();

$reqGroupB = $req->query("SELECT * FROM GroupB");
$reqGroupB = $reqGroupB->fetchAll();


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


            <div class="MatchImagesGroupeA">
                <div class="blog-cta">

                    <h1 class="tourUn"> 1er TOUR</h1>

                </div>


                <!-- <div class="groupeAetgroupeB"> -->
                <!-- <div class="GroupeA">
<h1>Groupe A</h1>
</div> -->

                <table class="content-table-GroupeA">
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

                    <div class="hover_color">
                        <form action="" method="POST">

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
                                        <input class="InputScore" type="number" name="sc13" max="20" min="0" <?php if ($_SESSION['match'][6]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][6]) echo $_SESSION['score1m7']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc14" max="20" min="0" <?php if ($_SESSION['match'][6]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][6]) echo $_SESSION['score2m7']; ?>" required="">
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

                        <form action="" method="POST">
                            <tr>
                                <td>Match 8</td>
                                <td>
                                    <?php
                                    // echo $groupeB[2];
                                    echo $reqGroupB[2]['nom'];
                                    ?>
                                <td>
                                    <input class="InputScore" type="number" name="sc15" max="20" min="0" <?php if ($_SESSION['match'][7]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][7]) echo $_SESSION['score1m8']; ?>" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc16" max="20" min="0" <?php if ($_SESSION['match'][7]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][7]) echo $_SESSION['score2m8']; ?>" required="">
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

                        <form action="" method="POST">
                            <tr>
                                <td>Match 9</td>
                                <td>
                                    <?php
                                    // echo $groupeB[0];
                                    echo $reqGroupB[0]['nom'];
                                    ?>
                                <td>
                                    <input class="InputScore" type="number" name="sc17" max="20" min="0" <?php if ($_SESSION['match'][8]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][8]) echo $_SESSION['score1m9']; ?>" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc18" max="20" min="0" <?php if ($_SESSION['match'][8]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][8]) echo $_SESSION['score2m9']; ?>" required="">
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

                        <form action="" method="POST">
                            <tr>
                                <td>Match 10</td>
                                <td>
                                    <?php
                                    // echo $groupeB[1];
                                    echo $reqGroupB[1]['nom'];
                                    ?>
                                <td>
                                    <input class="InputScore" type="number" name="sc19" max="20" min="0" <?php if ($_SESSION['match'][9]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][9]) echo $_SESSION['score1m10']; ?>" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc20" max="20" min="0" <?php if ($_SESSION['match'][9]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][9]) echo $_SESSION['score2m10']; ?>" required="">
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

                        <form action="" method="POST">
                            <tr>
                                <td>Match 11</td>
                                <td>
                                    <?php
                                    // echo $groupeB[0];
                                    echo $reqGroupB[0]['nom'];
                                    ?>
                                <td>
                                    <input class="InputScore" type="number" name="sc21" max="20" min="0" <?php if ($_SESSION['match'][10]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][10]) echo $_SESSION['score1m11']; ?>" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc22" max="20" min="0" <?php if ($_SESSION['match'][10]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][10]) echo $_SESSION['score2m11']; ?>" required="">
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

                        <form action="" method="POST">
                            <tr>
                                <td>Match 12</td>
                                <td>
                                    <?php
                                    // echo $groupeB[1];
                                    echo $reqGroupB[1]['nom'];
                                    ?>
                                <td>
                                    <input class="InputScore" type="number" name="sc23" max="20" min="0" <?php if ($_SESSION['match'][11]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][11]) echo $_SESSION['score1m12']; ?>" required="">
                                </td>
                                <td>-</td>

                                <td>
                                    <input class="InputScore" type="number" name="sc24" max="20" min="0" <?php if ($_SESSION['match'][11]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][11]) echo $_SESSION['score2m12']; ?>" required="">
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

                </table>


                <!-- Button Next pour allez a la page des matches du premier tour -->
                <div class="NextndPreviousGa">
                    <div>
                        <a href="./MatchGroupeA.php" class="Previous">&laquo;Previous</a>
                    </div>
                    <!-- <div>
                        <a href="./MatchGroupeB.php" class="Next">Next&raquo;</a>
                    </div> -->
                </div>

            </div><!-- Ballon image -->
            </form>
        </div>

        </div>
    </section>
</body>

</html>