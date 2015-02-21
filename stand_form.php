<?php
include_once 'client-inc.php';
if(isset($_REQUEST['id'])){
    $row = get_stand_by_id($_REQUEST['id']);
    $stand_name = $row['NAME'];
    $stand_id   = $row['ID'];
    $outlet_id  = $row['OUTLET_ID'];
}
    $row = get_outlet();
   // print_r($row);

?>
<form action="" method="post" id="stand_form" onsubmit="javascript:add_edit_stand(this); return false;">
<table width="100%">
    <tr><td>Stand Name</td><td><input type="text" <?php echo (isset($_REQUEST['id']))
     ? 'value='.$stand_name
     : 'value=""';       
    ?> placeholder="Stand Name" name="stand_name" id="stand_name" class="require" /></td></tr>
   <?php echo (isset($_REQUEST['id']))
         ? '<input type="hidden" value="edit" name="stand_task" /><input type="hidden" value="' . $stand_id . '" name="stand_id" />'
         : '<input type="hidden" value="add" name="stand_task" />';
   ?>
    <tr><td>Outlet Name</td><td><select id="outlet_id" class="require" name="outlet_id"><option value="" >Select Outlet</option>
        <?php foreach($row as $row1){ ?>
            <option value="<?php echo $row1['ID']; ?>" <?php echo ($outlet_id == $row1['ID']) ? 'selected="selected"' : ''; ?> ><?php echo $row1['NAME']; ?></option>;
      <?php  }?>
            </select></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" value="Add/Edit Stand"  name="stand_button" id="stand_button" /></td></tr>
 
    
</table></form>