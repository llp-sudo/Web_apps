$(document).ready(function () {

    const monitor = {

        //variaveis
        ctx: $(`#myChart`)[0].getContext('2d'),



        //Inicializar as funções:
        init() {
            this._get_countries();
            this.create_graph();
            this.create_mouth_select();
            this.init_select();
            this.gerar();
        },

        //Cria o grafico canvas
        create_graph: function () {
            outher = this;

            myChart: new Chart(outher.ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },

        //Pegar países
        _get_countries: function () {
            let option = `get_countries`;
            $.post("../controllers/monitor.php", { 'option': option, }, function (result) {
                if (result) {
                    result.forEach(function (item, index) {
                        $('#country_select').append(`<option value="${item}">${item}</option>`);
                    })

                } else {
                    alert(`Falha no login: Usuário ou senha invalidos`)
                }
            });
        },
        //Popula o select do mes
        create_mouth_select: function () {
            mes = 12
            for (let i = 1; i <= mes; i++) {
                $('#mes_select').append(`<option value="${i}">${i}</option>`);
            }

        },

        init_select: function () {
            $(`#country_select`).change(function () {
                opc = $(this).val()
                console.log(opc);
                if (opc != 'País') {
                    $(`#periodo_select`).show();
                } else {
                    $(`#periodo_select`).hide();
                    $(`#mes_select`).hide();
                    $(`#gerar`).hide();
                }
            });

            $(`#periodo_select`).change(function () {
                opc = $(this).val()
                console.log(opc);
                if (opc == 'mes') {
                    $(`#mes_select`).show();
                    $(`#ano_select`).show();
                    $(`#gerar`).show();
                } else if (opc == 'ano') {
                    $(`#ano_select`).show();
                    $(`#mes_select`).hide();
                    $(`#gerar`).show();
                } else {
                    $(`#mes_select`).hide();
                    $(`#ano_select`).hide();
                    $(`#gerar`).hide();
                }
            });
            //Limpa os campos de mes e ano ao alterar o periodo
            $(`#periodo_select`).change(function () {
                $(`#mes_select`).val(`Mês`)
                $(`#ano_select`).val(`Ano`)

            });
        },

        gerar: function () {

            $(`#gerar`).click(function () {
                //verificar se os valores != de null
                let option = `graph_plot`;
                country = $(`#country_select`).val()
                mes = $(`#mes_select`).val()
                ano = $(`#ano_select`).val()

                if (country != 'País' && ano != 'Ano'|| mes != 'Mês') {
                    //Solicitar os dados
                    $.post("../controllers/monitor.php", { 'option': option, 'country': country, 'mes': mes, 'ano': ano, }, function (result) {
                        console.log(result);
                    });
                } else {
                    alert(`Preencha todos os campos`)
                }
            });
        },

    }

    //Inicializar as funções:
    monitor.init();

});