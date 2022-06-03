function btnValidation(btn,q,n){
    if(btn.value!=""){btn.value = Math.floor(Number(btn.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')));}
    
    if(Number(btn.value)>100){
        btn.value = "100"; 
    }
    if(btn.value !== NaN){baseChange(btn,q,n)};
}

function change(p,q,btn,n){
    btn = btn.parentElement;
    
    if((Number(btn.children[1].innerText)+p>=0)&&!(Number(btn.children[1].innerText)+p>100)){
        
        
        var xml = new XMLHttpRequest()
        xml.addEventListener("load",function () {
            if(xml.status===200){
                res = JSON.parse(this.response);
               
                if(n>=1000){
                    str = chooseStat(n);
                btn.children[1].innerText = Number(btn.children[1].innerText)+p;
                btn.parentElement.children[2].innerText = Number(btn.parentElement.children[1].children[1].innerText)+Number(document.getElementById('mainStat').querySelector('input[base='+str+']').value)
                refresh(n);
                }else{
                    btn.children[1].innerText = Number(btn.children[1].innerText)+p;
                    btn.parentElement.children[3].innerText = res[2];
                }
            }
        
    })
        xml.open('get','https://whapp.pl/inc/expanions.php?q='+q+"&p="+p+"&n="+n,false); 
        xml.send();
    };

}


function baseChange(obj,q,n){
    str = chooseStat(n);
    document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText = Number(obj.value)+Number(document.getElementById("mainStatEx").querySelector('label[mainExpanions="'+str+'"]').innerText)
    var xml = new XMLHttpRequest()
        xml.addEventListener("load",function () {
            if(xml.status===200){
               
                        refresh(n);
                        
                
           
        }
        
    })
    xml.open('get','https://whapp.pl/inc/expanions.php?q='+q+"&p="+Number(obj.value)+"&n="+n,true);         
    xml.send();
}

function addAdvanceAbility(){
    var table = document.getElementById("advanceAbility");
    var xml = new XMLHttpRequest()
        xml.addEventListener("load",function () {
            if(xml.status===200){
                var res = JSON.parse(this.response);
                var div = document.createElement('div');
                div.setAttribute('class','p-1 d-sm-flex  d-block justify-content-sm-center');
                div.innerHTML='<select class="form-select form-select-sm col"></select><input type="text" class="form-control form-control-sm col"></th><button type="button" class="btn btn-outline-success btn-sm m-1" >Potwierdź wybór </button><button type="button" class="btn btn-outline-danger btn-sm m-1"   >Usuń</button>'
                table.parentElement.parentElement.children[1].after(div);
                res.forEach(e => {
                    var element = document.createElement('option');
                    element.setAttribute('value',e['ability_id']);
                    element.setAttribute('baseStat',e['base_stat']);
                    element.innerText=e['ability_name']
                    div.children[0].appendChild(element);
                });
                div.children[3].addEventListener('click',()=>{
                    div.remove();
                })
                div.children[2].addEventListener('click',()=>{
                    
                    group =div.children[1].value;
                    var xml2 = new XMLHttpRequest()
                    xml2.addEventListener("load",function () {
                        if(xml2.status===200){
                            var tr = document.createElement("tr");
                            tr.setAttribute('class','p-1');
                            res = JSON.parse(this.response);
                            var baseStat = div.children[0].options[div.children[0].selectedIndex].getAttribute("baseStat")
                            res =res[0];
                            var lbl = document.createElement('th');
                            value = div.children[0].options[div.children[0].selectedIndex].value;
                            lbl.innerText=div.children[0].options[div.children[0].selectedIndex].text+" "+group;
                            if(group == ""){group='0'}
                            lbl.setAttribute('value',value);
                            lbl.setAttribute('group',group);
                            lbl.setAttribute('scope',"row");
                       
                            tr.innerHTML="";
                            tr.appendChild(lbl);

                            th1 = document.createElement('th');
                            th1.innerText =  res.base_stat;
                            th1.setAttribute("class","d-none d-sm-table-cell");
                            tr.appendChild(th1);
                            
                            td2 = document.createElement('td');
                            
                            td2.setAttribute("class","d-flex justify-content-center");
                            td2.innerHTML='<button type="button" onclick="expansionsAdvanceAbility('+value+',\''+group+'\',-1,this)" class="btn-sm btn-danger">-1</button><label class="col-1 mx-2">0</label> <button type="button" onclick="expansionsAdvanceAbility('+value+',\''+group+'\',1,this)" class="btn-sm btn-success">+1</button>';
                            tr.appendChild(td2);
                            td3 = document.createElement('td');
                            td3.setAttribute("baseStat",baseStat);
                            td3.innerText='0';
                            tr.appendChild(td3);
                            var btn = document.createElement('button');
                            btn.setAttribute("type",'button');
                            btn.setAttribute("class",'btn btn-outline-danger btn-sm m-1 d-none d-sm-table-cell');
                            btn.innerText="Usuń";
                            tr.appendChild(btn);
                            table.appendChild(tr);
                            div.remove();
                            refresh(baseStat);
                            btn.addEventListener("click",()=>{
                                var xml3 = new XMLHttpRequest();
                                xml3.addEventListener("load",function () {
                                    if(xml3.status===200){
                                        btn.parentElement.remove();
                                    } 
                                })
                                xml3.open('get','https://whapp.pl/inc/removeAdvanceAbility.php?id='+tr.children[0].attributes[0].textContent+'&group='+group,true);         
                                xml3.send();
                             })
                            
                    }
                    
                })
                xml2.open('get','https://whapp.pl/inc/addAdvanceAbility.php?id='+div.children[0].options[div.children[0].selectedIndex].value+'&group='+group,true);         
                xml2.send();
                    
                })
                
                
           
        }
        
    })
    xml.open('get','https://whapp.pl/inc/displayAbility.php?q='+0,true);         
    xml.send();
}

function addTalent(){
    var table = document.getElementById("talentTable");
    var xml = new XMLHttpRequest()
        xml.addEventListener("load",function () {
            if(xml.status===200){
                var res = JSON.parse(this.response);
                var div = document.createElement('div');
                div.setAttribute('class','p-1 d-sm-flex  d-block justify-content-sm-center');
                div.innerHTML='<select class="form-select form-select-sm col"></select><input type="text" class="form-control form-control-sm col"></th><button type="button" class="btn btn-outline-success btn-sm m-1" >Potwierdź wybór </button><button type="button" class="btn btn-outline-danger btn-sm m-1"   >Usuń</button>'
                
                table.parentElement.parentElement.children[1].after(div);
                res.forEach(e => {
                    var element = document.createElement('option');
                    element.setAttribute('value',e['talent_id']);
                    element.setAttribute('content',e['description']);
                    element.setAttribute('max',e['max_expansion']);
                    element.innerText=e['talent_name']
                    div.children[0].appendChild(element);
                });
                div.children[3].addEventListener('click',()=>{
                    div.remove();
                })
                div.children[2].addEventListener('click',()=>{
                    group =div.children[1].value;
                    var xml2 = new XMLHttpRequest()
                    xml2.addEventListener("load",function () {
                        if(xml2.status===200){
                            res = JSON.parse(this.response);
                            var tr = document.createElement('tr');
                            res =res[0];
                            var max= div.children[0].options[div.children[0].selectedIndex].getAttribute("max");
                            var lbl = document.createElement('th');
                            var value = div.children[0].options[div.children[0].selectedIndex].value;
                            var content = div.children[0].options[div.children[0].selectedIndex].getAttribute("content");
                            lbl.innerText=div.children[0].options[div.children[0].selectedIndex].text+" "+group;
                            lbl.setAttribute('value',value);
                            if(group=""){group="0"}
                            lbl.setAttribute('scope',"row");
                            lbl.setAttribute('grupe',group);
                            lbl.setAttribute('data-bs-toggle',"popover");
                            lbl.setAttribute('data-bs-content',content);
                            lbl.setAttribute('max',max);
                            lbl.setAttribute('data-popover',"false");
                            lbl.setAttribute('title',"Max rozwinięć: ");

                            tr.innerHTML="";
                            tr.appendChild(lbl);

                          

                            td2 = document.createElement('td');
            
                            td2.innerHTML='<button type="button" onclick="expansionsTalents('+value+',\''+group+'\',-1,this)" class="btn-sm btn-danger">-1</button><label class="col-1 mx-2">0</label> <button type="button" onclick="expansionsTalents('+value+',\''+group+'\',1,this)" class="btn-sm btn-success">+1</button>'
                            tr.appendChild(td2);
                            td3 = document.createElement('td');
                           
                            tr.appendChild(td3);
                            var btn = document.createElement('button');
                            btn.setAttribute("type",'button');
                            btn.setAttribute("class",'btn btn-outline-danger  btn-sm m-1 d-none d-sm-table-cell');
                            btn.innerText="Usuń";
                            td3.appendChild(btn);
                            table.appendChild(tr);
                            div.remove();
                            talentPopover();
                            btn.addEventListener("click",()=>{
                                var xml3 = new XMLHttpRequest();
                                xml3.addEventListener("load",function () {
                                    if(xml3.status===200){
                                        btn.parentElement.parentElement.remove();
                                    } 
                                })
                                xml3.open('get','https://whapp.pl/inc/removeTalent.php?id='+tr.children[0].attributes[0].textContent+'&group='+group,true);         
                                xml3.send();
                             })
                            
                    }
                    
                })
                xml2.open('get','https://whapp.pl/inc/addTalent.php?id='+div.children[0].options[div.children[0].selectedIndex].value+'&group='+group,true);         
                xml2.send();
                    
                })
                
            }
        })
xml.open('get','https://whapp.pl/inc/displayAbility.php?q='+3,true);         
xml.send();
    }
function refresh(str){
    str =chooseStat(str);
    var mainStats = document.getElementById('mainStatEx').querySelector('td[basestat='+str+']').innerText;
    var basicAbility =  document.getElementById("basicAbility").querySelectorAll('td[baseStat='+str+']');
    var advanceAbility = document.getElementById("advanceAbility").querySelectorAll('td[baseStat='+str+']');
    var talents =document.getElementById("talentTable").querySelectorAll('th')

    basicAbility.forEach(e =>{
        e.innerText = Number(mainStats) + Number(e.parentElement.children[2].children[1].innerText);
    })
    advanceAbility.forEach(e =>{
        e.innerText = Number(mainStats) + Number(e.parentElement.children[2].children[1].innerText)
    })
    talents.forEach(e=>{
        if(e.getAttribute("maxInInt")!='brak' && e.getAttribute("maxInInt")!=null ){
            if(Number(e.getAttribute("maxInInt"))<Number(e.parentElement.children[1].children[1].innerText)){
                e.parentElement.children[1].children[1].innerText=e.getAttribute("maxInInt");
            }
        }
    })
    talentPopover();
}

function display(){

    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function () {
        if(xml.status===200){
           res=  JSON.parse(this.response)
            
        } 
    })
    xml.open('get','https://whapp.pl/inc/display.php?char_id=69',true);         
    xml.send();

    for(i=1000;i<=1009;i++){
        refresh(i);
    }


}


function removeAdvanceAbility(btn){
    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function () {
        if(xml.status===200){
            btn.parentElement.parentElement.remove();
            
        } 
    })
    xml.open('get','https://whapp.pl/inc/removeAdvanceAbility.php?id='+btn.parentElement.parentElement.children[0].attributes[0].value+'&group='+btn.parentElement.parentElement.children[0].attributes[1].value,true);         
    xml.send();
}

function expansionsAdvanceAbility(ability,group,step,btn){
    
    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function(){
        if(xml.status===200){
           
            res= JSON.parse(this.response);
            
            if(res[0]==1){
                btn.parentElement.children[1].innerText=res[1];
                btn.parentElement.parentElement.children[3].innerText= Number(res[1]) + Number(document.getElementById("mainStatEx").querySelector("td[basestat="+res[3]+"]").innerText);
            } 
        }
    
    })
    xml.open('get',"https://whapp.pl/inc/expanionsAdvanceAbility.php?id="+ability+"&group="+group+"&step="+step,true);
    xml.send();
}


