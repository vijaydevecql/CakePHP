
<link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/x-editable/x-editable.css">


<!-- Panel X-Editable -->
<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">
            Settings
        </h3>
    </header>
    <section id="alertify-logs" class="alertify-logs">
       <article class="alertify-log"></article>
    </section>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="editableUser">
                <tbody class="xedit-tbody">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Panel X-Editable -->

<script src="<?php echo $this->webroot . 'assets' ?>/vendor/x-editable/bootstrap-editable.js"></script>
<script src="<?php echo $this->webroot . 'assets' ?>/vendor/moment/moment.min.js"></script>
<script src="<?php echo $this->webroot . 'assets' ?>/vendor/typeahead-js/bloodhound.min.js"></script>
<script src="<?php echo $this->webroot . 'assets' ?>/vendor/typeahead-js/typeahead.jquery.min.js"></script>
<script src="<?php echo $this->webroot . 'assets' ?>/vendor/x-editable/address.js"></script>

<script>
    (function (document, window, $) {
        //'use strict';

        $(document).ready(function ($) {
            
            _settings_json = jQuery.parseJSON('<?php echo json_encode($settings) ?>');
            $.each(_settings_json, function (k, v) {
                var _html = "<tr>\n\
                <td style=\"width:35%\">" +  v.Setting.key.toUpperCase() +"</td>\n\
                <td style=\"width:65%\">\n\
                    <a \n\
                        href=\"javascript:void(0)\" \n\
                        data-type=\"text\" \n\
                        data-pk=\"" + v.Setting.id +"\" \n\
                        data-title=\"\" \n\
                        class=\"editable" + v.Setting.id +" editable-click\" \n\
                        style=\"display: inline;\">\n\
                        " + v.Setting.value+"\n\
                        </a>\n\
                </td></tr>";
                //console.log(v.Setting.key);
                $('.xedit-tbody').append(_html);
            });
            
            var init_x_editable = function () {

                $.fn.editableform.buttons =
                        '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
                        '<i class="icon wb-check" aria-hidden="true"></i>' +
                        '</button>' +
                        '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
                        '<i class="icon wb-close" aria-hidden="true"></i>' +
                        '</button>';

                $.fn.editabletypes.datefield.defaults.inputclass =
                        "form-control input-sm";

                //defaults
                $.fn.editable.defaults.url = '<?php echo $this->webroot.'admin/settings/setting' ?>';

                //editables
                $.each(_settings_json, function (k, v) {
                    var _id = v.Setting.id;
                    var _value = v.Setting.value;
                    var _key = v.Setting.key;
                    $(".editable" + v.Setting.id ).editable({
                        url: '<?php echo $this->webroot.'admin/settings/setting' ?>',
                        type: 'text',
                        pk: _id,
                        name:_key,
                        value: _value,
                        success: function(response, newValue) {
                                $("#alertify-logs article").addClass('alertify-log-show');
                                $("#alertify-logs article").html(response);
                                setTimeout(function(){
                                $("#alertify-logs article").removeClass('alertify-log-show');
                                }, 5000);

                              
                        }
                        
                    });
                });
                
            };
            $.fn.editable.defaults.mode = 'inline';
            init_x_editable();
        });
    })(document, window, jQuery);
</script>