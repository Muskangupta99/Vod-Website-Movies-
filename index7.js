
$('#form1').on('submit', function (event){
	event.preventDefault();
	var datapost = $(this).serializeArray();
	$.ajax({
		url:"signup.php",
		type:"POST",
		data: datapost,
		success: function(data){
			if(data){
				$("#s1").html(data);
				window.location="index.php";
				
			}
		},
		error: function(){
			$("#s1").html("<div class='alert alert-warning'>Cannot connect to signup.php</div>")
		}
	});
	
	
	
});
 

$('#loginform').on('submit', function (event){
	event.preventDefault();
	var datapost = $(this).serializeArray();
	$.ajax({
		url:"login.php",
		type:"POST",
		data: datapost,
		datatype:"json",
		success: function(data){
			  if(data == "success"){
                alert("You are logged in");
               
				
            }else{
                $("#loginmessage").html(data);   
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }

	});
	
	
	
});

$('#searchform').on('submit', function (event){
	event.preventDefault();
	var datapost = $(this).serializeArray();
	$.ajax({
		url:"movie.php",
		type:"POST",
		data: datapost,
		success: function(data){
			  if(data){
				  $("#searchmessage").html(data);
                //alert("Your search results");
				//window.location = "mainpageloggedin.php";
            }else{
                  alert("Couldn't find search results");
            }
        },
        error: function(){
             alert("Ajax call unsuccessful");
            
        }

	});
	
	
	
});
$(document).ready(function(){
	$('#valuesearch').keyup(function(){
		var txt=$(this).val();
		if(txt !=''){
		alert("Type in something!");
		}
		else{
			$('#searchmessage').html('');
		$.ajax({
		url:"movie.php",
		type:"POST",
		data:{search:txt},
		dataType:"text",
		success: function(data){
			  if(data){
			  $('#searchmessage').html(data);
            }else{
                alert("couldn't be searched");
            }
		}
        ,
        error: function(){
            $("#searchmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }

	});
		}
	});
	$('#genresearch').on('change', function() {
   	var txt=$('#genresearch').val();
		alert(txt+" genre");
		if(txt=="All"){
			alert("Scroll down to view all the Movies!");
		}
		else{
			//$('#searchmessage').html('');
			//$('#searchmessage').html('');
		$.ajax({
		url:"moviegenre.php",
		type:"GET",
		data:{id:txt},
		success: function(data){
			  if(data){
				  alert("Success");
			  $('#searchmessage').html(data);
            }else{
                alert("couldn't be searched");
            }
		},
        error: function(){
            $("#searchmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
		}
        

	});
		}
		
	});
});
/*$('#form2').on('submit', function (event){
	event.preventDefault();
	var datapost = $(this).serializeArray();
	alert($('#genresearch').val());
	$.ajax({
		url:"moviegenre.php",
		type:"POST",
		data: datapost,
		success: function(data){
			  if(data){
				  $("#searchmessage").html(data);
                //alert("Your search results");
				//window.location = "mainpageloggedin.php";
            }else{
                  alert("Couldn't find search results");
            }
        },
        error: function(){
             alert("Ajax call unsuccessful");
            
        }

	});
	
	
	
});*/
  
