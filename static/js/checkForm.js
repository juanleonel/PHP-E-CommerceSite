(function() {

  validate = function(form){

    const emailmsg = document.getElementById("emailmsg");

    emailmsg.style.color = "red";

    if (emailmsg.hasChildNodes()) {
      emailmsg.removeChild(emailmsg.firstChild);
    }

    regex = /(^\w+\@\w+\.\w+)/;

    match = regex.exec(form.email.value);

    if(!match)
    {
      emailmsg.appendChild(document.createTextNode("Invalid Email"));
      form.email.focus();

      return false;
    }

    const passwdmsg = document.getElementById("passwordmsg");
    passwdmsg.style.color="red";

    if(passwdmsg.hasChildNodes())
    {
      passwdmsg.removeChild(passwdmsg.firstChild);
    }

    if(form.password.value.length <= 5) // #9
    {
      passwdmsg.appendChild(document.createTextNode("The password should be of at least size 6"));
      form.password.focus();

      return false;
    }

    const repasswdmsg = document.getElementById("repasswdmsg");
    repasswdmsg.style.color="red";

    if(repasswdmsg.hasChildNodes())
    {
      repasswdmsg.removeChild(repasswdmsg.firstChild);
    }
    if(form.password.value != form.repassword.value) // #10
    {
      repasswdmsg.appendChild(document.createTextNode("The two passwords don't match"));
      form.password.focus();
      return false;
    }

    const usrmsg = document.getElementById("usrmsg");
    usrmsg.style.color="red";

    if(usrmsg.hasChildNodes())
    {
      usrmsg.removeChild(usrmsg.firstChild);
    }

    if(form.complete_name.value.length == 0) // #11
    {
      usrmsg.appendChild(document.createTextNode("Name cannot be blank"));
      form.complete_name.focus();
      return false;
    }


    return true;
  }

})();
