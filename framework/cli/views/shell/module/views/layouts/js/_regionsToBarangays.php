<?php

Yii::app()->clientScript->registerScript("findCityByProv", "
        
        
        $(function(){
            $('select').select2();
            $('.select2-hidden-accessible').attr('hidden','true');
        });
        
        function findProvince()
        {
            regionID = $('#cboRegion').val();

            //$('#loaderProvince').removeClass().addClass('showLoaderSmall');
            showSpinnerSmall('loaderProvince');
            $('#cboProvince').attr('disabled',true);
            $('#cboCity').attr('disabled',true);
            $('#cboBarangay').attr('disabled', true);
            $.ajax({
                type    : 'GET',
                url     : '?r=provinces/ajaxSearchProvinces',
                data    : 'regionID=' + regionID,
                success : function(data) {
                    $('#cboProvince').attr('disabled', false);
                    $('#cboProvince').html(data);
                    hideSpinnerSmall('loaderProvince');
                    $('#cboCity').val('');
                    $('#cboBarangay').val('');
                }
            });
        }
        
        function findCity()
        {
            provinceID = $('#cboProvince').val();

            $('#cboProvince').attr('disabled',false);
            $('#cboCity').attr('disabled',true);
            $('#cboBarangay').attr('disabled',true);
            showSpinnerSmall('loaderMunicipality');
            
            $.ajax({
                type    : 'GET',
                url     : '?r=municipalities/ajaxSearchMunicipalities',
                data    : 'provinceID=' + provinceID,
                success : function(data) {
                    $('#cboCity').attr('disabled',false);
                    $('#cboCity').html(data);
                    //$('#loaderMunicipality').removeClass().addClass('hideLoaderSmall');
                    hideSpinnerSmall('loaderMunicipality');
                    $('#cboBarangay').val('');
                }
            });
        }
        
        function findBarangay()
        {
            municipalityID = $('#cboCity').val();

            if(municipalityID == '') {
                municipalityID = -1;
            }
            ///$('#loaderBarangay').removeClass().addClass('showLoaderSmall');
            $('#cboRegion').attr('disabled',false);
            $('#cboProvince').attr('disabled',false);
            $('#cboCity').attr('disabled',false);
            $('#cboBarangay').attr('disabled',true);
            showSpinnerSmall('loaderBarangay');
            $.ajax({
                type    : 'GET',
                url     : '?r=barangays/ajaxSearchBarangays',
                data    : 'municipalityID=' + municipalityID,
                success : function(data) {
                    
                    $('#cboBarangay').attr('disabled',false);
                    $('#cboBarangay').html(data);
                    //$('#loaderBarangay').removeClass().addClass('hideLoaderSmall');
                    hideSpinnerSmall('loaderBarangay');
                    
                    
                }
            });
        }

        
    ", 2);
?>