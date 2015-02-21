<?php
include_once 'client-inc.php';
include_once 'templates/header.php';
if(isset($_REQUEST['user_button'])){
    
    extract($_REQUEST);
    if($row = authenticate($uname,$upass))
        {
        $_SESSION['id']           =  $row['ID'];
        $_SESSION['name']         =  $row['NAME'];
        $_SESSION['username']     =  $row['USERNAME'];
        $_SESSION['email']        =  $row['EMAIL'];
        $_SESSION['mobile']       =  $row['MOBILE'];
        $_SESSION['access_level'] =  $row['ACCESS_LEVEL'];
        header('Location:dashboard.php');
        }else{
           header('Location:index.php?err=wrong log in credentials');             
        }
    
}
?>
<article id="login_form_article">
    <form action="" method="post" id="user_login_form" onsubmit="return validate(this)" >
        <table>
            <tr><td><input type="text" name="uname" id="uname" class="require" placeholder="Username" /></td></tr>
   <tr><td> <input type="password" name="upass" id="upass" class="require" placeholder="Password" /></td></tr>
    <tr><td  align="center"><input type="submit" name="user_button" id="user_button" value="Log In"  /></td></tr>
   <tr><td align="center"> <?php echo (isset($_REQUEST['err'])) ? '<tr><td colspan="2" align="center" id="err_tr">' . $_REQUEST['err'] . '</td></tr>'
           : ''; ?> </td></tr>
        </table>
</form>   
</article>    

<?php 
include_once 'templates/footer.php';
?>
<style>
    #login_form_article{margin: 200px auto; padding: 10px; border: 3px #666666 solid; border-radius: 5px; width: 30%; vertical-align: middle; }
    #err_tr{ color: #f00; font-size: 10px;}
</style>