<?php echo $this->Form->create('Event', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
<div class="row">
    <div class="form-group">
        <label class="col-sm-3 control-label">Name: </label>
        <div class="col-sm-9">

            <?php
            echo $this->Form->input(
                    'name', array(
                'label' => false,
                'div' => false,
                //'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Event Name',
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
                <input 
                    type="text" 
                    class="form-control" 
                    name="data[Event][start_date]" 
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
                    //data-plugin="datepicker" 
                    name="data[Event][end_date]" 
                    required
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
                <input 
                    type="text" 
                    class="timepicker form-control" 
                    data-plugin="clockpicker" 
                    data-autoclose="true" 
                    name="data[Event][start_time]" 
                    required
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
                    ?>"

                    >
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
        <div class="col-sm-9">
            <select class="form-control" multiple data-plugin="select2" required name="data[category_id][]">
                <?php foreach ($Category as $key => $value) { ?>
                    <option value="<?php echo $value['Category']['id']; ?>"><?php echo $value['Category']['name']; ?></option>
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
                        <option value ="<?php echo $value['User']['id']; ?>"><?php echo $value['User']['first_name'] . '(' . $value['User']['email'] . ')'; ?></option>
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
                <!-- <button type = "button" class="input-search-btn">
                  <i class="icon wb-search" aria-hidden="true"></i>
                </button> -->
                <input type="text" class="form-control" name="data[Event][location]" placeholder="Location..." id="pac-input">
                <input type="hidden" class="form-control" name="data[Event][lat]" placeholder="Location..." id="pac-lat">
                <input type="hidden" class="form-control" name="data[Event][lang]" placeholder="Location..." id="pac-lang">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">City: </label>
        <div class="col-sm-9">
            <select class="form-control" multiple data-plugin="select2" required name="data[cities_id][]">
                <?php
                if (isset($city) && count($city) && is_array($city)) {
                    foreach ($city as $key => $value) {
                        ?>
                        <option value ="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Artists: </label>
        <div class="col-sm-9">
            <select class="form-control" multiple data-plugin="select2" required name="data[artists_id][]">
                <?php
                if (isset($art) && count($art) && is_array($art)) {
                    foreach ($art as $key => $value) {
                        ?>
                        <option value ="<?php echo $key; ?>"><?php echo $value; ?></option>
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
                <button type="button" class="btn btn-primary" data-cropper-method="clear" data-toggle="tooltip"
                        data-container="body" title="Clear">
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
<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        <button type="submit" class="btn btn-primary" id="setCropperData" >Save </button>
        <a href="<?php echo $this->webroot; ?>admin/events/index" type="reset" class="btn btn-default btn-outline">Cancel</a>
    </div>
</div>


<?php echo $this->Form->end(); ?>

<style type="text/css">
    .page-content {
        padding: 52px 30px;
    }
</style>
<script type="text/javascript">
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    $('#datepicker1').datepicker({
        startDate: today,
        todayHighlight: true,
        autoclose: true,

    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#datepicker2').datepicker('setStartDate', minDate);
    });

    $('#datepicker2').datepicker({
        startDate: today,
        todayHighlight: true,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var maxDate = new Date(selected.date.valueOf());
        $('#datepicker1').datepicker('setEndDate', maxDate);
    });
</script>