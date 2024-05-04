/*! crit-tech v0.0.1 | (c) 2020 RUSTAM KHASANOV | https://github.com/icid5post */
$(document).ready((function(){

    let invalidaction = $('.invalid-action');
    let canclebtn = $('.edit-cancel');


    // Events
    invalidaction.on('click', editMode);
    canclebtn.on('click', closeEditMode);

    function editMode() {
        let fieldComment = $(this).parent().parent().find('.order-field__value');
        let fieldName = $(this).attr('data-field');
        fieldComment.append(creatField(fieldName));
        $(this).siblings('.edit-cancel').show();
        $(this).siblings('.input-group').remove();
        $(this).hide();
    }

    function closeEditMode() {
        // $(this).parent().append(invalidaction);
        let fieldName  = $(this).siblings('.invalid-action').attr('data-field');
        let checkName = $(this).attr('data-field');
        $('#' + fieldName).parent().remove();
        $(this).siblings('.invalid-action').show();
        $(this).parent().prepend(creatCheck(checkName));
        $(this).hide();
    }

    //Elements

    function creatField(name) {
        const fieldContainer = `<div class="order-field-descr form-group">
            <label for="${name}">Оставить комментарий</label>
            <input type="text" class="form-control" name="${name}" id="${name}" required>
             <div class="invalid-tooltip">Заполните поле</div>
        </div>`;
        return fieldContainer;
    }

    function creatCheck(name) {
        const fieldContainer = `<div class="input-group">
            <div class="custom-control custom-checkbox order-valid-checkbox">
                <input type="checkbox" class="custom-control-input " id="${name}" required>
                <label class="custom-control-label" for="${name}"></label>
                <div class="invalid-tooltip">Отметье поле</div>
            </div>
        </div>`;
        return fieldContainer;
    }

}));