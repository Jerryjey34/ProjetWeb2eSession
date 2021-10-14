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
                        <h1>Recompenses</h1>
                    </div>
                    <table class="content-table-Grande-Finale">
                        <thead>
                            <tr>
                                <th>1er</th>
                                <th>2eme</th>
                                <th>3eme</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <?= isset($_SESSION['grandeFinale']) ? $_SESSION['grandeFinale']['equipeG'] : '???' ?></td>
                                </td>

                                <td>
                                    <?= isset($_SESSION['grandeFinale']) ? $_SESSION['grandeFinale']['equipeP'] : '???' ?>
                                </td>
                                <td>
                                    <?= isset($_SESSION['petiteFinale']) ? $_SESSION['petiteFinale']['equipeG'] : '???' ?>
                                </td>

                            </tr>
                        </tbody>
                </div> <!-- hover_color -->
                </table>


            </div><!-- Ballon image -->
        </div>

        </div>
    </section>
</body>

</html>