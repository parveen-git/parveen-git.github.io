<?php
include_once 'client-inc.php';
$arr = array();
parse_str($_REQUEST['str'],$arr);
//print_r($arr);
if(add_edit_outlet($arr))
{
      $i=0;
    echo '<tr><td><b>Sr.No.</b></td><td><b>Outlet Name</b></td><td><b>Action</b></td></tr>';  
    foreach(get_outlet() as $row1){
    echo '<tr><td>' . ++$i . '</td><td>' . $row1['NAME'] . '</td><td><a onclick="return hs.htmlExpand(this, { objectType: \'ajax\'} )" id="#outlet_'.$row1['ID'].'" href="edit_outlet.php?id='.$row1['ID'].'"><img src="images/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:delete_outlet('.$row1['ID'].',\'' .$row1['NAME'] .'\');"><img src="images/delete.png" /></a></td></tr>';    
    }
    
}
?>
