<?php
include_once 'client-inc.php';
//print_r($_SESSION);
$outlet_stand_Arr =get_stands_with_outlet();
echo '<pre/>';
print_r($outlet_stand_Arr);
$level =$_SESSION['access_level'];
$all_lead_accesser_Arr = array(0,3); 
$user_detail_Arr = in_array($level,$all_lead_accesser_Arr)
                  ? get_all_users()
                  : get_user_by_id($_SESSION['id']); 
$product_Arr = get_all_products();
print_r($user_detail_Arr['STAND_ID']);

if(isset($_REQUEST['id'])){
  $user_details = get_user_by_id($_REQUEST['id']);
}
?>

        
<?php if(isset($_REQUEST['id'])){ ?>

<form action="" method="post" id="lead_form" onsubmit="return validate(this);"><table> 
           
    <tr><td>Assign Stands*</td><td> <select name="stand_id" style="width: 200px;" id="stand_id" class="require" multiple="multiple">
                <?php foreach($row as $k=>$v){?>
                <optgroup label="<?php echo $k; ?>" > 
                    <?php foreach($v as $kk => $vv){ if(in_array($kk,json_decode($user_details['STAND_ID'],true))){?>
                    <option value="<?php echo $kk; ?>" >
                    <?php echo $vv['STAND_NAME']; ?>
                    </option>
                    <?php }} ?>
                </optgroup>
                <?php } ?>
            </select></td></tr>
    
    <tr><td>User Type*</td><td><select id="user_level" name="user_level" class="require">
                <option value="">Select User Type</option>
         <?php $user_type = array(1=>'Manager',2=>'Sale',3=>'Telecaller'); 
               foreach($user_type as $k => $v){ ?>
    <option value="<?php echo $k; ?>" <?php echo ($user_details['ACCESS_LEVEL'] == $k) ? 'selected' : '' ?>><?php echo $v; ?></option>;
                   
            <?php   }
         ?>      
            </select></td></tr>
   
         <input type="hidden" value="edit" name="user_task" />
         <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="user_id" />'
         
   
    <tr><td colspan="2" align="center"><input type="submit" name="signup_button" id="signup_button" value="Sign Up"  /></td></tr>
    </table>
</form>
<?php }  else { ?>       

<form action="" method="post" id="lead_form" onsubmit="return validate(this);">
    <table> 
        <tr><td>Candidate Name</td><td><input type="text" id="candidate_name" name="candidate_name" value="" placeholder="Candidate Name" class="require" /></td></tr>
      <tr><td>Candidate Email</td><td><input type="text" id="candidate_email" name="candidate_email" value="" placeholder="Candidate Email" class="require" /></td></tr>
         <tr><td>Candidate Mobile</td><td><input type="text" id="candidate_mobile" name="candidate_mobile" value="" placeholder="Candidate Mobile" class="require" /></td></tr>
        <tr><td>Product*</td><td> <select name="product_id" style="width: 200px;" id="product_id" class="require">
                <?php foreach($product_Arr as $v){?>
                
                    <option value="<?php echo $v['ID']; ?>">
                    <?php echo $v['NAME']; ?>
                    </option>
                    <?php } ?>
                </select></td></tr>       
       <tr><td>Stand*</td><td> <select name="stand_id" style="width: 200px;" id="stand_id" class="require" >
                <?php foreach($outlet_stand_Arr as $k=>$v){?>
                <optgroup label="<?php echo $k; ?>">
                    <?php foreach($v as $kk => $vv){  if(in_array($kk,json_decode($user_detail_Arr['STAND_ID'],true))){  ?>
                    <option value="<?php echo $kk; ?>">
                    <?php echo $vv['STAND_NAME']; ?>
                    </option>
                    <?php }} ?>
                </optgroup>
                <?php } ?>
            </select></td></tr>
       <tr><td>Assign To*</td><td> <select name="lead_owner" style="width: 200px;" id="lead_owner" class="require">
                <?php
                $whoisuser = array(0 => 'Admin',1 => 'Manager',2 => 'Sale',3 => 'Tellecaller');
                foreach($user_detail_Arr as $k => $user_detail){
                ?>
                <optgroup label="<?php echo $whoisuser[$user_detail['ACCESS_LEVEL']]; ?>">
                 <option value="<?php echo $user_detail['ID']; ?>">
                    <?php echo $user_detail['NAME']; ?>
                    </option>
                  
                </optgroup>
                <?php } ?>
            </select></td></tr>
       <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="lead_generator" />
    <tr><td>Level*</td><td><select id="lead_level" name="lead_level" class="require">
                <option value="">Select Lead Level</option>
         <?php $levelArr = array(1=>'HOT',2=>'WARM',3=>'COLD'); 
               foreach($levelArr as $k => $v){ ?>
    <option value="<?php echo $v; ?>" <?php echo ($user_details['ACCESS_LEVEL'] == $k) ? 'selected' : '' ?>><?php echo $v; ?></option>;
                   
            <?php   }
         ?>      
            </select></td></tr>
   <tr><td>Lead Status*</td><td><select id="lead_level" name="lead_level" class="require">
                <option value="">Select Lead Status</option>
         <?php $statusArr = array(1=>'OPEN',2=>'CONVERTED',3=>'LOST'); 
               foreach($statusArr as $k => $v){ ?>
    <option value="<?php echo $v; ?>" <?php echo ($user_details['ACCESS_LEVEL'] == $k) ? 'selected' : '' ?>><?php echo $v; ?></option>;
                   
            <?php   }
         ?>      
            </select></td></tr>
    <input type="hidden" value="add" name="lead_task" />
   
    
    <tr><td> Delivery Date</td><td><input onfocus="get_calender(this.id);" type="text" name="lead_devivery_date" id="lead_devivery_date" value="" class="require "  /></td></tr>
    <tr><td>Remarks</td><td><textarea name="lead_remarks" id="lead_remarks" class="require "></textarea> </td></tr>
    <tr><td colspan="2" align="center"><input type="submit" name="lead_button" id="lead_button" value="Add Lead"  /></td></tr>
    </table>
</form>
<?php } ?>
 


<?php /*
<script src="js/jquery.sumoselect.min.js"></script>
        <link href="css/sumoselect.css" rel="stylesheet" />
<script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('#stand_id').SumoSelect();
            
        });
    </script>
  */  ?>