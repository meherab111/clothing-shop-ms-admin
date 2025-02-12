function update_pass()
{

let oldpassword = document.getElementById("oldpassword").value;

let newpassword = document.getElementById("newpassword").value;

let conpassword = document.getElementById("conpassword").value;

let xhttp = new XMLHttpRequest();

let reqdata = 'opasswrd=' + oldpassword + '&npasswrd=' + newpassword +
 '&cpasswrd=' + conpassword;


 xhttp.open("POST","update_pass_html.php",true);
 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.onreadystatechange = function(){

 	if(this.readyState == 4 && this.status == 200){

 		document.getElementById("h5").innerHTML = this.responseText;
 	}
 }

xhttp.send(reqdata);

}