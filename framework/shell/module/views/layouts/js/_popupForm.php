<?php

Yii::app()->clientScript->registerScript("popupForm", "
        

        function callCreateWidget() {
                $( '#popupCreateDialogBox' ).dialog( 'open' );
        }
        
        function callUpdateWidget() {
                $( '#popupUpdateDialogBox' ).dialog( 'open' );
        }
        
        function createValidate() {
                var address_line_1 = $('#Addresses_address_line_1').val();
                var address_line_2 = $('#Addresses_address_line_2').val();
                var address_country_id = $('#cboCountry').val();
                var address_region_id = $('#cboRegion').val();
                var address_province_id = $('#cboProvince').val();
                var address_city_id = $('#cboCity').val();
                var address_barangay_id = $('#cboBarangay').val();
                var address_student_id = $('#Addresses_student_id').val();
                
                if ((address_line_1 == null) || (address_region_id == null) || (address_region_id == 0) ||
                    (address_province_id == null) || (address_province_id == 0) || (address_city_id == null) || (address_city_id == 0) ||
                    (address_barangay_id == null) || (address_barangay_id == 0)
                    ) {
                        $('#Addresses_address_line_1').css({border: '1px solid red'});
                        $('#cboRegion').css({border: '1px solid red'});
                        $('#cboProvince').css({border: '1px solid red'});
                        $('#cboCity').css({border: '1px solid red'});
                        $('#cboBarangay').css({border: '1px solid red'});
                } else {
                    $.ajax({
                        'type' : 'POST',
                        'url'  : 'index.php?r=registrar/addresses/AjaxCreate',
                        'data' : {
                            address_line_1 : address_line_1,
                            address_line_2 : address_line_2,
                            address_country_id : address_country_id,
                            address_region_id : address_region_id,
                            address_province_id : address_province_id,
                            address_city_id : address_city_id,
                            address_barangay_id : address_barangay_id,
                            address_student_id : address_student_id
                        },
                        'success' : function(data){
                            $('#popupCreateDialogBox').dialog('close');
                            $.fn.yiiGridView.update('addresses-grid');
                        }
                    });
                }
        }
        
        function updateValidate() {
                var address_line_1 = $('#Addresses_address_line_1').val();
                var address_line_2 = $('#Addresses_address_line_2').val();
                var address_country_id = $('#cboCountry').val();
                var address_region_id = $('#cboRegion').val();
                var address_province_id = $('#cboProvince').val();
                var address_city_id = $('#cboCity').val();
                var address_barangay_id = $('#cboBarangay').val();
                var address_student_id = $('#Addresses_student_id').val();
                
                if ((address_line_1 == null) || (address_region_id == null) || (address_region_id == 0) ||
                    (address_province_id == null) || (address_province_id == 0) || (address_city_id == null) || (address_city_id == 0) ||
                    (address_barangay_id == null) || (address_barangay_id == 0)
                    ) {
                        $('#Addresses_address_line_1').css({border: '1px solid red'});
                        $('#cboRegion').css({border: '1px solid red'});
                        $('#cboProvince').css({border: '1px solid red'});
                        $('#cboCity').css({border: '1px solid red'});
                        $('#cboBarangay').css({border: '1px solid red'});
                } else {
                    $.ajax({
                        'type' : 'POST',
                        'url'  : 'index.php?r=registrar/addresses/AjaxUpdate',
                        'data' : {
                            address_line_1 : address_line_1,
                            address_line_2 : address_line_2,
                            address_country_id : address_country_id,
                            address_region_id : address_region_id,
                            address_province_id : address_province_id,
                            address_city_id : address_city_id,
                            address_barangay_id : address_barangay_id,
                            address_student_id : address_student_id
                        },
                        'success' : function(data){
                            $('#popupUpdateDialogBox').dialog('close');
                            $.fn.yiiGridView.update('addresses-grid');
                        }
                    });
                }
        }

    ", 2);
?>