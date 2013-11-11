function validate(myForm)
{
	if(myForm.name.value == "" || myForm.email.value == "" || myForm.data.value == "")
	{		
		document.getElementById("error").style.display="";
		return false;
	}
	return true;
}