function talentPopover(){
    var talent = document.getElementById("talentTable").querySelectorAll('th[data-bs-toggle="popover"]');
    var max="";
    talent.forEach(e =>{
        var str=e.getAttribute("max");
       
        switch(str){
            case 'WW':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
            break;
            case 'US':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'S':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'Wt':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'I':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'Zw':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'Zr':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'Int':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'SW':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'Ogl':
                max = document.getElementById("mainStatEx").querySelector('td[baseStat="'+str+'"]').innerText;
                break;
            case 'brak':
                max=str;
            break;
            default:
            max = Number(str)*10;
        }
        if(max!='brak'){
            max = Math.floor(Number(max)/10);
        }
        if(e.attributes[7].value!="true"){e.setAttribute("title","Max rozwinięć: "+max)}
        e.setAttribute("data-bs-original-title","Max rozwinięć: "+max)
        e.setAttribute("maxInInt",max);
    })

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-popover="false"]'));
            var popoverList = popoverTriggerList.map(function(element){
                element.setAttribute('data-popover',"true");
                return new bootstrap.Popover(element,{trigger:"hover"});
            });
}

function expansionsTalents(talent,group,step,btn){
    
    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function(){
        if(xml.status===200){
            res= JSON.parse(this.response);
            if(res[0]==1){
                btn.parentElement.children[1].innerText=res[1];
            }
        }
    
    })
    xml.open('get',"https://whapp.pl/inc/expanionsTalent.php?id="+talent+"&group="+group+"&step="+step,true);
    xml.send();
}

