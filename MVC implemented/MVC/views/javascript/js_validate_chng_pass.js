function IsValidChngPass(param)
{

	const password_js_chng_pass = param.password.value;
	const confirm_password_js_chng_pass = param.conpassword.value;


	const password_err_msg_chng_pass = document.getElementById("password_err_chng_pass");
	const confirm_pass_err_msg_chng_pass = document.getElementById("confirmpassword_err_chng_pass");


	password_err_msg_chng_pass.innerHTML = "";
	confirm_pass_err_msg_chng_pass.innerHTML = "";


	let flag = true;


	if (password_js_chng_pass === "") {

	    password_err_msg_chng_pass.innerHTML = "*Password is required";
	    password_err_msg_chng_pass.style.color = "green";
	    flag = false;

	  } 
	  else if (!IsValidPasswordChngPass(password_js_chng_pass)) {

	    password_err_msg_chng_pass.innerHTML = "*At least 8 characters required";
	    password_err_msg_chng_pass.style.color = "green";
	    flag = false;

	  }

//----------------------

	 if (confirm_password_js_chng_pass === "") {

    confirm_pass_err_msg_chng_pass.innerHTML = "*Confirm Password is required";
    confirm_pass_err_msg_chng_pass.style.color = "green";
    flag = false;

  	}


 	 if (password_js_chng_pass !== confirm_password_js_chng_pass) {

    confirm_pass_err_msg_chng_pass.innerHTML = "*Passwords doesn't match";
    confirm_pass_err_msg_chng_pass.style.color = "green";
    flag = false;

  	}


	return flag;


}

// ----------------------------------------------

function IsValidPasswordChngPass(password_js_chng_pass) {

  const password_regex_chng_pass = /^.{8,}$/;
  return password_regex_chng_pass.test(password_js_chng_pass);

}