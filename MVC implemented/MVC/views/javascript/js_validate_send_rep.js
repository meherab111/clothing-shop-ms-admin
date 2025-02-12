function IsValidSendRep(param)
{

	const email_js_send_rep = param.email.value;

	const email_err_msg_send_rep = document.getElementById("email_err_send_rep");


	email_err_msg_send_rep.innerHTML = "";


	let flag = true;



	if (email_js_send_rep === "") {

    email_err_msg_send_rep.innerHTML = "*Email is required";
    email_err_msg_send_rep.style.color = "green";
    flag = false;

  	}

   else if (!IsValidEmailSendRep(email_js_send_rep)) {

    email_err_msg_send_rep.innerHTML = "*Invalid Email format";
    email_err_msg_send_rep.style.color = "green";
    flag = false;

 	 }


return flag;



}

//-----------function-----------------

function IsValidEmailSendRep(email_js_send_rep){

  const email_regex_send_rep = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return email_regex_send_rep.test(email_js_send_rep);

}