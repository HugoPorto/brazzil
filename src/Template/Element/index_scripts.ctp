<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/jquery/jquery.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/dist/js/adminlte.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/dist/js/demo.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/select2/js/select2.full.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/jszip/jszip.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js';?>"></script>
<script src="<?php // echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/chart.js/Chart.min.js';?>"></script>
<script src="<?php // echo $this->request->webroot . 'AdminLTE-3.1.0/dist/js/pages/dashboard3.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/toastr/toastr.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/sweetalert2/sweetalert2.min.js';?>"></script>

<script>
  $(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#general").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "order": [[ 0, "desc" ]],
      "language": {
            "url": "<?= $this->request->base ?>/datatables/Portuguese-Brasil.json"
        },
    });
  });
</script>

<?php
    echo $this->Html->script(
        [
            '/vue/vue.min.js',
            '/axios/axios.min.js',
            '/page_scripts/index.js',
        ]
    );
    ?>

<script>
    $(function () {
    bsCustomFileInput.init();
    });
</script>

<script>

    function toastrDeleteCategory(idCategory) {
        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-categories/delete/" + idCategory,
            success: function (result) {
                console.log(result);
                if(result.msg === 'success'){
                    window.location.replace("<?= $this->request->base ?>/stores-categories/");
                    return false;
                } else {
                    toastr.info(result.msg);
                }
            }
        });

        return false;
    }

    function toastrDeleteSubcategory(idCategory) {
        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-subcategories/delete/" + idCategory,
            success: function (result) {
                if(result === 'success'){
                    window.location.replace("<?= $this->request->base ?>/stores-subcategories/");
                    return false;
                } else {
                    toastr.error(result);
                }
            }
        });

        return false;
    }

    <?php if ($this->request->controller === 'StoresDemands') : ?>
        function updateDemand(idDemand) {
            $.ajax({
                method: "get",
                url: "<?= $this->request->base ?>/stores-demands/updateStatusDemand/" + idDemand,
                success: function (result) {
                    if(result === 'success'){
                        window.location.replace("<?= $this->request->base ?>/stores-demands/");
                        return false;
                    } else {
                        toastr.info(result);
                    }
                }
            });

            return false;
        }

        function showAddress(idDemand){
            $.ajax({
                method: "get",
                url: "<?= $this->request->base ?>/stores-address/getAddress/" + idDemand,
                success: function (result) {

                    const obj = JSON.parse(result);

                    var html = '<ul class="list-group list-group-flush">'
                                + '<li class="list-group-item">Endereço: '+ obj.address +'</li>'
                                + '<li class="list-group-item">CEP: '+ obj.cep +'</li>'
                                + '<li class="list-group-item">Cidade: '+ obj.city +'</li>'
                                + '<li class="list-group-item">Bairro: '+ obj.district +'</li>'
                                + '<li class="list-group-item">Número: '+ obj.number +'</li>'
                                + '<li class="list-group-item">Referência: '+ obj.reference +'</li>'
                                + '</ul>';

                    $(".modal-body-address").html(html);
                    $('#myModal').modal('show');
                }
            });

            return false;
        }

    <?php endif; ?>

    function swalDefaultSuccess(idDemand) {
        var Toast = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        });

        Toast.fire({
            title: 'Dados de Entrega',
            text: 'Teste',
            showCancelButton: true,
            cancelButtonText: 'Fechar',
            showConfirmButton: false,
            reverseButtons: true
        });
    }    

    function mouseOverWhatsapp(){
        document.getElementById("whatsapp").style.cursor = "pointer";
    }
    
    function mouseWhatsappClick(){
        this.updateWhatsappNumber();
    }

    function updateWhatsappNumber() {
        Swal.fire({
        title: 'Atualizar Número do Whatsapp',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        showLoaderOnConfirm: true,
        preConfirm: (number) => {
            return fetch(`<?= $this->request->base ?>/homes/editWhatsapp/${number}`)
            .then(response => {
                if (!response.ok) {
                throw new Error(response.statusText)
                }
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(
                `Requisição falhou: ${error}`
                )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: result.value.msg,
            })
        }
        })
    }
    
    function mouseOverFacebook(){
        document.getElementById("facebook").style.cursor = "pointer";
    }

    function mouseFacebookClick(){
        this.updateFacebookLink();
    }

    function updateFacebookLink() {
        Swal.fire({
        title: 'Atualizar Link do Facebook',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        showLoaderOnConfirm: true,
        preConfirm: (link) => {

            const link64 = window.btoa(link);

            return fetch(`<?= $this->request->base ?>/homes/editFacebook/${link64}`)
            .then(response => {
                if (!response.ok) {
                throw new Error(response.statusText)
                }
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(
                `Requisição falhou: ${error}`
                )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: result.value.msg,
            })
        }
        })
    }

    function mouseOverInstagram(){
        document.getElementById("instagram").style.cursor = "pointer";
    }

    function mouseOverUpdateBannerPromotion(){
        document.getElementById("promotion").style.cursor = "pointer";
    }

    function mouseInstagramClick(){
        this.updateInstagramLink();
    }

    function redirectPromotionBanner(){
        window.location.href = "<?= $this->request->base ?>/pages/editPromotionBanner";
    }

    function updateInstagramLink() {
        Swal.fire({
        title: 'Atualizar Link do Instagram',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        showLoaderOnConfirm: true,
        preConfirm: (link) => {

            const link64 = window.btoa(link);

            return fetch(`<?= $this->request->base ?>/homes/editInstagram/${link64}`)
            .then(response => {
                if (!response.ok) {
                throw new Error(response.statusText)
                }
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(
                `Requisição falhou: ${error}`
                )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: result.value.msg,
            })
        }
        })
    }

    function verifySubcategory(){
        let idCategory = document.getElementById("category").value;
        const subcategoria = document.getElementById('subcategory');
        const finalcategory = document.getElementById('finalcategory');

        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-subcategories/loadSubcategoryByIdcategory/" + idCategory,
            success: function (result) {

                let options = '';

                for (var count = 0; count < result.length; count++) {
                    options = options + '<option value="' + result[count].id + '">' +  result[count].subcategory + '</option>'
                }

                const html = '<div class="form-group">'
                                + '<label for="description">Subcategorias*</label>'
                                + '<div class="input select">'
                                + '<select name="stores_subcategories_id" class="form-control" onchange="verifyFinalCategory()" id="selectsubcategory">'
                                + '<option selected>Selecione uma subcategoria</option>'
                                + options
                                + '</select>'
                                + '</div>'
                                + '</div>';

                subcategoria.innerHTML = html;
            },
            error: function(result) {
                toastr.info(result.responseJSON.msg);
                subcategoria.innerHTML = '';
                finalcategory.innerHTML = '';
            }
        });

        return false;
    }

    function verifyFinalCategory(){
        let idSubcategory = document.getElementById("selectsubcategory").value;
        const finalcategory = document.getElementById('finalcategory');

        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-finalcategories/loadFinalcategoryByIdSubcategory/" + idSubcategory,
            success: function (result) {

                    let options = '';

                    for (var count = 0; count < result.length; count++) {
                        options = options + '<option value="' + result[count].id + '">' +  result[count].category + '</option>'
                    }

                    const html = '<div class="form-group">'
                                    + '<label for="description">Categoria Final*</label>'
                                    + '<div class="input select">'
                                    + '<select name="stores_finalcategories_id" class="form-control">'
                                    + '<option selected>Selecione uma categoria final</option>'
                                    + options
                                    + '</select>'
                                    + '</div>'
                                    + '</div>';

                    finalcategory.innerHTML = html;
            },
            error: function(result) {
                toastr.info(result.responseJSON.msg);
                finalcategory.innerHTML = '';
            }
        });

        return false;
    }

