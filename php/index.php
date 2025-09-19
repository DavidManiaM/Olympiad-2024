<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimia.ro</title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/indexContent.css">
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
    <div id="container" class="closeSidebar">
        <div id="content"><br><br>
            <h1>Chimia.ro</h1><br>
            <p style="margin-top: 350px; padding: 100px 0;">Pe site-ul chimia.ro, poți afla lucruri noi și poți înțelege vizual
        și intuitiv noțiuni despre fiecare element chimic.</p>

            <div id="carrDiv">
                <img class="carrouselImg" src="../images/carr1.jpg">
                <img class="carrouselImg" src="../images/carr2.jpg">
                <img class="carrouselImg" src="../images/carr3.jpg">
                <img class="carrouselImg" src="../images/carr4.jpg">
                <img class="carrouselImg" src="../images/carr5.jpg">
                <img class="carrouselImg" src="../images/carr6.jpg">
            </div>

            <div class="shadow" id="shadow1"><i class='bx bx-chevron-left'></i></div>
            <div class="shadow" id="shadow2"><i class='bx bx-chevron-right'></i></div>

            <p style="padding: 80px 20px;">Pe chimia.ro, poți găsi informații utile despre fiecare element chimic.</p>

            <div id="selectionDiv">
                <div class="imgBorder">
                    <img class="selectionImg" src="../images/neon.jpg">
                </div>
                <div class="imgBorder">
                    <img class="selectionImg" src="../images/ruth.png">
                </div>
                <div class="imgBorder">
                    <img class="selectionImg" src="../images/3.png">
                </div>
            </div>

            <br>
            <span class="hov"><a href="./elemente.php" id="seeStore">Vezi lista elementelor</a></span><br><br>
            <i class='bx bxs-chevron-up' id="arrow"></i><br>
        </div>
    </div>


    <script src="../scripts/indexScript.js"></script>
    <script src="../scripts/sidebarScript.js"></script>
    <script src="../scripts/arrow.js"></script>
</body>

</html>