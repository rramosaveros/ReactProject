<?php
    session_start();
    if(!isset($_SESSION["registrada"]))
    {
        session_unset();
        session_destroy();
        header('Location:../index.php');
    }
    $id=isset($_SESSION["id"]) ? $_SESSION["id"]: NULL;
    $id2=isset($_SESSION["id2"]) ? $_SESSION["id2"]: NULL;
    $vendedor = $_SESSION["idVendedor"];
?>
<html>
<head>
 	<meta charset="utf-8"/>
        <meta name="description" content="surtimax"/>
        <meta name="keywords" content="HTML, CSS3, Javascript"/>
        <title>FACTURA</title>
        <link rel="icon" href="../img/icono_aris.ico"/>
        <link rel="stylesheet" href="../css/estilo_fac.css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
	<script>  
	    function buscarCliente() {
	    var textoBusqueda = $("#busqueda").val();
	    if (textoBusqueda != "") {
	        $.post("buscaCliente.php", {"valorBusqueda": textoBusqueda}, function(mensaje) {
	            $("#buscaClientes").html(mensaje);
	        }); 
	    } else { 
	        ("#buscaClientes").html('');
		}
	}
	    
	function buscarProducto() {
	    var textoBusqueda = $("#producto").val();
	    if (textoBusqueda != "") {
	        $.post("buscaProducto.php", {"valorBusqueda": textoBusqueda}, function(mensaje) {
	            $("#buscaProductos").html(mensaje);
	        }); 
	    } else { 
	        ("#buscaProductos").html('');
		}
	}
	
	 function agregaCliente(){
	        var cliente = $("#id").val();
	        var nom = $("#nombre").val();
	        var ape = $("#apellido").val();
	        var ced = $("#cedula").val();
	    if (cliente != "") {
	        $.post("registraVenta.php", {"idcliente": cliente, "nombre":nom,"apellido":ape,"cedula":ced}, function(mensaje) {
	            $("#agregaClientes").html(mensaje);
	        }); 
	    } else { 
	        ("#agregaClientes").html('');
		}
	}
	function eliminarRegistro(idProducto){
		$("#"+idProducto).remove();
	}
	
	function actualizarPrecioTotal(idProducto){
        var iva = $("#iva").val();
		//Math.round(num * 100) / 100
		var valorPrecioFinal =Math.round((parseFloat($("#"+idProducto).find("td").filter('[name=cantidad]').text()) * parseFloat($("#"+idProducto).find("td").filter('[name=precioUnitario]').text())) * 100) / 100;
		var valorDescuento = $("#"+idProducto).find("td").filter('[name=descuento]').text();
		var valorFinalDescuento = Math.round((parseFloat(valorPrecioFinal) -(parseFloat(valorPrecioFinal) * parseFloat(valorDescuento) /100)) * 100) / 100;
		
		
		$("#"+idProducto).find("td").filter('[name=precioFinalDescuento]').text(valorFinalDescuento);
     	$("#"+idProducto).find("td").filter('[name=precioFinal]').text(valorPrecioFinal);
		
		var ultimoRegistro = $("#tbFactura").find('tr').filter('[name=facturaRegistro]');
		
		//Còdigo para actualizar subtotal iva y total
		var sumaTotal=0.0;
		var tdPreciosFinales = $('td[name=precioFinalDescuento]');
		$(tdPreciosFinales).each( function( index, element ){
   		 	var tdTemp = element;
			var precioTemp = parseFloat($(tdTemp).text());
			sumaTotal+=precioTemp;
		});
		
		var ivaTotal = (parseFloat(sumaTotal)*(iva/100));
		
		sumaTotal=Math.round(sumaTotal * 100) / 100;
		ivaTotal=Math.round(ivaTotal * 100) / 100;
		var subtotal = Math.round((sumaTotal-ivaTotal) * 100) / 100;
		
		$("#total").text(sumaTotal);
		$("#ivatabla").text(ivaTotal);
		$("#subtotal").text(subtotal);
	}
	
	function agregaProducto(){
	        var ven = $("#idventa").val();
	        var pro = $("#idProducto").val();
	        var det = $("#detalle").val();
	        var pre = $("#precio").val();
	        var sto = $("#stock").val(); 
	        var can = $("#cantidad").val();
	        var iva = $("#iva").val();
	        var desc = $("#descuento").val();
		    if (ven != "") {
				if(parseInt(can)<=parseInt(sto)){
					//Verificar si existe la tabla
					var tabla="";
					if($("#tbFactura").length>0){ //Si existe la tabla
						var ultimoRegistro = $("#tbFactura").find('tr').filter('[name=facturaRegistro]').last() //Busca el ultimo registro
						var idRegistro = Math.floor((Math.random() * 10000) + 1);
						
						tabla+="<tr id='"+idRegistro+"' name='facturaRegistro' data-idProducto='"+pro+"'>";
	        	        tabla+="<td name='cantidad' contenteditable='true' onblur=actualizarPrecioTotal('"+idRegistro+"');> "+can+"</td>";
						tabla+="<td colspan='3'> "+det+"</td>";
						tabla+="<td name='precioUnitario'> "+pre+"</td>";
						var precioFinal = parseInt(can)*parseFloat(pre);
						tabla+="<td name='precioFinal'> "+precioFinal+"</td>";
						tabla+="<td name='descuento' contenteditable='true' onblur=actualizarPrecioTotal('"+idRegistro+"');> 0 </td>";
						tabla+="<td name='precioFinalDescuento'> "+precioFinal+"</td>";
						tabla+="<td> <button type='button' onclick=eliminarRegistro('"+idRegistro+"');>Eliminar</button> </td>";
						tabla+="</tr>";
						$(ultimoRegistro).after(tabla);
						actualizarPrecioTotal(idRegistro);
					}else{ //Si no existe
						var idRegistro = Math.floor((Math.random() * 10000) + 1);
						tabla+="<table id='tbFactura' class='tabla' border='2px' width='90%'>";
			        	tabla+="<tr name='facturaRegistro' align='center'>";
    			    	tabla+="<td><b>Cantidad</b></td>";
        				tabla+="<td colspan=3><b>Detalle</b></td>";
        				tabla+="<td><b>Precio Unitario</b></td>";
	        			tabla+="<td><b>Precio Total</b></td>";
						tabla+="<td><b>Descuento</b></td>";
	        			tabla+="<td><b>Precio Final</b></td>";
		    	    	tabla+="<td><b>Eliminar</b></td>";
    		    		tabla+="</tr>";
				
						tabla+="<tr name='facturaRegistro' id='"+idRegistro+"' data-idProducto='"+pro+"'>";
	        	        tabla+="<td name='cantidad' contenteditable='true' onblur=actualizarPrecioTotal('"+idRegistro+"');> "+can+"</td>";
						tabla+="<td colspan='3'> "+det+"</td>";
						tabla+="<td name='precioUnitario'> "+pre+"</td>";
						var precioFinal = parseInt(can)*parseFloat(pre);
						tabla+="<td name='precioFinal'> "+precioFinal+"</td>";
						tabla+="<td  name='descuento' contenteditable='true' onblur=actualizarPrecioTotal('"+idRegistro+"');> 0 </td>";
						tabla+="<td name='precioFinalDescuento'> "+precioFinal+"</td>";
						tabla+="<td> <button type='button' onclick=eliminarRegistro('"+idRegistro+"');>Eliminar</button> </td>";
						tabla+="</tr>";
						tabla+="<tr>";
						tabla+=" <td colspan='7'> Subtotal";
						tabla+=" </td>";
						tabla+=" <td colspan='2' id='subtotal'>"+(precioFinal-(parseFloat(precioFinal)*(iva/100)));
						tabla+=" </td>";
						tabla+="</tr>";
						tabla+="<tr>";
						tabla+=" <td colspan='7'> IVA";
						tabla+=" </td>";
						tabla+=" <td colspan='2' id='ivatabla'>"+(parseFloat(precioFinal)*(iva/100));
						tabla+=" </td>";
						tabla+="</tr>";
						tabla+="<tr>";
						tabla+=" <td colspan='7'> TOTAL";
						tabla+=" </td>";
						tabla+=" <td colspan='2' id='total'>"+precioFinal;
						tabla+=" </td>";
						tabla+="</tr>";
						tabla+="</table>";
						tabla+="<br><label>Estado de la venta:</label>&nbsp;&nbsp;<select id='estado'><option value='1'>Por cobrar</option><option value='2'>Pagada</option></select>";
						tabla+="<br><label>Fecha de la pr&oacute;xima visita:</label>&nbsp;&nbsp;<input type='date' id='fechap'>";
						
						$("#agregaProductos").html(tabla); 
					}
					//fin si no existe
				}else{
					alert("No hay el stock suficiente");
				}
	        
	    } else { 
	        ("#agregaProductos").html('');
		}     
	}
	</script>
        
