<script>

    /*
     *** All functions related to create
     */

    function renderCreate() {

        $.ajax({
            type: 'GET',
            url: '../<?php print lcfirst($modelClass) ?>/renderCreate',
            async: false,
            success: function (data) {

                var result = JSON.parse(data);
                if (result['isError'] == 1) {
                    messageBox(result['isError'], result['message']);
                } else {
                    $('#my-modal-container').html(result['html']);
                    renderMandatoryJs();
                    showHideModal("modal-ajax-create", true);
                }
            }, error: function (data) {
                console.log(data);
            }
        });
    }

    function create()
    {
        var yiiGridViewID = $('.grid-view').attr('id');
        var data = $("#create").serialize();
        $.ajax({
            type: 'POST',
            url: '../<?php print lcfirst($modelClass) ?>/create',
            data: data,
            success: function (data) {

                var result = JSON.parse(data);
                console.log(result);
                if (result.isError == 1) {

                    messageBox(result.isError, result.message);
                } else {

                    messageBox(result.isError, result.message);
                    $.fn.yiiGridView.update(yiiGridViewID);
                    <?php
                    if (count($columns) == 10) {
                        print "$('#name').val('');";
                    } else {
                        print 'showHideModal("modal-ajax-create", false);';
                    }
                    ?>
                }

            }, error: function (data) {
                console.log(data);
            }
        });
    }

    /*
     *** End All functions related to create
     */



    /*
     *** All functions related to update
     */

    function renderUpdate(id) {

        $.ajax({
            type: 'GET',
            url: '../<?php print lcfirst($modelClass) ?>/renderUpdate',
            data: 'id=' + id,
            async: false,
            success: function (data) {

                var result = JSON.parse(data);
                if (result['isError'] == 1) {
                    messageBox(result['isError'], result['message']);
                } else {
                    $('#my-modal-container').html(result['html']);
                    renderMandatoryJs();
                    showHideModal("modal-ajax-update", true);
                }

            }, error: function (data) {
                console.log(data);
            }
        });

    }

    function update(id)
    {
        var data = $("#update").serialize();
        var yiiGridViewID = $('.grid-view').attr('id');

        $.ajax({
            type: 'POST',
            url: '../<?php print lcfirst($modelClass) ?>/update?id=' + id,
            data: data,
            async: false,
            success: function (data) {

                var result = JSON.parse(data);

                if (result.isError == 1) {

                    messageBox(result.isError, result.message);

                } else {

                    messageBox(result.isError, result.message);
                    $.fn.yiiGridView.update(yiiGridViewID);
                    showHideModal("modal-ajax-update", false);

                }

            }, error: function (data) {
                console.log(data);
            }
        });

    }

    /*
     *** End All functions related to update
     */

</script>