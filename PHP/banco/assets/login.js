$(document).ready(function () {

    //Tela de login
    $(`#screen_cadastro`).click(function () {
        $(`#form_login`).hide()
        $(`#form_registro`).fadeIn(2000)
    })

    //Tela de cadastros
    $(`#back_login`).click(function () {
        $(`#form_registro`).hide()
        $(`#form_login`).fadeIn(2000)

    })

    //logar
    $(`#logar`).click(function () {
        let email = $(`#email_login`).val()
        let senha = $(`#senha_login`).val()
        $.post(`../controllers/login.php`,{ email: email, senha: senha }, function (data) {
            console.log(data);
            if (data.status == "ok"){ 
                window.location.href = "../views/perfil.php";
            }
            else {
                alert(`usuário ou senha inválidos`)
                $(`#email_login`).val("")
                $(`#senha_login`).val("")
            }
        })
    })

    //Cadastro de novo usuário
    $(`#cadastro`).click(function() {
        let nome_r = $(`#nome_r`).val()
        let sobrenome_r = $(`#sobrenome_r`).val()
        let email_r = $(`#email_r`).val()
        let senha_r = $(`#senha_r`).val()
        let valor_r = $(`#valor_r`).val()
        params = {"nome_r": nome_r,
                "sobrenome_r": sobrenome_r,
                "email_r": email_r,
                "senha_r": senha_r,
                "valor_r": valor_r
        }
        $.post(`../controllers/registro.php`,params, function (data) {
            console.log(data);
            if (data.status == "ok"){ 
                alert(`Cadastro realizado com sucesso.`)
                $(`#nome_r`).val("")
                $(`#sobrenome_r`).val("")
                $(`#email_r`).val("")
                $(`#senha_r`).val("")
                $(`#form_registro`).hide()
                $(`#form_login`).fadeIn(2000)
            }
            else {
                alert(data.msg)
                $(`#nome_r`).val("")
                $(`#sobrenome_r`).val("")
                $(`#email_r`).val("")
                $(`#senha_r`).val("")
            }
        })

    })

})