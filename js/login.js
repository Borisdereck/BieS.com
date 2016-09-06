function obtenerfechahora() {
  var d = new Date();
  return d.getTime();
};

function fnHttpReques(url) {
  var xmlhttp;
  var respbd = "";
  if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      respbd = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET", url, false);
  xmlhttp.send();
  //	alert("respbd="+respbd);
  return respbd;
}

function validar_usuario() {
  codusu = document.getElementById("cod_usuario").value;
  claveusu = document.getElementById("clave_usuario").value;
  datosval = bd_valida_usuario(codusu, claveusu);
}

function bd_valida_usuario(codigou, claveu) {
  fh = obtenerfechahora();
  url = "services/Procesar?usuario=" + codigou + "&claveusu=" + claveu + "&fh=" + fh;
  //return fnHttpReques(url);
};

function parse_datos_usuario(txtxml) {
  if (window.DOMParser) {
    parser = new DOMParser();
    xmlDoc = parser.parseFromString(txtxml, "text/xml");
  } else // Internet Explorer
  {
    xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
    xmlDoc.async = "false";
    xmlDoc.loadXML(txtxml);
  }
  idusuario = xmlDoc.getElementsByTagName("idusuario")[0].childNodes[0].nodeValue;
  tipousuario = "";
  if (idusuario > 0) {
    tipousuario = xmlDoc.getElementsByTagName("tipousuario")[0].childNodes[0].nodeValue;
    nombreusu = xmlDoc.getElementsByTagName("nombreusu")[0].childNodes[0].nodeValue;
    document.getElementById("dato_cliente").disabled = false;
    document.getElementById("dato_cliente").focus();
    document.getElementById("boton_buscar_cliente").disabled = false;
  }
};
