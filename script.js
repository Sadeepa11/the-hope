function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {

    var f = document.getElementById("fname");
    var l = document.getElementById("lname");
    var e = document.getElementById("emailUp");
    var p = document.getElementById("passwordUp");

    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var t = request.responseText;
            if (t == "success") {

                var signUpBox = document.getElementById("signUpBox");
                var signInBox = document.getElementById("signInBox");

                signUpBox.classList.toggle("d-none");
                signInBox.classList.toggle("d-none");




            } else {

                alert(t);

            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);


}

function signIn() {

    var email = document.getElementById("emailIn");
    var password = document.getElementById("passwordIn");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                sessionStorage.getItem(fname);
                alert(sessionStorage.getItem(fname));
                window.location.reload();

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}

var bm;
function forgotPassword() {

    var email = document.getElementById("emailIn");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {

    var i = document.getElementById("passwordIn");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye";
    }

}

function showPassword2() {

    var i = document.getElementById("passwordUp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye";
    }

}
function showPassword3() {



    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}
function showPassword4() {



    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}

function resetPassword() {

    var email = document.getElementById("emailIn");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                bm.hide();
                alert("Your Password is succesfully reseted !!!");

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}