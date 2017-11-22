function bigger(){
	var textbox= document.getElementById("textbox");
	if(textbox.style.fontSize==""){
		textbox.style.fontSize="12pt";
	}
	else{
		var size=parseInt(textbox.style.fontSize);
		size=size+2;
		textbox.style.fontSize=size+"pt";
	}
}

function autobigger(){
	setInterval(bigger,500);
}


function bold(){
	var bling=document .getElementById("bling");
	var textbox= document.getElementById("textbox");
	var body=document.getElementById("body");
	if(bling.checked==true){
		textbox.style.fontWeight="bold";
		textbox.style.color="green";
		textbox.style.textDecorationLine="underline";
		body.style.backgroundImage="url('http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg')";
	}
	else{
		textbox.style.fontWeight="normal";
		textbox.style.color="black";
		textbox.style.textDecorationLine="none";
		body.style.backgroundImage="none";
	}
}


function uppercase(){
	var textbox= document.getElementById("textbox").value;
	var upper=textbox.toUpperCase();

	var izzle=upper.split(".");
	izzle=izzle.join("-izzle.");
	document.getElementById("textbox").value=izzle;

}

function fivelenword(){
	var textbox=document.getElementById("textbox").value;
	var a=textbox.split(" ");
	var len=a.length;
	console.log(len);
	for (i=0;i<len;i++){
		console.log(a[i].length);
		if(a[i].length>=5)
			a[i]="Malkovich";
	}
	a=a.join(" ");
	document.getElementById("textbox").value=a;

}

function button(){
	document.getElementById("biginterval").onclick=autobigger;
	document.getElementById("bling").onchange=bold;
	document.getElementById("upper").onclick=uppercase;
	document.getElementById("malkovich").onclick=fivelenword;

}



window.onload=button;