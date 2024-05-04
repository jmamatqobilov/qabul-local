/*! crit-tech v0.0.1 | (c) 2020 RUSTAM KHASANOV | https://github.com/icid5post */
// Smart form init
$(document).ready((function(){
    $('#smartwizard').smartWizard({
        cycleSteps: false,
        useURLhash: true,
        showStepURLhash: true,
        transitionEffect: 'fade',
        autoAdjustHeight: true,
        transitionSpeed: 600,
        theme: 'dots',
        // anchorSettings : {
        //     anchorClickable : true , // Включить / отключить навигацию по привязке
        //     enableAllAnchors : true , // активирует все якоря , которые можно активировать нажатием
        //     markDoneStep : true , // добавить готово css
        //     enableAnchorOnDoneStep : true // Включить / отключить навигацию по выполненным шагам
        // },
        lang: {
            next: 'Далее',
            previous: 'Назад'
        },
    });
}));

$("#smartwizard").on("leaveStep", (function(e, anchorObject, stepNumber, stepDirection) {
    var elmForm = $("#form-step-" + stepNumber).find('.cr-validation');
    if (stepDirection === 'forward' && elmForm) {
        var hassError = [];
        elmForm.each((function (index) {
            if ($(this)[0].checkValidity() === false) {
                // Form validation failed
                var inputError = $(this)[0].name;
                hassError.push({
                    [inputError]: 'error'
                });
            }
        }));
        if (hassError.length > 0) {
            // Form validation failed
            $("#form-step-" + stepNumber).addClass('was-validated');
            // return false
        }
    }
    return true;
}));


$('.file-modal-toggle').on('click', (function (e) {
    e.preventDefault();
    let dateLabel = $(this).attr('data-field');
    $('#fileLoaderModal').modal('show')
}));