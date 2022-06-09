function check_nome(event)
{
    if(!/^[a-zA-Z]{1,32}$/.test(event.currentTarget.value)  || event.currentTarget.value.length == 0){
        console.log("Caratteri non validi");
        console.log(event.currentTarget.parentNode);

        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="Solo Lettere";
        
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";
        
    }
};

function check_cognome(event)
{
    if(!/^[a-zA-Z]{1,32}$/.test(event.currentTarget.value)  || event.currentTarget.value.length == 0)
    {
        console.log("Caratteri non validi");
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="Solo Lettere";
        
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";

    }
};

function check_username(event)
{
    if(!/^[a-zA-Z0-9_]{1,16}$/.test(event.currentTarget.value) || event.currentTarget.value.length == 0)
    {
        console.log("Caratteri non validi");

        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="Solo lettere/numeri/_";
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";


//        let data = {
  //          username: event.currentTarget.value,
   //     };
        

        //Prendo il token CSFR
        //token = document.querySelector("input[name='_token']");
        //console.log(token.value);

        fetch("/register/username/"+encodeURIComponent(event.currentTarget.value)).then(onResponse).then(onJSON_check_username);
    }
};

function onResponse(response)
{
    console.log("Risposta ricevuta");
    return response.json();
};

function onJSON_check_username(json){
    
    console.log(json.exists);
    let input = document.querySelector("input[name='username']");
    let p = input.parentNode.querySelector("p");

    if(json.exists)
    {
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent= "Username già esistente";
    }
    else
    {
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";

    }
    
   
}

function check_email(event)
{
    if(!/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,10}$/.test(event.currentTarget.value)  || event.currentTarget.value.length == 0){
        console.log("Caratteri non validi");

        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="Formato email non valido";
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";

    }
};

function check_pass(event)
{
    if(!/^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/.test(event.currentTarget.value)  || event.currentTarget.value.length == 0){
        console.log("Caratteri non validi");
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="1 Maiuscola, 1 Minisciola, 1 numero e almeno 5 caratteri";
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";

    }
};

function check_conf_pass(event)
{
    if(!/^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/.test(event.currentTarget.value) || event.currentTarget.value.length == 0){
        console.log("Caratteri non validi");
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="1 Maiuscola, 1 Minisciola, 1 numero e almeno 5 caratteri";
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";

    }


    let pass = document.querySelector("input[name='pass']");
    if(event.currentTarget.value != pass.value)
    {
        console.log("Pass e Conf_pass non coincidono");
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.remove("hidden_error");
        p.classList.add("check_error");
        p.textContent="Non coincide con la password";
    }
    else
    {
        let  p = event.currentTarget.parentNode.querySelector("p");
        p.classList.add("hidden_error");
        p.classList.remove("check_error");
        p.textContent="";

    }
};

function clean_error()
{
    if(document.querySelectorAll(".error").length > 0){
        let error=document.querySelector(".error");
        error.parentNode.removeChild(error);
    }
}


function check(event)
{
    
    //Elimino gli errpro precedenti        
    clean_error();

    //Verifo che i campi non siano vuoti
    if(form.nome.value.length == 0 || form.cognome.value.length == 0
        || form.username.value.length == 0 || form.email.value.length == 0 
        || form.pass.value.length == 0 || form.conf_pass.value.length == 0)
    {

        let p=document.createElement("p");
        p.textContent= "Alcuni campi risultano vuoti";
        p.classList.add("error")
        form.appendChild(p);
        
        //Avviso utente
        console.log("Alcuni campi risultano vuoti");
        event.preventDefault();    
    }
}

//aggiungiamo l'event listener al form
const form = document.forms['register_form'];
form.addEventListener('submit', check);


const nome = document.querySelector("input[name='nome']");
const cognome = document.querySelector("input[name='cognome']");
const username = document.querySelector("input[name='username']");
const email = document.querySelector("input[name='email']");
const pass = document.querySelector("input[name='pass']");
const conf_pass = document.querySelector("input[name='conf_pass']");

nome.addEventListener('blur', check_nome);
cognome.addEventListener('blur', check_cognome);
username.addEventListener('blur', check_username);
email.addEventListener('blur', check_email);
pass.addEventListener('blur', check_pass);
conf_pass.addEventListener('blur', check_conf_pass);
