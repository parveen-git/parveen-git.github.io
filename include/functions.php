<?php
function esc_str($str){
     return mysql_real_escape_string(trim($str));
    }
 function authenticate($user=null,$pass=null){
     
      $query = " SELECT * FROM " . USERS . " WHERE `USERNAME` = '" . esc_str($user) . "' AND `PASSWORD` = MD5('" . esc_str($pass) . "')"
             . " AND `STATUS` = '1' ";
     $rs = mysql_query($query) or die(mysql_error() . "error in authenticate function ");
     $row =  mysql_fetch_assoc($rs,MYSQL_ASSOC);
     if(mysql_num_rows($rs) > 0)
     {
         return $row;
     }else{
         return false;
         
     } 
 }
 function add_edit_outlet($arr = array()){
     $action = $arr['outlet_task'];
     $query = ($action == 'add') ? " INSERT INTO " . OUTLETS . " SET `NAME` = '" .  ucfirst(esc_str($arr['outlet_name'])) . "', STATUS='1' "
     : " UPDATE " . OUTLETS . " SET `NAME` = '" .  ucfirst(esc_str($arr['outlet_name'])) . "', STATUS='1' WHERE `ID`='". esc_str($arr['outlet_id']) ."' ";
     mysql_query($query) or die(mysql_error() . "error in add_edit_outlet function ");
     return true;
 }
 function get_outlet(){
     
     $query = " SELECT * FROM " . OUTLETS ." WHERE STATUS='1'";
     $rs = mysql_query($query) or die(mysql_error() . "error in get_outlet function ");
     
     if(mysql_num_rows($rs) > 0)
     { $i = 0; $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row[$i] = $row1; $i++;
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 function get_outlet_by_id($id){
     
     $query = " SELECT * FROM " . OUTLETS ." WHERE STATUS='1' AND `ID`='" . esc_str($id) . "'";
     $rs = mysql_query($query) or die(mysql_error() . "error in get_outlet_by_id function ");
     
     if(mysql_num_rows($rs) > 0)
     {
       $row =  mysql_fetch_assoc($rs,MYSQL_ASSOC);
       return $row;
     }else{
         return false;
         
     }
 }
 function delete_outlet($id=null){
  $standsArr = array();
  $standsArr = get_stands_for_this_outlet($id);
  if(delete_stands_from_user_table($standsArr)){
  $query1 = " DELETE FROM " . STANDS ." WHERE `OUTLET_ID`='" . esc_str($id) ."'";
   mysql_query($query1) or die(mysql_error() . "error in delete_outlet function" );   
     
  $query = " DELETE FROM " . OUTLETS ." WHERE `ID`='" . esc_str($id) ."'";
   mysql_query($query) or die(mysql_error() . "error in delete_outlet function" );
     }
   }
 function delete_stands_from_user_table($standsArr = array()){
   $query = " SELECT ID, STAND_ID FROM " . USERS . " WHERE ACCESS_LEVEL != '0' ";
   $rs = mysql_query($query) or die(mysql_error() . "error in delete_stands_from_user_table function ");
   while($row = mysql_fetch_assoc($rs,MYSQL_ASSOC)){
       update_users_stands($row['ID'],array_diff(json_decode($row['STAND_ID'],true), $standsArr));
   }
   return true;
   }
 function update_users_stands($id = NULL, $stand_id = array()){
     $query = " UPDATE " . USERS . " SET STAND_ID = '" . json_encode($stand_id) . "' WHERE ID = '" . esc_str($id) . "'";
     mysql_query($query) or die(mysql_error() . "error in update_users_stands function ");
     
 }
 function add_edit_stand($arr = array()){
     $action = $arr['stand_task'];
     $query = ($action == 'add') ? " INSERT INTO " . STANDS . " SET `NAME` = '" .  ucfirst(esc_str($arr['stand_name'])) . "', `STATUS`='1', `OUTLET_ID`='" . esc_str($arr['outlet_id']) . "'  "
     : " UPDATE " . STANDS . " SET `NAME` = '" .  ucfirst(esc_str($arr['stand_name'])) . "', STATUS='1', `OUTLET_ID`='" .  esc_str($arr['outlet_id']) . "' WHERE `ID`='". $arr['stand_id'] ."' ";
     mysql_query($query) or die(mysql_error() . "error in add_edit_stand function ");
     return true;
    
 }
 
 function get_stands(){
     
     $query = " SELECT A.ID AS ID, A.NAME AS NAME, B.NAME AS OUTLET_NAME FROM " . STANDS ." A "
             . " INNER JOIN " . OUTLETS . " B ON A.OUTLET_ID = B.ID WHERE A.STATUS='1'";
     $rs = mysql_query($query) or die(mysql_error() . "error in get_stands function ");
     
     if(mysql_num_rows($rs) > 0)
     { $i = 0; $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row[$i] = $row1; $i++;
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 function get_stands_for_this_outlet($id = NULL){
     $query = " SELECT ID FROM " . STANDS ." WHERE `OUTLET_ID`='" . esc_str($id) . "'";
     $rs = mysql_query($query) or die("mysql_error()" . "error in get_stands_for_this_outlet function ");
     $standsArr = array();
     if(mysql_num_rows($rs) > 0)
     {
       while($row =  mysql_fetch_assoc($rs,MYSQL_ASSOC)){
       $standsArr[] = $row['ID'];
           
       }
       }else{
         return false;
         
     }
   return $standsArr;
 }
 function get_stands_with_outlet(){
     
     $query = " SELECT A.ID AS STAND_ID, A.NAME AS STAND_NAME, B.NAME AS OUTLET_NAME  FROM " . STANDS ." A INNER JOIN " . OUTLETS . " B ON A.OUTLET_ID = B.ID WHERE A.STATUS='1' AND B.STATUS='1'";
     $rs = mysql_query($query) or die(mysql_error() . "error in get_stands_with_outlet function ");
     
     if(mysql_num_rows($rs) > 0)
     {  $row = array(); 
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row[$row1['OUTLET_NAME']][$row1['STAND_ID']] = array('STAND_NAME' => $row1['STAND_NAME']);
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 
 function get_stand_by_id($id){
     
     $query = " SELECT * FROM " . STANDS ." WHERE STATUS='1' AND `ID`='" . esc_str($id) . "'";
     $rs = mysql_query($query) or die("mysql_error()" . "error in get_stand_by_id function ");
     
     if(mysql_num_rows($rs) > 0)
     {
       $row =  mysql_fetch_assoc($rs,MYSQL_ASSOC);
       return $row;
     }else{
         return false;
         
     }
 }
 function delete_stand($id=null){
   $query = " DELETE FROM " . STANDS ." WHERE `ID`='" . esc_str($id) ."'";
   mysql_query($query) or die(mysql_error() . "error in delete_stand function" );
 }
 function delete_user($id=null){
     $query = " DELETE FROM " . USERS ." WHERE `ID`='" . esc_str($id) ."'";
   mysql_query($query) or die(mysql_error() . "error in delete_user function" );
 }
 function delete_product($id=null){
     $query = " DELETE FROM " . PRODUCTS ." WHERE `ID`='" . esc_str($id) ."'";
   mysql_query($query) or die(mysql_error() . "error in delete_product function" );
 }
 function delete_lead($id=NULL){
  $query = " DELETE FROM " . LEADS ." WHERE `ID`='" . esc_str($id) ."'";
   mysql_query($query) or die(mysql_error() . "error in delete_lead function" );     
 }
 function add_edit_user($arr=array()){
     $action = $arr['user_task'];
     $id = $arr['user_id'];
     $query = ($action == 'add')
     ? " INSERT INTO " . USERS . " SET "
          . " `NAME`                = '" .  ucfirst(esc_str($arr['signup_name'])) . "',"
          . " `EMAIL`               = '" .  ucfirst(esc_str($arr['signup_email'])) . "',"
          . " `MOBILE`              = '" .  ucfirst(esc_str($arr['signup_contact'])) . "',"
          . " `STAND_ID`            = '" .  ucfirst(esc_str(json_encode($arr['stand_id']))) . "',"
          . " `USERNAME`            = '" .  ucfirst(esc_str($arr['signup_user'])) . "',"
          . " `PASSWORD`            = MD5('" .  ucfirst(esc_str($arr['signup_upass'])) . "'),"
          . " `ACCESS_LEVEL`        = '" .  ucfirst(esc_str($arr['user_level'])) . "',"
          . " `STATUS`              = '1'"
          
     : " UPDATE " . USERS . " SET  "
          . " `STAND_ID`            = '" .  ucfirst(esc_str(json_encode($arr['stand_id']))) . "',"
          . " `ACCESS_LEVEL`        = '" .  ucfirst(esc_str($arr['user_level'])) . "'"
          . " WHERE `ID`            ='". $id ."' ";
     mysql_query($query) or die(mysql_error() . "error in add_edit_user function ");
 }
 function get_all_users(){
     
     $query = " SELECT * FROM " . USERS . " WHERE STATUS='1'";
    $rs =  mysql_query($query) or die(mysql_error() . "error in get_all_users function ");
     if(mysql_num_rows($rs) > 0)
     { $i = 0; $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row[$i] = $row1; $i++;
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 
 function get_user_by_id($id = NULL){
     
    $query = " SELECT * FROM " . USERS . " WHERE STATUS='1' AND ID = '" . esc_str($id) . "'";
    $rs =  mysql_query($query) or die(mysql_error() . "error in get_user_by_id function ");
     if(mysql_num_rows($rs) > 0)
     {  $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row = $row1; 
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 
 function add_edit_product($arr=array()){
     $action = $arr['product_task'];
     $id = $arr['product_id'];
     $query = ($action == 'add')
     ? " INSERT INTO " . PRODUCTS . " SET "
          . " `NAME`                = '" .  ucfirst(esc_str($arr['product_name'])) . "',"
          . " `PRICE_ON_ROAD`       = '" .  ucfirst(esc_str($arr['road_price'])) . "',"
          . " `PRICE_EX_SHOWROOM`   = '" .  ucfirst(esc_str($arr['exshowroom_price'])) . "',"
          . " `STATUS`              = '1'"
          
     : " UPDATE " . PRODUCTS . " SET  "
          . " `NAME`                = '" .  ucfirst(esc_str($arr['product_name'])) . "',"
          . " `PRICE_ON_ROAD`       = '" .  ucfirst(esc_str($arr['road_price'])) . "',"
          . " `PRICE_EX_SHOWROOM`   = '" .  ucfirst(esc_str($arr['exshowroom_price'])) . "'"
          . " WHERE `ID`            ='". $id ."' ";
     mysql_query($query) or die(mysql_error() . "error in add_edit_product function ");
 }
 
  function add_edit_lead($arr=array()){
     $action = $arr['lead_task'];
     $id = $arr['lead_id'];
     ECHO $query = ($action == 'add')
     ? " INSERT INTO " . LEADS . " SET "
          . " `STAND_ID`                   = '" .  ucfirst(esc_str($arr['stand_id'])) . "',"
          . " `PRODUCT_ID`                 = '" .  ucfirst(esc_str($arr['product_id'])) . "',"
          . " `ASSIGNED_TO`                = '" .  ucfirst(esc_str($arr['lead_owner'])) . "',"
          . " `GENERATED_BY`               = '" .  ucfirst(esc_str($arr['lead_generator'])) . "',"
          . " `LEVEL`                      = '" .  ucfirst(esc_str($arr['lead_level'])) . "',"
          . " `DATE`                       = NOW(), "
          . " `EXPECTED_DATE_OF_DELIVERY`  = '" .  ucfirst(esc_str($arr['lead_devivery_date'])) . "',"
          . " `REMARKS`                    = '" .  ucfirst(esc_str($arr['lead_remarks'])) . "',"
          . " `STATUS`              = '1'"
          
     : " UPDATE " . LEADS . " SET  "
          . " `LEVEL`                = '" .  ucfirst(esc_str($arr['product_name'])) . "',"
          . " `REMARKS`   = '" .  ucfirst(esc_str($arr['exshowroom_price'])) . "'"
          . " WHERE `ID`            ='". $id ."' ";
     mysql_query($query) or die(mysql_error() . "error in add_edit_lead function ");
 }
 function get_all_leads_for_this_user($id=NULL){
     $level =$_SESSION['access_level'];
     $all_lead_accesser_Arr = array(0,3);
     $query = (in_array($level,$all_lead_accesser_Arr))
           ? " SELECT A.ID AS LEAD_ID,A.REMARKS AS LEAD_REMARKS,"
             . " A.LEVEL AS LEAD_LEVEL,A.STATUS AS LEAD_STATUS,A.DATE AS LEAD_DATE,A.EXPECTED_DATE_OF_DELIVERY AS DELIVERY_DATE,"
             . " B.NAME AS PRODUCT_NAME,"
             . " C.NAME AS LEAD_OWNER,E.NAME AS LEAD_GENERATOR, D.NAME AS LEAD_STAND"
             . " FROM " . LEADS . " A "
             . " INNER JOIN " . PRODUCTS . " B ON A.PRODUCT_ID = B.ID "
             . " INNER JOIN " . USERS . " C ON C.ID = A.ASSIGNED_TO "
             . " INNER JOIN " . STANDS . " D ON D.ID = A.STAND_ID "
             . " INNER JOIN " . USERS . " E ON E.ID = A.GENERATED_BY "
             . "WHERE 1 ORDER BY LEVEL DESC "
             
           : " SELECT A.ID AS LEAD_ID,A.REMARKS AS LEAD_REMARKS,"
             . " A.LEVEL AS LEAD_LEVEL,A.STATUS AS LEAD_STATUS,A.DATE AS LEAD_DATE,A.EXPECTED_DATE_OF_DELIVERY AS DELIVERY_DATE,"
             . " B.NAME AS PRODUCT_NAME,"
             . " C.NAME AS LEAD_OWNER,E.NAME AS LEAD_GENERATOR, D.NAME AS LEAD_STAND"
             . " FROM " . LEADS . " A "
             . " INNER JOIN " . PRODUCTS . " B ON A.PRODUCT_ID = B.ID "
             . " INNER JOIN " . USERS . " C ON C.ID = A.ASSIGNED_TO "
             . " INNER JOIN " . STANDS . " D ON D.ID = A.STAND_ID "
             . " INNER JOIN " . USERS . " E ON E.ID = A.GENERATED_BY "
             . " WHERE  A.ASSIGNED_TO = '" . esc_str($id) . "'";
     
     $rs = mysql_query($query) or die(mysql_error() . "error in get_all_leads_for_this_user function ");
     if(mysql_num_rows($rs) > 0)
     { $i = 0; $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row[$i] = $row1; $i++;
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 
 function get_all_products(){
     $query = " SELECT * FROM " . PRODUCTS . " WHERE STATUS='1'";
     $rs = mysql_query($query) or die(mysql_error() . "error in get_all_products function ");
     if(mysql_num_rows($rs) > 0)
     { $i = 0; $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row[$i] = $row1; $i++;
            
         }
         return $row;
     }else{
         return false;
         
     }
 }
 function product_by_id($id = NULL){
  $query = " SELECT * FROM " . PRODUCTS . " WHERE STATUS='1' AND ID = '" . esc_str($id) ."'";
     $rs = mysql_query($query) or die(mysql_error() . "error in product_by_id function ");
     if(mysql_num_rows($rs) > 0)
     {  $row = array();
         while($row1 =  mysql_fetch_assoc($rs,MYSQL_ASSOC))
         {
             $row = $row1; 
            
         }
         return $row;
     }else{
         return false;
         
     }   
 }
?>

