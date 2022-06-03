
function addCharacter(){
    var name =document.getElementById('name').value.trim();
    var WW=document.getElementById('inputWW').value.trim();
    var US=document.getElementById('inputUS').value.trim();
    var K=document.getElementById('inputK').value.trim();
    var Wt =document.getElementById('inputWt').value.trim();
    var I=document.getElementById('inputI').value.trim();
    var Zw=document.getElementById('inputZw').value.trim();
    var Zr=document.getElementById('inputZr').value.trim();
    var Inte=document.getElementById('inputInt').value.trim();
    var SW=document.getElementById('inputSW').value.trim();
    var Ogl=document.getElementById('inputOgl').value.trim();
    var private;
    document.getElementById('private').checked ?  private = 1 :private = 0;
    var xml = new XMLHttpRequest();
   
    xml.addEventListener("load", function () {
        if (xml.status === 200) {
            if(this.response == null){
            }else{
                var form = document.getElementById('addForm');
                form.innerHTML=this.response;
            }
        } 
    });

    xml.open('get','inc/addCharacter.php?name='+name+"&WW="+WW+"&US="+US+"&K="+K+"&Wt="+Wt+"&I="+I+
    "&Zw="+Zw+"&Zr="+Zr+"&Inte="+Inte+"&SW="+SW+"&Ogl="+Ogl+"&privateChar="+private,true);
    xml.send();
} 



