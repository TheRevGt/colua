<!DOCTYPE html>
<html>
<head>
    <title>Consulta red</title>
    <link rel="stylesheet" href="../../css/main.css" />
    <link rel="icon" type="image/jpg" href="../../img/ico.png">
    <script src="../../js/min.js"></script>
</head>
<body>
    <div id="container">
    <nav>
        <ul>
        <li><?php include_once '../../includes/user.php';
                $user = new User(); echo $user->getNombre(); ?></li>
        <li><a href="../soporte/todos.php">Soporte</a></li>
        <li><a href="../registrar/agencia.php">Equipos<i class="down"></i></a>
            <ul>
                <li><a href="../registrar/agencia.php">Registrar</a></li>
                <li><a href="../actualiza/agencia.php">Actualizar</a></li>
                <li><a href="../consultas/agencia.php">Consultar</a></li>
            </ul>       
        </li>
        <li><a href="../registro.php">Usuario</a></li>
        <li><a href="../../includes/logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <div class="menu">
        <br>
        <br>
        <br>
        <li><a href="agencia.php"><img src="../../img/agencia.png" class="ico"> Agencia </a> </li>
        <li><a href="areas.php"><img src="../../img/areas.png" class="ico"> Area </a> </li>
        <li><a href="empleado.php"><img src="../../img/emple.png" class="ico"> Empleado </a> </li>
        <li><a href="activos.php"><img src="../../img/activo.png" class="ico"> Activo </a> </li>
        <li><a href="estados.php"><img src="../../img/estado.png" class="ico"> Estado </a> </li>
        <li><a href="red.php"><img src="../../img/red.png" class="ico"> Estado red </a> </li>
    </div>

    <!-- contenido de la pagina-->
    <div class="main">
        <div class="cons">
        <section style="padding-left: 220px">
            <br>
            <h2>Consultas por estado</h2><br>
            <form method="POST" action="">
            <select name="consulta">
                <optgroup label="Estado de equipo">
                    <option value="Excelente">Excelente</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Deficiente">Deficiente</option>
                </optgroup>
                <optgroup label="Existencia">
                    <option value="1">Menos de 3 años</option>
                    <option value="3">Más de 3 años</option>
                </optgroup>

            </select><br>
                <input type="submit" value="Consultar" class="boton" name="send">
            </form>
        </div>
    </section>
    <section id="general" style="padding-left: 220px">
    <div id="tab">
        <br>
        <?php
        include_once '../../includes/user.php';
        $user = new User();
        if (isset($_POST['send'])) {
            $consulta=$_POST['consulta'];
            if ($consulta==1) {
                $user->verexir();
            } elseif ($consulta==3) {
                $user->verexir1();
            }else{
                $user->verred($consulta);
            }
                   
        }?>
        </div>
        </div>
        <br>
        <div style="padding-left: 220px">
            Exportar a excel<br>
        <button onclick="exportTableToExcel('resultado', 'Reporte de equipos area de trabajo')" style="width: 150px; background-color:none;" class="xpore">Equipos</button>
        </div>
        
    </div>
    <input type="button" value="Create PDF" id="btPrint" onclick="createPDF()" style="width: 100px">
    <script type="text/javascript">
        function createPDF() {
        var fe= new Date();
        var sTable = document.getElementById('tab').innerHTML;
        var style = "<style>"; 
        style=style+"h2{font-size: 15px;text-align: center;}";       
        style = style + "table, th, td {width: auto;text-align: center; padding-right: 4px; padding-left: 4px;  border: 1px solid #898383; border-collapse: collapse; margin: auto; font-size: 11px;}";
        style=style + ".header{background-color: rgb(0,102,204); margin-top: auto; position: relative; text-align: center;}";
        style=style+".im{width: 250; height: 80px;}"
        style = style + "</style>";
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write(style);
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<h2>Reporte de equipos ',fe.getDate(),'/',fe.getMonth(),'/',fe.getFullYear(),' ',fe.getHours(),':',fe.getMinutes(),'</h2>');
        win.document.write(sTable);
        win.document.write('</body></html>');
        win.document.close();
        win.print();    
    }
    </script>
    <script type="text/javascript" src="../../js/tabla.js"></script>
</body>
</html>