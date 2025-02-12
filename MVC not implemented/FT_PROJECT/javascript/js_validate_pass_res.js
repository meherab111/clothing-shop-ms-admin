function IsValidPassRes(param)
{

	const email_js_pass_res = param.email.value;

	const email_err_msg_pass_res = document.getElementById("email_err_pass_res");

	email_err_msg_pass_res.innerHTML = "";


	let flag = true;


//-------------------Valid email---------
	if (email_js_pass_res === "") {
    email_err_msg_pass_res.innerHTML = "*Email is required";
    email_err_msg_pass_res.style.color = "green";
    flag = false;
  	}

   else if (!IsValidEmailPassRes(email_js_pass_res)) {
    email_err_msg_pass_res.innerHTML = "*Invalid Email format";
    email_err_msg_pass_res.style.color = "green";
    flag = false;
  }



	return flag;


}
//-------------------------------------------------------------

function IsValidEmailPassRes(email_js_pass_res){

  const email_regex_pass_res = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return email_regex_pass_res.test(email_js_pass_res);

}
