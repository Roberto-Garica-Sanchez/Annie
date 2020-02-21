<html>
  <head>
    <title>Hola mundo AJAX!</title>
    <!– Incorporamos el script a nuestra página –>
    <script type="text/javascript" language="javascript" src="java1.js"></script> 
  </head>
  <body>
    <input type="button" value="Llamada GET" onclick="llamadaAjax('get');" />
    <br />
    <input type="button" value="LLamada POST" onclick="llamadaAjax('post');" />
    <br />
    <div id="resultado" name="resultado" style="background: black; color: white; width: 500px; height:500px;"></div>
  </body>
</html>
