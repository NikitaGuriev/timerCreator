document.addEventListener('DOMContentLoaded', () => {

    /** Получение DOM-элементов */
    const CHOOSE_BG_COLOR_INPUT = document.getElementById('pickBGColor');
    const CHOOSE_TEXT_COLOR_INPUT = document.getElementById('pickTextColor');
    const COUNTDOWN_DATE = document.getElementById('countdownDate');
    const TIMER_NAME_INPUT = document.getElementById('timerName');
    const TEST_BLOCK_DIV = document.getElementById('testBlock');
    const TIMER_NAME_TEST_DIV = document.getElementById('timerNameTest');
    const TIMER_DIV = document.getElementById('timer');
    const MODAL_DIV = document.getElementById('modalDiv');

    /** Занесение значений по умолчанию в переменные */
    let pickedBGColor = CHOOSE_BG_COLOR_INPUT.value;
    let pickedTextColor = CHOOSE_TEXT_COLOR_INPUT.value;
    let enteredTimerTitle = TIMER_NAME_INPUT.placeholder;
    let chosenCountdownDate = COUNTDOWN_DATE.value;

    /** Добавление обработчиков событий */
    CHOOSE_BG_COLOR_INPUT.addEventListener('change', (e) => {
        pickedBGColor = e.target.value;
        TEST_BLOCK_DIV.style.backgroundColor = pickedBGColor;
    });
    CHOOSE_TEXT_COLOR_INPUT.addEventListener('change', (e) => {
        pickedTextColor = e.target.value;
        TEST_BLOCK_DIV.style.color = pickedTextColor;
    });
    TIMER_NAME_INPUT.addEventListener('keyup', (e) => {
        enteredTimerTitle = e.target.value;
        TIMER_NAME_TEST_DIV.innerText = enteredTimerTitle;
    });
    COUNTDOWN_DATE.addEventListener('change', (e) => {
        chosenCountdownDate = e.target.value;

        /** Калькуляция разницы между датой отсчета и текущей даты */
        function CALCULATE_DIFF() {
            let countdownDate = moment.utc(`${chosenCountdownDate}+03:00`);
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
            TIMER_DIV.innerText = `${years}.${months}.${days} ${hours}:${minutes}:${seconds}`;
        }

        CALCULATE_DIFF();
        setInterval(CALCULATE_DIFF, 1000);
    });


    (function () {
        'use strict';
        window.addEventListener('load', function () {
            let forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        event.preventDefault();
                        $.ajax({
                            method: 'POST',
                            url: 'createTimer.php',
                            data: {
                                'bgColor': pickedBGColor,
                                'textColor': pickedTextColor,
                                'timerName': enteredTimerTitle,
                                'countdownDate': chosenCountdownDate,
                            },
                            success: (response) => {
                                const TIMER_CREATE_RESPONSE = JSON.parse(response);
                                console.dir(TIMER_CREATE_RESPONSE);
                                if (TIMER_CREATE_RESPONSE.result === 'success') {
                                    const MODAL_HTML = `
                                        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="successModalLabel">Ваш счетчик успешно создан!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="/timers/timerCreator${TIMER_CREATE_RESPONSE.dirPath}.html" target="_blank" class="btn btn-outline-success mx-auto">Открыть счетчик</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;

                                    async function putHTML() {
                                        MODAL_DIV.insertAdjacentHTML('beforeend', MODAL_HTML);
                                    }

                                    putHTML().then(() => {
                                        const SUCCESS_MODAL = $('#successModal');
                                        SUCCESS_MODAL.modal('show');
                                        SUCCESS_MODAL.on('hidden.bs.modal', () => {
                                            SUCCESS_MODAL.remove();
                                        });
                                    });
                                }
                            },
                        });
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
});