function open_panel()
{
slideOut();
var a=document.getElementById("sidebar");
var b=document.getElementById("container");
var c =document.getElementsByTagName("img");
a.setAttribute("id","sidebar1");
c.onclick = null ;
//a.setAttribute("onclick","close_panel()");
b.setAttribute("id","container1");
c = document.getElementById("statusbar");
c.setAttribute("id","statusbar1");
}

function slideOut()
{
	var slidingDiv = document.getElementById("slider");
	var stopPosition = 0;
	
	if (parseInt(slidingDiv.style.right) < stopPosition )
	{
		slidingDiv.style.right = parseInt(slidingDiv.style.right) + 10 + "px";
		setTimeout(slideOut, 1);	
	}
}


function close_panel()
{
slideIn();
a=document.getElementById("sidebar1");
a.setAttribute("id","sidebar");
//a.setAttribute("onclick","open_panel()");
b = document.getElementById("container1");
b.setAttribute("id","container");
c = document.getElementById("statusbar1");
c.setAttribute("id","statusbar");
}

function slideIn()
{
	var slidingDiv = document.getElementById("slider");
	var stopPosition = -300;
	
	if (parseInt(slidingDiv.style.right) > stopPosition )
	{
		slidingDiv.style.right = parseInt(slidingDiv.style.right) - 10 + "px";
		setTimeout(slideIn, 1);	
	}
}



jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
});



/* 	$(document).ready(function(){
		$('#settings').click(function(){
			
		});
	}); */