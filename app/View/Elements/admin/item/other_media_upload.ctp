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

<!-- Drag and Delete Images -->

    <div class="container">
    <a href="javascript:void(0);" class="reorder_link" id="saveReorder">reorder photos</a>
    <img src="<?php echo $this->webroot.'files/logo/save.gif' ?>" height=20px; width="20px" id="loader" style="display:none"/>
    <div id="reorderHelper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.</div>
    
	<div class="row media_grid gallery" id="media_gallery">
        <ul class="reorder_ul reorder-photos-list">
        <?php
			if(isset($this->request->data['Media']) && is_array($this->request->data['Media']) && count($this->request->data['Media'])){
				foreach ($this->request->data['Media'] as $key => $value) { ?>
					<div class="col-md-4" id="media-<?php echo $value['id']; ?>">
						<li id="image_li_<?php echo $value['id']; ?>" class="ui-sortable-handle">
							<figure class="overlay overlay-hover">
                    <a href="javascript:void(0);" style="float:none;" class="image_link">
							<img src="<?php echo $this->webroot.'files/item_other_photo/'.$value['image']?>" alt="Some image" width="200" height="200" style="padding:10px" />
						</a>
                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                      <a class="icon wb-trash" href="javascript:void(0);" id="media_delete" data-id = "<?php echo $value['id']?>"></a>
                      
                    </figcaption>
                  </figure>
						
					</li>
				</div>
        <?php } } ?>
        </ul>
    </div>
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
                url: "<?php echo $this->webroot . 'admin/products/delete_media/' ?>"+_id,
                cache: false
            }).done(function (html) {
             // alert(html);
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
        url: '<?php echo $this->webroot . 'admin/products/item_media/'.$this->request->data['Product']['id']; ?>',
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
            _uploaded_file_path = '<?php echo $this->webroot.'files/item_other_photo/' ?>' + obj.Media.image;
            //console.log($this.find('.file').length);
            //console.log(_uploaded_file_path);
             html = '<div class="col-md-4" id="media-'+obj.Media.id+'"><figure class="overlay overlay-hover"><img src="'+_uploaded_file_path+'" alt="Some image" width="200" height="200" style="padding:10px" /><figcaption class="overlay-panel overlay-background overlay-fade overlay-icon"><a class="icon wb-trash" href="javascript:void(0);" id="media_delete" data-id = "'+obj.Media.id+'"></a></figcaption></figure></div>';
              
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
  
  
  
  
<!-- Drag Images -->
  
  <script src="<?php echo $this->webroot ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
  <!-- <script src="<?php echo $this->webroot ?>assets/vendor/jquery/jquery.min.js"></script> -->
  
  
  <script type="text/javascript">
$(document).ready(function(){
    $('.reorder_link').on('click',function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('save reordering');
        $('.reorder_link').attr("id","saveReorder");
        $('#reorderHelper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#saveReorder").click(function( e ){
            if( !$("#saveReorder i").length ){
                $("#loader").show();
                $("ul.reorder-photos-list").sortable('destroy');
                //$("#reorderHelper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
               
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                
               
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->webroot . 'admin/products/updateOrder/' ?>" + h,
                    data: {ids: " " + h + ""},
                    success: function(data){
						
                      if(data == 0){
							$("#alertify-logs article").addClass('alertify-log-show');
							$("#alertify-logs article").html("Media image arrange order has been saved.");
							$("#loader").hide();
							$(".light_box").hide();
							setTimeout(function(){
								 $("#alertify-logs article").removeClass('alertify-log-show');
							}, 5000);
							
					  }else{
							$("#alertify-logs article").addClass('alertify-log-show');
							$("#alertify-logs article").addClass('alertify-log-error');
							$("#alertify-logs article").html("There is some problem.Try again Later");
							setTimeout(function(){
								 $("#alertify-logs article").removeClass('alertify-log-show');
							}, 5000);
					  }
                    }
                }); 
                return false;
            }   
            e.preventDefault();     
        });
    });
});
</script>



  
  
  
      
   
  

<style>
.alertify-log1{
	
    background: red !important;
   
}
  body {
    background: #FFFFFF;
    margin: 0px;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    color: #4f5252;
    font-weight: 400;
}
.container{
    margin-top:50px;
    padding: 10px;
}
ul, ol, li {
    margin: 0;
    padding: 0;
    list-style: none;
}
.reorder_link {
    color: #3675B4;
    border: solid 2px #3675B4;
    border-radius: 3px;
    text-transform: uppercase;
    background: #fff;
    font-size: 18px;
    padding: 10px 20px;
    margin: 15px 15px 15px 0px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.35s;
    -moz-transition: all 0.35s;
    -webkit-transition: all 0.35s;
    -o-transition: all 0.35s;
    white-space: nowrap;
}
.reorder_link:hover {
    color: #fff;
    border: solid 2px #3675B4;
    background: #3675B4;
    box-shadow: none;
}
#reorder-helper{
    margin: 18px 10px;
    padding: 10px;
}
.light_box {
    background: #efefef;
    padding: 20px;
    margin: 15px 0;
    text-align: center;
    font-size: 1.2em;
}

/* image gallery */
.gallery{ width:100%; float:left; margin-top:100px;}
.gallery ul{ margin:0; padding:0; list-style-type:none;}



/* notice box */
.notice, .notice a{ color: #fff !important; }
.notice { z-index: 8888;padding: 10px;margin-top: 20px; }
.notice a { font-weight: bold; }
.notice_error { background: #E46360; }
.notice_success { background: #657E3F; }
  
  
  </style>
  
  
  
  
  
  
  
