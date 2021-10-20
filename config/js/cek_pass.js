function cek() {
	var pass1 = document.getElementsById('pass1').value;
	var pass2 = document.getElementsById('pass2').value;

	if (pass1 != pass2) {
		alert("Password tidak sesuai");
	}
}