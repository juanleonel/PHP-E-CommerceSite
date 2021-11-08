<?php



function MessageWarning($menssage){
    echo '
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$menssage.'
    </div>
    ';        
}

function MessageError(){
    echo '
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Oops!</strong> error
    </div>
    ';        
}
function GetRequestAjax()
{
    return json_decode(file_get_contents( 'php://input' ), true);
}

// password

function PasswordVerify($pwd, $hash)
{
    return password_verify($pwd, $hash);
}

function getHashPassword($pwd)
{
    return password_hash($pwd, PASSWORD_DEFAULT);
}

// end password

?>