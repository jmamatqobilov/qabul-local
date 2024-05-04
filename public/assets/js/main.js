/*! crit-tech v0.0.1 | (c) 2020 RUSTAM KHASANOV | https://github.com/icid5post */
// sidebar menu init
$((function () {

    $('#side-menu').metisMenu({
        // triggerElement: '.side-menu-dropdown'
    });


}));

//Init Animation
$(document).ready((function () {
    AOS.init();
}));

//Form validation
$(document).ready((function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, (function (form) {
        form.addEventListener('submit', (function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }), false);
    }));
}));


// Form input type=file
$(document).ready((function () {
    var inputs = $('.file-input')

    for (var i = 0, len = inputs.length; i < len; i++) {
        customInput(inputs[i])
    }

    function customInput(el) {
        const fileInput = el.querySelector('[type="file"]')
        const label = el.querySelector('[data-js-label]')

        fileInput.onchange =
            fileInput.onmouseout = function () {
                if (!fileInput.value) return

                var value = fileInput.value.replace(/^.*[\\\/]/, '')
                el.className += ' -chosen'
                label.innerText = value
            }
    }

}));

// Datepicker
$(document).ready((function () {
    $('.datepicker').datepicker({
        format: 'dd:mm:yyyy',
        language: 'ru'
    });
}));

// Input mask
$(document).ready((function () {
    $('.mask-metric').mask('0000000', {placeholder: "м."});
}));

// Toggle slide nav
$(document).ready((function () {
    $('.menu-toggle').on('click', (function (e) {
        e.preventDefault();
        $('body').toggleClass('ex-menu-open')
    }))
}));

//Init tooltips
$(document).ready((function () {
    $('[data-toggle="tooltip"]').tooltip()
}));

//Forms validation
$(document).ready((function () {
    var forms = $('.from-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, (function (form) {
        form.addEventListener('submit', (function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }), false);
    }));
}));

//edit loader value
$('.if-loader-edit').on('click', (function () {
    var hideParent = $(this).parent();
    var showParent = $(this).parent().siblings('.hide-if-value');
    hideParent.addClass('d-none');
    showParent.removeClass('d-none');
    showParent.find('input').prop('required', true);
}));


//Progress chart
$(document).ready((function () {
    var ctx = document.getElementById('progressChart');

    if (!ctx) {
        return
    }

    ctx.getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
            datasets: [{
                borderColor: '#45A57D',
                backgroundColor: '#E7FDF4',
                data: [20, 15, 60, 60, 65, 30, 70],
            }],
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    gridLines: {
                        display: false,
                    },
                }],
                xAxes: [{
                    display: false,
                    gridLines: {
                        display: false,
                    },
                }]
            },
            legend: {
                display: false,
                labels: {
                    boxWidth: 80,
                    fontColor: 'black'
                }
            }
        },

        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                }
            }
        }
    });
}));


//Custom select
$(document).ready((function () {
    $('.ex-select').select2({
        minimumResultsForSearch: 20
    });
}))


//Sliders

$('.card-photo-slider').owlCarousel({
    loop: true,
    margin: 40,
    items: 1,
    nav: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    mouseDrag: false
});


// side gallery toggle

$('.side-gallery-btn').on('click', (function (e) {
    e.preventDefault();
    $(this).toggleClass('closed');
    $(this).parent('.side-gallery').toggleClass('open-side')
}));

//file UPLOAD
/*
$(document).ready(function () {
    var manualUploader = new qq.FineUploader({
        element: document.getElementById('fine-uploader-manual-trigger'),
        template: 'qq-template-manual-trigger',
        request: {
            endpoint: '/server/uploads'
        },
        thumbnails: {
                placeholders: {
                // waitingPath: '/source/placeholders/waiting-generic.png',
                notAvailablePath: '/img/icons/pdf.png'
            }
        },
        autoUpload: true,
        debug: true,

        callbacks: {
            onComplete: function(id, name, response) {
              $('.upload-buttons').hide();
            },
            onCancel: function () {
                console.log('dsdsd');
                $('.upload-buttons').show();
            },

        }
    });

    qq(document.getElementById("trigger-upload")).attach("click", function() {
        manualUploader.uploadStoredFiles();
    });


});

*/

$('.fileInput').change((function () {
    var numfiles = $(this)[0].files.length;
    var parent = $(this).closest('.input-file');
    parent.find('ins').remove();
    for (i = 0; i < numfiles; i++) {
        parent.append('<ins>' + $(this)[0].files[i].name + '</ins>')
    }
}));

// status popup
/*
$('.status-popup').hover(
    function (e) {
        let title = $(this).children('.status-popup__title');
        let content = $(this).children('.status-popup__content');
        let activeItem = content.children('.active-item');
        $(this).addClass('active-hover');
        content.css({
            "position": "fixed",
            "top": title.offset().top  - $(window).scrollTop(),
            "left": title.offset().left - 45,
            "margin-top": -activeItem.position().top
        });

    },
    function (e) {
        let content = $(this).children('.status-popup__content');
        $(this).removeClass('active-hover');
        content.css({
            "position": "absolute",
            "top": 0,
            "left": 0,
            "margin-top": 0
        })
    }
);
*/

// Status popup math hover

$(document).on('click', '.status-popup', (function (e) {
    e.preventDefault();
    let title = $(this).children('.status-popup__title');
    let content = $(this).children('.status-popup__content');
    let activeItem = content.children('.active-item');
    $(this).addClass('active-hover');
    console.log(activeItem.position().top);
    content.css({
        // "display": "block",
        "position": "fixed",
        "top": title.offset().top - $(window).scrollTop() + 2,
        "left": title.offset().left - 45,
        "margin-top": -activeItem.position().top
    });
}));

$('.status-popup__content').mouseleave((function (e) {
    console.log('mousedown');
    $(this).parent('.status-popup').removeClass('active-hover');
    $(this).css({
        // "display": "none",
        // "position": "static",
        "top": 0,
        "left": 0,
        "margin-top": 0
    })
}));

//Custom Scrollbars

$(document).ready((function () {
    var elementsBar = $('.ex-bar').find('.app-item');
    var elementsNotiBar = $('.ex-bar-notify').find('.notify_dropdown');
    if (elementsBar && elementsBar.length > 4) {
        $('.ex-bar').css({"height": "243px"});
    }
    if (elementsNotiBar && elementsNotiBar.length > 4) {
        $('.ex-bar-notify').css({"height": "243px"});
    }
}));

//
// $(document).ready(function () {
//     $(".btn-success").click(function () {
//         console.log($(this).attr("data-id"));
//         let id = $(this).attr("data-id");
//         var lsthmtl = $("#"+id).html();
//         $(".increment").after(lsthmtl);
//     });
//     $("body").on("click", ".btn-danger", function () {
//         $(this).parents(".hdtuto control-group lst").remove();
//     });
// });

$("button").click(function () {
    // alert(this.id); // or alert($(this).attr('id'));
    // console.log(this.id)
    let id = this.id
    console.log(id)
    let newElement = $("#label-" + id).clone()
    $(newElement).insertAfter($("#title-" + id))
    // let component = $("#label-" + id).html();
    // $("#label-"+ id).after(component);
    // $("#label-" + id).clone()

    // console.log($(this).attr("data-id"));
});