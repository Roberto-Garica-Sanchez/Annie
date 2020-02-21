	<html>
  <head>
    <title>Hola mundo AJAX!</title>
    <!– Incorporamos el script a nuestra página –>
    <script type="text/javascript" language="javascript" src="java1.js"></script> 
  </head>
  <body>
    <input type="button" value="Llamada GET" onclick="llamadaAjax('get');" />
    <br />
    <input type="button" value="roberto" onclick="llamadaAjax('post',this.value);" />
    <br />
    <div id="estado" name="estado" style="color: white; background: rgba(5, 72, 108, 0.67)	none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; width: 100px; height: 100px;"></div>
    <div id="resultado" name="resultado" style="color: white; background: rgba(5, 72, 108, 0.67)	none repeat scroll 0% 0%; overflow: auto; overflow-x: auto; width: 500px; height:500px;"></div>
  </body>
</html>
