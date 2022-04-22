new Vue({
    el: '#main',
    data: {
        debug: false,
        btc: null,
        eth: null,
        bnb: null,
        testes: [],
        changelogs: [],
        erro: null,
        contact: false,
        structure_page: {
            home: 'Home',
            contact: 'Contact',
            changelogs: 'Changelogs',
            changelog_table_active: false,
            breadcumb: 'Dashboard',
            main_link: '/ohnik',
            contact_description: false,
            defis:0,
            transactions:0
        }
    },
    ready: function () {
        this.get_defis();
        this.get_accompaniments();
        // setInterval(btc, 5000);

        // setInterval(eth, 5000);

        // setInterval(bnb, 5000);

        // self = this;

        // function btc() {

        //     axios.get('https://api.binance.com/api/v3/avgPrice?symbol=BTCUSDT')
        //         .then(response => {

        //             self.btc = response.data.price;

        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // }

        // function eth() {

        //     axios.get('https://api.binance.com/api/v3/avgPrice?symbol=ETHUSDT')
        //         .then(response => {

        //             self.eth = response.data.price;

        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // }

        // function bnb() {

        //     axios.get('https://api.binance.com/api/v3/avgPrice?symbol=BNBUSDT')
        //         .then(response => {

        //             self.bnb = response.data.price;

        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //         });
        // }
    },
    methods: {
        contact_enable: function () {
            if (this.contact === false) {

                this.contact = true;

                this.structure_page.breadcumb = 'Contact';
            }
        },
        get_changelogs: function () {

                 axios.get('http://localhost/redcolibriapi/Changelogs.json')
                    .then(response => {

                    if(response.status === 200){

                        this.changelogs = response.data.changelogs;

                        this.structure_page.changelog_table_active = true;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        get_defis: function () {

                 axios.get('http://localhost/redcolibriapi/Defis.json')
                    .then(response => {

                    if(response.status === 200){

                        this.structure_page.defis = response.data.defis;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        get_accompaniments: function () {

                 axios.get('http://localhost/redcolibriapi/Accompaniments.json')
                    .then(response => {

                    if(response.status === 200){

                        this.structure_page.transactions = response.data.accompaniments.length;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        save_changelog: function () {
            var data = new Date(),
                dia = data.getDate().toString(),
                diaF = (dia.length == 1) ? '0' + dia : dia,
                mes = (data.getMonth() + 1).toString(),
                mesF = (mes.length == 1) ? '0' + mes : mes,
                anoF = data.getFullYear();

            var hora = data.getHours();
            var minuto = data.getMinutes();
            var segundo = data.getSeconds();

            let changelog = {
                changelog: 'Teste',
                icon: 'Teste',
                created: anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo,
                modified: anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo
            };

            axios.post('http://localhost/redcolibriapi/Changelogs/addOr.json', changelog)
            .then(function (response) {
                console.info('save_changelog:',
                    {
                        Resultado: response,
                        Changelog: changelog
                    });
            })
            .catch(function (error) {
                console.info('save_changelog_error:',
                    {
                        Resultado: error,
                    });
            });

        },
    }
});