function loadList(){                                        //funkcja ładuje liste przy wczytaniu body
    var list = document.getElementById("list");
    
    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function () {
        if(xml.status === 200){
        var res = JSON.parse(this.response);
            res.forEach(character => {
                 var element = document.createElement('div');       //dodawanie elementu postaci
                 element.innerHTML='<a class="list-group-item list-group-item-action py-3 lh-tight"\><div class="d-flex w-100 align-items-center justify-content-between"\<strong class="mb-1">'+character.name+'</strong\> <small class="text-muted">'+character.race+' '+character.career+'</small\></div\></a>';//<div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div\>
                 list.appendChild(element);

                 element.addEventListener('click',()=>{                         //zmiana na liscie zaznaczenia postaci 
                if(!element.children[0].classList.contains('active')){
                var delate = document.querySelector('.active');
                    if(delate!==null){delate.classList.remove('active');}
                element.children[0].classList.add('active');
                display(character.char_id);
               
                }
                }) 
            });
        }
    })

    xml.open('get','https://whapp.pl/inc/displayChar.php',true);
    xml.send();

    
}
function display(id){
   
    var name = document.getElementById('name');                                                 //pobranie zeminnyych i obiektów DOMHTMLCOLLECTION
    var mainStats = document.getElementById('mainStats').getElementsByTagName('td');
    var abilityTable1 = document.getElementById('abilityTable1').getElementsByTagName('td');
    var abilityTable2 = document.getElementById('abilityTable2').getElementsByTagName('td');
    var charInfo = document.getElementById('characterInfo').getElementsByTagName('td');
    var advanceAbility = document.getElementById('advanceAbility');
    var talentsTable = document.getElementById('talentsTable');
    var xml = new XMLHttpRequest();
    
   
    xml.addEventListener("load",function () {      // zwraca kolejno tablice wygenerowane z classy php character:
        if(xml.status === 200){  
           
        var res = JSON.parse(this.response);  
        name.innerText = res['name'];  
      
        charMainstats=Object.values(res.mainStats);
       
        
        mainStats[0].innerText=Number(res.mainStats.WW)+Number(res.mainStats.WW_expanions);
        mainStats[1].innerText=Number(res.mainStats.US)+Number(res.mainStats.US_expanions);
        mainStats[2].innerText=Number(res.mainStats.K)+Number(res.mainStats.K_expanions);
        mainStats[3].innerText=Number(res.mainStats.Wt)+Number(res.mainStats.Wt_expanions);
        mainStats[4].innerText=Number(res.mainStats.I)+Number(res.mainStats.I_expanions);
        mainStats[5].innerText=Number(res.mainStats.Zw)+Number(res.mainStats.Zw_expanions);
        mainStats[6].innerText=Number(res.mainStats.Zr)+Number(res.mainStats.Zr_expanions);
        mainStats[7].innerText=Number(res.mainStats.Inte)+Number(res.mainStats.Inte_expanions);
        mainStats[8].innerText=Number(res.mainStats.SW)+Number(res.mainStats.SW_expanions);
        mainStats[9].innerText=Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        
        charInfo[0].innerText = res.made_by.nickname;
        charInfo[1].innerText = res.charInfo.race;
        charInfo[2].innerText = res.charInfo.career;
        charInfo[3].innerText = res.charInfo.class;
        charInfo[4].innerText = res.charInfo.careerPath;
        charInfo[5].innerText = res.charInfo.age ;
        charInfo[6].innerText = res.charInfo.height;
        charInfo[7].innerText = res.charInfo.hair;
        charInfo[8].innerText = res.charInfo.eyes;
        charInfo[9].innerText = res.hp;
            //_expanions
        abilityTable1[1].innerText=Number(res.ability.ability1)+Number(res.mainStats.Zw)+Number(res.mainStats.Zw_expanions);
        abilityTable1[3].innerText=Number(res.ability.ability2)+Number(res.mainStats.WW)+Number(res.mainStats.WW_expanions);
        abilityTable1[5].innerText=Number(res.ability.ability3)+Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        abilityTable1[7].innerText=Number(res.ability.ability4)+Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        abilityTable1[9].innerText=Number(res.ability.ability5)+Number(res.mainStats.Inte)+Number(res.mainStats.Inte_expanions);
        abilityTable1[11].innerText=Number(res.ability.ability6)+Number(res.mainStats.I)+Number(res.mainStats.I_expanions);
        abilityTable1[13].innerText=Number(res.ability.ability7)+Number(res.mainStats.Zw)+Number(res.mainStats.Zw_expanions);
        abilityTable1[15].innerText=Number(res.ability.ability8)+Number(res.mainStats.Wt)+Number(res.mainStats.Wt_expanions);
        abilityTable1[17].innerText=Number(res.ability.ability9)+Number(res.mainStats.I)+Number(res.mainStats.I_expanions);
        abilityTable1[19].innerText=Number(res.ability.ability10)+Number(res.mainStats.Wt)+Number(res.mainStats.Wt_expanions);
        abilityTable1[21].innerText=Number(res.ability.ability11)+Number(res.mainStats.SW)+Number(res.mainStats.SW_expanions);
        abilityTable1[23].innerText=Number(res.ability.ability12)+Number(res.mainStats.SW)+Number(res.mainStats.SW_expanions);
        abilityTable1[25].innerText=Number(res.ability.ability13)+Number(res.mainStats.I)+Number(res.mainStats.I_expanions);

        abilityTable2[1].innerText=Number(res.ability.ability14)+Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        abilityTable2[3].innerText=Number(res.ability.ability15)+Number(res.mainStats.Zw)+Number(res.mainStats.Zw_expanions);
        abilityTable2[5].innerText=Number(res.ability.ability16)+Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        abilityTable2[7].innerText=Number(res.ability.ability17)+Number(res.mainStats.Zw)+Number(res.mainStats.Zw_expanions);
        abilityTable2[9].innerText=Number(res.ability.ability18)+Number(res.mainStats.Zr)+Number(res.mainStats.Zr_expanions);
        abilityTable2[11].innerText=Number(res.ability.ability19)+Number(res.mainStats.Inte)+Number(res.mainStats.Inte_expanions);
        abilityTable2[13].innerText=Number(res.ability.ability20)+Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        abilityTable2[15].innerText=Number(res.ability.ability21)+Number(res.mainStats.Zw)+Number(res.mainStats.Zw_expanions);
        abilityTable2[17].innerText=Number(res.ability.ability22)+Number(res.mainStats.K)+Number(res.mainStats.K_expanions);
        abilityTable2[19].innerText=Number(res.ability.ability23)+Number(res.mainStats.K)+Number(res.mainStats.K_expanions);
        abilityTable2[21].innerText=Number(res.ability.ability24)+Number(res.mainStats.Ogl)+Number(res.mainStats.Ogl_expanions);
        abilityTable2[23].innerText=Number(res.ability.ability25)+Number(res.mainStats.K)+Number(res.mainStats.K_expanions);

        advanceAbility.innerHTML="";
        
        res.advanceAbility.forEach(e =>{
            var element = document.createElement('tr');       //dodawanie elementu postaci
            ex = Number(getStats(e['base_stat'],res.mainStats))+Number(e['expansions']);
            element.innerHTML= '<th scope="row">'+e['ability_name']+'</th><td>'+e['base_stat']+'</td><td>'+ex+'</td>'
            advanceAbility.appendChild(element);
        })

        talentsTable.innerHTML="";
        
        res.talents.forEach(e =>{
            var element = document.createElement('tr');       //dodawanie elementu postaci
            max = Math.floor(getStats(e['max_expansion'],res.mainStats)/10);
            if(max==27){max='Brak'};
            element.innerHTML= '<th scope="row" data-bs-toggle="popover" data-bs-placement="left" title="Max rozwinięć: '+max+'" data-bs-content="'+e['description']+'">'+e['talent_name']+'</th><td>'+e['expansions']+'</td>'
            
            element.style.cursor = "pointer";
            talentsTable.appendChild(element);
            
            
        })
        
        
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(element){
                return new bootstrap.Popover(element,{trigger:"hover"});
            });
        
        }
        
        

    })

    xml.open("GET","https://whapp.pl/inc/display.php?char_id="+id,true);
    xml.send();
  
}
    function getStats(str,obj){
        switch(str){
            case 'WW':
            return Number(obj.WW)+Number(obj.WW_expanions);
            case 'US':
            return Number(obj.US)+Number(obj.US_expanions);
            case 'S':
            return Number(obj.K)+Number(obj.K_expanions);
            case 'Wt':
            return Number(obj.Wt)+Number(obj.Wt_expanions);
            case 'I':
            return Number(obj.I)+Number(obj.I_expanions);
            case 'Zw':
            return Number(obj.Zw)+Number(obj.Zw_expanions);
            case 'Zr':
            return Number(obj.Zr)+Number(obj.Zr_expanions);
            case 'Int':
            return Number(obj.Inte)+Number(obj.Inte_expanions);
            case 'SW':
            return Number(obj.SW)+Number(obj.SW_expanions);
            case 'Ogl':
            return Number(obj.Ogl)+Number(obj.Ogl_expanions);
            case 'brak':
            return 270;
            default:
            return Number(str)*10;
        }
    }

    function search(){
        var filter = document.getElementById('search').value.toUpperCase();
        var list = document.getElementById('list');
        console.log(list.childNodes.length);
        for(i=0;i <list.childNodes.length; i++){
            var a = list.children[i].children[0];
            if(a.textContent.toUpperCase().indexOf(filter) > -1){
                a.parentElement.classList.remove("d-none");
            }else{
                a.parentElement.classList.add("d-none");

            }
        }
    }
    function test(p){
        var x = document.querySelectorAll("td");
        if(p!=0){
        
           
            //for usuwajacy 
        return; 
        }
        for(i=0;i<x.length;i++){
            switch(x[i].innerHTML){
                case 'WW':
                    x[i].setAttribute('class','text-danger');
                break;
                case 'S':
                    x[i].setAttribute('class','text-secondary');
                break;
                case 'Wt':
                    x[i].setAttribute('class','text-dark');
                break;
                case 'Zw':
                    x[i].setAttribute('class','text-success');
                break;
                case 'Int':
                    x[i].setAttribute('class','text-primary');
                break;
                case 'SW':
                    x[i].setAttribute('class','text-secondary');
                break;
                case 'Ogl':
                    x[i].setAttribute('class','text-warning');
                break;
            }
    }
    }