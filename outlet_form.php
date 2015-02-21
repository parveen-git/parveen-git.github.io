<?php
include_once 'client-inc.php';
if(isset($_REQUEST['id'])){
    $row = get_outlet_by_id($_REQUEST['id']);
    $outlet_name = $row['NAME'];
    $outlet_id   = $row['ID'];
}
?>
<form action="" method="post" id="outlet_form" onsubmit="javascript:add_edit_outlet(this); return false;">
<table style="width: 350px; height: 120px; padding: 10px; margin: 10px;">
    <tr><td>Outlet Name</td><td><input class="require" type="text" <?php echo (isset($_REQUEST['id']))
     ? 'value='.$outlet_name
     : 'value=""';       
    ?> placeholder="Outlet Name" name="outlet_name" id="outlet_name"  /></td></tr>
   <?php echo (isset($_REQUEST['id']))
         ? '<input type="hidden" value="edit" name="outlet_task" /><input type="hidden" value="' . $outlet_id . '" name="outlet_id" />'
         : '<input type="hidden" value="add" name="outlet_task" />';
   ?>
    <tr><td colspan="2" align="center"><input type="submit" value="Add/Edit Outlet"  name="outlet_button" id="outlet_button"  /></td></tr>
 
    
</table></form>