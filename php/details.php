<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimia.ro</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/details.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
        <i class='bx bx-menu bx-lg' id="menuIcon"></i>
        <span><a href="./index.php">Acasă</a></span>
        <span><a href="./elemente.php">Elemente</a></span>
        <span><a href="./tabelulPeriodic.php">Tabelul periodic</a></span>
        <span><a href="./contact.php">Contact</a></span>
    </header>
    <div id="sidebar" class="closed">
        <div class="sidebarRow">Acasă</div>
        <div class="sidebarRow">Elemente</div>
        <div class="sidebarRow">Tabelul periodic</div>
        <div class="sidebarRow">Contact</div>
    </div>
    <?php
    $id = $_GET["id"];
    $name = urldecode($_GET["name"]);
    $src = urldecode($_GET["src"]);
    $phase = $_GET["phase"];
    $bohr = $_GET["bohr"];
    $discoveredBy = urldecode($_GET["discovered"]);
    $namedBy = urldecode($_GET["named"]);
    $config = urldecode($_GET["config"]);
    $config_rel = urldecode($_GET["config_rel"]);
    $melt = urldecode($_GET["melt"]);
    $grupa = urldecode($_GET["grupa"]);
    $perioada = urldecode($_GET["perioada"]);
    $symbol = urldecode($_GET["symbol"]);
    $mass = urldecode($_GET["mass"]);
    ?>

    <div id="container" class="closeSidebar">
        <div id="circle"></div>
        <div id="pictureContainer">
            <div id="image" style="background-image: url('<?php echo $src; ?>'); width: 500px; height:500px">
                <span style="position: relative; left: 50%; transform: translateX(-50%); top: 310px;">
                    <span style="font-size: 40px;"><strong><?php echo $name; ?></strong><?php echo " - " . $symbol; ?></span>
                    <span style="font-size: 35px;">
                        <?php
                        echo "(";
                        if ($phase == "Gas")
                            echo "Gaz";
                        else if ($phase == "Liquid")
                            echo "Lichid";
                        else
                            echo $phase;
                        echo ")";
                        ?>
                        <br>
                        Număr atomic: <?php echo $id + 1; ?>
                    </span>
                </span>
            </div>
        </div>

        <div id="text">
            <br>
            <table id="infoTable">
                <tr>
                    <td><strong>Descoperit de către:</strong> </td>
                    <td> <?php echo $discoveredBy; ?></td>
                </tr>
                <tr>
                    <td><strong>Temperatura de topire:&nbsp;</strong> </td>
                    <td> <span id="tempNumber"><?php if(!$melt || $melt == 0) echo 0; else echo $melt ?></span>&nbsp;grade</td>
                </tr>
                <tr>
                    <td><strong>Configurație electronică extinsă:</strong> </td>
                    <td> <?php echo $config ?></td>
                </tr>
                <tr>
                    <td><strong>Configurație electronică relativă:</strong> </td>
                    <td> <?php echo $config_rel ?></td>
                </tr>
                <tr>
                    <td><strong>Grupa, perioada:</strong> </td>
                    <td> <?php 
                    $gr = substr($grupa, 0, -1);
                    echo "Gr. ", $gr, "Per. ", $perioada; ?></td>
                </tr>
            </table>
            <br>

            <div id="tempDiv" style="font-size: 28px;">
                Unitate de măsură: &nbsp;
                <select id="tempOption">
                    <option value="kelvin">Kelvin</option>
                    <option value="celcius">Celsius</option>
                    <option value="fahrenheit">Fahrenheit</option>
                </select>
            </div>

            <div style="font-size: 28px; padding: 10px">Efect: &nbsp;<select id="shaderSelect">
                    <option value="imgRotation">Rotire</option>
                    <option value="sepia">Sepia</option>
                    <option value="greyscale">Greyscale</option>
                    <option value="hueRotate">Hue-rotate</option>
                    <option value="invert">Invert</option>
                    <option value="saturate">Saturate</option>
                </select>
            </div>
            <div id="controller" class="open" style="background-image: url('<?php echo $src; ?>');"></div><br>
            <select id="hoverOption" class="closed">
                <option value="integral">Efect integral</option>
                <option value="circle">Efect în cerc</option>
            </select>
            <span style="font-size: 28px;">Schimbă intensitatea efectului</span><input type="range" id="range"><br>
            <?php
            if ($id != 118) {
            ?>
                <a href="./viewer3d.php?id=<?php echo ($id + 1) ?>&name=<?php echo $name; ?>&mass=<?php echo $mass; ?>&src=<?php echo $bohr; ?>&symbol=<?php echo $symbol; ?>" id="viewerLink">Vizualizează 3d</a>
                <br><br>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="../scripts/detailsScript.js"></script>
    <script src="../scripts/sidebarScript.js"></script>
</body>

</html>