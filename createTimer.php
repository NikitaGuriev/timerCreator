<?php

/** Блок логирования */
/** Логирование $_REQUEST */
file_put_contents(__DIR__ . '/g_log.log', date('d.m.Y H:i:s') . ' ' . __LINE__ . ' строка' . "\n" . print_r($_REQUEST, 1) . "\n", FILE_APPEND);

/** Обработка $_REQUEST */
$timerName = $_REQUEST['timerName'];
$bgColor = $_REQUEST['bgColor'];
$textColor = $_REQUEST['textColor'];
$countdownDate = $_REQUEST['countdownDate'];

/** Подключение шаблона таймера */
require_once 'htmlTemplate.php';

/** Добавление HTML-файла в каталог таймеров */
$dirName = md5(time() . $timerName);
$dirPath = '/userTimers/' . $dirName;
file_put_contents(__DIR__ . $dirPath . '.html', $outputHTML);
$sliceLink = substr($_SERVER['SCRIPT_NAME'], 0, -9);

/** Отправка ответа AJAX */
echo json_encode([
	'result' => 'success',
	'dirPath' => $dirPath,
	'sliceLink' => $sliceLink,
]);