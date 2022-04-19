function mostrarSenha(){
    const eye = document.getElementById('eye');
    const eye_slash = document.getElementById('eye-slash'); //olho
const checked = document.getElementById("eye-pass");
const inputSenha = document.getElementById("inputsenha");

    if(checked.checked){
        inputSenha.type = "password";
        eye.style.display = 'inline'; 
        eye_slash.style.display = 'none'

       
    }else{
        inputSenha.type = "text";
        eye.style.display = 'none';
         eye_slash.style.display = 'inline'
    }


}