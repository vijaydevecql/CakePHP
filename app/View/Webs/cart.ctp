<?php
$total_cart=count($cart_details);
//prx($carts) 
//
//    ?>
<link rel="stylesheet" href="/staging/togo/assets/vendor/multi-select/multi-select.css">
    <link rel="stylesheet" href="/staging/togo/assets/vendor/select2/select2.css">
    <script src="/staging/togo/assets/vendor/multi-select/jquery.multi-select.js"></script>
    <script src="/staging/togo/assets/vendor/select2/select2.min.js"></script>
  <div id="snackbar">Success</div>

   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Cart Details</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
  <?php //prx($member_charges); ?>
  
  <section class="cart_panel">
  <div class="container">
  <div class="row">
  <div class="col-sm-12">
  <div class="cart_table full">
  <div class="table-responsive">
  <table class="table">
  <thead>
  <tr>
  <th class="pro_img"></th>
  <th class="food_name">FOOD</th>
  <th class="food_price">PRICE</th>
  <th class="food_qty">QUANTITY</th>
  <th class="food_name">Add On's Charges</th>

  <th class="food_total">SUB TOTAL</th>

  <th></th>
  </tr>
  </thead>
  
   <tbody>
    <?php 
    // prx($cart_details);
    
 $sum = 0;
    foreach ($cart_details as $cart_detail) {
      
    foreach ($cart_detail['Addon'] as $ItemsAddon) {  ?>
                  <?php  $ItemsAddon['name']; 
                  // $sum=$sum+$ItemsAddon['price'];
                  ?><br>
            <?php }
            // prx($sum);
             ?>
   
  <tr id="carts<?php echo $cart_detail['Cart']['id'] ?>" class="yes">
  <td class="pro_img"><a href=""><img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $cart_detail['Item']['image'] ; ?>" alt="" /></a></td>
   <td class="food_name"><strong><?php echo $cart_detail['Item']['name'] ; ?></strong>

   </td>
    <td class="food_price"><strong>$ <?php echo $cart_detail['Item']['price'] ; ?></strong>
    <!-- <input type="checkbox">  -->
    </td>
     <td class="food_qty">
      <strong>
       <input type="number" id="qty<?php echo $cart_detail['Cart']['id'] ?>" oninput="updatequanity(<?php echo $cart_detail['Cart']['id'] ?>,<?php echo $cart_detail['Item']['price'] ?>)" class="" value="<?php echo $cart_detail['Cart']['quantity'] ?>">
     </strong>
     </td>
       
      <td class="addon-td">
       <?php 
            $t=0;

            foreach ($cart_detail['Addon'] as $ItemsAddon) { 

              $t=$ItemsAddon['price']+$t; 
              }
            echo '$ '.$t;
            ?>
                   <!-- </select> -->
        <input type="hidden" id="addones_cost<?php echo $cart_detail['Cart']['id'] ?>" value="<?php echo $t; ?>" >
       
      </td>
      <td data-th="Subtotal" id="subtotal<?php echo $cart_detail['Cart']['id'] ?>" class="text-center">$ <?php echo $subtotal=($cart_detail['Cart']['quantity'] * $cart_detail['Item']['price']+$t);
                     $sum += $subtotal;
                                ?>
      </td>
      <td > 
          <button onclick="deleted(<?php echo $cart_detail['Cart']['id']; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>               
      </td>
  </tr>
  <input type="hidden" value="<?php echo  $cart_detail['Cart']['quantity'] * $cart_detail['Item']['price']+$t; ?>" id="item_price<?php echo $cart_detail['Cart']['id'] ?>"/>
  <?php } ?>
  <input type="hidden" value="<?php echo $sum; ?>" id="sum"/>
 
  </tbody>
  
<!--   <thead>
  <tr>
  <th class="pro_img"><input type="text" class="form-control" placeholder="Coupon Code"></th>
  <th class="food_name"><button class="btn btn-danger">Apply coupon</button></th>
  <th class="food_price"> </th>
  <th class="food_qty"></th>
  <th class="food_total"><button class="btn btn-danger full">Update cart
</button></th>
  </tr>
  </thead> -->
  </table>
  </div>
  </div>
  
  <div class="full cart_total">
