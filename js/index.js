$(document).ready( function(){
	
	
	
	setTimeout( function(){
		$('#op_succ').fadeOut().empty();
		
	},3000);
	
	
	
	
	$('input[type=radio][name=options]').change(function(ev){
		ev.preventDefault();
		let value = $(this).val();
		
		$('.update_div').css('display','none');
		
		if(value==='picture'){
			
			$('#update_pix_div').css('display','block');
			
		}else if(value==='username'){
			
			$('#update_username_div').css('display','block');
			
		}else if(value==='email'){
			
			$('#update_email_div').css('display','block');
			
		}else if(value==='password'){
			
			$('#update_password_div').css('display','block');
		}else if(value==='mobile'){
			
			$('#update_mobile_div').css('display','block');
		}else if(value==='firstname'){
			
			$('#update_firstname_div').css('display','block');
		}else if(value==='lastname'){
			
			$('#update_lastname_div').css('display','block');
		}
	});

	
	// submit post

	$('.rate-user').click( function(ev){
		ev.preventDefault();
		
		
		let $this = $(this);
		
		
		var user_id =  $('#user').val();
		var rate = $this.children('.star').val();
		
		
		
		
		
		$.post('add_to_rate.php',{user_id:user_id,rate:rate},function(result){

			//alert(result);

		});
		
		
		
	});
	
	
	$(document).on('click','.gallery_remove', function(ev){
		ev.preventDefault();
		
		//alert('here');
		
		let $this = $(this);
		
		let id = $this.children('.pix_id').val();
		
		
		
	
		
		$.get('deletgalleryimage.php',{id:id},function(res){
			
			if($.trim(res) === "1"){
				
				
				
				$this.parent('.gallery_div').remove();
				//alert($(this).val());
				
				
			}
		});
	});


	$('#submit_post').click( function(ev){
		ev.preventDefault();
		var title =  $('#title').val();
		var message = $('#message').val();
		var category = $('#category').val();
		
		if(title && message && category){

		$.post('post_message.php',{title:title,message:message,category:category},function(result){

			window.location = "home.php?successMsg=a";

		});
		
		}else{
			
			$('#msg_post').html("<b>Fill all fields.<b>");
		}
		
	});
	
	$('.add_to_fav_btn').click( function(ev){
		//ev.preventDefault();
		//alert('hi');
		
		let $this = $(this);
		
	
		let post_id = $(this).children('.post_to_fav').val();

		//alert(post_id);

	

		$.post('add_to_fav.php',{post_id:post_id},function(result){


		
		
			if($.trim(result) === "1"){
				$this.addClass("fa-red");
				//$("tr .fav").append("<td>hello</td>");
				//$("tr .fav").append("<td class='table-img'><img src='imageview.php?user=user_id' alt='usericon' class='w3-round' style='width: 50px; height: 50px'></td><td class='table-text'>'title'</td><td class='table-text'>'message'</td><td class='table-text'><a href='home.php?post_id=post_id']'>View</a></td>");
			
			}
			else{
				$this.removeClass("fa-red");
			
			}

		});
		
		

	
	});


	$('.reply').click( function(ev){
		ev.preventDefault();
		let post_id = $(this).children('.post_to_fav').val();
		$('#post_id_field').val(post_id);
		
		
	});


















	$('#post_reply').click( function(ev){
		ev.preventDefault();
		
		
		var fd = new FormData();

		
        var files = $('#reply_file')[0].files[0];

        var title =  $('#reply_title').val();
		var message = $('#reply_message').val();
		var post_id_field = $('#post_id_field').val();
		
        
		//alert(post_id_field);
		
		
        
  
        fd.append('file',files);

        fd.append('title',title);

        fd.append('message',message);

        fd.append('post_id_field', post_id_field);
		
		
		
		
        $.ajax({
            url: 'post_reply.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){

            	
                
            },
        });
		





});
		

      


















	$('.reply_message').click( function(ev){
		ev.preventDefault();
		let user_id = $(this).children('.message_to_user').val();

		$('#user_id_field').val(user_id);
		
		
	});

	$('#post_message').click( function(ev){
		ev.preventDefault();
		var title =  $('#title').val();
		var message = $('#message').val();
		var user_id = $('#user_id_field').val();

		
		//alert(user_id);
		
		$.post('reply_message.php',{user_id:user_id,title:title,message:message},function(result){

			//alert(result);

		});
		
	});


	$('#update_username').click( function(ev){
		ev.preventDefault();
		$('#msg_username').html("");
		var username = $('#username').val();
		$.post('update_username.php',{username:username},function(result){

			//trim the value of result

			if(result == 1)
				$('#msg_username').html("Update successful");
			else
				$('#msg_username').html("Update unsuccessful") ;

		});
		
	});


	$('#update_email').click( function(ev){
		ev.preventDefault();
		$('#msg_email').html("");
		var email = $('#email').val();
		$.post('update_email.php',{email:email},function(result){


			//trim the value of result
			
			

			
			if(result == 1)
				$('#msg_email').html("Update successful");
			else
				$('#msg_email').html("Update unsuccessful") ;
			
			
		

		});
		
	});



	$('#update_password').click( function(ev){
		ev.preventDefault();
		$('#msg_password').html("");
		var password = $('#password').val();
		$.post('update_password.php',{password:password},function(result){


			//trim the value of result

			if(result == 1)
				$('#msg_password').html("Update successful");
			else
				$('#msg_password').html("Update unsuccessful") ;

		});
		
	});
	
	$('#update_mobile').click( function(ev){
		ev.preventDefault();
		$('#msg_mobile').html("");
		var mobile = $('#mobile').val();
		$.post('update_mobile.php',{mobile:mobile},function(result){


			//trim the value of result

			if(result == 1)
				$('#msg_mobile').html("Update successful");
			else
				$('#msg_mobile').html("Update unsuccessful") ;

		});
		
	});
	
	$('#update_lastname').click( function(ev){
		ev.preventDefault();
		$('#msg_lastname').html("");
		var lastname = $('#lastname').val();
		$.post('update_lastname.php',{lastname:lastname},function(result){


			//trim the value of result

			if(result == 1)
				$('#msg_lastname').html("Update successful");
			else
				$('#msg_lastname').html("Update unsuccessful") ;

		});
		
	});
	
	$('#update_firstname').click( function(ev){
		ev.preventDefault();
		$('#msg_firstname').html("");
		var firstname = $('#firstname').val();
		$.post('update_firstname.php',{firstname:firstname},function(result){


			//trim the value of result

			if(result == 1)
				$('#msg_firstname').html("Update successful");
			else
				$('#msg_firstname').html("Update unsuccessful") ;

		});
		
	});
	
	
	
	
	
	$('#addtobookmark').on('click', function(ev){
		ev.preventDefault();

		let $this = $(this);
		let $user_id = $('.user_to_add').val();
		
		$.post('add_to_bookmark.php',{user_id:$user_id},function(result){

			

			if($.trim(result) === "1"){
				$this.children(".fa").addClass("fa-red");
			
			}
			else{
				$this.children(".fa").removeClass("fa-red");
			
			}

		});

	
	});


	$('#track').click( function(ev){
		ev.preventDefault();

		let $this = $(this);
		

		$.post('add_to_track.php',{user_id:$('.user_to_add').val()},function(result){

			

			//trim the value of result

			

			if($.trim(result) === "1"){
				$this.children(".fa").addClass("fa-red");
				$('.track_view_page').addClass("fa-red");
			
			}
			else{
				$this.children(".fa").removeClass("fa-red");
				$('.track_view_page').removeClass("fa-red");
			
			}

		});

	
	});


	

	$('.track_view_page').click( function(ev){
		ev.preventDefault();
	
		let $this = $(this);
		
		var track_id = $(this).children('.user_to_add').val();

		$.post('add_to_track.php',{user_id:track_id},function(result){


			if($.trim(result) === "1"){
				$this.addClass("fa-red");
				$("#i_track").addClass("fa-red");
			
			}
			else{
				$this.removeClass("fa-red");
				$("#i_track").removeClass("fa-red");
			
			}
			
			//alert(result);

		});

	
	});

	
	

	
	

	

	$('.recom').click( function(ev){
		ev.preventDefault();


	var to_id = $('.user_to_add').val();
	var from_id = $(this).siblings('.to_id').val();
		let $this = $(this);
		

		$.post('add_to_recommendation.php',{to_id:to_id,from_id:from_id},function(result){

			//alert(result);

			if($.trim(result) === "1"){
				$this.addClass("fa-red");
			
			}
			else{
				$this.removeClass("fa-red");
			
			}

		});

		

	
	});


	//uploadDp


	

	$('#uploadDpBtn').click( function(ev){
		ev.preventDefault();


		
		

		var fd = new FormData();
        var files = $('#file')[0].files[0];

        
  
        fd.append('file',files);
		
		

        $.ajax({
            url: 'update_dp.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){

            	
                if(response != 0){
					
                    window.location = 'home.php';
                }else{
                    alert('file not uploaded');
                }
            },
        });
		

	
	});



	


	$('#gallery_upload').click( function(ev){
		ev.preventDefault();


	
	//alert('hi');	
		

		let fd = new FormData();
        

        

        let no_of_files = $('#file2')[0].files.length;
        for (var i = 0; i < no_of_files; ++i) {
    		
    		
    		fd.append('file[]', $('#file2')[0].files[i]);
		}


		
  
  
        

        $.ajax({
            url: 'upload_gallery.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){

            	//alert(response);
				
				
                if(response != 0){
					
					let res = JSON.parse(response);
                    
					$.each(res, function(key,value){
						
						let newDiv ="<div class='col-md-4 col-xs-4 col-sm-4 gallery_div' ><button style='position:absolute; right:0px; width:30px; height:30px;' class='gallery_remove'><input type='hidden' class='pix_id' value='"+value+"'><i class='fa fa-times'></i></button><img src='getGalleryImage.php?id="+value+"' alt='gallery' style='margin:0 5px 5px; margin-left:0; width:150px; height:150px;'></div>";
					
						$('.big_div').prepend(newDiv);
						
					});
				}
            },
        });
		

	
	});


	//Next and prev post


	var index = 1 ;
	var num_of_user_post_id = $('#num_of_user_post_id').val() ;
	

	$('#prev_post').click( function(ev){
		
		ev.preventDefault();

			
			
		if(index > 1){
			index --;
			
		}
		
		if(index == num_of_user_post_id ){
			index --;
			
		}
		
	
		if( index > 0){
			//let post_id = $(index--).val();
			
			getPost(index);

		}
		
		
	});


	$('#next_post').click( function(ev){
		
		ev.preventDefault();
		
		if(index === 1){
			index++;
			
		}
		
		
	
		if( index <= num_of_user_post_id ){
			
			
			
			//let post_id = $( ++index).val();
			
			
			getPost(index++);

			

		}
		
		
		
		
		
		
	});


	function getPost(index){

		$.get('getpost.php',{index:index},function(result){

		
			let b = JSON.parse(result);



			$('#post_time').text(b.time);
			$('#post_title').text(b.title);
			$('#post_category').text(b.category);
			$('#post_message').text(b.message);
			$('#user_post_id').val(b.id);
			
			
			



		}); 
	}


	// repost/ edit

	$('#editpost').click( function(ev){

		ev.preventDefault();

		
		$('input#repost_title').val($('#post_title').text());
		$('textarea#repost_message').val($('#post_message').text());
	});



	$('#deletepost').click(
		function(ev){
		
			ev.preventDefault();
			//alert($('#user_post_id').val());
			
			
			$.post('deletepost.php',{id:$('#user_post_id').val()
		},function(result){

			//alert(result);

			});
			
			
	
			if(index === 1){
				//alert('here');
				
				getPost(index);
				
			}
			else {
				getPost(--index);
			}
			
			
			
			num_of_user_post_id-- ;
			
			if(num_of_user_post_id === 0){
				$('.p_post').empty();
			}

		});


	$('#repost').click(
		function(ev){
		
			ev.preventDefault();
			repost(true);

			

		});
	
	$('#edit').click(
		function(ev){
			ev.preventDefault();

			
			repost(false);

		});


	function repost(pState){

		$.post('repost.php',{pState:pState, id:$('#user_post_id').val(),
			title:$('input#repost_title').val(),
			message:$('textarea#repost_message').val(),
			category:$('#post_category').text()
		},function(result){

			window.location = "home.php";

			});

	}


	
});