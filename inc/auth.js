
function logIn(){
    var login = document.getElementById('login').value.trim();
    var password = document.getElementById('password').value.trim();
    var form = document.querySelectorAll(".form-floating");               
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.addEventListener("load", function () {  
        if (xmlhttp.status === 200) {
            console.log(this.response);
            const res = JSON.parse(this.response);
            if(res['pass']=='pass'){
                window.location.href ="https://whapp.pl/katalog/"; 
            }else{
                
                var alerts = document.querySelectorAll(".alert");
                     alerts.forEach(alert => alert.remove());
               
                if(res['connection'] == 1){
                 var element = document.createElement('div');     
                 element.innerText = "Ups Cos poszło nie tak :/ ";  
                 element.classList.add('alert','alert-danger');      
                 form[1].appendChild(element); 
                }
                if(res['empty login'] == 1){
                    if (form[0].children[0].classList.contains('is-valid')){ form[0].children[0].classList.remove('is-valid');}
                    form[0].children[0].classList.add('is-invalid');     
                }else{
                    if (form[0].children[0].classList.contains('is-invalid')){ form[0].children[0].classList.remove('is-invalid');}
                    form[0].children[0].classList.add('is-valid');   
                }
                if(res['empty password'] == 1){
                    if (form[1].children[0].classList.contains('is-valid')){ form[1].children[0].classList.remove('is-valid');}
                    form[1].children[0].classList.add('is-invalid');     
                }else{
                    if (form[1].children[0].classList.contains('is-invalid')){ form[1].children[0].classList.remove('is-invalid');}
                    form[1].children[0].classList.add('is-valid');   
                }
                if(res['incorrect password'] == 1 || res['incorrect login'] == 1){
                    var element = document.createElement('div');     
                    element.innerText = "Błędny login i/lub hasło!";  
                    element.classList.add('alert','alert-danger');      
                    form[1].appendChild(element); 
                   }
            }
        } 
    });

    xmlhttp.open('post','inc/auth.php',true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("log="+login+"&pass="+password);
}

