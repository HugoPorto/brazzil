
new Vue({
    el: 'body',
    data: {
        debug: false,
        idVideo: '',
        openModal: false
    },
    ready: function () {
        $(".js-example-basic-single").select2({
            ajax: {
                placeholder: "Categorias",
                allowClear: true,
                url: '/viewx/category-videos/listAll',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: false
            }
        });
    },
    methods: {
        makeDebug: function () {
            if (this.debug == false) {
                this.debug = true;
            } else {
                this.debug = false;
            }
        },
        popup: function (idVideo) {
            this.idVideo = idVideo;
            this.openModal = true;
        },
        closePoup: function () {
            this.openModal = true;
            // url: 'http://169.254.192.58/focuxapiv1/firstlanguages.json',
        }
    }
});