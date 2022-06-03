function endStep1(){
    var name = document.getElementById('charName').value.trim();
    var race = document.getElementById('race').value.trim();
    var careerClass = document.getElementById('careerClass').value.trim();
    var careerPath = document.getElementById('careerPath').value.trim();
    var radio = document.getElementById('NPC');
    var xml = new XMLHttpRequest();
    if(radio.checked){
        careerPath='all';
    }
    if(name != '' && careerPath != ''){
   
    xml.addEventListener("load", function () {  
        if (xml.status === 200) {
            res=this.response;
            console.log(res);     window.location.href ="https://whapp.pl/edytuj/"+res+"/"+race+"/"+careerClass+"/"+name+"/";                   } 
    });
    xml.open('GET','https://whapp.pl/inc/addCharacter.php?name='+name+"&race="+race+"&careerClass="+careerClass+"&careerPath="+careerPath);
    
    xml.send();
    console.log("Robie cos ");
}
}

function startAddCareer(){
   
}


function addExpansions(n,p){
    var xml = new XMLHttpRequest()

    if(xml.status===200){
        console.log('Rozwinąłem');

    }
    xml.open('get','inc/expanions.php?q='+n+"&p="+p,true);
    xml.send()
}

function add(){
    console.log("buhahaha")
}