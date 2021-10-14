<?php

session_start();

include_once "./gestionClassement.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Classements</title>
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
            <table class="CGroupeA">

                <thead>

                    <tr>
                        <h1 class="h1ClassementGA">Groupe A</h1>
                        <th></th>
                        <th>MJ</th>
                        <th>MG</th>
                        <th>MN</th>
                        <th>MP</th>
                        <th>BP</th>
                        <th>BC</th>
                        <th>+/-</th>
                        <th>PT</th>
                    </tr>

                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <tr>
                            <td>
                                <div class="Un">
                                    <?= $reqA[$i]['nom'] ?>
                                </div>
                            </td>
                            <td><?= $reqA[$i]['MJ'] ?></td>
                            <td><?= $reqA[$i]['MG'] ?></td>
                            <td><?= $reqA[$i]['MN'] ?></td>
                            <td><?= $reqA[$i]['MP'] ?></td>
                            <td><?= $reqA[$i]['BP'] ?></td>
                            <td><?= $reqA[$i]['BC'] ?></td>
                            <td><?= $reqA[$i]['DF'] ?></td>
                            <td><?= $reqA[$i]['PT'] ?></td>
                        </tr>
                    <?php endfor; ?>

                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <tr>
                            <td>
                                <div class="Un">
                                    <?= $reqA2[$i]['nom'] ?>
                                </div>
                            </td>
                            <td><?= $reqA2[$i]['MJ'] ?></td>
                            <td><?= $reqA2[$i]['MG'] ?></td>
                            <td><?= $reqA2[$i]['MN'] ?></td>
                            <td><?= $reqA2[$i]['MP'] ?></td>
                            <td><?= $reqA2[$i]['BP'] ?></td>
                            <td><?= $reqA2[$i]['BC'] ?></td>
                            <td><?= $reqA2[$i]['DF'] ?></td>
                            <td><?= $reqA2[$i]['PT'] ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <h1 class="h1ClassementGB">Groupe B</h1>
            <table class="CGroupeB">

                <thead>


                    <tr>
                        <th></th>
                        <th>MJ</th>
                        <th>MG</th>
                        <th>MN</th>
                        <th>MP</th>
                        <th>BP</th>
                        <th>BC</th>
                        <th>+/-</th>
                        <th>PT</th>
                    </tr>

                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <tr>
                            <td>
                                <div class="Un">
                                    <?= $reqB[$i]['nom'] ?>
                                </div>
                            </td>
                            <td><?= $reqB[$i]['MJ'] ?></td>
                            <td><?= $reqB[$i]['MG'] ?></td>
                            <td><?= $reqB[$i]['MN'] ?></td>
                            <td><?= $reqB[$i]['MP'] ?></td>
                            <td><?= $reqB[$i]['BP'] ?></td>
                            <td><?= $reqB[$i]['BC'] ?></td>
                            <td><?= $reqB[$i]['DF'] ?></td>
                            <td><?= $reqB[$i]['PT'] ?></td>
                        </tr>
                    <?php endfor; ?>

                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <tr>
                            <td>
                                <div class="Un">
                                    <?= $reqB2[$i]['nom'] ?>
                                </div>
                            </td>
                            <td><?= $reqB2[$i]['MJ'] ?></td>
                            <td><?= $reqB2[$i]['MG'] ?></td>
                            <td><?= $reqB2[$i]['MN'] ?></td>
                            <td><?= $reqB2[$i]['MP'] ?></td>
                            <td><?= $reqB2[$i]['BP'] ?></td>
                            <td><?= $reqB2[$i]['BC'] ?></td>
                            <td><?= $reqB2[$i]['DF'] ?></td>
                            <td><?= $reqB2[$i]['PT'] ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>
    </section>
</body>

</html>