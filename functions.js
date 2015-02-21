function delete_outlet(id,name){
    
    if(confirm("Are you sure ! you want to delete Outlet named "+name)){
    $.post('delete_outlet.php',{ 
        id : id
        }  , function(data,status){
                if(status == 'success'){
                location.href='dashboard.php';
            }
                
            });
}
}

function delete_stand(id,name){
    
    if(confirm("Are you sure ! you want to delete Stand named "+name)){
    $.post('delete_stand.php',{ 
        id : id
        }  , function(data,status){
                if(status == 'success'){
                location.href='dashboard.php';
            }
                
            });
}
}

function delete_user(id,name){
    
    if(confirm("Are you sure ! you want to delete User named "+name)){
    $.post('delete_user.php',{ 
        id : id
        }  , function(data,status){
                if(status == 'success'){
                location.href='dashboard.php';
            }
                
            });
}
}

function delete_product(id,name){
    
    if(confirm("Are you sure ! you want to delete Product named "+name)){
    $.post('delete_product.php',{ 
        id : id
        }  , function(data,status){
                if(status == 'success'){
                location.href='dashboard.php';
            }
                
            });
}
}

function delete_lead(id,name){
    
    if(confirm("Are you sure ! you want to delete Lead Assign to "+name)){
    $.post('delete_lead.php',{ 
        id : id
        }  , function(data,status){
                if(status == 'success'){
                location.href='dashboard.php';
            }
                
            });
}
}
function validate(form){
    var a = form.elements.length;
    for(var i=0;i<a-1;i++){
       if(form.elements[i].getAttribute("class") == 'require') 
       {
          if(form.elements[i].value ==''){
              var e = form.elements[i];
              var X = $(e).position();
              var top = X.top-15;
              var left = X.left+100;
              $('<div class="valid_err"></div>').text('This is a required field')
              .css({'position':'absolute','top':top+'px','left':left+'px','width':'150px','height':'10px','padding':'10px','background-color':'#f00','border-radius':'5px','border':'2px solid #eee','font-size':'10px','font-weight':'bolder','color':'#fff'})
              .insertAfter(e);
              $(e).focus();
              setTimeout(function(){ $('.valid_err').detach()},5000);
             return false;
          }
           
       }else{ continue ;}
       
    }
    
}

function get_calender(id){ 
    //$('#'+id).delegate('input#'+id,'click',function(){alert('yes you clicked here');});
    $('.datepick-popup').css({'z-index':'9999'});
    $('#'+id).datepick({dateFormat: 'yyyy-mm-dd'});
}
function add_edit_outlet(form){
    if(validate(form) != false){  
     
    var form_id = $(form).attr("id"); 
    var str = $('#' + form_id).serialize();
    //alert(str);
    $.ajax({
        
        url     : 'add_edit_outlet.php',
        data    : {str : str},
        type    : 'POST',
        success : function(result){ 
                   //alert(result);
                   $('#outlets').empty().html(result);
                   $('<div class="success_msg" >Operation Success</div>')
                   .css({'font-size':'11px','color':'#fff','background-color':'	#20B2AA','padding':'5px','width':'150px'})
                   .insertBefore(form);
                   $('input#outlet_name').val('');
                   setTimeout(function(){ $('.success_msg').detach();},3000); 
                  // alert(result); 
                     } 
    }); 
   
    }
    
}   

function add_edit_stand(form){
    if(validate(form) != false){  
     
    var form_id = $(form).attr("id"); 
    var str = $('#' + form_id).serialize();
    //alert(str);
    $.ajax({
        
        url     : 'add_edit_stand.php',
        data    : {str : str},
        type    : 'POST',
        success : function(result){ 
                   //alert(result);
                   $('#stands').empty().html(result);
                   $('<div class="success_msg" >Operation Success</div>')
                   .css({'font-size':'11px','color':'#fff','background-color':'	#20B2AA','padding':'5px','width':'150px'})
                   .insertBefore(form);
                   $('input#stand_name').val('');
                   setTimeout(function(){ $('.success_msg').detach();},3000); 
                  // alert(result); 
                     } 
    }); 
   
    }
    
}   