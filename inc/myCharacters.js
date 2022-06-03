function loadList(){                                        //funkcja ładuje liste przy wczytaniu body
    var list = document.getElementById("list");
    
    
    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function () {
        if(xml.status === 200){
        var res = JSON.parse(this.response);
            res.forEach(character => {
                 var element = document.createElement('div');       //dodawanie elementu postaci
                 element.setAttribute("id",character.char_id);
                 element.innerHTML='<a index="'+character.char_id+'"class="list-group-item list-group-item-action py-3 lh-tight"\><div class="d-flex w-100 align-items-center justify-content-around"\<strong class="mb-1">'+character.name+'</strong\> <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="private"><small><label class="form-check-label" for="private">Prywatny</label></small></div><button type="button" function="edit" class="btn-sm btn-outline-primary me-2">Edytuj</button><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" function="remove" class="btn-sm btn-outline-danger me-2">Usuń</button></div\></a>';
                 list.appendChild(element);
                var private = element.querySelector('input[type=checkbox]');
                if(character.privateChar==1){private.checked=true};
                var edit = element.querySelector('button[function=edit]');
                var remove = element.querySelector('button[function=remove]');
                
                private.addEventListener("click",()=>{
                    var xml2 = new XMLHttpRequest();
                    xml2.open('get','https://whapp.pl/inc/changePriv.php?q='+character.char_id+'&p='+character.made_by,true);
                    xml2.send();
                })
                edit.addEventListener("click",()=>{
                    window.location.href = "https://whapp.pl/edytuj/"+character.char_id+"/";
                })
                remove.addEventListener("click",()=>{
                    var modalBody = document.querySelector('.modal-body');
                    modalBody.innerHTML = "czy na pewno chcesz usunąć postać <strong>"+character.name+"</strong>?";
                    var btnRemove = document.getElementById("btn_remove");
                    btnRemove.attributes[0].textContent = "removeCharacter("+character.char_id+")";
                })
            });
            

        }
    })
    xml.open('get','https://whapp.pl/inc/displayMyChar.php',true);
    xml.send();

}


function removeCharacter(id){
    var xml = new XMLHttpRequest();
    xml.open('get','https://whapp.pl/inc/removeCharacterPerm.php?q='+id,true);
    xml.send();
    
    var drop = document.getElementById(id)
    drop.remove();
}