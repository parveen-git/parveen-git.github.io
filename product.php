<?php
include_once 'client-inc.php';
if(isset($_REQUEST['id'])){
    $row = product_by_id($_REQUEST['id']);
    $product_name      = $row['NAME'];
    $product_id        = $row['ID'];
    $road_price        = $row['PRICE_ON_ROAD'];
    $exshowroom_price  = $row['PRICE_EX_SHOWROOM'];
}
    
    //print_r(product_by_id($_REQUEST['id']));

?>
<form action="" method="post" onsubmit="return validate(this);">
<table width="100%">
    <tr><td>Product Name</td><td><input type="text" <?php echo (isset($_REQUEST['id']))
     ? 'value='.$product_name
     : 'value=""';       
    ?> placeholder="Product Name" name="product_name" id="product_name" /></td></tr>
   <?php echo (isset($_REQUEST['id']))
         ? '<input type="hidden" value="edit" name="product_task" /><input type="hidden" value="' . $product_id . '" name="product_id" />'
         : '<input type="hidden" value="add" name="product_task" />';
   ?>
    <tr><td>Product Price on Road</td><td><input type="text" <?php echo (isset($_REQUEST['id']))
     ? 'value='.$road_price
     : 'value=""';       
    ?> placeholder="Product Price on Road" name="road_price" id="road_price" /></td></tr>
    <tr><td>Product Price Ex-Showroom </td><td><input type="text" <?php echo (isset($_REQUEST['id']))
     ? 'value='.$exshowroom_price
     : 'value=""';       
    ?> placeholder="Product Price Ex-Showroom" name="exshowroom_price" id="exshowroom_price" /></td></tr>
    <tr><td colspan="2" align="center"><input type="submit"  name="product_button" id="product_button" /></td></tr>
 
    
</table></form>