function removeTalents(btn){
    var xml = new XMLHttpRequest();
    xml.addEventListener("load",function () {
        if(xml.status===200){
            btn.parentElement.parentElement.remove();
            console.log(this.response);
        } 
    })
    xml.open('get','https://whapp.pl/inc/removeTalent.php?id='+btn.parentElement.parentElement.children[0].attributes[0].value+'&group='+btn.parentElement.parentElement.children[0].attributes[2].value,true);         
    xml.send();
}


function changeInfo(what,obj){
   
    var xml = new XMLHttpRequest();
    xml.open('get','https://whapp.pl/inc/charInfoUpdate.php?what='+what+'&newValue='+obj.value,true);         
    xml.send();

}


function chooseStat(get){
    str="";
    switch(get){
        case 1000:
        case 1010:
        case "WW":
            str="WW";
            break;
        case 1001:
        case 1011:
        case "US":
            str="US";
            break;
        case 1002:
        case 1012:
        case "S":
            str="S";
            break;
        case 1003:
        case 1013:
        case "Wt":
            str="Wt";
            break;
        case 1004:
        case 1014:
        case "I":
            str="I";
            break;
        case 1005:
        case 1015:
        case "Zw":
            str="Zw";
            break;
        case 1006:
        case 1016:
        case "Zr":
            str="Zr";
            break;
        case 1007:
        case 1017:
        case "Int":
            str="Int";
            break;
        case 1008:
        case 1018:
        case "SW":
            str="SW";
            break;
        case 1009:
        case 1019:
        case "Ogl":
            str="Ogl";
            break;
        }
        return str;
}