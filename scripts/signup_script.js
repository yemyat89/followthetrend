function imposeMaxLength(Object, MaxLen)
{
  return (Object.value.length <= MaxLen);
}
function validate(myForm)
{
	var t = document.getElementById("all_err");		
	t.innerHTML = "";	
	var t = document.getElementById("pwd_err");		
	t.innerHTML = "";	
	var t = document.getElementById("email_err");		
	t.innerHTML = "";	
	var t = document.getElementById("term_err");		
	t.innerHTML = "";	
	
	
	if(myForm.username.value == "" || myForm.password.value == "" || myForm.email.value == "")
	{
		var t = document.getElementById("all_err");		
		t.innerHTML = "Please fill all the fields to proceed.";	
		return false;
	}
	
	if(!myForm.terms.checked){
		var t = document.getElementById("term_err");		
		t.innerHTML = "You must agree terms and condition.";	
		return false;
	}
	
	if(myForm.email.value.indexOf("@")<0){
		var t = document.getElementById("email_err");		
		t.innerHTML = "The email address is not valid";	
		return false;
	}
	if(myForm.password.value!=myForm.password2.value)
	{
		var t = document.getElementById("pwd_err");		
		t.innerHTML = "Two passwords are not same.";	
		return false;
	}
}
