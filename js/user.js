$(document).ready(function(){ 
　　$('.user_post').on('click', function(){
            var form = $(this).parent().parent().parent();
            var inputs = form.serializeObject();
            $.ajax({  
                type: "POST",  
                url:  jsui.uri+'user/reg.php',  
                data: inputs,  
                dataType: 'json',
                success: function(data){  
                    // console.log( data )
					//alert(data);
					//location.href ="./";
					//logtips(data);

                    if( data.msg ){
                       // logtips(data.msg);
					   alert(data.msg);
                    }

                    if( data.error ){
						//logtips(data.error);
						alert(data.error);
                        return
                    }

                    if( data.goto ){ location.href = data.goto;}
                    
                }  
            });  
	    })





}); 