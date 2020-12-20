<?php
/** Установка часового пояса в Московский */
date_default_timezone_set('Europe/Moscow');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <title>TimerCreator</title>
    <style>
        #testBlock {
            background: #fff;
        }
    </style>
</head>
<body class="bg-light">
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="form-group p-4 mt-3 shadow-sm rounded bg-white">
                    <h4>Создать счетчик прошедшего времени</h4>
                    <form action="" method="post" class="needs-validation" novalidate>
                        <div class="form-group form-row">
                            <label for="timerName">Введите название счетчика</label>
                            <input type="text" name="timerTitle" class="form-control" required id="timerName" autofocus placeholder="Горох посажен">
                            <div class="invalid-feedback">
                                Пожалуйста, введите название счетчика
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label for="pickBGColor">Выбрать цвет заднего фона</label>
                            <input type="color" id="pickBGColor" class="form-control" value="#FFFFFF">
                        </div>
                        <div class="form-group form-row">
                            <label for="pickTextColor">Выбрать цвет текста</label>
                            <input type="color" id="pickTextColor" class="form-control" value="#000000">
                        </div>
                        <div class="form-group form-row">
                            <label for="countdownDate">Введите дату начала отсчёта</label>
                            <input type="datetime-local" name="date" class="form-control" required id="countdownDate" value="<?php echo date('Y-m-d\TH') ?>:00:00">
                            <div class="invalid-feedback">
                                Пожалуйста, выберите дату начала отсчёта
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-primary" type="submit" id="sendData">Создать счетчик</button>
                        </div>
                    </form>
                </div>
                <div class="shadow-sm rounded p-4 mt-3 text-center" id="testBlock">
                    <h5 id="timerNameTest">Горох посажен</h5><br>
                    <h4 id="timer">00.00.00 00:00:00</h4><br>
                    <h5>ГГ.ДД.ММ ЧЧ:ММ:СС</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальные окна -->
    <div id="modalDiv"></div>
</main>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="alert alert-info shadow-sm">
                Если Вы обнаружили ошибку на сайте: сообщите об этом в <a href="https://t.me/NikitaGuriev" target="_blank">Telegram</a>.
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="../../bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
<script src="../../bootstrap-4.5.3-dist/js/popper.min.js"></script>
<script src="../../bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>

<!-- Moment.js -->
<script src="moment-with-locales.min.js"></script>

<!-- Пользовательский JavaScript -->
<script src="js/main.js?<?php echo time(); ?>"></script>
</body>
</html>