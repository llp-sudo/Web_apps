$(document).ready(function () {

    //Apresenta as opções:
    $(`#start_game`).click(function () {
        $(`.opc`).show();
        $(this).removeClass(`btn-primary`)
        $(this).addClass(`btn-secondary`);
    });

    //seleciona pedra
    $(`#pedra`).click(function () {
        alert(`pedra`);
        send('pedra');


    });
    //seleciona papel
    $(`#papel`).click(function () {
        alert(`papel`);
        send('papel');

    });
    //seleciona tesoura
    $(`#tesoura`).click(function () {
        alert(`tesoura`);
        send('tesoura');

    });

    //envia a opção
    function send(opc) {
        console.log(`foi ${opc}`);
        let placar = '';
        let resultado = '';
        $.post("./jogo.php", { opc: opc }, function (data) {
            if (data.status == `fim de jogo`) {
                resultado = `${data.status}`
                placar = `Vencedor: ${data.vencedor}`;
            } else {
                placar = `Maquina ${data.maquina} X Humano ${data.humano}`
                resultado = `${data.status} | Maquina escolheu: ${data.opc_maquina}`
            }

            $("#placar").html(placar);
            $("#resultado").html(resultado);

            $("#placar").html(placar);
        });

    }
});