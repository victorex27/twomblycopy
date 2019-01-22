$(document).ready(function() {
	
	
	
	$('#auto_list').mouseleave( function() { $('#auto_list').hide(); } );
	
	
	
	
	$('#search_bar').on('input', function() {
    
		 $('#auto_list').empty();
		 $('#auto_list').show();
		 
		 
		 let search_value = $(this).val();
		 
		 if(search_value !== ""){
			 
			 
			 
			 
			 $.get('search.php',{username: search_value}, function(result){
			
			
			let user = JSON.parse(result);
			let num_of_users = user.length;
			
		
			
			$.each(user, function (index, value) {
				
  
    
	var newDiv = "<a class='card' style='z-index:100; text-decoration:none; height:80px; ' href='viewprofile.php?user="+value.id+"'><div><img src='imageview.php?user="+value.id+"' style='width:40px; height:40px;'><span>"+value.username+"</span></div></a>";
    $('#auto_list').append(newDiv);
  
});
			
		});
			 
			 
			 
			 
			 
			 
			 
			 
		 }
		 
		
		
	});
	
	

});