</head>
<body> 
	<div id="pre-header">
            <div id="telefono">
                <span>+593 984573207</span>
            </div>        
            <div id="email">
                <span>xxxxxx@xxxxxx.xxxxx</span>
            </div>
            <div class="nombreusuario">
                <a class="link" href="admin.php"><span><< &#128100; Administrador: <?php echo ($id)." ".($id2) ?></span></a>
            </div>
        </div>
        <header>
            <div id="logo">
                <h1><b>MEGA COMERCIAL</b></h1>
                <h1><b>SURTIMAX</b></h1>
            </div>
            <div id="visitanos">
                <h3 id="barra">EN CONSTANTE RENOVACIÓN</h3>
                <p>"Ofrece Gran Varidad de Víveres y Bazar de Primera Necesidad"</p>
            </div>
            <div class="menu">
            <nav>
                <ul>
                    <li><a href="">TRABAJADOR</a>
                        <div class="doc">
                            <ul>
                                <li color="black"><a href="registrartrabajador.php"><img src="../img/userr1.png" width="50" height="50"><br>AGREGAR REGISTRO TRABAJADOR</a></li>
                                <li><a href="modifica_trabajador.php"><img src="../img/modifica.png" width="50" height="50"><br>MODIFICAR DATOS TRABAJADOR</a></li>
                                <li><a href="elimina_trabajador.php"><img src="../img/borra.png" width="50" height="50"><br>ELIMINAR TRABAJADOR</a></li>
                                <li><a href="buscar_trabajador.php"><img src="../img/busca.png" width="50" height="50"><br>BUSCAR TRABAJADOR</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">CLIENTES</a>
                        <div class="doc">
                            <ul>
                                <li><a href="registrar_cliente.php"><img src="../img/userr1.png" width="50" height="50"><br>AGREGAR REGISTRO CLIENTE</a></li>
                                <li><a href="modifica_cliente.php"><img src="../img/modifica.png" width="50" height="50"><br>MODIFICAR DATOS CLIENTE</a></li>
                                <li><a href="elimina_cliente.php"><img src="../img/borra.png" width="50" height="50"><br>ELIMINAR CLIENTE</a></li>
                                <li><a href="busca_cliente.php"><img src="../img/busca.png" width="50" height="50"><br>BUSCAR CLIENTE</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">PRODUCTOS</a>
                        <div class="doc">
                            <ul>
                                <li><a href="registrarproducto.php"><img src="../img/userr1.png" width="50" height="50"><br>AGREGAR REGISTRO PRODUCTOS</a></li>
                                <li><a href="modifica_producto.php"><img src="../img/modifica.png" width="50" height="50"><br>MODIFICAR DATOS PRODUCTO</a></li>
                                <li><a href="elimina_producto.php"><img src="../img/borra.png" width="50" height="50"><br>ELIMINAR PRODUCTO</a></li>
                                <li><a href="busca_producto.php"><img src="../img/busca.png" width="50" height="50"><br>BUSCAR PRODUCTO</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="stock.php">STOCK PRODUCTOS</a></li>
                    <li><a href="">REPORTES</a>
                        <div class="doc">
                            <ul>
                                <li><a href="ReporteRutas.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE RUTAS</a></li>
                                <li><a href="ReporteGanancias.php"><img src="../img/userr1.png" width="50" height="50"><br>REPORTE GANANCIAS</a></li>
                                <li><a href="reporteF.php"><img src="../img/userr1.png" width="50" height="50"><br>VENTAS NETAS</a></li>
                                <li><a href="reporteB.php"><img src="../img/userr1.png" width="50" height="50"><br>SALIDA DE BODEGA</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="ReporteEstados.php">VENTAS</a></li>
                    <li><a href="factura.php">FACTURA</a></li>
                    <li><a href="../cerrar_sesion.php">CERRAR SESIÓN</a></li>
		</ul>
            </nav>
            </div>
        </header>
        <hr>
        <div class="contefactura">
              <form accept-charset="utf-8" method="POST">  
	      	
                <div class="formatodescuento">
                <div class="col col-lg-6 justify-content-center">
                  <label>% de Descuento:  </label>
                  <br>
                  <input type="number" name="descuento" id="descuento" value="" placeholder="" default='0'/>
                </div>
                </div>
                <div class="formatoiva">
                <div class="col col-lg-6 justify-content-center">
                   <label>% de IVA:</label>
                   <br>
                   <input type="number" name="iva" id="iva" default='12/100' />
                </div>
                </div>
                <div class="formatobuscliente">
                <div class="col col-lg-6 justify-content-center">
                  <h3><b>Buscar Cliente</b></h3>
                  <label>Cédula:  </label>
                  <br>
                  <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="10" autocomplete="off" onKeyUp="buscarCliente();" />
                  <div class="row">
		     <div class="col col-lg-6 justify-content-center" id="buscaClientes">
		         <h3>Lista Clientes</h3>
		     </div>
		  </div>
                </div>
                </div>
                <div class="formatobusproducto">
                <div class="col col-lg-6 justify-content-center">
                   <h3><b>Buscar Productos</b></h3>
                   <label>Nombre o código:</label>
                   <br>
                   <input type="text" name="busquedaP" id="producto" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscarProducto();" />
                   <div class="row">
		     <div class="col col-lg-6 justify-content-center" id="buscaProductos">
		        <h3>Listado Productos</h3>
		     </div>
		  </div>
                </div>
                </div><br><br><br><br><br> 		
                  <div class="row" id="imprimir">
		  	<div class="col col-lg-12 justify-content-center" id="agregaClientes">	
		  	</div>
		  	<div class="col col-lg-12 justify-content-center" id="agregaProductos">	
		  	</div>
		  </div>
		  <div id="actualiza"></div>
		<br><br><br><br>
        	<center><button class="btn_submint" type="button" onClick="javascript:imprSelec('imprimir')">Imprimir Nota de Venta</button></center>	
              </form>
          </div>
        <footer>
            <hr align="center" width="100%" size="1">
            <p>&COPY; SURTIMAX. Todos los derechos reservados - 2018<br>Riobamba - Ecuador</p>
        </footer>
        <script>
	  function imprSelec(nombre)
	  {
		  var idVenta = $("#idVenta").text();
		  var fechaVenta = $("#fechaVenta").text();
		  var clienteCedula = $("#cedulaCliente").text();
		  var subTotal = parseFloat($("#subtotal").text());
		  var ventaIva = parseFloat($("#ivatabla").text());
		  var ventaEstado = $("#estado").val();
		  var ventaTotal = parseFloat($("#total").text());
		  var fechaProxima = $("#fechap").val();
		  $.post("ventaregistro.php", {"tipo": 'insertar',"idVenta": idVenta, "fechaVenta":fechaVenta, "clienteCedula":clienteCedula, "subTotal":subTotal, "ventaIva":ventaIva, "ventaEstado":ventaEstado, "ventaTotal":ventaTotal, "fechaProxima":fechaProxima}, function( data ) { 
});
		
var registros = $('tr[name=facturaRegistro]');
var idVenta = $("#idVenta").text();                
		$(registros).each( function( index, element ){ //Recorre cada fila
   		 	var idRegistro = parseInt($(element).attr("data-idproducto"));
			var cantidad = parseInt($(element).find("td").filter('[name=cantidad]').text());
                        var idVenta = $("#idVenta").text();
			if(!isNaN(idRegistro)){var idVenta = $("#idVenta").text();  
				$.post("restastock.php", {/*"tipo": 'stock',*/"idRegistro": idRegistro, "cantidad":cantidad,"idVenta": idVenta}, function( data ) { 
				});
                                $.post("detalletb.php", {"idRegistro": idRegistro, "cantidad":cantidad,"idVenta": idVenta}, function( data )
				 { 
				});
                                 
			}
		});
		  //if (prox != "") {
	      //	$.post("actualizaVenta.php", {"proxima": prox, "estado":est, "venta":ven}, function(mensaje) {
	      //  $("#actualiza").html(mensaje);
	      //}); 
	      var ficha = document.getElementById(nombre);
		  var ventimp = window.open(' ', 'popimpr');
		  ventimp.document.write( ficha.innerHTML );
		  ventimp.document.close();
		  ventimp.print( );
		  ventimp.close();
	    //} else { 
	    //    ("#actualiza").html('');
		//}
	  } 
	</script>
    </body>
</html>