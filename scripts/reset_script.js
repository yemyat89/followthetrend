function validate(myForm)
{
	var t = document.getElementById("all_err");		
	t.innerHTML = "";	
	var t = document.getElementById("pwd_err");		
	t.innerHTML = "";		
	if(myForm.password.value == "")
	{
		var t = document.getElementById("all_err");		
		t.innerHTML = "Please fill all the fields to proceed.";	
		return false;
	}		
	if(myForm.password.value!=myForm.password2.value)	
	{
		var t = document.getElementById("pwd_err");		
		t.innerHTML = "Two passwords are not same.";	
		return false;
	}
}
