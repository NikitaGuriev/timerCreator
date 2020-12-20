<?php
ob_start();
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <link rel="stylesheet" type="text/css" href="css/javascript.fullPage.css">
        <link rel="stylesheet" href="../../../../resume/gurievMaterialize.css">
        <script src="js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $timerName ?></title>
        <link rel="stylesheet" href="../../../../revealator-master/fm.revealator.jquery.css">
        <script src="../../../../revealator-master/jquery-1.11.3.min.js"></script>
        <script src="../../../../revealator-master/fm.revealator.jquery.js"></script>
        <link href="../../../icons/favicon.ico" rel="icon" type="image/x-icon">
        <link href="../../../icons/stopwatch60.png" rel="apple-touch-icon" type="image/png">
        <link href="../../../icons/stopwatch76.png" rel="apple-touch-icon" sizes="76x76" type="image/png">
        <link href="../../../icons/stopwatch120.png" rel="apple-touch-icon" sizes="120x120" type="image/png">
        <link href="../../../icons/stopwatch152.png" rel="apple-touch-icon" sizes="152x152" type="image/png">
        <link href="../../../icons/stopwatch192.png" rel="icon" sizes="192x192" type="image/png">
        <link href="../../../icons/stopwatch128.png" rel="icon" sizes="128x128" type="image/png">
        <link href="../../../icons/stopwatch96.png" rel="icon" sizes="96x96" type="image/png">
        <link href="../../../icons/stopwatch64.png" rel="icon" sizes="64x64" type="image/png">
        <link href="../../../icons/stopwatch48.png" rel="icon" sizes="48x48" type="image/png">
        <link href="../../../icons/stopwatch32.png" rel="icon" sizes="32x32" type="image/png">
        <link href="../../../icons/stopwatch16.png" rel="icon" sizes="16x16" type="image/png">
        <meta name="theme-color" content="<?php echo $bgColor ?>">
        <meta name="description" content=>
        <script src="../moment-with-locales.min.js"></script>
        <style type="text/css">
            @font-face {
                font-family: "openSans";
                src: url("../../../../openSans.ttf");
                font-style: normal;
                font-weight: normal;
            }

            * {
                font-family: 'openSans', sans-serif;
            }

            .userColors {
                background: <?php echo $bgColor ?>;
                color: <?php echo $textColor ?>;
            }
        </style>
    </head>
    <body>
    <div id="fullpage">
        <div class="section center-align valign-wrapper userColors">
            <div class="container">
                <p class="revealator-slidedown revealator-duration3 flow-text"><?php echo $timerName ?></p>
                <h4 class="revealator-zoomout revealator-delay3 revealator-duration3" id="textTimer">ГГ.ММ.ДД ЧЧ:ММ:СС</h4>
                <p class="revealator-slideup revealator-duration3 revealator-delay6 flow-text">ГГ.ММ.ДД ЧЧ:ММ:СС</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../javascript.fullPage.js?2"></script>
    <script type="text/javascript">
        fullpage.initialize('#fullpage', {
            anchors: ['main'],
            menu: '#menu',
            css3: true
        });
    </script>
    <script>
        function timer() {
            let countdownDate = moment.utc('<?php echo $countdownDate ?>+03:00');
            let currentDate = moment.utc(new Date());
            let years = currentDate.diff(countdownDate, "years");
            countdownDate.add(years, "years");
            let months = currentDate.diff(countdownDate, "months");
            countdownDate.add(months, "months");
            let days = currentDate.diff(countdownDate, "days");
            countdownDate.add(days, "days");
            let hours = currentDate.diff(countdownDate, "hours");
            countdownDate.add(hours, "hours");
            let minutes = currentDate.diff(countdownDate, "minutes");
            countdownDate.add(minutes, "minutes");
            let seconds = currentDate.diff(countdownDate, "seconds");
            countdownDate.add(seconds, "seconds");
            document.getElementById("textTimer").innerText = `${years}.${months}.${days} ${hours}:${minutes}:${seconds}`;
        }

        timer();

        setInterval(timer, 1000);
    </script>
    </body>
    </html>
<?php
$outputHTML = ob_get_contents();
ob_end_clean();
?>