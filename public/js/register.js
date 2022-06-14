$(document).ready(function(){
    //var $registerForm = $('#register');
        
   
        $('#register').validate({
            rules:{
                firstname:{
                    required:true,
                    lettersonly:true
                },
                lastname:{
                    required:true,
                    lettersonly:true
                    //notEqual:"#f"
                },
                mail:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true,
                    number:true,
                    //phoneUS:true
                    minlength:10,
                    maxlength:10
                }

            },
            messages:{
                firstname:{
                    required:'firstname required',
                    lettersonly:'please enter letters only'
                },
                lastname:{
                    required:'lastname required',
                    lettersonly:'please enter letters only',
                    //notEqual:'lastname should not match with firstname'
                },
                mail:{
                    required:'mail required',
                    email:'Please enter valid email'
                },
                phone:{
                    required:'phone required',
                    number:'enter numbers only',
                    phoneUS:'enter 10 digit number'
                }
            }
        });
    

});
$(document).ready(function(){
    //var $registerForm = $('#register');
        
   
        $('#register1').validate({
            rules:{
                firstname:{
                    required:true,
                    lettersonly:true
                },
                lastname:{
                    required:true,
                    lettersonly:true
                    //notEqual:"#f"
                },
                mail:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true,
                    number:true,
                    //phoneUS:true
                    minlength:10,
                    maxlength:10
                }

            },
            messages:{
                firstname:{
                    required:'firstname required',
                    lettersonly:'please enter letters only'
                },
                lastname:{
                    required:'lastname required',
                    lettersonly:'please enter letters only',
                    //notEqual:'lastname should not match with firstname'
                },
                mail:{
                    required:'mail required',
                    email:'Please enter valid email'
                },
                phone:{
                    required:'phone required',
                    number:'enter numbers only',
                    phoneUS:'enter 10 digit number'
                }
            }
        });
    

});



