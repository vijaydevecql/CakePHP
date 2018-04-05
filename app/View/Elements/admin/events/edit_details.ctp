<?php
//pr($this->request->data['EventCategory']);
?>
<?php echo $this->Form->create('Event', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'EventAdminAddForm')); ?>
<div class="row">
    <div class="form-group">
        <label class="col-sm-3 control-label">Name: </label>
        <div class="col-sm-9">
            <input type="hidden" name="data[Event][id]" value="<?php echo $this->request->data['Event']['id']; ?>" >
            <?php
            echo $this->Form->input(
                    'name', array(
                'label' => false,
                'div' => false,
                //'required' => true,
                'class' => 'form-control',
                'placeholder' => 'First Name',
                'autocomplete' => 'off',
                    )
            );
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Start Date: </label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control"  name="data[Event][start_date]"
                       value="<?php
                       echo!empty($this->request->data['Event']['start_date']) ?
                               date('m/d/Y', $this->request->data['Event']['start_date']) :
                               '';
                       ?>"
                       required
                       id="datepicker1"
                       >
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">End Date: </label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
                <input
                    type="text"
                    class="form-control"

                    name="data[Event][end_date]"
                    required
                    value="<?php
                    echo!empty($this->request->data['Event']['end_date']) ?
                            date('m/d/y', $this->request->data['Event']['end_date']) :
                            '';
                    ?>"
                    id="datepicker2"
                    >
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Start Time: </label>
        <div class="col-sm-9">

            <div class="input-group">
                <span class="input-group-addon">
                    <span class="wb-time"></span>
                </span>
                <input type="text" class="timepicker form-control" data-plugin="clockpicker" data-autoclose="true" name="data[Event][start_time]" required
                       value="<?php
                       echo!empty($this->request->data['Event']['start_time']) ?
                               date('h:i', $this->request->data['Event']['start_time']) :
                               '';
                       ?>"
                       >
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">End Time: </label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="wb-time"></span>
                </span>
                <input
                    type="text"
                    class="timepicker form-control"
                    data-plugin="clockpicker"
                    data-autoclose="true"
                    name="data[Event][end_time]"
                    required
                    value="<?php
                    echo!empty($this->request->data['Event']['end_time']) ?
                            date('h:i', $this->request->data['Event']['end_time']) :
                            '';
                    ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Event Description: </label>
        <div class="col-sm-9">
            <?php
            echo $this->Form->input(
                    'description', array(
                'label' => false,
                'div' => false,
                'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Description',
                'autocomplete' => 'off',
                    )
            );
            ?>
            <input type="hidden" id="main_photo" name="data[Event][main_photo]">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Categories: </label>
        <div class="col-sm-9" id="cat_part">
            <select class="form-control" multiple data-plugin="select2" required name="data[category_id][]">

                <?php
                //selected categories.
                $select_data = [];
                if (is_array($this->request->data['EventCategory']) && count($this->request->data['EventCategory'])) {
                    foreach ($this->request->data['EventCategory'] as $key => $value) {
                        $select_data[] = $value['category_id'];
                    }
                }

                foreach ($Category as $key => $value) {
                    ?>
                    <option value="<?php echo $value['Category']['id']; ?>" <?php echo (in_array($value['Category']['id'], $select_data)) ? "selected" : ''; ?>
                            ><?php echo $value['Category']['name']; ?></option>
                        <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Event Organizer: </label>
        <div class="col-sm-9">
            <select class="form-control" data-plugin="select2" data-placeholder="Select a Event Organizer"
                    data-allow-clear="true" name = "data[Event][user_id]"required >
                        <?php
                        if (isset($event_organizer) && count($event_organizer) && is_array($event_organizer)) {
                            foreach ($event_organizer as $key => $value) {
                                ?>
                        <option value ="<?php echo $value['User']['id']; ?>"
                        <?php echo ($value['User']['id'] == $this->request->data['Event']['user_id']) ? 'selected' : ''; ?>
                                ><?php echo $value['User']['first_name'] . '(' . $value['User']['email'] . ')'; ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Location: </label>
        <div class="col-sm-9">
            <div class="input-search">
                <button type = "button" class="input-search-btn">
                    <i class="icon wb-search" aria-hidden="true"></i>
                </button>
                <input type="text" class="form-control" name="data[Event][location]" placeholder="Location..." id="pac-input" value="<?php echo!empty($this->request->data['Event']['location']) ? $this->request->data['Event']['location'] : ''; ?>">
                <input type="hidden" class="form-control" name="data[Event][lat]" placeholder="Location..." id="pac-lat" value="<?php echo!empty($this->request->data['Event']['lat']) ? $this->request->data['Event']['lat'] : ''; ?>">
                <input type="hidden" class="form-control" name="data[Event][lang]" placeholder="Location..." id="pac-lang"
                       value="<?php echo!empty($this->request->data['Event']['long']) ? $this->request->data['Event']['long'] : ''; ?>"
                       >
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Cities: </label>
        <div class="col-sm-9" id="cat_part">
            <select class="form-control" multiple data-plugin="select2" required name="data[cities_id][]">
                <?php
                $select_cities = [];
                if (count($this->request->data['EventCity'])) {
                    foreach ($this->request->data['EventCity'] as $key => $value) {
                        $select_cities[] = $value['city_id'];
                    }
                }
                if (isset($city) && count($city) && is_array($city)) {
                    foreach ($city as $key => $value) {
                        ?>
                        <option value ="<?php echo $value['City']['id']; ?>"
                                <?php echo (in_array($value['City']['id'], $select_cities)) ? 'selected' : ''; ?>><?php echo $value['City']['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Artists: </label>
        <div class="col-sm-9" id="cat_part">
            <select class="form-control" multiple data-plugin="select2" required name="data[artists_id][]">
                <?php
                $select_artists = [];
                if (count($this->request->data['EventArtist'])) {
                    foreach ($this->request->data['EventArtist'] as $key => $value) {
                        $select_artists[] = $value['artist_id'];
                    }
                }
                if (isset($art) && count($art) && is_array($art)) {
                    foreach ($art as $key => $value) {
                        ?>
                        <option value ="<?php echo $value['Artist']['id']; ?>"
                                <?php echo (in_array($value['Artist']['id'], $select_artists)) ? 'selected' : ''; ?>><?php echo $value['Artist']['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <label class="col-sm-3 control-label">Photo: </label>
    <div class="col-md-9">
        <div class="row" id="main_photo_sec">
            <div class="col-sm-7">
                <?php if (!empty($this->request->data['Event']['main_photo'])) { ?>
                    <img src="<?php echo $this->webroot . "files/event_main_photo/" . $this->request->data['Event']['main_photo']; ?>" width="200" height="200" />
                <?php } else { ?>
                    <img src="<?php echo $this->webroot . 'images/event_default_image.jpg'; ?>" />
                <?php } ?>
            </div>
            <div class="col-sm-3">
                <button type="button" id="edit_photo" class="btn btn-primary">Edit photo</button>
            </div>
        </div>

        <div class="row" id="cropper_upload_sec" style="display: none;">
            <div class="cropper text-center" id="exampleFullCropper">
                <img src="<?php echo $this->webroot . 'assets' ?>/photos/placeholder.png" alt="...">
            </div>
            <div class="cropper-toolbar text-center">
                <div class="btn-group margin-bottom-20">
                    <button type="button" class="btn btn-primary" data-cropper-method="zoom" data-option="0.1"
                            data-toggle="tooltip" data-container="body" title="Zoom In">
                        <span class="cropper-tooltip" title="zoom in">
                            <i class="wb-zoom-in"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="zoom" data-option="-0.1"
                            data-toggle="tooltip" data-container="body" title="Zoom Out">
                        <span class="cropper-tooltip" title="zoom out">
                            <i class="wb-zoom-out"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="-90"
                            data-toggle="tooltip" data-container="body" title="Turn Left">
                        <span class="cropper-tooltip" title="rotate left 90°">
                            <i class="wb-arrow-left cropper-flip-horizontal"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="90"
                            data-toggle="tooltip" data-container="body" title="Turn Right">
                        <span class="cropper-tooltip" title="rotate right 90°">
                            <i class="wb-arrow-right"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="-5"
                            data-toggle="tooltip" data-container="body" title="Rotate Left">
                        <span class="cropper-tooltip" title="rotate left 90°">
                            <i class="wb-refresh cropper-flip-horizontal"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="rotate" data-option="5"
                            data-toggle="tooltip" data-container="body" title="Rotate Right">
                        <span class="cropper-tooltip" title="rotate right 90°">
                            <i class="icon wb-reload" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>

                <div class="btn-group margin-bottom-20">
                    <button type="button" class="btn btn-primary" data-cropper-method="setDragMode"
                            data-option="move" data-toggle="tooltip" data-container="body"
                            title="Move">
                        <span class="cropper-tooltip" title="move">
                            <i class="icon wb-move" aria-hidden="true"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="setDragMode"
                            data-option="crop" data-toggle="tooltip" data-container="body"
                            title="Crop">
                        <span class="cropper-tooltip" title="Crop">
                            <i class="icon wb-crop" aria-hidden="true"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-cropper-method="getCroppedCanvas"
                            data-option='{ "width": 320, "height": 180 }' data-toggle="tooltip"
                            data-container="body" title="Get Image" id="image_data">
                        <span class="cropper-tooltip" title="Get Image">
                            <i class="icon wb-image" aria-hidden="true"></i>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="tooltip"
                            data-container="body" title="Clear" id="clear_close">
                        <span class="cropper-tooltip" title="clear">
                            <i class="icon wb-close" aria-hidden="true"></i>
                        </span>
                    </button>
                    <label class="btn btn-primary" data-toggle="tooltip" for="inputImage" data-container="body"
                           title="Upload File">
                        <input type="file" class="hide" id="inputImage" name="file" accept="image/*">
                        <span class="cropper-tooltip" title="Import image with FileReader">
                            <i class="icon wb-upload" aria-hidden="true"></i>
                        </span>
                    </label>

                </div>

                <!-- Modal -->
                <div class="modal fade docs-cropped" id="getDataURLModal" aria-hidden="true" aria-labelledby="getDataURLTitle"
                     role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="getDataURLTitle">Cropped</h4>
                            </div>
                            <div class="modal-body" id="event_photo_canvas"></div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
        </div>
    </div>
</div>
<div class="row btn_row">
    <div class="form-group">
        <div class="col-sm-9 pull-right">
            <button type="submit" class="btn btn-primary">Save </button>
            <a href="<?php echo $this->webroot; ?>admin/events/index" type="reset" class="btn btn-default btn-outline">Cancel</a>
        </div>
    </div>
</div>


<?php echo $this->Form->end(); ?>

<style type="text/css">
    .page-content {
        padding: 52px 30px;
    }
    .row.btn_row {
        float: right;
        display: inline-block;
        width: 100%;
        margin: 17px;
        position: relative;
        right: 0px;
    }
</style>
<script type="text/javascript">

    $(document).ready(function () {
//        $("#categories_dropdown option:selected").each(function () {
//                var text = $(this).text();
//                alert(1);
//                if(text){
//                    alert(2);
//                     $('#cat_part .select2-selection__rendered li.select2-selection__choice').remove();
//                }
//
//              //$('#cat_part').find('.select2-selection__rendered').html('<li class="select2-selection__choice" title="' + text + '"><span class="select2-selection__choice__remove" role="presentation">×</span>' + text + '</li>');
//            });
        $("#edit_photo").click(function () {
            $('#main_photo_sec').hide();
            $('#cropper_upload_sec').show();
        });
        $("#clear_close").click(function () {
            $('#main_photo_sec').show();
            $('#cropper_upload_sec').hide();
        });
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        $('#datepicker1').datepicker({
            startDate: today,
            todayHighlight: true,
            autoclose: true,

        });
        $('#datepicker2').datepicker({
            startDate: today,
            todayHighlight: true,
            autoclose: true,

        });

    });

//    $(document).load(function () {
//
//
//    });

</script>