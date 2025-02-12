
function IsValidLog(param) 
{
	
	const email_js = param.email.value;
	const password_js = param.password.value;


	const email_err_msg = document.getElementById("email_err");
	const password_err_msg = document.getElementById("password_err");

	email_err_msg.innerHTML = "";
	password_err_msg.innerHTML = "";

let flag = true;

 //-------------------Valid email-------------

	if(email_js === "")
	{
		email_err_msg.innerHTML = "*Email is required";
		email_err_msg.style.color = "green";
		flag = false;
	}
	else if(!IsValidEmail(email_js))
	{
		email_err_msg.innerHTML = "*Invalid Email format";
		email_err_msg.style.color = "green";
		flag = false;
	}

 //-------------------Valid password-----------

	if(password_js === "")
	{
		password_err_msg.innerHTML = "*Password is required";
		password_err_msg.style.color = "green";
		flag = false;
	}
	else if(!IsValidPassword(password_js))
	{
		password_err_msg.innerHTML = "*At least 8 characters required";
		password_err_msg.style.color = "green";
		flag = false;
	}


return flag;

}

//-----------------------------------------------------------------------------------

function IsValidEmail(email_js) 
{
	const email_regex =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	return email_regex.test(email_js);

}


function IsValidPassword(password_js) 
{
	const password_regex = /^.{8,}$/;
	return password_regex.test(password_js);

}

//-----------------------------------------------------------------------------------

