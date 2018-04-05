<div class="page-header">
	<h1 class="page-title">
		Edit Product
	</h1>
	<br />
	<div class="row">
  <div class="col-sm-9">
  <!-- Example Tabs -->
    <div class="example-wrap">
      <div class="nav-tabs-horizontal">
        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
            <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne"
              role="tab">Product Details</a></li>
           <li role="presentation"><a data-toggle="tab" href="#exampleTabsThree" aria-controls="exampleTabsThree"
              role="tab">Media</a></li>
         </ul>
        <div class="tab-content padding-top-20">
          <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">
               <?php echo $this->Form->create('Product', array('class' => 'form-horizontal')); ?>
                    <div class="row">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Title: </label>
                          <div class="col-sm-9">

                              <?php
                              echo $this->Form->input(
                                      'title', array(
                                  'label' => false,
                                  'div' => false,
                                  'required' => true,
                                  'class' => 'form-control',
                                  'placeholder' => 'Title',
                                  'autocomplete' => 'off',
                                      )
                              );
                              ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Quantity : </label>
                          <div class="col-sm-9">

                              <?php
                              echo $this->Form->input(
                                      'quantity', array(
                                  'label' => false,
                                  'div' => false,
                                  'required' => true,
                                  'type' => 'number',
                                  'class' => 'form-control',
                                  'placeholder' => 'Quantity',
                                  'autocomplete' => 'off',
                                      )
                              );
                              ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Price : </label>
                          <div class="col-sm-9">

                              <?php
                              echo $this->Form->input(
                                      'price', array(
                                  'label' => false,
                                  'div' => false,
                                  'required' => true,
                                  'type' => 'number',
                                  'class' => 'form-control',
                                  'placeholder' => 'Price',
                                  'autocomplete' => 'off',
                                      )
                              );
                              ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Discount Price (if any) : </label>
                          <div class="col-sm-9">

                              <?php
                              echo $this->Form->input(
                                      'discount', array(
                                  'label' => false,
                                  'div' => false,
                                  'type' => 'number',
                                  //'required' => true,
                                  'class' => 'form-control',
                                  'placeholder' => 'Discount Price',
                                  'autocomplete' => 'off',
                                      )
                              );
                              ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Description: </label>
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
                                  'type' => 'textarea'
                                      )
                              );
                              ?>
                              
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Collection : </label>
                          <div class="col-sm-9">
                              <select class="form-control" data-plugin="select2" data-placeholder="Select Product Owner"
                                      data-allow-clear="true" name = "data[Product][collection_id]" required >
                                          <option value ="">Select Collection</option>
                                          <?php
                                          if (isset($collections) && count($collections) && is_array($collections)) {
                                              foreach ($collections as $key => $value) {
                                                  ?>
                                          <option value ="<?php echo $value['Collection']['id']; ?>" <?php echo (!empty($this->request->data['Product']['collection_id'])&&($this->request->data['Product']['collection_id'] == $value['Collection']['id']))?'selected':''; ?>><?php echo ucfirst($value['Collection']['title']); ?></option>
                                      <?php
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Categories : </label>
                          <div class="col-sm-9">
                              <select class="form-control" data-plugin="select2" required name="data[Product][category_id]">
                                  <option value ="">Select Category</option>
                                  <?php foreach ($categories as $key => $value) { ?>
                                      <option value="<?php echo $value['Category']['id']; ?>"
                                        <?php echo (!empty($this->request->data['Product']['category_id'])&&($this->request->data['Product']['category_id'] == $value['Category']['id']))?'selected':''; ?>
                                      ><?php echo $value['Category']['title']; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                      </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                      <button type="submit" class="btn btn-primary" id="setCropperData" >Save </button>
                      <a href="<?php echo $this->webroot; ?>admin/products" type="reset" class="btn btn-default btn-outline">Cancel</a>
                  </div>
              </div>
              <?php echo $this->Form->end(); ?>
          </div>
          
          <div class="tab-pane" id="exampleTabsThree" role="tabpanel">
             <?php
                echo $this->element('admin/item/other_media_upload');
            ?>
          </div>
         </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
	$(document).ready( function () {

   
  //image upload under other media 
  // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
            alert(filesAmount);
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                var html = '';

                reader.onload = function(event) {
                    html = '<div class="col-sm-4"><div class="img-wrap"><span class="close">X</span><img style="margin:20px" id="imag-'+i+'" src="'+event.target.result+'" width="200" height="150"/></div></div>';
                    $(html).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });

		
    
    $('body').on('click','.close_icon',function(){
        var clickable_class = $(this); 
        $('.ticket-add-panel').each(function(index,value){
          //if($('.close_icon').length > 1){
            $(clickable_class).closest('.ticket-add-panel').remove();
          //}
        });
        if($('.close_icon').length === 1){
          $('.close_icon').hide();
        }
        
     });
  });
</script>
<style>
.page-content {
    padding: 70px 30px;
}
.img-wrap {
    position: relative;
   
}
i.fa.fa-times {
    font-style: normal;
}
.img-wrap .close {
    position: absolute;
    top: 20px;
    right: -22px;
    z-index: 100;
    color: #fff;
    opacity: 1;
    font-style: normal;
    font-size: 12px;
    background: #f00;
    width: 20px;
    height: 20px;
    padding: 5px 6px;
    border-radius: 50px;
}

    [hidden] {
  display: none !important;
}
    .btn-group .btn + .btn,
    .btn-group .btn + .btn-group,
    .btn-group .btn-group + .btn,
    .btn-group .btn-group + .btn-group {
      margin-left: 0;
    }
    
    .cropper-preview {
      overflow: hidden;
    }
    
    .img-preview {
      float: left;
      margin: 0 10px 10px 0;
      overflow: hidden;
    }
    
    .img-preview > img {
      max-width: 100%;
    }
    
    .preview-lg {
      width: 263px;
      height: 148px;
    }
    
    .preview-md {
      width: 139px;
      height: 78px;
    }
    
    .preview-sm {
      width: 69px;
      height: 39px;
    }
    
    .preview-xs {
      width: 35px;
      height: 20px;
      margin-right: 0;
    }
    
    .cropper,
    .cropper-toolbar {
      margin-bottom: 30px;
    }
    
    @media (min-width: 1200px) {
      .cropper {
        max-height: 600px;
      }
    }
    
    @media (min-width: 769px) {
      .cropper {
        max-height: 400px;
      }
    }
    
    @media (max-width: 768px) {
      .cropper {
        max-height: 300px;
      }
    }
    
    @media (max-width: 480px) {
      .cropper {
        max-height: 246px;
      }
    }
    
    @media (max-width: 586px) {
      .btn-group .btn {
        padding: 6px 8px;
      }
      .cropper {
        max-height: 246px;
      }
    }
  </style>
  <!-- map filed css -->
  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>
    <!-- map field css end -->
  <script>
  	event_photo = '';
    (function(document, window, $) {

      // Example Cropper Simple
      // ----------------------
      (function() {
        $("#simpleCropper img").cropper({
          preview: "#simpleCropperPreview >.img-preview",
          responsive: true
        });
      })();

      // Example Cropper Full
      // --------------------
      (function() {
        var $exampleFullCropper = $("#exampleFullCropper img"),
          $inputDataX = $("#inputDataX"),
          $inputDataY = $("#inputDataY"),
          $inputDataHeight = $("#inputDataHeight"),
          $inputDataWidth = $("#inputDataWidth");

        var options = {
          aspectRatio: 16 / 9,
          preview: "#exampleFullCropperPreview > .img-preview",
          responsive: true,
          crop: function() {
            var data = $(this).data('cropper').getCropBoxData();
            $inputDataX.val(Math.round(data.left));
            $inputDataY.val(Math.round(data.top));
            $inputDataHeight.val(Math.round(data.height));
            $inputDataWidth.val(Math.round(data.width));
          }
        };
        // set up cropper
        $exampleFullCropper.cropper(options);

        // set up method buttons
        $(document).on("click", "[data-cropper-method]", function() {
          var data = $(this).data(),
            method = $(this).data('cropper-method'),
            result;
          if (method) {
            result = $exampleFullCropper.cropper(method, data.option);
          }

          if (method === 'getCroppedCanvas') {
            $('#getDataURLModal').find('.modal-body').html(
              result);
            	_canvas = $('#event_photo_canvas > canvas');
	          event_photo = _canvas[0].toDataURL();
	          $('#main_photo').val(event_photo);

          }

        });
        $( "#EventAdminAddForm" ).submit(function( event ) {
    			event.preventDefault();
          /*var first_block_price_per_person = $("#block1 input[name='data[TicketCategory][price_per_person][]']").val();
          var first_block_number_of_tickets = $("#block1 input[name='data[TicketCategory][number_of_tickets][]']").val();
          var sec_block_price_per_person = $("#block2 input[name='data[TicketCategory][price_per_person][]']").val();
          var sec_block_price_per_person = $("#block2 input[name='data[TicketCategory][number_of_tickets][]']").val();
          if($.trim(first_block_price_per_person) === '' && $.trim(first_block_number_of_tickets) === ''){
            $("#block1 input[name='data[TicketCategory][name][]']").val('');
          }
          if($.trim(sec_block_price_per_person) === '' && $.trim(first_block_number_of_tickets) === ''){
            $("#block2 input[name='data[TicketCategory][name][]']").val('');
          }*/
    			$("#image_data").trigger('click');

    			$("#EventAdminAddForm")[0].submit();
      
        
		  });
        // deal wtih uploading
        var $inputImage = $("#inputImage");

        if (window.FileReader) {
          $inputImage.change(function() {
            var fileReader = new FileReader(),
              files = this.files,
              file;

            if (!files.length) {
              return;
            }

            file = files[0];

            if (/^image\/\w+$/.test(file.type)) {
              fileReader.readAsDataURL(file);
              fileReader.onload = function() {
                $exampleFullCropper.cropper("reset", true).cropper(
                  "replace", this.result);
                $inputImage.val("");
              };
            } else {
              showMessage("Please choose an image file.");
            }
          });
        } else {
          $inputImage.addClass("hide");
        }

        // set data
        $("#setCropperData").click(function() {
          var data = {
            left: parseInt($inputDataX.val()),
            top: parseInt($inputDataY.val()),
            width: parseInt($inputDataWidth.val()),
            height: parseInt($inputDataHeight.val())
          };
          $exampleFullCropper.cropper("setCropBoxData", data);
        });
      })();

    })(document, window, jQuery);
    
  </script>