var lastSelLvl = 0;
//var lastCat = 0;
var cookie = new Array();
var cookieClick = new Array();

function showCat(c,pc,l,n){
    var cat = c;
    var elem = "node"+cat;
    
    var pcat = pc;
    
    if(l==0){
        var lvl=2;
    }else{
        var lvl = l+1;
    }
    
    var lvlElem = "level"+lvl;
    
    var catName = n;
	cookie[l] = catName;
	cookieClick[l] = 'showCat('+cat+', '+pcat+', '+l+', \''+catName+'\')';
	
	document.getElementById('cookieTrail').innerHTML = '<a href="index.php?go=prods">Produits</a> ';
        
	for(d = l+1; d < cookie.length; d++){
			cookie.splice(d,1);
		}
	
	for(c = 0; c < cookie.length; c++){
		if(c != 1){
			document.getElementById('cookieTrail').innerHTML += '> <a href="#" onClick="'+cookieClick[c]+'">'+ cookie[c] +'</a> ';
			}
		}
	
	//los productos que estan cargados, los borra siempre
	var borrarDivs = document.getElementsByClassName('prodsDiv');
	for(f = 0; f < borrarDivs.length; f++) {
	    var nameParent = borrarDivs[f].parentNode.id;
            document.getElementById(nameParent).removeChild(borrarDivs[f]);
        }
		
	
    //document.getElementById(lastCat).setAttribute('class','catLink');
    
	/* SELECTED
    if(l==0){
        document.getElementById(cat).setAttribute('class','catLinkSel');
    }else{
        document.getElementById(cat).setAttribute('class','catLinkImgSel');     
    }
	*/	
    ////////    
    if(l < lastSelLvl){
        
        if(document.getElementsByClassName('catNode')){
            var subcat = document.getElementsByClassName('catNode');
            for(i = 0; i < subcat.length; i++) {
                var nameParent = subcat[i].parentNode.id;         
                var idParent = nameParent.substring(5);
                if(idParent>l){
                    document.getElementById(nameParent).innerHTML = '';
                    }
                    if(document.getElementsByClassName('catNode')){
                        for(i = 0; i < subcat.length; i++) {
                            var nameParent = subcat[i].parentNode.id;         
                            var idParent = nameParent.substring(5);
                            if(idParent>l){
                                document.getElementById(nameParent).innerHTML = '';
                            }
                            
                            if(document.getElementsByClassName('catNode')){
                                for(i = 0; i < subcat.length; i++) {
                                    var nameParent = subcat[i].parentNode.id;         
                                    var idParent = nameParent.substring(5);
                                    if(idParent>l){
                                    document.getElementById(nameParent).innerHTML = '';
                                    }
                                    
                                    if(document.getElementsByClassName('catNode')){
                                        for(i = 0; i < subcat.length; i++) {
                                            var nameParent = subcat[i].parentNode.id;         
                                            var idParent = nameParent.substring(5);
                                            if(idParent>l){
                                            document.getElementById(nameParent).innerHTML = '';
                                            }
                                            
                                            if(document.getElementsByClassName('catNode')){
                                                for(i = 0; i < subcat.length; i++) {
                                                    var nameParent = subcat[i].parentNode.id;         
                                                    var idParent = nameParent.substring(5);
                                                    if(idParent>l){
                                                    document.getElementById(nameParent).innerHTML = '';
                                                    }
                                                    
                                                }
                                            }
                                            
                                        }
                                    }
                                    
                                }
                            }
                            
                        }
                    }
                //if(idParent>l){
                   // document.getElementById(nameParent).removeChild(subcat[i]);
                    
                //}
            }
        }
        
        
    }else if(l == lastSelLvl){
        ////////////////////todos los cat node hijos del level actual
        var subcat = document.getElementsByClassName('catNode');
        //cookie trail aca
        //var nuevoValor = subcat.length + 1;
        for(i = 0; i < subcat.length; i++) {
            if(subcat[i].parentNode == document.getElementById(lvlElem)){
                var nameParent = subcat[i].parentNode.id;
                document.getElementById(nameParent).removeChild(subcat[i]);
                //document.getElementById(subcat[i]).setAttribute('class','catLink');
            }  
        }
    }
    ////////
        
     checkLvlElem = document.getElementById(lvlElem);
     if(checkLvlElem==null){ //si no existe el div grande
         var divLvl = document.createElement("div");
         divLvl.id = lvlElem; 
         divLvl.className ="catLevel";
         document.getElementById("principal").appendChild(divLvl);
     }
            
        var divAdd = document.createElement("div");
        divAdd.id = "node"+cat;
        divAdd.className ="catNode";
        divAdd.style.display = "block";
        divAdd.innerHTML='';
        document.getElementById(lvlElem).appendChild(divAdd);
        
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          
        xmlhttp.open("GET","cur_cat.php?pcat="+cat+"&catl="+lvl,true);
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                var nodeDiv = "node"+cat;
               document.getElementById(nodeDiv).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send();
  
    lastSelLvl = lvl;
    //lastCat = cat;

}

function popitup(url) {
	newwindow=window.open(url,'Product Detail','height=850,width=1020');
	if (window.focus) {newwindow.focus()}
	return false;
}