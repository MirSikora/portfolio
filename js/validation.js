function validate(){    
    
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    const emailErr = document.getElementById('errorEmail');
    const messageErr = document.getElementById('errorMessage');
    emailFormat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    valid = false;

    //event.preventDefault(); 
    
    validEmail = email == '' ? addMessage(emailErr, 'Zadejte prosím Váš email.') : (!emailFormat.test(email) ? addMessage(emailErr, 'Zkontrolujte si Váš email.') : removeMessage(emailErr));
        
    validMessage = message == '' ? addMessage(messageErr, 'Napište prosím Vaši zprávu.') : removeMessage(messageErr);    
    
    valid = (validEmail && validMessage) ? true : false;
        
    return valid;
    
}

function addMessage($tag, $text){

    $tag.removeAttribute('hidden');
    $tag.textContent = $text;
    return false;    
}

function removeMessage($tag){    
    
    $tag.setAttribute('hidden','');
    $tag.textContent = '';
    return true;
}

 

           

    

