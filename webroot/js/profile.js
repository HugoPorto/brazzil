Vue.component('todo-item', {
    props: ['todo'],
    template: '<p>TEste</p>'
});

Vue.component('modal-item', {
    props: ['openModal'],
    template: '<div id="modal">'
    +'<div class="modal-dialog">'
    +'<div class="modal-content">'
    +'  <div class="modal-header">'
    +'    <button type="button" class="close" data-dismiss="modal" aria-label="Close">'
    +'      <span aria-hidden="true">&times;</span></button>'
    +'    <h4 class="modal-title">Default Modal</h4>'
    +'  </div>'
    +'  <div class="modal-body">'
    +'    <p>One fine body&hellip;</p>'
    +'  </div>'
    +'  <div class="modal-footer">'
    +'    <button @click="closeModal()" class="btn btn-default pull-left" data-dismiss="modal">Close</button>'
    +'    <button type="button" class="btn btn-primary">Save changes</button>'
    +'  </div>'
    +'</div>'
    +'</div>'
    +'</div>',
    methods: {
        closeModal() {
          console.log('Funcionando...');
          console.log(this.openModal);
      }
    }
});

new Vue({
    el: '#app',
    data: {
        openModal: false,
    },
    created: function () {
    },
    methods: {
        makeDebug: function () {
            if (this.debug == false) {
                this.debug = true;
            } else {
                this.debug = false;
            }
        },        
        makeModal: function () {
            this.openModal = true;
        },
    }
});