$(document).ready(function () {
    //logar
    $(`#transfer`).click(function () {
        let agencia =  $(`#agencia`).val()
        let conta_dest = $(`#conta_dest`).val()
        let valor = $(`#valor`).val()
        $.post(`../controllers/transferir.php`, { agencia: agencia, conta_dest: conta_dest, valor: valor }, function (data) {
            console.log(data);
            console.log(data.status);
            if (data.status == "ok") {
                alert(`Transferido`)
            }
            else {
                alert(`Não foi possivel atualizar`)
                $(`#agencia`).val(" ")
                $(`#sobrenome_update`).val(" ")
            }
        })
    })
});