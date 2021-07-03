$(document).ready(function () {

    const monitor = {

        //variaveis
        ctx: $(`#myChart`)[0].getContext('2d'),
        myChart: Object(),


        //Inicializar as funções:
        init() {
            this._get_countries();
            this.create_mouth_select();
            this.init_select();
            this.gerar();
        },

        //Cria o grafico canvas
        create_graph: function (label, data) {
            outher_this = this;

            outher_this.myChart = new Chart(outher_this.ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Quantidade de casos',
                        data: data,
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
                    $(`#mes_select`).show();
                    $(`#ano_select`).show();
                    $(`#gerar`).show();
                } else {
                    $(`#mes_select`).hide();
                    $(`#ano_select`).hide();
                    $(`#gerar`).hide();
                }
            });
        },

        gerar: function () {
            outher_this = this;
            $(`#gerar`).click(function () {
                //destroi o canvas
                console.log(Object.keys(outher_this.myChart).length === 0 );

                if(Object.keys(outher_this.myChart).length !== 0 ) {
                    console.log(`destruindo canvas`);
                    outher_this.myChart.destroy();
                }
                
                //verificar se os valores != de null
                let option = `graph_plot`;
                let labels = [];
                let data = [];
                country = $(`#country_select`).val()
                mes = $(`#mes_select`).val()
                ano = $(`#ano_select`).val()

                if (country != 'País' && ano != 'Ano' && mes != 'Mês') {
                    //Solicitar os dados
                    $.post("../controllers/monitor.php", { 'option': option, 'country': country, 'mes': mes, 'ano': ano, }, function (result) {
                        result.forEach(function (item, index){
                            labels.push(item[0]);
                            data.push(item[1]);
                        });
                        console.log(labels);
                        console.log(data);
                        outher_this.create_graph(labels, data);

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