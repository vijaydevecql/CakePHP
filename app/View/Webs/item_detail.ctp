  <div id="snackbar">Success</div>

  <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Product Details</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
 <section class="news_panel product_details">
 <div class="container">
 <div class="row">
  <div class="col-sm-5 col-xs-12">
  <div class="colIn full">
  
  <div class="product_img full">
  <img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $item['Item']['image'];  ?>" alt="" class="custome_change" />
  </div>
  <div class="product-thumbnal">
  <a href="">
  <img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $item['Item']['image'];  ?>" alt="" class="custome_change">
  </a>
  <a href="">
  <img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $item['Item']['image'];  ?>" alt="" class="custome_change">
  </a>
  <a href="">
  <img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $item['Item']['image'];  ?>" alt="" class="custome_change">
  </a>
  </div>
 </div>
  </div>
  <input type="hidden" id="item_id" value="<?php echo  $item['Item']['id'] ; ?>">
  <input type="hidden" id="item_price" value="<?php echo  $item['Item']['price'] ; ?>">

  <div class="col-sm-7 col-xs-12">
  <strong class="details_hnd full"><?php echo  $item['Item']['name'] ; ?>  </strong>
  <!-- <div class="stars full"><img src="<?php echo $this->webroot ;?>aasets_web/images/stars.png" alt="" /></div> -->
  <strong class="details_price full">$<?php echo  $item['Item']['price'] ; ?> </strong>
  <div class="details_content full">
  <p><?php echo  $item['Item']['description'] ; ?> </p>
  </div>
  <div class="add_to_carts full">
     <?php if($add_to_cart==1){ ?>
  <button class="btn minus" onclick="minus()"><i class="fa fa-minus" aria-hidden="true" ></i></button>
  <input type="text" placeholder="Qty" class="form-control" id="qty" value="1">
   <button class="btn minus"  onclick="plus()"><i class="fa fa-plus" aria-hidden="true" ></i></button>


   <!-- <a href="<?php echo $this->webroot; ?>add-to-cart">Add To Cart</a> -->
  
   <button type="submit" class="btn addto_cart" id="adddfsd_to_cart" data-toggle="modal" data-target="#myModal"  >Add </button>
   <?php }else{ ?>
   <p> You cannot add item other than your current selected restaurent items.  </p>
   <?php } ?>
  </div>

  </div>
  <div class="full ingrediant">
  <ul>
  <li><b><u>Ingrediant :-</u></b></li>
  <li><?php echo  base64_decode($item['Item']['ingredients']); ?></li>

  </div>
  
 
  
  <div class="full related_products">
   <strong class="details_hnd full">Other Products </strong>
   <?php foreach ($other_items as  $value) { ?>
   <div class=" col-xs-12 col-sm-6 col-md-3">
   <div class="rel_img">
   <img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $value['Item']['image'];  ?>" alt="" />
   </div>
   <strong class="pro_title full"><?php echo $value['Item']['name'];  ?></strong>
   <div class="stars full">
   <!--  <img src="<?php echo $this->webroot ;?>aasets_web/images/stars.png" class="custome_change" alt=""> -->
  </div>
   
   <strong class="pro_price full">$<?php echo $value['Item']['price'];  ?></strong>
   <a class="btn addto_cart" href="<?php echo $this->webroot; ?>webs/item_detail/<?php echo $value['Item']['id'];  ?>">View</a>
  
   </div>
   <?php  } ?>
   
   
  </div>
 </div>
 </div>
 </section>
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $item['Item']['name'] ; ?></h4>
      </div>
      <div class="modal-body">
         <div>Add On <br>
          
(You can choose up to <?php echo count($items_addon); ?> options)
</div>
   <table>
   <th>Name</th> <th class="pull-right">Price</th> 
   <?php 
   foreach ($items_addon as   $value) {?>
    
   <tr>
  <td> <input type="checkbox" name="addon" data-id="<?php echo $value['id'];?>"  id="add_addons<?php echo $value['id'];?>" class="addonsclass"  value="<?php echo $value['price'];?>"   ><?php echo $value['name']; ?> </td> <td class="pull-right" > <?php echo $value['price']; ?></td>
 </tr>
  
   <?php }?>
   </table>
      </div>
      <div class="modal-footer">
        <!-- <input type="hidden" id="item_show_price" value="<?php echo  $item['Item']['price'] ; ?>"  > -->

       $<span class="item_show_price"> <?php echo  $item['Item']['price'] ; ?></span>
        <button type="submit" class="btn addto_cart " id="add_to_cart">Add TO Cart</button>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
<script type="text/javascript">
function plus () {
$('#qty').val(parseInt($('#qty').val())+1);
}
function minus () {
  if($('#qty').val() > 1){ 
    $('#qty').val(parseInt($('#qty').val())-1);
  }
}
    $(document.body).on('click', '.addonsclass ', function (e) {
        Addon_price=  $(this).val();
        price=$('#item_price').val();
      if($(this). prop("checked") == true){
        var new_total = parseInt(price) + parseInt(Addon_price);
        $('#item_price').val(new_total);
        $('.item_show_price').html(new_total);

      }
      else
      {
        var new_total = parseInt(price) - parseInt(Addon_price);
        $('#item_price').val(new_total);
        $('.item_show_price').html(new_total);
      }
    });


 $(document.body).on('click', '#add_to_cart ', function (e) {
// function add_to_cart () {
  var qty=$('#qty').val();
  var item_id=$('#item_id').val();
  var f = [];
  $(':checkbox:checked').each(function(i){
          d = $(this).data('id');
          // console.log(d);
          f.push(d);
        });
  // console.log(f);
  // return;
  // alert(item_id);

  $.ajax({
        method: "POST",
        url: "<?php echo $this->webroot . 'webs/add_to_cart/' ?>" ,
        data: { qty: qty, item_id: item_id,addon:f }

      }).success(function (result) {
        // console.log(result);
        if(result==1)
        {
          // alert(result);
         $('#snackbar').html("Item Added successfully");
         var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
                window.location = "<?php echo $this->webroot.'cart'; ?>";

            }, 3000);
        }

      });
});
</script>