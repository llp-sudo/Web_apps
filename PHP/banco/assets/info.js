$(document).ready(function () {
    //logar
    $(`#send_update`).click(function () {
        let nome = $(`#nome_update`).val()
        let sobrenome = $(`#sobrenome_update`).val()
        let email = $(`#email_update`).val()
        let senha = $(`#senha_update`).val()
        $.post(`../controllers/info.php`, { email: email, nome: nome, sobrenome: sobrenome, senha: senha }, function (data) {
            console.log(data);
            if (data.status == "ok") {
                alert(`dados atualizados`)
            }
            else {
                alert(`Não foi possivel atualizar`)
                $(`#nome_update`).val(" ")
                $(`#sobrenome_update`).val(" ")
                $(`#email_update`).val(" ")
                $(`#senha_update`).val(" ")

            }
        })
    })
});