jQuery(".form-valide").validate({
    rules: {
        "description_ru": {
            required: !0,
        },
        "description_uk": {
            required: !0,
        },
        "title_ru": {
            required: !0,
            minlength: 5
        },
        "title_uk": {
            required: !0,
            minlength: 5
        },
        "image": {
            required: !0
        },
        "city_uk": {
            required: !0
        },
        "city_ru": {
            required: !0
        },

    },
    messages: {
        "description_ru": {
            required: "Описание ru обязательно",
        },
        "description_uk": {
            required: "Описание uk обязательно",
        },
        "title_ru": {
            required: "Заголовок ru обязателен",
            minlength: "Заголовок ru должен быть более 5 символов"
        },
        "title_uk": {
            required: "Заголовок uk обязателен",
            minlength: "Заголовок uk должен быть более 5 символов"
        },
        "image": {
            required: "Изображение обязательно"
        },
        "city_uk": {
            required: "Название на украинском обязателено",
        },
        "city_ru": {
            required: "Название на русском обязателено",
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});

