<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimia.ro</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/tabelulPeriodic.css">
    <style>
        #arrow {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            transition: 600ms;
        }

        #arrow:hover {
            cursor: pointer;
            color: var(--theme-color);
            transition: 300ms;
        }
    </style>
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
    <div id="image">
        <div id="content" class="closeSidebar">

            <h1 style="display:inline-block; position: relative; left: 50%; transform: translateX(-50%); font-size: 45px;">Tabelul periodic al elementelor</h1>

            <?php
            $json = file_get_contents('../data.json');
            $data2 = json_decode($json, true);
            $data = $data2["elements"];
            $data_L = count($data);
            ?>
            <table id="tabelPeriodic" cellspacing="0">
                <?php
                for ($i = 0; $i < $data_L - 1; $i++) {

                    $name = $data[$i]["name"];
                    $phase = $data[$i]["phase"];
                    $loweredName = strtolower($name);
                    $loweredPhase = strtolower($phase);
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
                    $mass = urlencode($data[$i]["atomic_mass"]);
                    $symbol = urlencode($data[$i]["symbol"]);

                    if (!($i >= 57 && $i <= 70) && !($i >= 89 && $i <= 102)) {
                        if ($grupa - $perioada >= 11 || $i == 0)
                            echo "<td class='hover' style='background-color: var(--light-theme-color); z-index:10;'>";
                        else
                            echo "<td class='hover' style='z-index:2;'>";
                        echo "<a href='./details.php?id=$i&name=$encodedName&src=$encodedSrc&phase=$encodedPhase&bohr=$encodedbohr_model_3d
                        &discovered=$discovered&named=$named&config=$config&config_rel=$config_rel&melt=$melt&grupa=$grupa
                        &perioada=$perioada&mass=$mass&symbol=$symbol' style='display: inline-block;'>", $i + 1, "<br><strong style='font-size: 25px'>", $data[$i]["symbol"], "</strong></a></td>";
                        if ($data[$i]["group"] == 18)
                            echo "</tr> <tr>";
                    }
                    if ($i == 0)
                        echo "<td colspan='16' class='no-border1'></td>";
                    else if ($i == 3 || $i == 11)
                        echo "<td colspan='10' class='no-border1'></td>";
                }
                ?>
            </table>

            <br>
            <span id="infoText">Informații utile</span>

            <div class="sec" id="sec1">
                <table align="center" cellspacing="150" width=99%>
                    <tr>
                        <td>
                            <span class="big color">Gaze nobile</span><br>
                            <span style="font-weight: 800; font-size: 35px;">
                                <?php
                                for ($i = 0; $i < $data_L; $i++) {
                                    if ($data[$i]["group"] == 18) {


                                        $name = $data[$i]["name"];
                                        $phase = $data[$i]["phase"];
                                        $loweredName = strtolower($name);
                                        $loweredPhase = strtolower($phase);
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
                                        $mass = urlencode($data[$i]["atomic_mass"]);
                                        $symbol = urlencode($data[$i]["symbol"]);


                                        echo "<a href='./details.php?id=$i&name=$encodedName&src=$encodedSrc&phase=$encodedPhase&bohr=$encodedbohr_model_3d
                                    &discovered=$discovered&named=$named&config=$config&config_rel=$config_rel&melt=$melt&grupa=$grupa
                                    &perioada=$perioada&mass=$mass&symbol=$symbol' class='elementHover'>", $data[$i]["symbol"], "</a>";
                                        if ($data[$i]["period"] != 7)
                                            echo ", ";
                                    }
                                }
                                ?>
                            </span><br>
                            <span>Grupa a opta a tabelului periodic.</span><br>
                            <span><u>Gazele nobile</u> sau <u>gazele rare</u> sunt substanțe care au toate straturile complet ocupate cu electroni, formând
                                molecule <strong>monoatomice</strong>.
                            </span>
                        </td>
                        <td>
                            <div class="cube">
                                <div class="face front">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Heliu</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/00/Helium-glow.jpg">
                                </div>
                                <div class="face back">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Neon</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Neon-glow.jpg">
                                </div>
                                <div class="face right">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Argon</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Argon-glow.jpg">
                                </div>
                                <div class="face left">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Kripton</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Krypton-glow.jpg">
                                </div>
                                <div class="face top">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Xenon</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Xenon-glow.jpg">
                                </div>
                                <div class="face bottom">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Radon</span>
                                    <img src="https://images-of-elements.com/radon.jpg">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <hr>
            <hr>
            <div class="sec" id="sec2">
                <table align="center" cellspacing="150" width=90%>
                    <tr>
                        <td>
                            <span class="big color">Elemente radioactive</span><br>
                            <span style="font-weight: 800; font-size: 30px;">
                                <?php
                                for ($i = 83; $i < $data_L; $i++) {

                                    $name = $data[$i]["name"];
                                    $phase = $data[$i]["phase"];
                                    $loweredName = strtolower($name);
                                    $loweredPhase = strtolower($phase);
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
                                    $mass = urlencode($data[$i]["atomic_mass"]);
                                    $symbol = urlencode($data[$i]["symbol"]);

                                    echo "<a href='./details.php?id=$i&name=$encodedName&src=$encodedSrc&phase=$encodedPhase&bohr=$encodedbohr_model_3d
                                    &discovered=$discovered&named=$named&config=$config&config_rel=$config_rel&melt=$melt&grupa=$grupa
                                    &perioada=$perioada&mass=$mass&symbol=$symbol' class='elementHover'>", $data[$i]["symbol"], "</a>";
                                    if ($i != 118) {
                                        echo ", ";
                                    }
                                }
                                ?>
                            </span><br>
                            <span><u>Elementele radioactive</u> sunt acele elemente constituite doar din <strong>izotopi radioactivi</strong>.
                            </span>
                        <td>
                            <div class="cube">
                                <div class="face front">
                                    <img src="https://images-of-elements.com/polonium.jpg" alt="">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Poloniu</span>
                                </div>
                                <div class="face back">
                                    <img src="https://images-of-elements.com/s/mendelevium.jpg" alt="">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Mendeleviu</span>
                                </div>
                                <div class="face right">
                                    <img src="https://images-of-elements.com/astatine.jpg" alt="">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Astatin</span>
                                </div>
                                <div class="face left">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Einsteinium.jpg" alt="">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Einsteiniu</span>
                                </div>
                                <div class="face top">
                                    <img src="https://images-of-elements.com/s/rutherfordium.jpg" alt="">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Rutherfordiu</span>
                                </div>
                                <div class="face bottom">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Ames_Process_uranium_biscuit.jpg" alt="">
                                    <span style="position: absolute; color: white; background-color: rgba(0, 0, 0, 0.3);">Uraniu</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <i class='bx bxs-chevron-up bx-lg' id="arrow" style="margin-top: -180px;"></i><br><br>
            </div>
        </div>
    </div>

    <script src="../scripts/sidebarScript.js"></script>
    <script src="../scripts/culori.js"></script>
    <script src="../scripts/arrow.js"></script>
</body>

</html>