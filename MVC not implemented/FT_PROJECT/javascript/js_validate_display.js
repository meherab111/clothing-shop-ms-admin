function IsValidDisplay(param)
{

	const fullname_js_display = param.name.value;
	const phone_js_display = param.phone.value;


	const fullname_err_msg_display = document.getElementById("fullname_err_display");
 	const phone_err_msg_display = document.getElementById("phone_err_display");


 	fullname_err_msg_display.innerHTML = "";
  	phone_err_msg_display.innerHTML = "";


  	let flag = true;




  	  if (fullname_js_display === "") {

    fullname_err_msg_display.innerHTML = "*Name is required";
    fullname_err_msg_display.style.color = "green";
    flag = false;

  } 
  else if (!IsValidFullnameDisplay(fullname_js_display)) {

    fullname_err_msg_display.innerHTML = "*Only letters and white space allowed";
    fullname_err_msg_display.style.color = "green";
    flag = false;

  }

  //-------------------------------------------------------------

    if (phone_js_display === "") {

    phone_err_msg_display.innerHTML = "*Phone Number is required";
    phone_err_msg_display.style.color = "green";
    flag = false;

  } 
  else if (!IsValidPhone1Display(phone_js_display)) {

    phone_err_msg_display.innerHTML = "*Only numbers allowed";
    phone_err_msg_display.style.color = "green";
    flag = false;

  } 
  else if (!IsValidPhone2Display(phone_js_display)) {

    phone_err_msg_display.innerHTML = "*Only BD number format allowed";
    phone_err_msg_display.style.color = "green";
    flag = false;

  }

  	return flag;

}

//-----------------------functions----------------------------------

function IsValidFullnameDisplay(fullname_js_display) {

  const fullname_regex_display = /^[a-zA-Z ]*$/;
  return fullname_regex_display.test(fullname_js_display);

}


function IsValidPhone1Display(phone_js_display) {

  const phone_regex_1_display = /^\d+$/;
  return phone_regex_1_display.test(phone_js_display);

}


function IsValidPhone2Display(phone_js_display) {

  const phone_regex_2_display = /^0[1-9][0-9]{9}$/;
  return phone_regex_2_display.test(phone_js_display);

}