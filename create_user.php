<?php
include_once 'client-inc.php';
$row=get_stands_with_outlet();
if(isset($_REQUEST['id'])){
   $user_details = get_user_by_id($_REQUEST['id']);
  // print_r($user_details);
   
}
?>

<?php if(isset($_REQUEST['id'])){ ?>

<form action="" method="post" id="user_sign_up_form" onsubmit="return validate(this);"><table> 
           
    <tr><td>Assign Stands*</td><td> <select name="stand_id[]" style="width: 200px;" id="stand_id" class="require" multiple="multiple">
                <?php foreach($row as $k=>$v){?>
                <optgroup label="<?php echo $k; ?>">
                    <?php foreach($v as $kk => $vv){?>
                    <option value="<?php echo $kk; ?>" <?php echo (in_array($kk,json_decode($user_details['STAND_ID'],true))) ? 'selected' : '';?>>
                    <?php echo $vv['STAND_NAME']; ?>
                    </option>
                    <?php } ?>
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
<form action="" method="post" id="user_sign_up_form" onsubmit="return validate(this);">
    <table> 
        <tr><td colspan="2"><b>Contact Information</b></td></tr>        
        <tr><td>Email*</td><td><input type="text" name="signup_email" class="require" id="signup_email" placeholder="Email Address" /></td></tr>
    <tr><td>Full Name*</td><td><input type="text" name="signup_name" class="require" id="signup_name" placeholder="Full name" /></td></tr>
    <tr><td>Contact Number*</td><td> <input type="text" name="signup_contact" class="require" id="signup_contact" placeholder="Phone number" /></td></tr>
    <tr><td>Assign Stands*</td><td> <select name="stand_id[]" style="width: 200px;" id="stand_id" class="require" multiple="multiple">
                <?php foreach($row as $k=>$v){?>
                <optgroup label="<?php echo $k; ?>">
                    <?php foreach($v as $kk => $vv){?>
                    <option value="<?php echo $kk; ?>">
                    <?php echo $vv['STAND_NAME']; ?>
                    </option>
                    <?php } ?>
                </optgroup>
                <?php } ?>
            </select></td></tr>
    <tr><td>Username*</td><td><input type="text" name="signup_user" class="require" id="signup_user" placeholder="Username" /></td></tr>
    <tr><td>Password*</td><td><input type="password" name="signup_upass" class="require" id="signup_upass" placeholder="Password" /></td></tr>
    <tr><td>User Type*</td><td><select id="user_level" name="user_level" class="require">
                <option value="">Select User Type</option>
                <option value="1">Manager</option>
                <option value="2">Sale</option>
                <option value="3">Telecaller</option>
            </select></td></tr>
    <input type="hidden" value="add" name="user_task" />
    <tr><td colspan="2" align="center"><input type="submit" name="signup_button" id="signup_button" value="Sign Up"  /></td></tr>
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