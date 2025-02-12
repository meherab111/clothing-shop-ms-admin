function IsValidReg(param) {
  const email_js_reg = param.email.value;
  const password_js_reg = param.password.value;

  const fullname_js = param.name.value;
  const phone_js = param.phone.value;
  const confirm_password_js = param.conpassword.value;

  const email_err_msg_reg = document.getElementById("email_err_reg");
  const password_err_msg_reg = document.getElementById("password_err_reg");

  const fullname_err_msg = document.getElementById("fullname_err");
  const phone_err_msg = document.getElementById("phone_err");
  const confirm_pass_err_msg = document.getElementById("confirmpassword_err");

  email_err_msg_reg.innerHTML = "";
  password_err_msg_reg.innerHTML = "";

  fullname_err_msg.innerHTML = "";
  phone_err_msg.innerHTML = "";
  confirm_pass_err_msg.innerHTML = "";

  let flag = true;

  //-------------------Valid email---------

  if (email_js_reg === "") {
    email_err_msg_reg.innerHTML = "*Email is required";
    email_err_msg_reg.style.color = "green";
    flag = false;
  }
   else if (!IsValidEmailReg(email_js_reg)) {
    email_err_msg_reg.innerHTML = "*Invalid Email format";
    email_err_msg_reg.style.color = "green";
    flag = false;
  }

//-------------------Valid password-----------

  if (password_js_reg === "") {
    password_err_msg_reg.innerHTML = "*Password is required";
    password_err_msg_reg.style.color = "green";
    flag = false;
  } 
  else if (!IsValidPasswordReg(password_js_reg)) {
    password_err_msg_reg.innerHTML = "*At least 8 characters required";
    password_err_msg_reg.style.color = "green";
    flag = false;
  }

  //-------------------Valid Fullname-----------

  if (fullname_js === "") {
    fullname_err_msg.innerHTML = "*Name is required";
    fullname_err_msg.style.color = "green";
    flag = false;
  } 
  else if (!IsValidFullname(fullname_js)) {
    fullname_err_msg.innerHTML = "*Only letters and white space allowed";
    fullname_err_msg.style.color = "green";
    flag = false;
  }

  //-------------------Valid Phone number----------

  if (phone_js === "") {
    phone_err_msg.innerHTML = "*Phone Number is required";
    phone_err_msg.style.color = "green";
    flag = false;
  } 
  else if (!IsValidPhone1(phone_js)) {
    phone_err_msg.innerHTML = "*Only numbers allowed";
    phone_err_msg.style.color = "green";
    flag = false;
  } 
  else if (!IsValidPhone2(phone_js)) {
    phone_err_msg.innerHTML = "*Only BD number format allowed";
    phone_err_msg.style.color = "green";
    flag = false;
  }

  //-------------------Valid Confirm Pass--------------

  if (confirm_password_js === "") {
    confirm_pass_err_msg.innerHTML = "*Confirm Password is required";
    confirm_pass_err_msg.style.color = "green";
    flag = false;
  }


  //-------------------Valid Pass Match------------------

  if (password_js_reg !== confirm_password_js) {
    confirm_pass_err_msg.innerHTML = "*Passwords doesn't match";
    confirm_pass_err_msg.style.color = "green";
    flag = false;
  }



  return flag;
}

//-------------------------------------------------------------

function IsValidEmailReg(email_js_reg){
  const email_regex_reg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return email_regex_reg.test(email_js_reg);
}


function IsValidPasswordReg(password_js_reg) {
  const password_regex_reg = /^.{8,}$/;
  return password_regex_reg.test(password_js_reg);
}


function IsValidFullname(fullname_js) {
  const fullname_regex = /^[a-zA-Z ]*$/;
  return fullname_regex.test(fullname_js);
}


function IsValidPhone1(phone_js) {
  const phone_regex_1 = /^\d+$/;
  return phone_regex_1.test(phone_js);
}


function IsValidPhone2(phone_js) {
  const phone_regex_2 = /^0[1-9][0-9]{9}$/;
  return phone_regex_2.test(phone_js);
}

//-------------------------------------------------------------