</script>

<?php if ($this->request->controller === 'StoresProducts') :?>
    <script>
        $("#customSwitch1").click(function(){
            const color_select = document.getElementById('color_select');

            if($(this).is(':checked')){
                const html = '<label for="color">Cor 1*</label>'
                    + '<div class="input color"><input type="color" name="color" id="color"></div>'
                    + '<br>'
                    + '<label for="description">Cor 2*</label>'
                    + '<div class="input color"><input type="color" name="color2" id="color2"></div>'
                    + '<br>'
                    + '<label for="description">Cor 3*</label>'
                    + '<div class="input color"><input type="color" name="color3" id="color3"></div>'

                color_select.innerHTML = html;
            }else{   
                const html = '<label for="description">Cor 1*</label>'
                    + '<div class="input color"><input type="color" name="color" id="color"></div>'

                color_select.innerHTML = html;
            }
        });

        $("#customSwitch2").click(function(){
            const color_select = document.getElementById('color_select');

            if($(this).is(':checked')){
                const html = '<label for="color">Cor 1*</label>'
                    + '<div class="input color"><input type="color" name="color" id="color"></div>'
                    + '<br>'
                    + '<label for="description">Cor 2*</label>'
                    + '<div class="input color"><input type="color" name="color2" id="color2"></div>'

                color_select.innerHTML = html;
            }else{
                const html = '<label for="description">Cor 1*</label>'
                    + '<div class="input color"><input type="color" name="color" id="color"></div>'

                color_select.innerHTML = html;
            }
        });
    </script>
<?php endif;?>

</body>
</html>
