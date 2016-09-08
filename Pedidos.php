<?php
session_start();
if (isset($_SESSION["usuario"]) && isset($_SESSION["pass"]))
{

}else {
	header("location:index.php");
}


 ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title>>BieS</title>
	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!--<link rel="shortcut icon" href="assets/ico/polloico.ico">-->
	<link rel="stylesheet" href="css/combo.css">

	<link rel="STYLESHEET" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxCombo/codebase/dhtmlxcombo.css">
	<script src="../../librerias/dhtmlxSuite/dhtmlxAjax/codebase/dhtmlxcommon.js"></script>
	<script src="../../librerias/dhtmlxSuite/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>
	<script src="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/ext/dhtmlxgrid_srnd.js"></script>
	<script src="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/ext/dhtmlxgrid_filter.js"></script>

	<link rel="stylesheet" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxCalendar/codebase/dhtmlxcalendar.css"></link>
	<link rel="stylesheet" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxCalendar/codebase/skins/dhtmlxcalendar_dhx_skyblue.css"></link>
	<script src="../../librerias/dhtmlxSuite/dhtmlxCalendar/codebase/dhtmlxcalendar.js"></script>


	<link rel="STYLESHEET" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/dhtmlxgrid.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_web.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxWindows/codebase/dhtmlxwindows.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/dhtmlxSuite/dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css">
	<script src="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/dhtmlxcommon.js"></script>
	<script src="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/dhtmlxgrid.js"></script>
	<script src="../../librerias/dhtmlxSuite/dhtmlxGrid/codebase/dhtmlxgridcell.js"></script>
	<script src="../../librerias/dhtmlxSuite/dhtmlxAjax/codebase/dhtmlxcommon.js"></script>


	<script>
	codusu = '<?php echo $_SESSION["usuario"]?>';
	claveusu = '<?php echo $_SESSION["pass"]?>';
	//alert(codusu);
	//	alert(claveusu);
		function inicializar() {
			//	urlservidor="http://201.244.82.118/mventas/";
			urlservidor1="http://ub13psltda.cloudapp.net/pa/mventas/";
			urlservidor="http://pandjupiter.cloudapp.net/pa/mventas/";

			dhtmlxCalendarLangModules = new Array();
			dhtmlxCalendarLangModules['es'] = {
				langname: 'es',
				dateformat: '%Y-%m-%d',
				monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
				monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
				daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
				daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
				weekend: [0, 6],
				weekstart: 1,
				msgClose: "Cerrar",
				msgMinimize: "Minimizar",
				msgToday: "Hoy"
			}

			myCalendar = new dhtmlXCalendarObject(["fecha_ini_pedidos", "fecha_fin_pedidos"]);
			myCalendar.loadUserLanguage('es');

			window.dhx_globalImgPath = "../../librerias/dhtmlxSuite/dhtmlxCombo/codebase/imgs/";
			max_items_pedido = 10;
			browser = navigator.appName;
			navegador = "Otro";
			if (browser == "Microsoft Internet Explorer") {
				navegador = "IE";
			}
			camposGrillaItems = new Array();
			camposGrillaItems[0] = "Referencia";
			camposGrillaItems[1] = "Descripción";
			camposGrillaItems[2] = "Cantidad kilos";
			camposGrillaItems[3] = "Cantidad unidades";
			camposGrillaItems[4] = "Factor de conversión";
			camposGrillaItems[5] = "Precio por kilo";
			camposGrillaItems[6] = "Subtotal";
			camposGrillaItems[7] = "Precio minimo";
			camposGrillaItems[8] = "Precio máximo";
			camposDetallePedido = new Array();
			camposDetallePedido[2] = "cantidaditem"
			camposDetallePedido[3] = "cantidad2item"
			camposDetallePedido[5] = "precioitem"
			armar_grilla_novedades();
			nclientes = 0;
			crear_combo_clientes();
			nsucursales = 0;
			crear_combo_sucursales();
			nitems = 0;
			crear_combo_items();
			validar_usuario();
			//document.getElementById('cod_usuario').focus();
			document.getElementById('boton_ver_cartera').style.display = 'none';
			document.getElementById("boton_ver_cartera").disabled = false;
			//document.getElementById("boton_ver_pedidos").disabled=true;


		}

		function armar_grilla_novedades() {
			datosxml = bd_xml_novedades();
			grilla_novedades_pedido = new dhtmlXGridObject("zona_grilla_novedades");
			grilla_novedades_pedido.setImagePath("dhtmlxSuite/dhtmlxGrid/codebase/imgs/");
			headergrid = 'Marca, Novedad'
			grilla_novedades_pedido.setHeader(headergrid);
			grilla_novedades_pedido.setInitWidths("100,300");
			grilla_novedades_pedido.setColAlign("left,left");

			grilla_novedades_pedido.setColTypes("ro,ro");

			grilla_novedades_pedido.setSkin("light");

			grilla_novedades_pedido.init();
			if (navegador == "IE") {
				grilla_novedades_pedido.load(urldgnovedades);
			} else {
				grilla_novedades_pedido.parse(datosxml);
			}

			grilla_novedades_pedido.attachEvent("onRowSelect", function(rId, cInd) {
				marcar_desmarcar_novedad(rId);
			});
		}

		function marcar_desmarcar_novedad(filaNovSel) {
			celdaMarca = grilla_novedades_pedido.cellById(filaNovSel, 0);
			marca = celdaMarca.getValue();
			if (marca == "**") {
				marca = "";
			} else {
				marca = "**";
			}
			celdaMarca.setValue(marca);
			grilla_novedades_pedido.clearSelection();
		}

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
			//codusu = document.getElementById("cod_usuario").value;
			//claveusu = document.getElementById("clave_usuario").value;
			datosval = bd_valida_usuario(codusu, claveusu);
			parse_datos_usuario(datosval);
			if (idusuario == 0) {
				alert("Codigo y/o clave de usuario errados...");
			} else {
				if (tipousuario == "ADMINISTRADOR") {
					mostrar_menu_administrador();
				} else
				if (tipousuario == "VENDEDOR") {
					mostrar_area_digitador();
				} else {
					alert("Usuario no autorizado...");
				}

			};
		}

		function mostrar_area_digitador() {
			document.getElementById("nombre_digitador").innerHTML = nombreusu;
			document.getElementById("dato_cliente").value = "";
			//document.getElementById("area_login").style.display = "none";
			document.getElementById("area_digitador").style.display = "block";
			document.getElementById("dato_cliente").focus();
			document.getElementById("boton_buscar_cliente").disabled = false;
			document.getElementById("boton_cerrar_sesion").disabled = false;
			document.getElementById("boton_ver_pedidos").disabled = false;
		}

		function cerrar_sesion() {
			if (confirm("Confirma que cierra la sesion?")) {
				desactivar_areas_dep_cliente();
				document.getElementById("area_digitador").style.display = "none";
				document.getElementById("area_login").style.display = "block";
				document.getElementById("clave_usuario").value = "";
				document.getElementById('cod_usuario').focus();
			}
		}

		function bd_valida_usuario(codigou, claveu) {
			fh = obtenerfechahora();
			url = "services/regped_validausuclv.php?usuario=" + codigou + "&claveusu=" + claveu + "&fh=" + fh;
			return fnHttpReques(url);
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

		function buscar_cliente() {
			dato_cliente = document.getElementById("dato_cliente").value;
			if (isNaN(dato_cliente)) {
				buscar_cliente_por_nombre(dato_cliente);
			} else {
				buscar_cliente_por_nit(dato_cliente);
			}
		}

		function buscar_cliente_por_nombre(nombrecli) {
			datos_cliente_nombre = bd_datos_cliente_pornombre(nombrecli);
			parse_datos_cliente_nombre(datos_cliente_nombre);

			if (idcliente == 0) {
				alert("No existe cliente con ese nombre...");
			} else {
				document.getElementById("area_seleccionar_cliente").style.display = "block";
				if (nclientes == 1) {
					comboclientes.selectOption(0, false, true);
				}
				//		procesar_cliente(idcliente);
			}
		}

		function buscar_cliente_por_nit(nit) {
			nit_cliente = nit;
			datos_cliente_nit = bd_datos_cliente_pornit(nit);
			parse_datos_cliente_nit(datos_cliente_nit);
			if (idcliente == 0) {
				alert("No existe cliente con ese NIT..." + nit);
			} else {
				document.getElementById("area_seleccionar_cliente").style.display = "block";
				document.getElementById("area_seleccionar_sucursal").style.display = "block";
				document.getElementById("area_seleccionar_cliente").style.display = "none";
				procesar_cliente(idcliente);
			}
		}

		function bd_datos_cliente_pornit(nit) {
			fh = obtenerfechahora();
			url = urlservidor + "services/regped_buscar_cliente_nit.php?nitcli=" + nit + "&vendedor=" + codusu + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_datos_cliente_pornombre(nombrecli) {
			fh = obtenerfechahora();
			url = urlservidor + "services/regped_buscar_cliente_nombre.php?nombrecli=" + nombrecli + "&vendedor=" + codusu + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_combo_cliente(nombrecli) {
			fh = obtenerfechahora();
			urlcombocli = "services/regped_combo_cliente.php?nombrecli=" + nombrecli + "&fh=" + fh;
			return fnHttpReques(urlcombocli);
		}

		function bd_xml_novedades() {
			fh = obtenerfechahora();
			urldgnovedades = "services/regped_xmldgnovedades.php?fh=" + fh;
			return fnHttpReques(urldgnovedades);
		}

		function bd_modificar_dato_item(iddetalle, ncol, valor) {
			fh = obtenerfechahora();
			campo = camposDetallePedido[ncol];
			url = "services/regped_modificar_item_pedido.php?iddetalle=" + iddetalle + "&campo=" + campo + "&valor=" + valor + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function parse_datos_cliente_nit(txtxml) {
			if (window.DOMParser) {
				parser = new DOMParser();
				xmlDoc = parser.parseFromString(txtxml, "text/xml");
			} else // Internet Explorer
			{
				xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
				xmlDoc.async = "false";
				xmlDoc.loadXML(txtxml);
			}
			combosucursales.clearAll(true);
			nsucursales = 0;

			clientes = xmlDoc.getElementsByTagName("cliente");
			nombre_cliente = "";
			arrBodegas = new Array();
			arrPuntosEnvios = new Array();
			arrListaPrecios = new Array();
			idcliente = xmlDoc.getElementsByTagName("idcliente")[0].childNodes[0].nodeValue;
			for (i = 0; i < clientes.length; i++) {
				if (idcliente > 0) {
					nombre_cliente = "";
					dato = xmlDoc.getElementsByTagName("nombre")[i].childNodes;
					if (dato.length > 0) {
						nombre_cliente = xmlDoc.getElementsByTagName("nombre")[i].childNodes[0].nodeValue;
					}
					sucursal = "";
					dato = xmlDoc.getElementsByTagName("sucursal")[i].childNodes;
					if (dato.length > 0) {
						sucursal = xmlDoc.getElementsByTagName("sucursal")[i].childNodes[0].nodeValue;
					}
					bodega = "";
					dato = xmlDoc.getElementsByTagName("bodega")[i].childNodes;
					if (dato.length > 0) {
						bodega = xmlDoc.getElementsByTagName("bodega")[i].childNodes[0].nodeValue;
					}
					if (bodega == "P01") {
						bodega = "LOG01";
					}
					arrBodegas[i] = bodega;
					direccion = "";
					dato = xmlDoc.getElementsByTagName("direccion")[i].childNodes;
					if (dato.length > 0) {
						direccion = xmlDoc.getElementsByTagName("direccion")[i].childNodes[0].nodeValue;
					}
					tercero_cliente = "";
					dato = xmlDoc.getElementsByTagName("tercero")[i].childNodes;
					if (dato.length > 0) {
						tercero_cliente = xmlDoc.getElementsByTagName("tercero")[i].childNodes[0].nodeValue;
					}
					listaprecios = "";
					dato = xmlDoc.getElementsByTagName("listaprecios")[i].childNodes;
					if (dato.length > 0) {
						listaprecios = xmlDoc.getElementsByTagName("listaprecios")[i].childNodes[0].nodeValue;
					}
					arrListaPrecios[i] = listaprecios;
					puntoenvio = "";
					dato = xmlDoc.getElementsByTagName("puntoenvio")[i].childNodes;
					if (dato.length > 0) {
						puntoenvio = xmlDoc.getElementsByTagName("puntoenvio")[i].childNodes[0].nodeValue;
					}
					arrPuntosEnvios[i] = puntoenvio;
					combosucursales.addOption(sucursal, direccion);
					nsucursales = nsucursales + 1;
				}
			}
			combosucursales.disable(false);
		};

		function parse_datos_cliente_nombre(txtxml) {
			if (window.DOMParser) {
				parser = new DOMParser();
				xmlDoc = parser.parseFromString(txtxml, "text/xml");
			} else // Internet Explorer
			{
				xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
				xmlDoc.async = "false";
				xmlDoc.loadXML(txtxml);
			}
			comboclientes.clearAll(true);

			clientes = xmlDoc.getElementsByTagName("cliente");
			nombre_cliente = "";
			arrBodegas = new Array();
			idcliente = xmlDoc.getElementsByTagName("idcliente")[0].childNodes[0].nodeValue;
			nclientes = 0;
			for (i = 0; i < clientes.length; i++) {
				if (idcliente > 0) {
					nombre_cliente = "";
					dato = xmlDoc.getElementsByTagName("nombre")[i].childNodes;
					if (dato.length > 0) {
						nombre_cliente = xmlDoc.getElementsByTagName("nombre")[i].childNodes[0].nodeValue;
					}
					tercero_cliente = "";
					dato = xmlDoc.getElementsByTagName("tercero")[i].childNodes;
					if (dato.length > 0) {
						tercero_cliente = xmlDoc.getElementsByTagName("tercero")[i].childNodes[0].nodeValue;
					}
					comboclientes.addOption(tercero_cliente, nombre_cliente);
					nclientes = nclientes + 1;
				}
			}
		};

		function crear_combo_clientes() {
			document.getElementById("area_combo_clientes").innerHTML = "";
			comboclientes = new dhtmlXCombo("area_combo_clientes", "alfa2", "100%");
			area_seleccionar_cliente
			comboclientes.readonly(1);
			clienteSel = "";
			comboclientes.attachEvent("onChange", function() {
				tercero_cliente = comboclientes.getSelectedValue();
				indsel = comboclientes.getSelectedIndex();
				if (indsel > -1) {
					nombre_cliente = comboclientes.getSelectedText();
					buscar_cliente_por_nit(tercero_cliente);
				}

			});

		}

		function procesar_cliente(idcli) {
			document.getElementById("dato_cliente").value = nombre_cliente;
			document.getElementById("nombre_vendedor").value = nombreusu;
			// si hay una sola sucursal se seleccion automaticamente
			if (nsucursales == 1) {
				combosucursales.selectOption(0, false, true);
			}
		}

		function activar_formato_pedido() {
			idpedido = bd_pedido_cliente(idusuario, codigo_bodega, tercero_cliente, sucursalSel, listaprecios, puntoenvio);
			armar_grilla_items_pedido();
			totalizar_pedido();
			document.getElementById("area_pedido").style.display = "block";
			document.getElementById("dato_cliente").disabled = true;
			document.getElementById("boton_buscar_cliente").disabled = true;
			document.getElementById("boton_eliminar_item").disabled = true;
			document.getElementById("boton_cerrar_sesion").disabled = true;
			document.getElementById("boton_ver_pedidos").disabled = true;
			combosucursales.disable(true);
			//	document.getElementById("boton_agregar_item").focus();
			formato_agregar_item();
		}

		function armar_grilla_items_pedido() {
			datosxml = bd_xml_itemspedido(idpedido);
			grilla_items_pedido = new dhtmlXGridObject("zona_grilla_items");
			grilla_items_pedido.setImagePath("dhtmlxSuite/dhtmlxGrid/codebase/imgs/");
			headergrid = 'Referencia, Descripcion, Kilos, Unidades, Factor conv., Precio por kilo, Subtotal, Precio min, Precio max';
			grilla_items_pedido.setHeader(headergrid);
			grilla_items_pedido.setInitWidths("100%,100%,100%,100%,100%,100%,100%,0%,0%");
			grilla_items_pedido.setColAlign("left,left,right,right,right,right,right,right,right");

			estadoSel = "DIGITACION";
			grilla_items_pedido.setColTypes("ro,ro,ed,ed,ro,ed,ro,ro,ro");

			grilla_items_pedido.setSkin("light");

			grilla_items_pedido.init();
			if (navegador == "IE") {
				grilla_items_pedido.load(urlitemspedido, totalizar_pedido);
			} else {
				grilla_items_pedido.parse(datosxml);
			}

			//	grilla_items_pedido.parse(datosxml);

			grilla_items_pedido.attachEvent("onRowSelect", function(rId, cInd) {
				idDetalleSel = rId;
				celdaDesc = grilla_items_pedido.cellById(rId, 1);
				descripcion = celdaDesc.getValue();
				if ((cInd == 2) || (cInd == 3) || (cInd == 5)) {
					document.getElementById("boton_eliminar_item").disabled = true;
					var rInd = grilla_items_pedido.getRowIndex(rId);
					grilla_items_pedido.selectCell(rInd, cInd, false, false, true, true);
					grilla_items_pedido.editCell();
				} else {
					document.getElementById("boton_eliminar_item").disabled = false;
				}
			});


			grilla_items_pedido.attachEvent("onEditCell", function(stage, rId, cInd, nValue, oValue) {
				if (stage == 2) {
					if (nValue != oValue) {
						validarOK = validar_datoitem(rId, cInd, nValue);
						if (validarOK) {
							rgdu = bd_modificar_dato_item(rId, cInd, nValue);
							if (rgdu == 1) {
								totalizar_pedido();
							} else {
								alert("No se pudo guardar dato...");
								return false;
							}
						}
						return validarOK;
					}
				}
				return true;
			});
			controlar_max_items_pedido();
		}

		function validar_datoitem(rId, cInd, nValue) {
			if (isNaN(nValue)) {
				alert(camposGrillaItems[cInd] + " deber ser numerico");
				return false;
			}
			if (nValue == 0) {
				alert(camposGrillaItems[cInd] + " deber ser mayor que cero...");
				return false;
			}
			celdaPrecio = grilla_items_pedido.cellById(rId, 5);
			precioProd = celdaPrecio.getValue();
			celdaPrecioMin = grilla_items_pedido.cellById(rId, 7);
			precioMinProd = celdaPrecioMin.getValue();
			celdaPrecioMax = grilla_items_pedido.cellById(rId, 8);
			precioMaxProd = celdaPrecioMax.getValue();
			celdaSubtotal = grilla_items_pedido.cellById(rId, 6);

			if (validar_precio(precioProd, precioMinProd, precioMaxProd)) {
				celdaCodigoProd = grilla_items_pedido.cellById(rId, 0);
				codigoProd = celdaCodigoProd.getValue();
				celdaFactorConv = grilla_items_pedido.cellById(rId, 4);
				factConvProd = celdaFactorConv.getValue();
				celdaSubtotal = grilla_items_pedido.cellById(rId, 6);

				if (cInd == 2) {
					// se cambio el dato de kilos
					celdaKilos = grilla_items_pedido.cellById(rId, 2);
					cantiKilos = celdaKilos.getValue();
					celdaUnidades = grilla_items_pedido.cellById(rId, 3);
					unidades = calcular_unidades(nValue, factConvProd);
					celdaUnidades.setValue(unidades);
					subtotalItem = calcular_subtotal_item(codigoProd, nValue, 0, factConvProd, precioProd);
					celdaSubtotal.setValue(subtotalItem);
					rgdu = bd_modificar_dato_item(rId, 3, unidades);
				} else
				if (cInd == 3) {
					// se cambio el dato de unidades
					celdaUnidades = grilla_items_pedido.cellById(rId, 3);
					cantiUnidades = celdaUnidades.getValue();
					celdaKilos = grilla_items_pedido.cellById(rId, 2);
					kilos = calcular_kilos(nValue, factConvProd);
					celdaKilos.setValue(kilos);
					subtotalItem = calcular_subtotal_item(codigoProd, 0, nValue, factConvProd, precioProd);
					celdaSubtotal.setValue(subtotalItem);
					rgdu = bd_modificar_dato_item(rId, 2, kilos);
				}
				if (cInd == 5) {
					// se cambio el dato de kilos
					celdaKilos = grilla_items_pedido.cellById(rId, 2);
					cantiKilos = celdaKilos.getValue();
					subtotalItem = calcular_subtotal_item(codigoProd, cantiKilos, 0, factConvProd, nValue);
					celdaSubtotal.setValue(subtotalItem);
				}
			} else {
				return false;
			}

			return true;
		}

		function totalizar_pedido() {
			valor_total_pedido = 0;
			grilla_items_pedido.forEachRow(function(id) {
				celdaSubotal = grilla_items_pedido.cellById(id, 6);
				valorSubotal = celdaSubotal.getValue() * 1.0;
				valor_total_pedido = valor_total_pedido + valorSubotal;
			});
			//	alert(valor_total_pedido);
			document.getElementById('valor_total_pedido').innerHTML = valor_total_pedido;
		}

		function focus_dato_item() {
			document.getElementById("dato_item").value = "";
			document.getElementById("area_seleccionar_item").style.display = "none";
			document.getElementById("area_datos_item").style.display = "none";
		}

		function formato_agregar_item() {
			document.getElementById("area_datos_item_pedido").style.display = "block";
			document.getElementById("dato_item").value = "";
			document.getElementById("dato_item").focus();
			document.getElementById("boton_eliminar_item").disabled = true;
		}

		function bd_obtener_nombre_vendedor(idcli) {
			fh = obtenerfechahora();
			url = "services/regped_nombre_vendedor.php?idcli=" + idcli + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_obtener_nombre_bodega(codbod) {
			fh = obtenerfechahora();
			//	url = "services/regped_nombre_bodega.php?idcli="+idcli+"&fh="+fh;
			url = urlservidor + "services/regped_nombre_bodega.php?codbod=" + codbod + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_obtener_codigo_bodega(idcli) {
			fh = obtenerfechahora();
			url = "services/regped_codigo_bodega.php?idcli=" + idcli + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_obtener_tercero_cliente(idcli) {
			fh = obtenerfechahora();
			url = "services/regped_tercero_cliente.php?idcli=" + idcli + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_pedido_cliente(idusu, codbod, tercerocli, suc, lista, puntoenv) {
			fh = obtenerfechahora();
			url = "services/regped_pedidocliente.php?idusu=" + idusu + "&codbod=" + codbod + "&tercerocli=" + tercerocli + "&suc=" + suc + "&lista=" + lista + "&puntoenvio=" + puntoenv + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_xml_itemspedido(idped) {
			fh = obtenerfechahora();
			urlitemspedido = "services/regped_xmldgitemspedido.php?idpedido=" + idped + "&fh=" + fh;
			return fnHttpReques(urlitemspedido);
		}

		function bd_combo_sucursales(idcli) {
			fh = obtenerfechahora();
			urlcombosuc = "services/regped_combo_suc_cliente.php?idcli=" + idcli + "&fh=" + fh;
			return fnHttpReques(urlcombosuc);
		}

		function bd_producto_por_codigo(codprod) {
			fh = obtenerfechahora();
			url = urlservidor + "services/regped_buscar_producto_codigo.php?refpro=" + codprod + "&codlista=" + listaprecios + "&fh=" + fh;
			//alert(url);
			return fnHttpReques(url);
		}

		function bd_combo_producto(nombrepro) {
			fh = obtenerfechahora();
			url = urlservidor + "services/regped_buscar_producto_nombre.php?nombrepro=" + nombrepro + "&codlista=" + listaprecios + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_codigo_producto(idpro) {
			fh = obtenerfechahora();
			url = "services/regped_codigo_producto.php?idpro=" + idpro + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_agregar_item(idped, ref, nombre, canti1, canti2, precio, precmin, precmax, unid, factor, uniped) {
			fh = obtenerfechahora();
			url = "services/regped_agregaritem.php?idped=" + idped + "&canti1=" + canti1 + "&canti2=" + canti2 + "&ref=" + ref + "&nombre=" + encodeURI(nombre) + "&precio=" + precio + "&preciomin=" + precmin + "&preciomax=" + precmax + "&unidad=" + unid +
				"&factor=" + factor + "&uniped=" + uniped + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_enviar_pedido() {
			fh = obtenerfechahora();
			url = "services/regped_enviar_pedido.php?idpedido=" + idpedido + "&idusuario=" + idusuario + "&novedades=" + encodeURI(novedadesent) + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_eliminar_pedido() {
			fh = obtenerfechahora();
			url = "services/regped_eliminar_pedido.php?idpedido=" + idpedido + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_eliminar_item_pedido(iddetalle) {
			fh = obtenerfechahora();
			url = "services/regped_eliminar_item_pedido.php?iddetalle=" + iddetalle + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function bd_interface_pedido() {
			url = "services/regped_interface_pedido.php?idpedido=" + idpedido;
			return fnHttpReques(url);
		};

		function armar_combo_sucursales(idcli) {
			document.getElementById("area_combo_sucursales").innerHTML = "";
			combosucursales = new dhtmlXCombo("area_combo_sucursales", "alfa2", 200);
			combosucursales.readonly(1);
			sucursalSel = "";
			xmlcombosuc = bd_combo_sucursales(idcli);
			if (navegador == "IE") {
				combosucursales.loadXML(urlcombosuc);
			} else {
				combosucursales.loadXMLString(xmlcombosuc);
			}

			//	combosucursales.selectOption(0 ,0, 1);
			combosucursales.attachEvent("onChange", function() {
				sucursalSel = combosucursales.getSelectedValue();
				activar_formato_pedido();
			});

		}

		function crear_combo_sucursales() {
			document.getElementById("area_combo_sucursales").innerHTML = "";
			combosucursales = new dhtmlXCombo("area_combo_sucursales", "alfa2", "100%");
			combosucursales.readonly(1);
			sucursalSel = "";
			codigo_bodega = "";
			combosucursales.attachEvent("onChange", function() {
				sucursalSel = combosucursales.getSelectedValue();
				indsel = combosucursales.getSelectedIndex();
				if (indsel > -1) {
					codigo_bodega = arrBodegas[indsel];
					puntoenvio = arrPuntosEnvios[indsel];
					listaprecios = arrListaPrecios[indsel];
					document.getElementById("bodega_vendedor").value = bd_obtener_nombre_bodega(codigo_bodega);
					document.getElementById("area_datos_vendedor").style.display = "block";
					activar_formato_pedido();
				}
			});

		}

		function desactivar_areas_dep_cliente() {
			document.getElementById("nombre_vendedor").value = "";
			document.getElementById("bodega_vendedor").value = "";
			document.getElementById("area_seleccionar_cliente").style.display = "none";
			document.getElementById("area_seleccionar_sucursal").style.display = "none";
			document.getElementById("area_datos_vendedor").style.display = "none";
			document.getElementById("area_datos_item_pedido").style.display = "none";
		}

		function buscar_item() {
			dato_item = document.getElementById("dato_item").value;
			if (isNaN(dato_item)) {
				producto_por_nombre = true;
				buscar_producto_por_nombre(dato_item);
			} else {
				producto_por_nombre = false;
				buscar_producto_por_codigo(dato_item);
			}
		}

		function buscar_producto_por_nombre(nombreprod) {
			datos_producto_nombre = bd_combo_producto(nombreprod);
			parse_datos_producto_nombre(datos_producto_nombre);
			if (nitems == 0) {
				alert("No se econtraron productos con ese nombre...");
			} else {
				activar_areas_dep_item();
			}
		}

		function buscar_producto_por_codigo(codprod) {
			codigo_producto = codprod;
			datos_producto_codigo = bd_producto_por_codigo(codprod);
			parse_datos_producto_codigo(datos_producto_codigo);
			if (idproducto == 0) {
				alert("No existe producto con ese codigo...");
			} else {
				if (buscar_producto_en_pedido(codigo_producto)) {
					alert("Item ya esta en el pedido...");
				} else {
					activar_areas_dep_item();
					document.getElementById("area_seleccionar_item").style.display = "none";
					procesar_item(idproducto);
				}
			}
		}

		function buscar_producto_en_pedido(codprod) {
			encontro_producto = false;
			grilla_items_pedido.forEachRow(function(id) {
				celdaRef = grilla_items_pedido.cellById(id, 0);
				refItem = celdaRef.getValue();
				if (refItem == codprod) {
					encontro_producto = true;
				}
			});
			return encontro_producto;
		}

		function parse_datos_producto_codigo(txtxml) {
			if (window.DOMParser) {
				parser = new DOMParser();
				xmlDoc = parser.parseFromString(txtxml, "text/xml");
			} else // Internet Explorer
			{
				xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
				xmlDoc.async = "false";
				xmlDoc.loadXML(txtxml);
			}
			idproducto = xmlDoc.getElementsByTagName("idproducto")[0].childNodes[0].nodeValue;
			nombre_producto = "";
			precio_producto = "0";
			preciomin = "0";
			preciomax = "0";
			unidad = "";
			factor_conv = 1.0;
			if (idproducto > 0) {
				nombre_producto = xmlDoc.getElementsByTagName("nombre")[0].childNodes[0].nodeValue;
				precio_producto = xmlDoc.getElementsByTagName("precio")[0].childNodes[0].nodeValue;
				preciomin = xmlDoc.getElementsByTagName("preciomin")[0].childNodes[0].nodeValue;
				preciomax = xmlDoc.getElementsByTagName("preciomax")[0].childNodes[0].nodeValue;
				unidad = xmlDoc.getElementsByTagName("unidad")[0].childNodes[0].nodeValue;
				factor_conv = xmlDoc.getElementsByTagName("factor_conv")[0].childNodes[0].nodeValue;
				precio_producto = precio_producto * 1.0;
				preciomin = preciomin * 1.0;
				preciomax = preciomax * 1.0;
			}
		};

		function parse_datos_producto_nombre(txtxml) {
			if (window.DOMParser) {
				parser = new DOMParser();
				xmlDoc = parser.parseFromString(txtxml, "text/xml");
			} else // Internet Explorer
			{
				xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
				xmlDoc.async = "false";
				xmlDoc.loadXML(txtxml);
			}
			nombre_producto = "";
			comboitems.clearAll(true);

			productos = xmlDoc.getElementsByTagName("producto");
			nitems = 0;
			for (i = 0; i < productos.length; i++) {
				idproducto = xmlDoc.getElementsByTagName("idproducto")[i].childNodes[0].nodeValue;
				if (idproducto > 0) {
					referencia = "";
					dato = xmlDoc.getElementsByTagName("referencia")[i].childNodes;
					if (dato.length > 0) {
						referencia = xmlDoc.getElementsByTagName("referencia")[i].childNodes[0].nodeValue;
					}
					descripcion = "";
					dato = xmlDoc.getElementsByTagName("descripcion")[i].childNodes;
					if (dato.length > 0) {
						descripcion = xmlDoc.getElementsByTagName("descripcion")[i].childNodes[0].nodeValue;
					}
					comboitems.addOption(referencia, descripcion);
					nitems = nitems + 1;
				}
			}
		};

		function crear_combo_items() {
			document.getElementById("area_combo_items").innerHTML = "";
			comboitems = new dhtmlXCombo("area_combo_items", "alfa2", 400);
			comboitems.readonly(1);
			itemSel = "";

			comboitems.attachEvent("onChange", function() {
				itemSel = comboitems.getSelectedValue();
				indsel = comboitems.getSelectedIndex();
				if (indsel > -1) {
					buscar_producto_por_codigo(itemSel);
				}
				//		nombre_producto=comboitems.getSelectedText();
				//		procesar_item(itemSel);
			});

		}

		function procesar_item(iditem) {
			document.getElementById("dato_item").value = nombre_producto;
			document.getElementById("area_datos_item").style.display = "block";

			document.getElementById("cantidad_kilos").value = "";
			document.getElementById("cantidad_unidades").value = "";
			if (producto_por_nombre) {
				//			datos_producto_codigo=bd_producto_por_codigo(codigo_producto);
				//			parse_datos_producto_codigo(datos_producto_codigo);
			}
			document.getElementById("precio_item").value = precio_producto;
			document.getElementById("cantidad_kilos").focus();
		}

		function activar_areas_dep_item() {
			document.getElementById("area_seleccionar_item").style.display = "block";
		}

		function enviar_item() {
			uniped = "";
			if (validar_item()) {
				if (cantidad_kilos > 0) {
					subtotal_item = calcular_subtotal_item(codigo_producto, cantidad_kilos, 0, factor_conv, precio_item);
					cantidad_unidades = calcular_unidades(cantidad_kilos, factor_conv);
				} else {
					uniped = "UNIDADES";
					subtotal_item = calcular_subtotal_item(codigo_producto, 0, cantidad_unidades, factor_conv, precio_item);
					cantidad_kilos = calcular_kilos(cantidad_unidades, factor_conv);
				}
				nregnvo = bd_agregar_item(idpedido, codigo_producto, nombre_producto, cantidad_kilos, cantidad_unidades, precio_item, preciomin, preciomax, unidad, factor_conv, uniped);
				agregar_item_a_grilla(nregnvo);
				totalizar_pedido();
				cerrar_agregar_item();
				controlar_max_items_pedido()
			}
		}

		function calcular_subtotal_item(codprod, kilos, unidades, factconv, precio) {
			if (kilos > 0) {
				subtotal = kilos * 1.0 * precio;
			} else {
				subtotal = (unidades * factconv) * precio;
			}
			subtotal = Math.round(subtotal);
			return subtotal;
		}

		function validar_item() {
			cantidad_kilos = document.getElementById("cantidad_kilos").value;
			if (cantidad_kilos == "") {
				cantidad_kilos = 0;
			}
			cantidad_unidades = document.getElementById("cantidad_unidades").value;
			if (cantidad_unidades == "") {
				cantidad_unidades = 0;
			}
			if (isNaN(cantidad_kilos)) {
				alert("Cantidad kilos debe ser numerico...")
				return false;
			}
			if (isNaN(cantidad_unidades)) {
				alert("Cantidad unidades debe ser numerico...")
				return false;
			}
			if ((cantidad_kilos > 0) && (cantidad_unidades > 0)) {
				alert("No puede ingresar kilos y unidades al tiempo...")
				return false;
			}
			if ((cantidad_kilos == 0) && (cantidad_unidades == 0)) {
				alert("Debe ingresar kilos o unidades...")
				return false;
			}
			precio_item = document.getElementById("precio_item").value;
			resValidar = validar_precio(precio_item, preciomin, preciomax);
			return resValidar;
		}

		function validar_precio(precio, precmin, precmax) {
			if ((precio < precmin) || (precio > precmax)) {
				alert("Precio debe estar entre " + precmin + " y " + precmax);
				return false;
			}
			return true;
		}

		function agregar_item_a_grilla(idnvo) {
			grilla_items_pedido.addRow(idnvo, [codigo_producto, nombre_producto, cantidad_kilos, cantidad_unidades, factor_conv, precio_item, subtotal_item, preciomin, preciomax]);

		};

		function cerrar_agregar_item() {
			document.getElementById("cantidad_kilos").value = "0";
			document.getElementById("cantidad_unidades").value = "0";
			document.getElementById("precio_item").value = "0";
			document.getElementById("dato_item").value = "";
			document.getElementById("area_seleccionar_item").style.display = "none";
			document.getElementById("area_datos_item").style.display = "none";
			document.getElementById("area_datos_item_pedido").style.display = "none";
		}

		function controlar_max_items_pedido() {
			nfilas = grilla_items_pedido.getRowsNum();
			if (nfilas < max_items_pedido) {
				document.getElementById("boton_agregar_item").disabled = false;
				formato_agregar_item();
			} else {
				document.getElementById("boton_agregar_item").disabled = true;
			}
		}

		function formato_enviar_pedido() {
			document.getElementById("area_pedido").style.display = "none";
			document.getElementById("area_enviar_pedido").style.display = "block";
		}

		function enviar_pedido() {
			if (confirm("Confirma envio del pedido?")) {
				document.getElementById("boton_conf_enviar_pedido").disabled = true;
				preparar_novedad_entrega();
				resultenvped = bd_enviar_pedido();
				parse_resultadoenviarpedido(resultenvped);
				resenvped = "OK";
				if (rechazados == 0) {
					resenvped = bd_interface_pedido();
					if (resenvped == "OK") {
						alert("Se ha enviado el pedido...");
						cerrar_formato_pedido();
					} else {
						alert("No se pudo enviar pedido..." + resenvped);
					}
				} else {
					alert("No se pudo enviar pedido...");
				}
				document.getElementById("boton_conf_enviar_pedido").disabled = false;
			}
		}

		function parse_resultadoenviarpedido(txtxml) {
			if (window.DOMParser) {
				parser = new DOMParser();
				xmlDoc = parser.parseFromString(txtxml, "text/xml");
			} else // Internet Explorer
			{
				xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
				xmlDoc.async = "false";
				xmlDoc.loadXML(txtxml);
			}

			rechazados = xmlDoc.getElementsByTagName("iddetalle").length;
		};

		function abandonar_pedido() {
			if (confirm("Confirma que abandona el pedido?")) {
				//		bd_eliminar_pedido();
				cerrar_formato_pedido();
			}
		}

		function volver_enviar_pedido() {
			document.getElementById("area_pedido").style.display = "block";
			document.getElementById("area_enviar_pedido").style.display = "none";
		}

		function cerrar_formato_pedido() {
			document.getElementById("dato_cliente").disabled = false;
			document.getElementById("boton_buscar_cliente").disabled = false;
			document.getElementById("boton_cerrar_sesion").disabled = false;
			document.getElementById("boton_ver_pedidos").disabled = false;
			document.getElementById("boton_eliminar_item").disabled = true;
			//	combosucursales.disable(false);
			document.getElementById("area_pedido").style.display = "none";
			document.getElementById("area_enviar_pedido").style.display = "none";
			document.getElementById("dato_cliente").value = "";
			limipar_novedades();
			document.getElementById("dato_cliente").focus();
		}

		function limipar_novedades() {
			document.getElementById("novedad_pedido").value = "";
			grilla_novedades_pedido.forEachRow(function(id) {
				celdaMarca = grilla_novedades_pedido.cellById(id, 0);
				celdaMarca.setValue("");
			});
		}

		function preparar_novedad_entrega() {
			novedadesent = "";
			grilla_novedades_pedido.forEachRow(function(id) {
				celdaMarca = grilla_novedades_pedido.cellById(id, 0);
				if (celdaMarca.getValue() == "**") {
					celdaTexto = grilla_novedades_pedido.cellById(id, 1);
					textonov = "**" + celdaTexto.getValue();
					novedadesent = novedadesent + textonov;
				}
			});
			textonov = document.getElementById("novedad_pedido").value;
			if (textonov != "") {
				novedadesent = novedadesent + "**" + textonov;
			}
			var espacio = / /g;
			//	novedadesent = novedadesent.replace(espacio,"_");
		}

		function eliminar_item_pedido() {
			if (confirm("Confirma que elimina el item?")) {
				bd_eliminar_item_pedido(idDetalleSel);
				grilla_items_pedido.deleteRow(idDetalleSel);
				totalizar_pedido();
				document.getElementById("boton_eliminar_item").disabled = true;
			}
		}

		function calcular_unidades(kilos, factor) {
			unidades = Math.round(kilos / factor);
			return unidades;
		}

		function calcular_kilos(unidades, factor) {
			kilos = unidades * factor * 1000;
			kilos = Math.round(unidades * factor * 1000);
			kilos = kilos / 1000;
			return kilos;
		}

		function mostrar_datos_cartera() {
			document.getElementById("area_datos_item_pedido").style.display = "none";
			document.getElementById("area_pedido").style.display = "none";
			document.getElementById("area_cartera").style.display = "none";
			armar_grilla_cartera();
		}

		function cerrar_datos_cartera() {
			document.getElementById("area_cartera").style.display = "none";
			document.getElementById("area_datos_item_pedido").style.display = "block";
			document.getElementById("area_pedido").style.display = "block";
		}

		function armar_grilla_cartera() {
			datosxml = bd_xml_grilla_cartera();
			grilla_cartera = new dhtmlXGridObject("zona_grilla_cartera");
			grilla_cartera.setImagePath("dhtmlxSuite/dhtmlxGrid/codebase/imgs/");
			headergrid = 'Razon social, NIT, Nro documento, Fecha docu, Fecha venc, Saldo cte, Saldo venc'
			grilla_cartera.setHeader(headergrid);
			grilla_cartera.setInitWidths("300,100,150,100,100,100,100");
			grilla_cartera.setColAlign("left,left,left,left,left,right,right");

			grilla_cartera.setColTypes("ro,ro,ro,ro,ro,ro,ro,ro");

			grilla_cartera.setSkin("light");

			grilla_cartera.init();
			if (navegador == "IE") {
				grilla_cartera.load(url);
			} else {
				grilla_cartera.parse(datosxml);
			}
		}

		function bd_xml_grilla_cartera() {
			fh = obtenerfechahora();
			url = urlservidor + "services/regped_xmldgcarteracliente.php?tercero=" + nit_cliente + "&codsuc=" + sucursalSel + "&fh=" + fh;
			return fnHttpReques(url);
		}

		function mostrar_datos_pedidos() {
			document.getElementById("area_pedir_cliente").style.display = "none";
			document.getElementById("area_seleccionar_cliente").style.display = "none";
			document.getElementById("area_datos_item_pedido").style.display = "none";
			document.getElementById("area_pedido").style.display = "none";
			document.getElementById("area_ver_pedidos").style.display = "block";
			document.getElementById("zona_grilla_pedidos").innerHTML = "";
		}

		function consultar_pedidos() {
			fecha_ini_pedidos = document.getElementById("fecha_ini_pedidos").value;
			fecha_fin_pedidos = document.getElementById("fecha_fin_pedidos").value;
			armar_grilla_pedidos();
		}

		function cerrar_datos_pedidos() {
			document.getElementById("area_ver_pedidos").style.display = "none";
			document.getElementById("area_pedir_cliente").style.display = "block";
			//	document.getElementById("area_datos_item_pedido").style.display="block";
			//	document.getElementById("area_pedido").style.display="block";
		}

		function armar_grilla_pedidos() {
			datosxml = bd_xml_grilla_pedidos();
			grilla_ver_pedidos = new dhtmlXGridObject("zona_grilla_pedidos");
			grilla_ver_pedidos.setImagePath("dhtmlxSuite/dhtmlxGrid/codebase/imgs/");
			headergrid = 'Centro OP, Fecha, Documento, Cliente, Sucursal,Total,Estado'
			grilla_ver_pedidos.setHeader(headergrid);

			grilla_ver_pedidos.setInitWidths("100,80,80,300,300,100,100");
			grilla_ver_pedidos.setColAlign("left,left,right,left,left,right,left");

			grilla_ver_pedidos.setColTypes("ro,ro,ro,ro,ro,ro,ro");

			grilla_ver_pedidos.setSkin("light");

			grilla_ver_pedidos.init();
			if (navegador == "IE") {
				grilla_ver_pedidos.load(url);
			} else {
				grilla_ver_pedidos.parse(datosxml);
			}
		}

		function bd_xml_grilla_pedidos() {
			fh = obtenerfechahora();
			//	url = urlservidor+"services/regped_xmldgpedidoscliente.php?tercero="+nit_cliente+"&codsuc="+sucursalSel+"&fh="+fh+"&fecha_ini="+fecha_ini_pedidos+"&fecha_fin="+fecha_fin_pedidos;
			url = urlservidor + "services/regped_xmldgpedidoscliente.php?vendedor=" + codusu + "&fh=" + fh + "&fecha_ini=" + fecha_ini_pedidos + "&fecha_fin=" + fecha_fin_pedidos;
			return fnHttpReques(url);
		}
	</script>

</head>

<body onload="inicializar();">
	<!-- Top menu -->
	<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="menu.php">Inicio</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="top-navbar-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<span class="li-social">
							<button type="button" class="btn btn-default" id="boton_ver_pedidos" onclick="mostrar_datos_pedidos();">
									<span class="glyphicon glyphicon-shopping-cart"></span>
							</button>
						</span>
						<span class="li-social">
									<a href="menu.php" id="close">
												<i class="fa fa fa-close"></i>
									</a>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="top-content">
			<div class="container">
				<div class="row">
						<div class="col-sm-8 col-sm-offset-2 text">
								<h1>Registro de Pedidos V-2016-07</h1>
						</div>
				</div>
				<div class="row">
					<div class="col-sm-3">

					</div>
						<div class="col-sm-6">
  						<form role="form" action="" method="" class="f1">
								<div class="f1-steps">
										<div class="f1-step active">
												<div class="on"><i class=""></i></div>
												<p></p>
										</div>
										<div class="f1-step active">
												<div id="area_datos_digitador" class="f1-step-icon area_datos_digitador">
													<i class="fa fa-user"></i></div>
												<!--Nombre De Usuario-->
												<p id="nombre_digitador"></p>
										</div>
										<div class="f1-step active">
												<div class=""><i class=""></i></div>
												<p></p>
										</div>
								</div>
								  <fieldset>
	<div id="area_digitador" class="area_digitador" style="display:none;">


		<div id="area_pedir_cliente" class="area_pedir_cliente">
			<form action="javascript:buscar_cliente();">
				<div class="form-group">
				<input id="dato_cliente" placeholder="Cliente" type="text" class="form-control" onfocus="desactivar_areas_dep_cliente();"/></td>
			</div>
			<div class="f1-buttons">
				<input type="button" id="boton_buscar_cliente" class="btn btn-next" value="Buscar cliente" onclick="buscar_cliente();"></td>
			</div>
			<div class="form-group">
					<label class="sr-only" for="f1-last-name"></label>
			</div>
			</form>
		</div>


		<div id="area_seleccionar_cliente" class="area_pedir_cliente" style="display:none;">
			Seleccion cliente:
			<div class="form-group">
					<label class="sr-only" for="f1-last-name"></label>
			</div>
			<div class="form-group">
					<p id="area_combo_clientes"></p>
			</div>

		</div>

		<div id="area_seleccionar_sucursal" class="area_pedir_cliente" style="display:none;">
					Seleccion sucursal:
				<div class="form-group">
					<p id="area_combo_sucursales"></p>
				</div>
				<div class="form-group">
						<label class="sr-only" for="f1-last-name"></label>
				</div>

		</div>

		<div id="area_datos_vendedor" class="area_pedir_cliente" style="display:none;">
			<div class="form-group">
			Vendedor:
		</div>
			<div class="form-group">
						<input id="nombre_vendedor" type="text" name="f1-last-name" class="form-control"  readonly/>
			</div>
				<div class="form-group">
				Bodega:
			</div>
				<div class="form-group">
						<input id="bodega_vendedor" class="form-control"  type="text" readonly/>
				</div>
		</div>

		<div id="area_datos_item_pedido" style="display:none;" class="area_datos_item_pedido">
			<div id="area_pedir_item">
				<form action="javascript:buscar_item();">
					  <div class="form-group">
							Item:
						</div>
						  <div class="form-group">
								<input id="dato_item" type="text" class="form-control" onfocus="focus_dato_item();" ;/>
							</div>
							  <div class="form-group">
								<input type="button" id="boton_buscar_item" class="btn btn-next" value="Buscar item" onclick="buscar_item();">
							</div>
				</form>
			</div>

			<div id="area_seleccionar_item" style="display:none;">
				  <div class="form-group">
					Seleccione item:
				</div>
				  <div class="form-group">
						<p id="area_combo_items"></p>
					</div>
			</div>

			<div id="area_datos_item" style="display:none;">
				<form action="javascript:enviar_item();">
					  <div class="form-group">
					Cantidad kilos:
				</div>
				  <div class="form-group">
								<input id="cantidad_kilos" type="text" class="form-control input-sm" ;/>
							</div>
							  <div class="form-group">
									Cantidad unidades:
							</div>
							  <div class="form-group">
								<input id="cantidad_unidades" class="form-control input-sm" type="text" ;/>
							</div>
							  <div class="form-group">
							Precio por kilo $:
						</div>
						  <div class="form-group">
								<input id="precio_item" type="text" class="form-control input-sm" ;/>
							</div>
							  <div class="form-group">
								<input type="submit" id="boton_enviar_item" class="btn btn-next" value="Enviar item" />
							</div>
							  <div class="form-group">
								<input type="button" id="abandonar_item" value="Abandonar" class="btn btn-next" onclick="cerrar_agregar_item();" />
							</div>
				</form>
			</div>

		</div>

		<div id="area_cartera" class="area_pedido" style="display:none;" />
		<div>Cartera</div>
		<div id="zona_grilla_cartera" class="zona_grilla_items" /></div>
	<div id="zona_botones_cartera">
		<input type="button" id="boton_cerrar_cartera" class="btn btn-next" value="Volver a pedido" onclick="cerrar_datos_cartera();">
	</div>
	</div>

	<div id="area_ver_pedidos" class="area_pedir_cliente" style="display:none;" />
	<div>
		PEDIDOS VENDEDOR
		<br/>
		<br/> Fecha Inicial:
		<input type="text" id="fecha_ini_pedidos" value="" /> Fecha Final:
		<input type="text" id="fecha_fin_pedidos" value="" />
		<input type="button" id="boton_consultar_ver_pedidos" value="Consultar pedidos" onclick="consultar_pedidos();">
	</div>
	<br/>
	<div id="zona_grilla_pedidos" class="zona_grilla_items" /></div>
	<div id="zona_botones_pedidos">
		<input type="button" id="boton_cerrar_ver_pedidos" value="Ocultar pedidos" onclick="cerrar_datos_pedidos();">
	</div>
	</div>

	<div id="area_pedido" class="area_pedido" style="display:none;" />
	<div id="titulo_pedido" class="titulo_pedido">
		<table>
			<tr>
				<td>Valor del pedido $
				</td>
				<td id="valor_total_pedido">0
				</td>
			</tr>
		</table>
	</div>
<div class="table-responsive">
	<div id="zona_grilla_items" style="width:100%;height:300px;" class="zona_grilla_items" />
	</div>
	<div class="form-group">
			<label class="sr-only" for="f1-last-name"></label>
	</div>
</div>
	<div id="zona_botones_pedido" class="container-fluid oper ">

					<input type="button" id="boton_agregar_item" class="btn btn-submit" value="Agregar item" onclick="formato_agregar_item();">

					<input type="button" id="boton_eliminar_item" class="btn btn-submit" value="Eliminar item" onclick="eliminar_item_pedido();">

					<input type="button" id="boton_abandonar_pedido" class="btn btn-submit"  value="Abandonar pedido" onclick="abandonar_pedido();">

					<input type="button" id="boton_enviar_pedido" class="btn btn-submit" value="Enviar pedido" onclick="formato_enviar_pedido();">

					<input type="button" id="boton_ver_cartera" class="btn btn-submit" value="Ver cartera" onclick="mostrar_datos_cartera();">
		</div>
	</div>


	<div id="area_enviar_pedido" class="area_enviar_pedido" style="display:none;">
		<div id="titulo_enviar_pedido" class="titulo_enviar_pedido">Marque las novedades y envie el pedido:</div>
		<div id="zona_grilla_novedades" class="zona_grilla_novedades" />
	</div>
	<div>
		<table>
			<tr>
				<td valign="top">Novedad no codificada:</td>
				<td>
					<textarea class="novedad_pedido" id="novedad_pedido" maxlength="50" rows="1" cols="50"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="button" id="boton_conf_enviar_pedido" value="Enviar" onclick="enviar_pedido();" />
				</td>
				<td>
					<input type="button" id="boton_volver_enviar_pedido" value="Volver" onclick="volver_enviar_pedido();" />
				</td>
			</tr>
		</table>

	</div>
	</div>


	</div>
</fieldset>
</form>
</div>
<div class="col-sm-3">

</div>
</div>
</div>
</div>
<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/retina-1.1.0.min.js"></script>
<script src="assets/js/scripts.js"></script>
</div>
</body>

</html>
