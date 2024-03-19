var n = 1;

function urlencode(str){
  return escape(str).replace(/\+/g,'%2B').replace(/%20/g, '+').replace(/\*/g, '%2A').replace(/\//g, '%2F').replace(/@/g, '%40');
}

function addChar(){
    
   //toma todos los datos
    var CharId = document.getElementById("char_id").value;
    if(CharId == 'new'){
        var CharName = document.getElementById("char_name").value;
    }  
    var CharValue = document.getElementById("char_value").value;
    var ProdId = document.getElementById("prod_id").value;
    var CharOrder = n;
       
    var url_msg = "prod_id="+ProdId+"&id="+CharId+"&name="+urlencode(CharName)+"&value="+urlencode(CharValue)+"&ord="+CharOrder;
    
    
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      
      xmlhttp.open("POST","add_char_db.php",true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.setRequestHeader("Content-length", url_msg.length);
      xmlhttp.setRequestHeader("Connection", "close");
      
      xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
           document.getElementById("addedCats").innerHTML += xmlhttp.responseText;
        }
      }
      xmlhttp.send(url_msg);
        
    
    document.getElementById("addCatDiv").innerHTML = '<form name="chars" action="index.php?ref=viewProd&id='+$ProdId+'" method="post" onsubmit="addChar();">';
        
     //sustituye los contenidos viejos luego de haber insertado   
        var xmlOpts;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlOpts=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlOpts=new ActiveXObject("Microsoft.XMLHTTP");
          }
     
    xmlOpts.open("GET","chars_db.php",true);
    
    xmlOpts.onreadystatechange=function(){
      if (xmlOpts.readyState==4 && xmlOpts.status==200){
          var charsArr = (xmlOpts.responseText);
          var hugeVar;
          hugeVar = '<br /><select id="char_id" name="char_id" onchange="checkSel();">';
          hugeVar += charsArr;
          hugeVar += '<option value="new">Ajouter charact&eacute;ristique</option></select><div id="newCharDiv"></div><br />Valeur<br /><textarea class="prod" id="char_value" name="char_value"></textarea><br />';
          
          document.getElementById("addCatDiv").innerHTML += hugeVar;
          
          document.getElementById("addCatDiv").innerHTML += '<br /><a href="#" onclick="addChar();">Ajouter nouvelle charact&eacute;ristique</a><br /><br /><input type="hidden" name="prod_id" id="prod_id" value="'+ProdId+'" /><input type="hidden" name="char_order" id="char_order" value="'+n+1+'" /><input type="submit" name="submit" value="Continuer" /></form>';
          
      }
    }
      
    xmlOpts.send();
     
    n++;   
}

function checkSel(){
    var sel = document.getElementById("char_id").value;
    if(sel=="new"){
        document.getElementById("newCharDiv").innerHTML = '<input type="text" class="prod" name="char_name" id="char_name" value="" />';
    }else{
        document.getElementById("newCharDiv").innerHTML = '';
    }
}
