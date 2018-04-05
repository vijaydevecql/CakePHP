<!-- Page -->
  
    <!--
      <form class="upload-form" id="exampleUploadForm" method="POST">
        <input type="file" id="inputUpload" name="files[]" multiple="" />
        <div class="uploader-inline">
          <h3 class="upload-instructions">Click Or Drop Files To Upload. We Use Jquery File Upload, You Can Learn
            More Form
            <A id="uploadlink" href="https://blueimp.github.io/jQuery-File-Upload/"
            target="_blank">Here</A>.</h3>
        </div>
        <div class="file-wrap container-fluid">
          <div class="file-list row"></div>
        </div>
      </form>
      -->
   
  <!-- End Page -->
  
  <link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/blueimp-file-upload/jquery.fileupload.css" />
      <div class="row">
      <section id="alertify-logs" class="alertify-logs">
          <article class="alertify-log"></article>
      </section>
      <form class="upload-form" id="exampleUploadForm" method="POST">
        <input type="file" id="inputUpload" name="files" multiple="" />
        <div class="uploader-inline">
          <h3 class="upload-instructions">Click Or Drop Media Files To Upload.</h3>
        </div>
        <div class="file-wrap container-fluid">
          <div class="file-list row"></div>
        </div>
      </form>
    </div>
    <div class="row text_head">
        <center><span>Media</span></center>
    </div>

    <div class="row media_grid" id="media_gallery">
      <?php 
      if(isset($e_id) && !empty($e_id)){
        $this->request->data['Media'] = $event['Media'];
        $this->request->data['Event']['id'] = $event['Event']['id'];
      }
      if(isset($this->request->data['Media']) && is_array($this->request->data['Media']) && count($this->request->data['Media'])){
          foreach ($this->request->data['Media'] as $key => $value) { ?>
              <div class="col-md-4" id="media-<?php echo $value['id']; ?>">
                  <figure class="overlay overlay-hover">
                    <img src="<?php echo $this->webroot.'files/event_other_media/'.$value['image']?>" alt="Some image" width="200" height="200" style="padding:10px" />
                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                      <a class="icon wb-trash" href="javascript:void(0);" id="media_delete" data-id = "<?php echo $value['id']?>"></a>
                      
                    </figcaption>
                  </figure>
              </div>
        <?php } }?>
      <!--media section start -->
     
     
      <!--media section  end -->
    </div>

  <script src="<?php echo $this->webroot ?>assets/vendor/jquery-ui/jquery-ui.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-tmpl/tmpl.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-canvas-to-blob/canvas-to-blob.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-load-image/load-image.all.min.js"></script>


  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload-process.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload-image.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload-audio.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload-video.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload-validate.js"></script>
  <script src="<?php echo $this->webroot ?>assets/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
  <script>
    (function(document, window, $) {
     

      $(document.body).on('click', '#media_delete', function (e) {
            e.preventDefault();
          _id = $(this).attr('data-id');
           $.ajax({
                url: "<?php echo $this->webroot . 'admin/events/delete_media/' ?>"+_id,
                cache: false
            }).done(function (html) {
                if($.isNumeric(html)){
                    $('#media-'+html).remove();
                    $("#alertify-logs article").addClass('alertify-log-show');
                    $("#alertify-logs article").html("Delete Media successfully.");
                    setTimeout(function(){
                    $("#alertify-logs article").removeClass('alertify-log-show');
                    }, 5000);
                }else{
                  $("#alertify-logs article").addClass('alertify-log-show');
                    $("#alertify-logs article").html("There is some problem to delete media.");
                    setTimeout(function(){
                    $("#alertify-logs article").removeClass('alertify-log-show');
                    }, 5000);
                }
             });
          });

      // Example File Upload
      // -------------------
  $('#exampleUploadForm').fileupload({
        url: '<?php echo $this->webroot . 'admin/events/other_media/'.$this->request->data['Event']['id']; ?>',
        dropzone: $('#exampleUploadForm'),
        filesContainer: $('.file-list'),
        uploadTemplateId: false,
        downloadTemplateId: false,
        uploadTemplate: tmpl(
          '{% for (var i=0, file; file=o.files[i]; i++) { %}' +
          '<div class="file template-upload fade col-lg-4 col-md-4 col-sm-6 {%=file.type.search("image") !== -1? "image" : "other-file"%}">' +
          '<div class="file-item">' +
          '<div class="preview vertical-align">' +
          '<div class="file-action-wrap">' +
          '<div class="file-action">' +
          '{% if (!i && !o.options.autoUpload) { %}' +
          '<i class="icon wb-upload start" data-toggle="tooltip" data-original-title="Upload file" aria-hidden="true"></i>' +
          '{% } %}' +
          '{% if (!i) { %}' +
          '<i class="icon wb-close cancel" data-toggle="tooltip" data-original-title="Stop upload file" aria-hidden="true"></i>' +
          '{% } %}' +
          '</div>' +
          '</div>' +
          '</div>' +
          '<div class="info-wrap">' +
          '<div class="title">{%=file.name%}</div>' +
          '</div>' +
          '<div class="progress progress-striped active" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" role="progressbar">' +
          '<div class="progress-bar progress-bar-success" style="width:0%;"></div>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '{% } %}'
        ),
        forceResize: true,
        previewCanvas: false,
        previewMaxWidth: false,
        previewMaxHeight: false,
        previewThumbnail: false,
        
      }).on('fileuploadprocessalways', function(e, data) {

        var length = data.files.length;

        for (var i = 0; i < length; i++) {
          if (!data.files[i].type.match(
              /^image\/(gif|jpeg|png|svg\+xml)$/)) {
            data.files[i].filetype = 'other-file';
          } else {
            data.files[i].filetype = 'image';
          }
        }
      }).on('fileuploadadded', function(e) {
        var $this = $(e.target);

        if ($this.find('.file').length > 0) {
          $this.addClass('has-file');
        } else {
          $this.removeClass('has-file');
        }
      }).on('fileuploadfinished', function(e, data) {

        var $this = $(e.target);
         if(data.jqXHR.responseText.length){
              var obj = JSON.parse(data.jqXHR.responseText);
               //_files = $this.find('.file');
            _uploaded_file_path = '<?php echo $this->webroot.'files/event_other_media/' ?>' + obj.Media.image;
            //console.log($this.find('.file').length);
            //console.log(_uploaded_file_path);
             html = '<div class="col-md-4" id="media-"'+obj.Media.id+'><figure class="overlay overlay-hover"><img src="'+_uploaded_file_path+'" alt="Some image" width="200" height="200" style="padding:10px" /><figcaption class="overlay-panel overlay-background overlay-fade overlay-icon"><a class="icon wb-trash" href="javascript:void(0);" id="media_delete" data-id = "'+obj.Media.id+'"></a></figcaption></figure></div>';
              
              $("#media_gallery").prepend(html);
               $("#alertify-logs article").addClass('alertify-log-show');
                $("#alertify-logs article").html("Media image has been added.");
                setTimeout(function(){
                     $("#alertify-logs article").removeClass('alertify-log-show');
                }, 5000);
              
         }else{
            $("#alertify-logs article").addClass('alertify-log-show');
                $("#alertify-logs article").html("Media image has not been added.");
                setTimeout(function(){
                     $("#alertify-logs article").removeClass('alertify-log-show');
                }, 5000);
         }
          if ($this.find('.file').length > 0) {
                  $this.addClass('has-file');
              } else {
                  $this.removeClass('has-file');
              
            }

        

      }).on('fileuploaddestroyed', function(e) {
        var $this = $(e.target);

        if ($this.find('.file').length > 0) {
          $this.addClass('has-file');
        } else {
          $this.removeClass('has-file');
        }
      }).on('click', function(e) {
        if ($(e.target).parents('.file').length === 0) $('#inputUpload')
          .trigger('click');
      });

      
      $(document).bind('dragover', function(e) {
        var dropZone = $('#exampleUploadForm'),
          timeout = window.dropZoneTimeout;
        if (!timeout) {
          dropZone.addClass('in');
        } else {
          clearTimeout(timeout);
        }
        var found = false,
          node = e.target;
        do {
          if (node === dropZone[0]) {
            found = true;
            break;
          }
          node = node.parentNode;
        } while (node !== null);
        if (found) {
          dropZone.addClass('hover');
        } else {
          dropZone.removeClass('hover');
        }
        window.dropZoneTimeout = setTimeout(function() {
          window.dropZoneTimeout = null;
          dropZone.removeClass('in hover');
        }, 100);
      });

      $('#inputUpload').on('click', function(e) {
        e.stopPropagation();
      });

      $('#uploadlink').on('click', function(e) {
        e.stopPropagation();
      });
    })(document, window, jQuery);
  </script>
  <style type="text/css">
    .upload-instructions {
    margin: 61px 20px;
    /* font-size: 15px; */
    text-align: center;
}
.floated_img{
  float: left
}
.row.media_grid {
    margin-top: 49px;
    width: 100%;
}
.text_head{
  margin-top :10px;
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 10px;
}

  </style>
