<?php echo $this->Form->create('EventCategory',['id'=>'ticket_form']); ?>
<div id="outer_div">
<section id="alertify-logs" class="alertify-logs">
  <article class="alertify-log"></article>
</section>
<?php if(isset($this->request->data['TicketCategory']) && count($this->request->data['TicketCategory'])) { 
foreach ($this->request->data['TicketCategory'] as $key => $value) {?>

  <div class="panel ticket-add-panel">
    <div class="panel-heading">
        <input
        type="text"
        name="data[TicketCategory][name][]"
        class="form-control panel-title"
        style="width:50%; border: none;"
        placeholder="Name of ticket. E.g. Silver/Gold"
        value="<?php echo $value['name']?>"/>
        <div class="panel-actions">
            <!-- <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true"
            aria-hidden="true"></a>
            <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
            <a class="panel-action icon wb-close" data-toggle="panel-close" aria-hidden="true" data_id="pannel1"></a>
            <a class="panel-action icon wb-edit edit_ticket" aria-hidden="true" data-id="pannel1"></a> -->
         
            <a 
              class="panel-action icon close_icon wb-close" 
              style="display: none;" 
              aria-hidden="true" 
              data_id="pannel1" 
              data-plugin="alertify"></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
              <div class="row">
                  <div class="col-sm-12">
                  <span>Price per person</span>
                  </div>
                  <div class="col-sm-12">
                    <input type="text" class="form-control round" id="inputRounded" name="data[TicketCategory][price_per_person][]" data-block = "block1" value="<?php echo $value['price_per_person']?>">
                  </div>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                      <div class="col-sm-12">
                         <span>No. of tickets</span>
                      </div>
                      <div class="col-sm-12">
                      <input type="text" class="form-control round" id="inputRounded" name="data[TicketCategory][number_of_tickets][]" data-block = "block1" required value="<?php echo $value['number_of_tickets']; ?>">
                     <input type="hidden" name="data[TicketCategory][event_id]" value="<?php echo $this->request->data['Event']['id']?>">
                      </div>

                </div>
            </div>
        </div>
    </div>
  </div>
<?php } }else{ ?>

<div class="panel ticket-add-panel">
    <div class="panel-heading">
        <input
        type="text"
        name="data[TicketCategory][name][]"
        class="form-control panel-title"
        style="width:50%; border: none;"
        placeholder="Name of ticket. E.g. Silver/Gold"
        value=""/>
        <div class="panel-actions">
            <!-- <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true"
            aria-hidden="true"></a>
            <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
            <a class="panel-action icon wb-close" data-toggle="panel-close" aria-hidden="true" data_id="pannel1"></a>
            <a class="panel-action icon wb-edit edit_ticket" aria-hidden="true" data-id="pannel1"></a> -->
         
            <a 
              class="panel-action icon close_icon wb-close" 
              style="display: none;" 
              aria-hidden="true" 
              data_id="pannel1" 
              data-plugin="alertify"></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
              <div class="row">
                  <div class="col-sm-12">
                  <span>Price per person</span>
                  </div>
                  <div class="col-sm-12">
                    <input type="text" class="form-control round" id="inputRounded" name="data[TicketCategory][price_per_person][]" data-block = "block1" >
                  </div>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                      <div class="col-sm-12">
                         <span>No. of tickets</span>
                      </div>
                      <div class="col-sm-12">
                      <input type="text" class="form-control round" id="inputRounded" name="data[TicketCategory][number_of_tickets][]" data-block = "block1" required>
                     <input type="hidden" name="data[TicketCategory][event_id]" value="<?php echo $this->request->data['Event']['id']?>">
                      </div>

                </div>
            </div>
        </div>
    </div>
  </div>

  <?php } ?>

</div>
<button type="button" class="btn btn-primary btn-round pull-left" id="event_ticket">Save</button>
<button type="button" class="btn btn-primary btn-round pull-right" id="addTicketsCat" data-num = "3">+</button>

<?php echo $this->Form->end(); ?>                 
<script type="text/javascript">
$(document).ready(function () {
        $(document.body).on('click', '#event_ticket', function (e) {
            e.preventDefault();
            var error = '';
            $('.ticket-add-panel').each(function(index,value){
                // Set a variable to 1
                _i = 0;
                // Run through each input field
                $(this).find('input').each( function (k,v) {
                    // If all input fields are blank - then don't show anything (no error)
                    if($(this).val() == '') {
                      $(this).css("border", "1px solid red");
                      error = 'error';
                    }

                });
                
          });
           // alert(error);
          if(error == ''){

            _this = $(this);
            _id = _this.attr('rel');
            _this.addClass('disabled');
            var data = $('#ticket_form').serializeArray(); 
            $.ajax({
                url: "<?php echo $this->webroot . 'admin/events/ticket_cat/' ?>",
                data: data,
                type:'POST',
                cache: false
            }).done(function (html) {
              //alert(html);
              $("#alertify-logs article").addClass('alertify-log-show');
              $("#alertify-logs article").html(html);
              setTimeout(function(){
                 $("#alertify-logs article").removeClass('alertify-log-show');
              }, 5000);
                
                _this.removeClass('disabled');
            });

            }
        });

    $('body').on('click','.close_icon',function(){
        var clickable_class = $(this); 
        $('.ticket-add-panel').each(function(index,value){
          if($('.close_icon').length > 1){
              $(clickable_class).closest('.ticket-add-panel').remove();
          }
        });
        
     });
      $('body').on('click','#addTicketsCat', function(){

        _block = $('.ticket-add-panel').last().html();

        $('#outer_div').append( '<div class="panel ticket-add-panel">' + _block + '</div>');
        $('.ticket-add-panel').last().find('input:text').val('');    
        $('.close_icon').show();
        
      });
      $('body').on('click','.close',function(){
         $(this).parent().parent().remove();
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