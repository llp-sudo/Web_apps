$(document).ready(function () {

    //exibi o form de login
    $(`#entrar`).click(function () {
        $(`.btn-principal`).hide();
        $(`.input-entrar`).show();
        $(`.back-btn`).show();
    });

    //Volta a tela principal de login
    $(`.back-btn`).click(function () {
        $(`.btn-principal`).show();
        $(`.input-entrar`).hide();
        $(`.input-cadastrar`).hide();
        $(`.back-btn`).hide();
    });
    //exibi o form de cadastro
    $(`#cadastro`).click(function () {
        $(`.btn-principal`).hide();
        $(`.input-cadastrar`).show();
        $(`.back-btn`).show();
    });


    //Logar
    $(`#logar`).click(function () {
        let username = $(`#user_login`).val();
        let password = $(`#pass_login`).val();
        let option = `login`;
        $.post("../controllers/login.php", {'username': username, 'password': password, 'option': option, }, function (result) {
            if(result.username){
                alert(`Bem-vindo: ${result.username}`)
                window.location.href = "../views/monitor.php";
            } else{
                alert(`Falha no login: Usuário ou senha invalidos`)
            }
            
        });
    });

    //cadastro
    $(`#cadastrar`).click(function () {
        let username = $(`#user_cadatro`).val();
        let email = $(`#email_cadatro`).val();
        let password = $(`#pass_cadatro`).val();
        let option = `register`;
        $.post("../controllers/login.php", {'username': username,'email':email, 'password': password, 'option': option, }, function (result) {
            if(result == 1){
                alert(`Cadastro realizado com sucesso`);
            } else{
                alert(`Falha ao cadastrar`);
            }
        });
    });


});