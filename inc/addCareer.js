function addAbilitySpace(str,bool){
    var space;
    switch(str){
        case '0':
            space = document.getElementById("abilityTable0");
            break;
        case '1':
            space = document.getElementById('abilityTable1');
            break;
        case '2':
            space = document.getElementById('abilityTable2');
            break;
        case '3':
            space = document.getElementById('abilityTable3');
            break;

    }
    var xml = new XMLHttpRequest();
    xml.addEventListener("load", function () {
        if (xml.status === 200) {
            // console.log(this.response);
            res=JSON.parse(this.response);
            // console.log(res.ability_name);
            var tr = document.createElement('tr');
            tr.innerHTML='<th scope="row">Umiejętiość</Th><td><select class="form-select form-select-sm col-4"></select></td>';
            
         
            space.appendChild(tr);
            res.forEach(e => {
                var element = document.createElement('option');
                element.setAttribute('value',e['ability_id']);
                element.innerText = e['ability_name'];
            tr.children[1].children[0].appendChild(element);
            });
            if(bool==0){
                tr.innerHTML +='<td><input type="text" class="col-12"></input></td>';
                tr.children[1].children[0].classList.add("AD");
                
            };
            tr.innerHTML += '<button type="button" class="btn btn-outline-danger btn-sm m-1">Usuń</button>'
            var btn = space.lastChild;
            btn.lastChild.addEventListener('click',()=>{
            x=space.removeChild(btn);
            })
        }
       
    })
    xml.open("GET","inc/displayAbility.php?q="+bool,true);
    xml.send();
   
}

function addTalentSpace(str,bool){
    var space;
    switch(str){
        case '0':
            space = document.getElementById('talentTable0');
            break;
        case '1':
            space = document.getElementById('talentTable1');
            break;
        case '2':
            space = document.getElementById('talentTable2');
            break;
        case '3':
            space = document.getElementById('talentTable3');
            break;
    }
    var xml = new XMLHttpRequest();
    xml.addEventListener("load", function () {
        if (xml.status === 200) {
            res=JSON.parse(this.response);
 
            var tr = document.createElement('tr');
            tr.innerHTML='<th scope="row">Talent</Th><td><select class="form-select form-select-sm col-4"></select></td><button type="button" class="btn btn-outline-danger btn-sm m-1">Usuń</button>';
            space.appendChild(tr);
            res.forEach(e => {
                var element = document.createElement('option');
                element.setAttribute('value',e['talent_id']);
                element.innerText = e['talent_name'];
            tr.children[1].children[0].appendChild(element);
            });
            var btn = space.lastChild;
            btn.lastChild.addEventListener('click',()=>{
            x=space.removeChild(btn);
            })
        }
       
    })
    xml.open("GET","inc/displayAbility.php?q="+bool,true);
    xml.send();
}

function end(){
    var nameCP = document.getElementById('nameCP').value.trim();
    var name =  document.getElementById('nameCP0').value.trim();
    var table = document.getElementById("careerTier0").getElementsByTagName("table");
    
    var json = [];
    var tier = [];

    json.push(nameCP);

    tier.push(name);                                                    //save name + 3 main stats
    for(i = 0;i<3;i++){
        tier.push(table[0].getElementsByTagName('select')[i].value);
    }
    json.push(tier);
    	tier= [];

    for(i = 0;i<table[1].getElementsByTagName('select').length;i++){
        tier.push(table[1].getElementsByTagName('select')[i].value);
        if(table[1].getElementsByTagName('select')[i].classList.contains('AD')){
            tier.push(table[1].getElementsByTagName('select')[i].parentElement.parentElement.children[2].children[0].value);
        }
    }
    json.push(tier);
    tier= [];
    for(i = 0;i<table[2].getElementsByTagName('select').length;i++){
        tier.push(table[2].getElementsByTagName('select')[i].value);
    }
    json.push(tier);
    tier = [];
    
    table = document.getElementById("careerTier1").getElementsByTagName("table");
    
    name =  document.getElementById('nameCP1').value.trim();
    tier.push(name);                                                  
    
    tier.push(table[0].getElementsByTagName('select')[0].value);
    
    json.push(tier);
    	tier= [];

    for(i = 0;i<table[1].getElementsByTagName('select').length;i++){
        tier.push(table[1].getElementsByTagName('select')[i].value);
        if(table[1].getElementsByTagName('select')[i].classList.contains('AD')){
            tier.push(table[1].getElementsByTagName('select')[i].parentElement.parentElement.children[2].children[0].value);
        }
    }
    json.push(tier);
    tier= [];
    for(i = 0;i<table[2].getElementsByTagName('select').length;i++){
        tier.push(table[2].getElementsByTagName('select')[i].value);
    }
    json.push(tier);
    tier = [];

    table = document.getElementById("careerTier2").getElementsByTagName("table");
    
    name =  document.getElementById('nameCP1').value.trim();
    tier.push(name);                                                  
    
    tier.push(table[0].getElementsByTagName('select')[0].value);
    
    json.push(tier);
    	tier= [];

    for(i = 0;i<table[1].getElementsByTagName('select').length;i++){
        tier.push(table[1].getElementsByTagName('select')[i].value);
        if(table[1].getElementsByTagName('select')[i].classList.contains('AD')){
            tier.push(table[1].getElementsByTagName('select')[i].parentElement.parentElement.children[2].children[0].value);
        }
    }
    json.push(tier);
    tier= [];
    for(i = 0;i<table[2].getElementsByTagName('select').length;i++){
        tier.push(table[2].getElementsByTagName('select')[i].value);
    }
    json.push(tier);
    tier = [];

    table = document.getElementById("careerTier3").getElementsByTagName("table");
    
    name =  document.getElementById('nameCP1').value.trim();
    tier.push(name);                                                  
    
    tier.push(table[0].getElementsByTagName('select')[0].value);
    
    json.push(tier);
    	tier= [];

    for(i = 0;i<table[1].getElementsByTagName('select').length;i++){
        tier.push(table[1].getElementsByTagName('select')[i].value);
        if(table[1].getElementsByTagName('select')[i].classList.contains('AD')){
            tier.push(table[1].getElementsByTagName('select')[i].parentElement.parentElement.children[2].children[0].value);
        }
    }
    json.push(tier);
    tier= [];
    for(i = 0;i<table[2].getElementsByTagName('select').length;i++){
        tier.push(table[2].getElementsByTagName('select')[i].value);
    }
    json.push(tier);
    tier = [];
    
    
   
    var xml = new XMLHttpRequest();
    xml.addEventListener("load", function () {
        if (xml.status === 200) {

            
        }
    });
    xml.open('POST','inc/addCareerPath2.php',false);
    xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xml.send('x='+JSON.stringify(json))
}


