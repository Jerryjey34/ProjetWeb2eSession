<?php
session_start();

require_once './DBConnect/connect.php';
require './log.php';
$req = DBConnect();


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
                            <form action="<?= './Traitements.php?eq1=' . $_SESSION['demi13']['equipeG'] . '&eq2=' .  $_SESSION['demi14']['equipeG'] ?>" method="POST">
                                <tr>
                                    <td>Match 16</td>
                                    <td>
                                        <?= isset($_SESSION['demi13']) ? $_SESSION['demi13']['equipeG'] : '???' ?>
                                    </td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc31" max="20" min="0" <?php if (isset($_SESSION['match'][15])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][15]) echo $_SESSION['score1m16']; ?>" required>
                                    </td>
                                    <td>-</td>

                                    <td>
                                        <input class="InputScore" type="number" name="sc32" max="20" min="0" <?php if (isset($_SESSION['match'][15])) echo 'disabled'; ?> value="<?php if ($_SESSION['match'][15]) echo $_SESSION['score2m16']; ?>" required>
                                    </td>
                                    <td>

                                        <?= isset($_SESSION['demi14']) ? $_SESSION['demi14']['equipeG'] : '???' ?>
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