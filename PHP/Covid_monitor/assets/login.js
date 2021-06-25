$(document).ready(function () {

    //exibi o form de login
    $(`#entrar`).click(function() {
        $(`.btn-principal`).hide();
        $(`.input-entrar`).show();
        $(`.back-btn`).show();
    });

    //Volta a tela principal de login
    $(`.back-btn`).click(function() {
        $(`.btn-principal`).show();
        $(`.input-entrar`).hide();
        $(`.input-cadastrar`).hide();
        $(`.back-btn`).hide();
    });
    //exibi o form de cadastro
    $(`#cadastro`).click(function() {
        $(`.btn-principal`).hide();
        $(`.input-cadastrar`).show();
        $(`.back-btn`).show();
    });

});