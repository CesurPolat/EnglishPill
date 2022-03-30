function Check(){
	if(document.getElementsByClassName("place")[0].value.toLowerCase() == "am"){
		document.getElementsByClassName("place")[0].style = "border-radius:10px;border:1px solid green;"
	}
	else{
		document.getElementsByClassName("place")[0].style = "border-radius:10px;border:1px solid red;"
	}
	
	if(document.getElementsByClassName("place")[1].value.toLowerCase() == "is"){
		document.getElementsByClassName("place")[1].style = "border-radius:10px;border:1px solid green;"
	}
	else{
		document.getElementsByClassName("place")[1].style = "border-radius:10px;border:1px solid red;"
	}
	
	if(document.getElementsByClassName("place")[2].value.toLowerCase() == "are"){
		document.getElementsByClassName("place")[2].style = "border-radius:10px;border:1px solid green;"
	}
	else{
		document.getElementsByClassName("place")[2].style = "border-radius:10px;border:1px solid red;"
	}
	
	if(document.getElementsByClassName("place")[3].value.toLowerCase() == "are"){
		document.getElementsByClassName("place")[3].style = "border-radius:10px;border:1px solid green;"
	}
	else{
		document.getElementsByClassName("place")[3].style = "border-radius:10px;border:1px solid red;"
	}
}