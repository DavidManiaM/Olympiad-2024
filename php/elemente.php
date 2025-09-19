<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimia.ro</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/elemente.css">
    <link rel="stylesheet" href="../styles/arrow.css">
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
    $json = file_get_contents('../data.json');
    $data2 = json_decode($json, true);
    $data = $data2["elements"];
    $data_L = count($data);
    $ct = -1;
    ?>
    <div id="container" class="closeSidebar">
        <div id="content" style="text-align: center;">
            <br><br>
            <form action="" method="POST">
                <input placeholder="Nume, stare de agregare, număr atomic" type="text" name="value" style="width: 45%; border-radius: 15px; padding: 2px 10px">
                <input type="submit" name="search" value="Caută" id="searchButton" style="border-radius: 15px; border: 2px solid black;">
            </form>
            <br>
            <?php
            $value = isset($_POST["value"]) ? $_POST["value"] : "";
            if (isset($_POST["value"]) && $value != " ") {
                $quo = '"';
                echo '<span><strong>Rezultate pentru: ', $quo, $value, $quo, ' </strong></span><br>';
            }
            for ($i = 0; $i < $data_L; $i++) {
                $name = $data[$i]["name"];
                $phase = $data[$i]["phase"];
                $loweredName = strtolower($name);
                $loweredPhase = strtolower($phase);
                $value = strtolower($value);
                if($value == "lichid")
                    $value = "liquid";
                else if($value == "gaz" || $value == "gazos")
                    $value = "gas";
                if (!$value || (strstr($loweredName, $value) || strstr($loweredPhase, $value)) || $value == $i + 1) {
                    $ct++;
                    $encodedName = urlencode($name);
                    $encodedSrc = urlencode($data[$i]["image"]["url"]);
                    $encodedPhase = urlencode($phase);
                    $encodedbohr_model_3d = urlencode($data[$i]["bohr_model_3d"]);
                    $discovered = urlencode($data[$i]["discovered_by"]);
                    $melt = urlencode($data[$i]["melt"]);
                    if ($data[$i]["named_by"] == null)
                        $named = urlencode($data[$i]["discovered_by"]);
                    else
                        $named = urlencode($data[$i]["named_by"]);
                    $config = urlencode($data[$i]["electron_configuration"]);
                    $config_rel = urlencode($data[$i]["electron_configuration_semantic"]);
                    $grupa = urlencode($data[$i]["group"]);
                    $perioada = urlencode($data[$i]["period"]);
                    $symbol = urlencode($data[$i]["symbol"]);
                    $mass = urlencode($data[$i]["atomic_mass"]);
                    echo "<a href='./details.php?id=$i&name=$encodedName&src=$encodedSrc&phase=$encodedPhase&bohr=$encodedbohr_model_3d
                    &discovered=$discovered&named=$named&config=$config&config_rel=$config_rel&melt=$melt&grupa=$grupa
                    &perioada=$perioada&symbol=$symbol&mass=$mass'><div class='product'>";

                    echo "<img src=", $data[$i]["image"]["url"], ">";


                    $shortenedName = $data[$i]["name"];
                    $maximumStringLength = 25;
                    if (strlen($data[$i]["name"]) > $maximumStringLength) {
                        $shortenedName = substr($data[$i]["name"], 0, $maximumStringLength);
                        $shortenedName .= "...";
                    }
                    echo "<span>", $shortenedName, "</span>";

                    echo "<br><span><strong>";
                    if ($data[$i]["phase"] == "Gas")
                        echo "Gaz</strong></span>";
                    else if ($data[$i]["phase"] == "Liquid")
                        echo "Lichid</strong></span>";
                    if ($data[$i]["phase"] == "Solid")
                        echo "Solid</strong></span>";

                    echo "</div></a>";
                    if ($ct && !(($ct + 1) % 3))
                        echo "<br>";
                }
            }
            ?>
            <br><i class='bx bxs-chevron-up bx-lg' id="arrow"></i><br>
        </div>
    </div>

    <script src="../scripts/sidebarScript.js"></script>
    <script src="../scripts/arrow.js"></script>
</body>

</html>