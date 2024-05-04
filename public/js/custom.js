$(function(){
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('.file-area-to-drag').on('drop',function (event) {
        $(this).children('input[type="hidden"]').val(event.originalEvent.dataTransfer.getData("id"))
        $(this).children('div.input-file__label').html('');
        var file_anchor = $('<div class="ex-upload-item">'+event.originalEvent.dataTransfer.getData("name")+'</div>');
        $(this).children('div.input-file__label').prepend(file_anchor);
    });
    $('.file-area-to-drag').on('dragover',function (event) {
        event.preventDefault();
    });
    $('.file-area-to-drag input[type="file"]').on('change onmouseout', function(){ console.log($(this).val())
        $(this).parent().children('div.input-file__label').html('');
        var value = $(this).val().replace(/^.*[\\\/]/, '')
        var file_anchor = $('<div class="ex-upload-item"><div class="ex-upload-item-box"><div class="ex-upload-item__header"><img src="http://qurilish.gis.uz/assets/img/icons/pdf.svg" class="icon-file" alt=""><img src="http://qurilish.gis.uz/assets/img/icons/pdf-invert.svg" class="icon-file-invert" alt=""></div>' +
            '<div class="ex-upload-item__content"><div class="ex-upload-item__title">'+value+'</div></div></div></div>');
        $(this).parent().children('div.input-file__label').prepend(file_anchor);
    });
    $('.filter-select').on('change',function () {
        $(this).closest('form').submit();
    });
    $('.object-select').on('change',function () {
        window.location.href = $(this).attr('redirect_to') + "/" + $(this).val();
    });
    $('input[type="checkbox"]#e').on('change',function () {
        $(this).closest('form').submit();
    });
    $('select.filter-select + button.clear-button').on('click', function(){
        $(this).closest('input[name="clear"]').val('true');
        $(this).closest('form').submit();
    });
    $('[draggable="true"]').on('dragstart', function (event) {
        console.log(event);
        event.originalEvent.dataTransfer.setData("id", $(this).attr('id'));
        event.originalEvent.dataTransfer.setData("name", $(this).html());
    });
    var count = 1;
    function dynamic_field(number)
    {
        html = '<div class="dynamic_field"><div class="form-group row">' +
            '<label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>' +
            '<div class="col-md-6">' +
            '<input type="file" name="photo[]" class="form-control"/>' +
            '</div>' +
            '</div>\n' +
            '<div class="form-group row">' +
            '<label for="photo" class="col-md-4 col-form-label text-md-right">Description</label>' +
            '<div class="col-md-6">' +
            '<input type="text" name="title[]" class="form-control"/>' +
            '</div>' +
            '</div>';
        if(number > 1)
        {
            html += '<button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></div>';
            $('.photos_to_add').append(html);
        }
        else
        {
            html += '<button type="button" name="add" id="add" class="btn btn-success">Add</button></div>';
            $('.photos_to_add').html(html);
        }
    }
    $(document).on('click', '#add', function(){
        count++;
        dynamic_field(count);
    });
    $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("div.dynamic_field").remove();
    });
    setTimeout(function(){ $('div.notifications-area > .notify').hide(); }, 3000);
    $(".basicAutoComplete").autoComplete();
});
