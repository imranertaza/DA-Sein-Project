<script>
    $(function () {
        // var ladgerTable = $('#example1').DataTable({
        $('#example1').DataTable({
            "pageLength": 10,
            // "order": [ 0, 'asc' ],
            'ordering'    : true,
        })
        // ladgerTable.page('last').draw('page');

        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
        })


    })
    // This is for go Back Button at the top -- Start --
    function goBack() {
        window.history.back();
    }

    // This is for go Back Button at the top -- End --

    //sticky menu (start) navbar-fixed-top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 25) {
            $('#stickyNav').show();
        }
    });
    //sticky menu (end)

    //select and search option script (start)
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
    //select and search option script (end)

    function orderStatus(value,id){
        $.ajax({
            url: '<?php echo base_url()?>/Admin/Order/changeStatus',
            type: 'post',
            data: {value:value,id:id},
            success: function(response){
                $("#message").html('<div class="alert alert-success alert-dismissible" role="alert">Status update successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        });
    }

    function subscribeStatus(value,id){
        $.ajax({
            url: '<?php echo base_url()?>/Admin/Subscribe/subscribeStatus',
            type: 'post',
            data: {value:value,id:id},
            success: function(response){
                $("#message").html('<div class="alert alert-success alert-dismissible" role="alert">Subscribe update successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        });
    }

    $(function(){
        $("#multi_image_picker").spartanMultiImagePicker({
            fieldName     : 'multiImage[]', // this configuration will send your images named "fileUpload" to the server
        });
    });

    // function image_parmetion(){
    //     $("#form").on('submit', (function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: $(this).attr('action'),
    //             type: "POST",
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function(response) {
    //                 $("#form").trigger("reset"); // to reset form input fields
    //             },
    //             error: function(e) {
    //                 console.log(e);
    //             }
    //         });
    //     }));
    // }
</script>










