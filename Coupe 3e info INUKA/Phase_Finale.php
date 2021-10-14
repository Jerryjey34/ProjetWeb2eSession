<?php
session_start();

require_once './DBConnect/connect.php';
require_once './log.php';
include_once "./gestionClassement.php";


if (isset($_SESSION['grandeFinale'])) {
    header("Location:./champion.php");
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
                            <form action="<?= './Traitements.php?eq1=' . $reqA[0]['nom'] . '&eq2=' . $reqB[1]['nom'] ?>" method="POST">
                                <tr>
                                    <td>Match 13</td>
                                    <td>
                                        <?php
                                        echo $reqA[0]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc25" max="20" min="0" <?php if (isset($_SESSION['match'][12])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][12]) echo $_SESSION['score1m13']; ?>" required>
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc26" max="20" min="0" <?php if (isset($_SESSION['match'][12])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][12]) echo $_SESSION['score2m13']; ?>" required>
                                    </td>
                                    <td>

                                        <?php
                                        echo $reqB[1]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <button class="BtnValider" value="ma13" name="ma" type="submit">Valider</button>
                                    </td>
                                </tr>
                            </form>
                            <form action="<?= './Traitements.php?eq1=' . $reqB[0]['nom'] . '&eq2=' . $reqA[1]['nom'] ?>" method="POST">
                                <tr>
                                    <td>Match 14</td>
                                    <td>
                                        <?php
                                        echo $reqB[0]['nom'];
                                        ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc27" max="20" min="0" <?php if (isset($_SESSION['match'][13])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][13]) echo $_SESSION['score1m14']; ?>" required="">
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc28" max="20" min="0" <?php if (isset($_SESSION['match'][13])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][13]) echo $_SESSION['score2m14']; ?>" required="">
                                    </td>
                                    <td>

                                        <?php echo $reqA[1]['nom']; ?>
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
                            <form action="<?= './Traitements.php?eq1=' . $_SESSION['demi13']['equipeP'] . '&eq2=' .  $_SESSION['demi14']['equipeP'] ?>" method="POST">

                                <tr>
                                    <td>Match 15</td>
                                    <td>
                                        <?= isset($_SESSION['demi13']) ? $_SESSION['demi13']['equipeP'] : "???" ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc29" max="20" min="0" <?php if (isset($_SESSION['match'][14])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][14]) echo $_SESSION['score1m15']; ?>" required>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <input class="InputScore" type="number" name="sc30" max="20" min="0" <?php if (isset($_SESSION['match'][14])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][14]) echo $_SESSION['score2m15']; ?>" required>
                                    </td>
                                    <td>
                                        <?= isset($_SESSION['demi14']) ? $_SESSION['demi14']['equipeP'] : "???" ?>
                                    </td>
                                    <td>
                                        <button <?= isset($_SESSION['match'][14]) && 'disabled'; ?> class="BtnValider" value="ma15" name="ma" type="submit">Valider</button>
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