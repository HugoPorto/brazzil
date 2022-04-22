new Vue({
    el: '#main',
    data: {
        debug: false,
        changelogs: [],
        contact: false,
        userId: 0,
        myEnvironment: '',
        structure_page: {
            home: 'Home',
            contact: 'Contact',
            changelogs: 'Changelogs',
            changelog_table_active: false,
            breadcumb: 'Dashboard',
            main_link: '/ohnik/pages',
            contact_description: false,
            defis: 0,
            transactions: 0,
            totalCapital: 0,
            nfts: 0,
            user: [],
            page_friends: false,
            page_footer: true,
            analizedProjects: 0,
            analizedProjectsNotes: 0,
            boardsInformations: 0,
            myCoins: 0,
            myReferences: 0,
            opportunitys: 0
        },
        analizedProjects:{
            project: '',
            description: '',
            long_time: true,
            short_time: false,
            users_id: 0,
            created: '',
            modified: ''
        },
        analizedProjectNotes:{
            note1: '',
            note2: '',
            note3: '',
            analized_projects_id: 0
        },
        analizedProjectNotesToSend1:{
            note: '',
            analized_projects_id: 0,
            users_id: 0,
            created: '',
            modified: ''
        },
        analizedProjectNotesToSend2:{
            note: '',
            analized_projects_id: 0,
            users_id: 0,
            created: '',
            modified: ''
        },
        analizedProjectNotesToSend3:{
            note: '',
            analized_projects_id: 0,
            users_id: 0,
            created: '',
            modified: ''
        }
    },
    ready: function () {
        this.userId = document.getElementsByClassName("username")[0].id;
        this.myEnvironment = document.getElementsByClassName("wrapper")[0].id;
        this.getAccompaniments(this.userId);
        this.getTotalCapital(this.userId);
        this.getNfts(this.userId);
        this.getAnalizedProjects(this.userId);
        this.getAnalizedProjectsNotes(this.userId);
        this.getBoards(this.userId);
        this.getMyCoins(this.userId);
        this.getDefis();
        this.getMyReferences(this.userId);
        this.getOpportunitys(this.userId);

    },
    methods: {
        getDefis: function () {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/defis.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/defis.json';

            }

            axios.get(url)
            .then(response => {

                if(response.status === 200){

                    this.structure_page.defis = response.data.defis;

                }

            })
            .catch(function (error) {
                console.log(error);
            });

        },
        getAccompaniments: function (idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/Accompaniments/list/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/Accompaniments/list/' + idUser + '.json';

            }

            axios.get(url)
            .then(response => {

                if(response.status === 200){

                    this.structure_page.transactions = response.data.accompaniments;

                }

            })
            .catch(function (error) {
                console.log(error);
            });

        },
        getTotalCapital: function (idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/accompaniments/totalCapital/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/accompaniments/totalCapital/' + idUser + '.json';

            }

            axios.get(url)
                .then(response => {

                    if(response.status === 200){

                        if (response.data.totalCapital[0][0] === null){

                            this.structure_page.totalCapital = 0;

                        }else{

                            this.structure_page.totalCapital = parseFloat(response.data.totalCapital[0][0]).toFixed(3);

                        }
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

        },

        getMyReferences: function (idUser) {
            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/my-references/count/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/my-references/count/' + idUser + '.json';

            }

            axios.get(url)
                .then(response => {

                if(response.status === 200){

                    this.structure_page.myReferences = response.data.myReferences;

                }

            })
            .catch(function (error) {
                console.log(error);
            });

        },
        getNfts: function (idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/Nfts/list/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/Nfts/list/' + idUser + '.json';

            }

            axios.get(url)
                .then(response => {

                if(response.status === 200){

                    this.structure_page.nfts = response.data.nfts;

                }

            })
            .catch(function (error) {
                console.log(error);
            });

        },
        getOpportunitys: function (idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/opportunitys/count/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/opportunitys/count/' + idUser + '.json';

            }

            axios.get(url)
                .then(response => {

                if(response.status === 200){

                    this.structure_page.opportunitys = response.data.opportunitys;

                }

            })
            .catch(function (error) {
                console.log(error);
            });

        },
        verify_long_time:function(){
            if(this.analizedProjects.long_time){
                this.analizedProjects.short_time = false;
            }
        },
        verify_short_time:function(){
            if(this.analizedProjects.short_time){
                this.analizedProjects.long_time = false;
            }
        },
        getAnalizedProjects(idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/analized-projects/list/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/analized-projects/list/' + idUser + '.json';

            }

            axios.get(url)
                    .then(response => {

                    if(response.status === 200) {

                        this.structure_page.analizedProjects = response.data.analizedProjects;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getAnalizedProjectsNotes(idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/analized-projects-notes/list/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/analized-projects-notes/list/' + idUser + '.json';

            }

            axios.get(url)
                    .then(response => {

                    if(response.status === 200) {

                        this.structure_page.analizedProjectsNotes = response.data.analizedProjectsNotes;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getBoards(idUser) {

            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/boards-informations/list/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/boards-informations/list/' + idUser + '.json';

            }

            axios.get(url)
                    .then(response => {

                    if(response.status === 200) {

                        this.structure_page.boardsInformations = response.data.boardsInformations;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        getMyCoins(idUser) {
            let url = '';

            if(this.myEnvironment === 'localhost'){

                url = 'http://localhost/redcolibriapi/my-coins/list/' + idUser + '.json';

            }else{

                url = 'https://redcolibriapi.focux.me/redcolibriapi/my-coins/list/' + idUser + '.json';

            }

            axios.get(url)
                    .then(response => {

                    if(response.status === 200) {

                        this.structure_page.myCoins = response.data.myCoins;

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        save_analized_project: function()
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

            this.analizedProjects.users_id = parseInt(this.userId);

            if(this.analizedProjects.long_time)
            {
                this.analizedProjects.long_time = 1;
            }
            else
            {
                this.analizedProjects.long_time = 0;
            }

            if(this.analizedProjects.short_time)
            {
                this.analizedProjects.short_time = 1;
            }
            else
            {
                this.analizedProjects.short_time = 0;
            }

            this.analizedProjects.created = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;

            this.analizedProjects.modified = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;

            self = this;

            axios.post('http://localhost/redcolibriapi/analized-projects/addOr.json', this.analizedProjects)
            .then(function (response) {

                if(response.status === 200)

                {

                    self.analizedProjectNotes.analized_projects_id = response.data.analizedProjects.id;

                }

            })
            .catch(function (error) {
                console.log(error);
            });

        },
        save_analized_project_notes: function()
        {
            let data = new Date();
            let dia = data.getDate().toString();
            let diaF = (dia.length == 1) ? '0' + dia : dia;
            let mes = (data.getMonth() + 1).toString();
            let mesF = (mes.length == 1) ? '0' + mes : mes;
            let anoF = data.getFullYear();
            let hora = data.getHours();
            let minuto = data.getMinutes();
            let segundo = data.getSeconds();

            this.analizedProjectNotesToSend1.note = this.analizedProjectNotes.note1;
            this.analizedProjectNotesToSend1.analized_projects_id = parseInt(this.analizedProjectNotes.analized_projects_id);
            this.analizedProjectNotesToSend1.users_id = this.userId
            this.analizedProjectNotesToSend1.created = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;
            this.analizedProjectNotesToSend1.modified = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;

            this.analizedProjectNotesToSend2.note = this.analizedProjectNotes.note2;
            this.analizedProjectNotesToSend2.analized_projects_id = parseInt(this.analizedProjectNotes.analized_projects_id);
            this.analizedProjectNotesToSend2.users_id = this.userId
            this.analizedProjectNotesToSend2.created = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;
            this.analizedProjectNotesToSend2.modified = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;

            this.analizedProjectNotesToSend3.note = this.analizedProjectNotes.note3;
            this.analizedProjectNotesToSend3.analized_projects_id = parseInt(this.analizedProjectNotes.analized_projects_id);
            this.analizedProjectNotesToSend3.users_id = this.userId
            this.analizedProjectNotesToSend3.created = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;
            this.analizedProjectNotesToSend3.modified = anoF + "-" + mesF + "-" + diaF + "T" + hora + ":" + minuto + ":" + segundo;

            if(this.analizedProjectNotesToSend1.note !== '')
            {
                axios.post('http://localhost/redcolibriapi/analized-projects-notes/addOr.json', this.analizedProjectNotesToSend1)
                .then(function (response) {

                    if(response.status === 200)
                    {
                        // location.reload();
                        window.location.href = "http:/focux/analized-projects";
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
            }

            if(this.analizedProjectNotesToSend2.note !== '')
            {
                axios.post('http://localhost/redcolibriapi/analized-projects-notes/addOr.json', this.analizedProjectNotesToSend2)
                .then(function (response) {

                    if(response.status === 200)
                    {
                        console.log('Sucess...');
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
            }

            if(this.analizedProjectNotesToSend3.note !== '')
            {
                axios.post('http://localhost/redcolibriapi/analized-projects-notes/addOr.json', this.analizedProjectNotesToSend3)
                .then(function (response) {

                    if(response.status === 200)
                    {
                        console.log('Sucess...');
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        save_changelog: function ()
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
