new Vue({
    el: '#main',
    data: {
        changelogs: [],
        message_sended: false,
        message:{
            name: '',
            email: '',
            message: '',
            created: '',
            modified: ''
        },
    },

    ready: function () {
    },
    methods: {
        save_message: function ()
        {
            var data = new Date(),
                dia = data.getDate().toString(),
                diaF = (dia.length == 1) ? '0' + dia : dia,
                mes = (data.getMonth() + 1).toString(),
                mesF = (mes.length == 1) ? '0' + mes : mes,
                anoF = data.getFullYear();

            var hora = data.getHours();
            var minuto = data.getMinutes();
            var segundo = data.getSeconds();

            let message = {
                name: this.message.name,
                email: this.message.email,
                message: this.message.message,
                created: anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo,
                modified: anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo
            };

            self = this;

            axios.post('https://redcolibriapi.focux.me/redcolibriapi/Messages/add.json', message)
            .then(function (response) {
                if(response.status === 200)
                {
                    console.log(response);
                    self.message_sended = true;

                }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        send_new_message: function ()
        {
            this.message_sended = false;

            this.message.name = '';
            this.message.email = '';
            this.message.message = '';
            this.message.created = '';
            this.message.modified = '';
        }
    }
});