<!--   <strong class="details_hnd">Select Delivery charges</strong>
<select  id="delivery_charges">
<?php foreach ($delivery_charges as  $value) { ?>
    <option value="<?php echo $value['Delivery']['cost']; ?>" ><?php echo $value['Delivery']['title']; ?></option>
 
<?php } ?>
</select> -->
  <div class="table1">
  <strong class="details_hnd">CART TOTALS</strong>
  
  
  <table>
  <tbody>
  
  <tr>
  <td>TOTAL</td>
  <td class="price_total" >$<?php echo $sum; ?></td>
  </tr>
  <!-- <tr>
  <td>Delivery Charges<br>
  Extra Per Minute Charges
  </td>
  <td><span id="d_C">0</spna><br>
  <span id="d_C_per_min">0</spna>
  </td>
  </tr>

  <tr>
  <td>TOTAL</td>
  <td><?php
  

  //echo $Total = $sum+ $dv ; ?></td>
  </tr>
  <tr> -->
   
  <td colspan="2">
    <button class="btn btn-danger full" onclick="checking()">
      Proceed to checkout
    </button>
  </td>
  </tr>
  </tbody>
  
  </table>
  
  </div>
  </div>
  </table>
  </div>
  </div>
  </div>
  </section>
   <!-- Modal -->
  
  <script type="text/javascript">
    var total_cart="<?php echo $total_cart ?>";
        // $(document.body).on('change', '#_restaurant_id', function (e) {

    $(document.body).on('change','.addon_id',function  () {
      // alert('sdfsdf');
      var brands = ('.addon_id option:selected');
      var selected = [];
      $(brands).each(function(index, brand){
        selected.push([$(this).val()]);
      });
      console.log(selected);
    });
    function checking(){
    
        if(total_cart==0){
             swal({
                title: 'Error!',
                text: 'Cart is empty',
                type: 'info',
                confirmButtonText: 'Ok'
            });
            return false;
        }else{
            window.location="<?php echo $this->webroot . 'webs/check_out/' ?>";
        }
    }
function deleted(id) {
        var sum = $("#sum").val();
        var item_price = $("#item_price" + id).val();
        $.ajax({
            type: 'get',
            url: '<?php echo $this->webroot ?>webs/cart_item_delete/' + id,
            cache: false,
            success: function (data) {
                total_cart--;
                $(".badge").html(eval(parseInt($(".badge").html())-1));
                var remain = sum - item_price;
                $(".price_total").html("Total $ "+remain);
                $("#sum").val(remain);
                $("#snackbar").html('Item Removed Successfully');
                var x = document.getElementById("snackbar")
                x.className = "show";
                setTimeout(function () {
                    x.className = x.className.replace("show", "");
                }, 3000);
                $("#carts" + id).fadeOut('xslow');
                $(".delivery").load();
            }

        });
    }

function updatequanity(id, price) {
        var quanty = $("#qty" + id).val();
        if (quanty == 0) {
            $("#qty" + id).val(1);
            
            swal({
                    title: 'Infomation!',
                    text: 'its never we zero',
                    type: 'info',
                    confirmButtonText: 'Ok'
            });
            return false;
        }
        
           addones_cost= $("#addones_cost"+id).val();
           // alert(addones_cost);
        var sum = $("#sum").val();
        var item_price = $("#item_price" + id).val();
        sum = sum - item_price;
        var subtotal = (quanty * price)+parseInt(addones_cost);
        $("#item_price" + id).val(subtotal);
        $("#subtotal" + id).html(subtotal);
        sum = sum + subtotal;
        $("#sum").val(sum);
        $(".price_total").html(" $ "+sum);
        $.ajax({
            type: 'post',
            url: '<?php echo $this->webroot ?>webs/update_cart/',
            data:{id:id ,quantity:quanty},
            cache: false,
            success: function (data) {
                $("#snackbar").html('quantity updated');
                var x = document.getElementById("snackbar")
                x.className = "show";
                setTimeout(function () {
                    x.className = x.className.replace("show", "");
                }, 3000);
               
            }

        });
    }

    $( "#delivery_charges" ).change(function() {

       res = $(this).val().split('+');
       if(res.length>1){
        $("#d_C").html(res[0]);
        $("#d_C_per_min").html(res[1]);
       }
       else
       {
        $("#d_C").html(res);
       }
      


      console.log(res[1]);
    });
  </script>
 
