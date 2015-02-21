<a href="logout.php">Log Out</a>
<div class="tabs-5">
	<ul class="tabs">
		<li><a href="#tab17"><img src="images/home.png" /></a></li>
		<li><a href="#tab18">Leads</a></li>
		<li><a href="#tab19">Outlets</a></li>
		<li><a href="#tab20">Stands</a></li>
                <li><a href="#tab21">Product</a></li>
                <li><a href="#tab22">Create Account</a></li>
                <li><?php echo ucfirst($_SESSION['name']);?></li>
	</ul>
    <div class="tab_content_wrapper">
        <div class="tab_content" id="tab17">
            <table>
                <tr><td></td><td></td><td></td></tr>
                
            </table>   
        </div>
<div class="tab_content" id="tab18" style="width:100%">
<?php 
if(isset($_REQUEST['lead_button'])){
  add_edit_lead($_REQUEST);
  }
?>
    <a style="display:block; background-color:#D54E21; color:#fff;font-weight: bolder;padding: 10px;width: 20%;" href="create_lead.php" onclick="return hs.htmlExpand(this, { objectType: 'ajax'} )">Add New Leads Here</a>
    <br/>
    <table style="border:2px solid #ddd; font-size: 12px;" width="100%" align="center" cellspacing="5" cellpadding="5">
        <tr><td><b>Sr.No.</b></td>
            <td><b>Lead Date</b></td>
            <td><b>Lead Status</b></td>
            <td><b>Lead Owner</b></td>
            <td><b>Created By</b></td>
            <td><b>Stand Name</b></td>
            <td><b>Expected Delivery Date</b></td>
            <td><b>Remarks</b></td>
            <td><b>Action</b></td></tr>
 <?php
 $i=0;
 print_r(get_all_leads_for_this_user($_SESSION['id']));
 foreach(get_all_leads_for_this_user($_SESSION['id']) as $k => $row1 ){
echo '<tr><td>' . ++$i . '</td>'
        . '<td>' . $row1['LEAD_DATE'] . '</td>'
        . '<td>' . $row1['LEAD_STATUS'] . '</td>'
        . '<td>' . $row1['LEAD_OWNER'] . '</td>'
        . '<td>' . $row1['LEAD_GENERATOR'] . '</td>'
        . '<td>' . $row1['LEAD_STAND'] . '</td>'
        . '<td>' . $row1['DELIVERY_DATE'] . '</td>'
        . '<td>' . $row1['LEAD_REMARKS'] . '</td>'
        . '<td><a onclick="return hs.htmlExpand(this, { objectType: \'ajax\'} )" id="#lead_'.$row1['LEAD_ID'].'" href="create_lead.php?id='.$row1['LEAD_ID'].'"><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delete_lead('.$row1['LEAD_ID'].',\'' .$row1['LEAD_OWNER'] .'\');"><img src="images/delete.png" /></a></td></tr>';                
 }?>
    </table>
   
 </div>
<div class="tab_content" id="tab19" style="width:97%; margin: 20px auto; padding: 10px; overflow-y : scroll; height: 400px">

<a style="display:block; background-color:#D54E21; color:#fff;font-weight: bolder;padding: 10px;width: 20%;" href="outlet_form.php" onclick="return hs.htmlExpand(this, { objectType: 'ajax'} )">Add New Outlets Here</a>
    <br/>
<table id="outlets" style="border:2px solid #ddd; padding:10px;" width="100%" height="100%" align="center" cellspacing="1" cellpadding="5">
        <tr><td><b>Sr.No.</b></td><td><b>Outlet Name</b></td><td><b>Action</b></td></tr>
    <?php 
      $i=0;
    foreach(get_outlet() as $row1){
    echo '<tr><td>' . ++$i . '</td><td>' . $row1['NAME'] . '</td><td><a onclick="return hs.htmlExpand(this, { objectType: \'ajax\'} )" id="#outlet_'.$row1['ID'].'" href="outlet_form.php?id='.$row1['ID'].'"><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delete_outlet('.$row1['ID'].',\'' .$row1['NAME'] .'\');"><img src="images/delete.png" /></a></td></tr>';    
    } ?>
</table>

</div>
            

<div class="tab_content"  id="tab20" style="width:97%; margin: 20px auto; padding: 10px; overflow-y : scroll; height: 400px">

