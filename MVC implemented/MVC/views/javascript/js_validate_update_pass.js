function IsValidUpdatePass(param)
{

	const oldpassword_js_update_pass = param.oldpassword.value;
	const newpassword_js_update_pass = param.newpassword.value;
	const confirmpassword_js_update_pass = param.conpassword.value;


	const oldpassword_err_msg_update_pass = document.getElementById("oldpassword_err_update_pass");
	const newpassword_err_msg_update_pass = document.getElementById("newpassword_err_update_pass");
	const confirmpassword_err_msg_update_pass = document.getElementById("confirmpassword_err_update_pass");


	oldpassword_err_msg_update_pass.innerHTML = "";
	newpassword_err_msg_update_pass.innerHTML = "";
	confirmpassword_err_msg_update_pass.innerHTML = "";



	let flag = true;


	  if (oldpassword_js_update_pass === "") {

    oldpassword_err_msg_update_pass.innerHTML = "*Old Password is required";
    oldpassword_err_msg_update_pass.style.color = "green";
    flag = false;

  } 
  else if (!IsValidOldPassword(oldpassword_js_update_pass)) {

    oldpassword_err_msg_update_pass.innerHTML = "*At least 8 characters required";
    oldpassword_err_msg_update_pass.style.color = "green";
    flag = false;

  }

// -------------------------------------------------

  	  if (newpassword_js_update_pass === "") {

    newpassword_err_msg_update_pass.innerHTML = "*New Password is required";
    newpassword_err_msg_update_pass.style.color = "green";
    flag = false;

  } 
  else if (!IsValidNewPassword(newpassword_js_update_pass)) {

    newpassword_err_msg_update_pass.innerHTML = "*At least 8 characters required";
    newpassword_err_msg_update_pass.style.color = "green";
    flag = false;

  }

  // -------------------------------------


   if (confirmpassword_js_update_pass === "") {

    confirmpassword_err_msg_update_pass.innerHTML = "*Confirm Password is required";
    confirmpassword_err_msg_update_pass.style.color = "green";
    flag = false;

  }


    if (newpassword_js_update_pass !== confirmpassword_js_update_pass) {

    confirmpassword_err_msg_update_pass.innerHTML = "*Passwords doesn't match";
    confirmpassword_err_msg_update_pass.style.color = "green";
    flag = false;

  }



	return flag;


}

function IsValidOldPassword(oldpassword_js_update_pass) {

  const oldpassword_regex_update_pass = /^.{8,}$/;
  return oldpassword_regex_update_pass.test(oldpassword_js_update_pass);

}

function IsValidNewPassword(newpassword_js_update_pass) {

  const newpassword_regex_update_pass = /^.{8,}$/;
  return newpassword_regex_update_pass.test(newpassword_js_update_pass);

}

