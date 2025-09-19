<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimia.ro</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/contact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .sidebarRow {
            background: -webkit-linear-gradient(right, red, white);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
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
    <div id="container" class="closeSidebar">
        <table align="center" cellspacing="4" id="contactTable">
            <tr>
                <td>
                    <span style="font-size: 45px">Creatorii site-ului:</span>
                </td>
                <td style="text-align:center; border-radius: 0 20px 0 0;">
                    <span style="font-size: 43px;" class="color">Mania David-Marian</span><br>
                    <span style="font-size: 43px;" class="color">Vieru-Potecu Cezar-Mihai</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 43px">Școala de proveniență:</span>
                </td>
                <td>
                    <span style="font-size: 30px" class="color">Colegiul Național Dr. Ioan Meșotă, Brașov</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: 43px">Întrebări:</span>
                </td>
                <td>
                    <ul type="circle">
                        <li><span style="font-size: 30px" class="color">email: chimia.ro-helpline@gmail.com</span>
                            <i class='bx bx-copy-alt bx-sm'></i>
                            <span class="copyConfirmationMessage">Text copiat!</span>
                        </li>
                        <li><span style="font-size: 30px" class="color">telefon: +40 727 000 000</span>
                            <i class='bx bx-copy-alt bx-sm'></i>
                            <span class="copyConfirmationMessage">Text copiat!</span>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td style="border-radius: 0 0 0 20px;">
                    <span style="font-size: 43px">Feedback:</span>
                </td>
                <td>
                    <ul type="circle">
                        <li><span style="font-size: 30px" class="color">email: chimia.ro-feedback@gmail.com</span>
                            <i class='bx bx-copy-alt bx-sm'></i>
                            <span class="copyConfirmationMessage">Text copiat!</span>
                        </li>
                        <li><span style="font-size: 30px" class="color">telefon: +40 727 999 999</span>
                            <i class='bx bx-copy-alt bx-sm'></i>
                            <span class="copyConfirmationMessage">Text copiat!</span>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <script src="../scripts/sidebarScript.js"></script>
    <script src="../scripts/contact.js"></script>
    <script src="../scripts/culori.js"></script>
</body>

</html>

</html>