<a style="display:block; background-color:#D54E21; color:#fff;font-weight: bolder;padding: 10px;width: 20%;" href="stand_form.php" onclick="return hs.htmlExpand(this, { objectType: 'ajax'} )">Add New Stands Here</a>
    <br/>
    <table style="border:2px solid #ddd;" id="stands" width="80%" align="center" cellspacing="5" cellpadding="5">
        <tr><td><b>Sr.No.</b></td><td><b>Stand Name</b></td><td><b>Outlet Name</b></td><td><b>Action</b></td></tr>
    <?php 
    $i=0;
    foreach(get_stands() as $row1){
    echo '<tr><td>' . ++$i . '</td><td>' . $row1['NAME'] . '</td><td>' . $row1['OUTLET_NAME'] . '</td><td><a onclick="return hs.htmlExpand(this, { objectType: \'ajax\'} )" id="stand_'.$row1['ID'].'" href="stand_form.php?id='.$row1['ID'].'"><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delete_stand('.$row1['ID'].',\'' .$row1['NAME'] .'\');"><img src="images/delete.png" /></a></td></tr>';    
    } ?>
</table>
  
</div>
            
<div class="tab_content" id="tab21" style="width: 100%">
<?php 
    if(isset($_REQUEST['product_button'])){
        
       add_edit_product($_REQUEST);
    }
    
 ?>    
<a style="display:block; background-color:#D54E21; color:#fff;font-weight: bolder;padding: 10px;width: 20%;" href="product.php" onclick="return hs.htmlExpand(this, { objectType: 'ajax'} )">Add New Products Here</a>
<br/>
    <?php 
    $row = get_all_products();
    if(count($row)>0){ 
          //echo '<pre/>';          print_r($row);
        ?>
<table style="border:2px solid #ddd;" width="80%" align="center" cellspacing="5" cellpadding="5">
        <tr><td><b>Sr.No.</b></td><td><b>Product Name</b></td><td><b>On Road Price</b></td><td><b>Ex-Showroom Price</b></td><td><b>Action</b></td></tr>
    <?php 
    $i=0;
    foreach($row as $row1){
    echo '<tr><td>' . ++$i . '</td><td>' . $row1['NAME'] . '</td><td>' . $row1['PRICE_ON_ROAD'] . '</td><td>' . $row1['PRICE_EX_SHOWROOM'] . '</td><td><a onclick="return hs.htmlExpand(this, { objectType: \'ajax\'} )" id="#outlet_'.$row1['ID'].'" href="product.php?id='.$row1['ID'].'"><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delete_product('.$row1['ID'].',\'' .$row1['NAME'] .'\');"><img src="images/delete.png" /></a></td></tr>';    
    } ?>
</table>
    <?php } ?>
    

</div>  
            
<div id="tab22" class="tab_content" style="width: 100%">
    <?php 
    if(isset($_REQUEST['signup_button'])){
      
        add_edit_user($_REQUEST);
    }
    
    ?>
<a style="display:block; background-color:#D54E21; color:#fff;font-weight: bolder;padding: 10px;width: 20%;" href="create_user.php" onclick="return hs.htmlExpand(this, { objectType: 'ajax'} )">Add New Users Here</a>
<br/>
    <?php
    $row = get_all_users();
    if(count($row)){
        ?>
<table style="border:2px solid #ddd;" width="80%" align="center" cellspacing="5" cellpadding="5">
        <tr><td><b>Sr.No.</b></td><td><b>User Name</b></td><td><b>Action</b></td></tr>
    <?php 
    $i=0;
    foreach($row as $row1){
    echo '<tr><td>' . ++$i . '</td><td>' . $row1['NAME'] . '</td><td><a onclick="return hs.htmlExpand(this, { objectType: \'ajax\'} )" id="#outlet_'.$row1['ID'].'" href="create_user.php?id='.$row1['ID'].'"><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delete_user('.$row1['ID'].',\'' .$row1['NAME'] .'\');"><img src="images/delete.png" /></a></td></tr>';    
    } ?>
</table>
    <?php } ?>

</div>    
            
</div>
</div>
<script type="text/javascript">

$('.tabs-5').jQueryTab({
    initialTab: 1,
    tabInTransition: 'slideRightIn',
    tabOutTransition: 'slideRightOut',
    cookieName: 'active-tab-5'

});
</script>
