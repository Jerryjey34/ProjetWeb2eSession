<?php
include_once "./Traitements.php";
require_once './DBConnect/connect.php';
require_once './log.php';
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
                            <form action="" method="POST">

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
                                            <input class="InputScore" type="number" name="sc1" max="20" min="0" <?php if ($_SESSION['match'][0]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][0]) echo $_SESSION['score1m1']; ?>" required>
                                        </td>
                                        <td>-</td>

                                        <td>
                                            <input class="InputScore" type="number" name="sc2" max="20" min="0" <?php if ($_SESSION['match'][0]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][0]) echo $_SESSION['score2m1']; ?>" required>
                                        </td>


                                        <td>
                                            <?php
                                            // echo $groupeA[1];
                                            echo $reqGroupA[1]['nom'];
                                            ?>
                                        </td>

                                        <td>

                                            <button class="BtnValider" value="ma1" name="ma" <?php if ($_SESSION['match'][0]) echo 'disabled'; ?> type="submit">Valider</button>
                                        </td>
                                    </tr>

                            </form>


                            <form action="" method="POST">
                                <tr>
                                    <td>Match 2</td>
                                    <td>
                                        <?php
                                        // echo $groupeA[2];
                                        echo $reqGroupA[2]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc3" max="20" min="0" <?php if ($_SESSION['match'][1]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][1]) echo $_SESSION['score1m2']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc4" max="20" min="0" <?php if ($_SESSION['match'][1]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][1]) echo $_SESSION['score2m2']; ?>" required="">
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

                            <form action="" method="POST">
                                <tr>
                                    <td>Match 3</td>
                                    <td>
                                        <?php
                                        echo $reqGroupA[0]['nom'];
                                        ?>

                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc5" max="20" min="0" <?php if ($_SESSION['match'][2]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][2]) echo $_SESSION['score1m3']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc6" max="20" min="0" <?php if ($_SESSION['match'][2]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][2]) echo $_SESSION['score2m3']; ?>" required="">
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

                            <form action="" method="POST">
                                <tr>
                                    <td>Match 4</td>
                                    <td>
                                        <?php
                                        // echo $groupeA[1];
                                        echo $reqGroupA[1]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc7" max="20" min="0" <?php if ($_SESSION['match'][3]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][3]) echo $_SESSION['score1m4']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc8" max="20" min="0" <?php if ($_SESSION['match'][3]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][3]) echo $_SESSION['score2m4']; ?>" required="">
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


                            <form action="" method="POST">
                                <tr>
                                    <td>Match 5</td>
                                    <td>
                                        <?php
                                        // echo $groupeA[0];
                                        echo $reqGroupA[0]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc9" max="20" min="0" <?php if ($_SESSION['match'][4]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][4]) echo $_SESSION['score1m5']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc10" max="20" min="0" <?php if ($_SESSION['match'][4]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][4]) echo $_SESSION['score2m5']; ?>" required="">
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

                            <form action="" method="POST">
                                <tr>
                                    <td>Match 6</td>
                                    <td>
                                        <?php
                                        // echo $groupeA[1];
                                        echo $reqGroupA[1]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc11" max="20" min="0" <?php if ($_SESSION['match'][5]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][5]) echo $_SESSION['score1m6']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc12" max="20" min="0" <?php if ($_SESSION['match'][5]) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][5]) echo $_SESSION['score2m6']; ?>" required="">
                                    </td>

                                    <td>
                                        <?php
                                        // echo $groupeA[2];
                                        echo $reqGroupA[2]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <button class="BtnValider" value="ma6" name="ma" type="submit">Valider</button>
                                    </td>
                                </tr>

                                </tbody>
                            </form>
                    </table>


                    <!-- Button Next pour allez a la page des matches du premier tour -->
                    <div class="NextndPreviousGa">
                        <!-- <div>
                            <a href="./tirage.php" class="Previous">&laquo;Previous</a>
                        </div> -->
                        <div>
                            <a href="./MatchGroupeB.php" class="Next">Next&raquo;</a>
                        </div>
                    </div>

                </div><!-- Ballon image -->
                </form>
            </div>

        </div>
    </section>
</body>

</html>