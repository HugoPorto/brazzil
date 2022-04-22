<script>
    $(document).ready( function () {
        $('#videos_list').DataTable({
        "language": {
        "url": "http://localhost/viewx/js/Portuguese-Brasil.json"
        },    
        });
        $('#general').DataTable({
        "language": {
        "url": "http://localhost/viewx/js/Portuguese-Brasil.json"
        },
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        });
    });
</script>
