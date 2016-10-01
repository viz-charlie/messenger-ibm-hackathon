function click_Stop()
{
var a=document.getElementById("clickStop");
 if (a.value=="STOP"){
	var exit = confirm("Are you sure you want to stop.");
	if (exit == true) {
		a.value = "LOG OUT";
	} else {
		a.value = "STOP";
	}
	
 }else 
	signoutserverfile = "../php/signout.php";
	$.post(signoutserverfile,function(response){
		alert(response);
		window.location="../../index.php";						
	});

}

$(document).ready(function() {
	$('.chattinguser').click(function() {
		var tempserverfile = "../php/temp.php";
		var chatusername = $(this).attr('name');
		var userfullname = this.innerHTML
		
		document.getElementById("currentchatuser").innerHTML = userfullname;
		document.getElementById("chatlog").innerHTML = "You are talking to "+userfullname;
		if(chatusername && userfullname){			
			$.post(tempserverfile,{chatusername,userfullname},function(response){
					$("#chatlog").load('displayconversation.php');
					setInterval(function(){
						$("#chatlog").load('displayconversation.php');
					},500);						
			});
			
		}else{
		}
		
    });

});


$(document).ready(function(){
	var conversationserverfile = "../php/conversation.php";
	$('#clickSend').click(function(){
		var currentuser = $.trim(document.getElementById("currentchatuser").innerHTML);
		if (currentuser.length == 0){
			alert("Select User.");
		}else if(currentuser.length > 0){
			var messege = $.trim($("textarea").val());
			if (messege != "") {
				$.post(conversationserverfile,{messege},function(response){
						$("#chatlog").load("displayconversation.php");
						$("#entermsg").val('');
				});
			}else{
				alert("Enter Messege First.");
			}
		} 
	});
}); 	
	





