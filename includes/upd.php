<?php
include 'db.php';
class Upd extends DB{

    public function datos($valor){
        $query = $this->connect()->prepare("SELECT e.area, e.puesto, e.nombres, e.usuario, e.paswor, e.agencia, a.nombre
            FROM empleado e, agencia a
            WHERE ?=e.nombres and e.nombres=a.empleado;");
        $query->execute([$valor]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
        echo '<section class="da">
        <form method="POST">
        <div class="docs">
        <section id="datosem">
                <div class="estilo">
                    Datos agencia</br>
                    <input type="text" id="db_nager" value="'.$res["area"].'" required="">
                    <input type="text" id="db_ager" value="'.$res["nombre"].'">
                </div>
                    <div class="estilo" id="user">
                    Datos del empleado </br>
                    Área:
                    <select id="op">
                        <optgroup label="Área actual">
                            <option value="'.$res["area"].'">'.$res["area"].'</option>
                        </optgroup>
                        <optgroup label="Área nuevo">
                            <option value="Jefe de agencia">Jefe de agencia</option>
                            <option value="Cajero general">Cajero general</option>
                            <option value="Receptor Pagador">Receptor Pagador</option>
                            <option value="Secretaría">Secretaría</option>
                            <option value="Ejecutivo">Ejecutivo</option>
                            <option value="Asesor de crédito">Asesor de crédito</option>
                            <option value="Oficial de crédito">Oficial de crédito</option>
                            <option value="Agentes">Agentes</option>
                        </optgroup>
                    </select></br>
                        <input type="text" id="pu" value="'.$res["puesto"].'" required>
                        <input type="text" id="db_nom" value="'.$res["nombres"].'" required>
                        <input type="text" id="db_user" value="'.$res["usuario"].'">
                        <input type="text" id="db_pas" value="'.$res["paswor"].'">
                    </div>
                    <input type="button" value="Modificar datos" class="boton" onclick="">
                </div>
        </form>
        </section>';                  
        }
    }

    public function equi($valor){
        $query = $this->connect()->prepare("SELECT * FROM pc WHERE empleado=?");
        $query->execute([$valor]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
        echo '
        <div class="docs">
        <section id="pc">
            <form>
                <div class="estilo">
                Datos del equipo </br>
                    <select id="db_etipo">
                        <optgroup label="Tipo de quipo actual">
                            <option value="'.$res["tipo"].'">'.$res["tipo"].'</option>
                        </optgroup>
                        <optgroup label="Nuevo tipo de equipo">
                            <option value="Escritorio">Escritorio</option>
                            <option value="Laptop">Laptop</option>
                        </optgroup>
                    </select>
                    <input type="text" id="db_eactivo" value="'.$res["no_activo"].'" required>
                    <input type="text" id="db_so" value="'.$res["so"].'" required>
                    <input type="text" id="db_edicion" value="'.$res["edicion"].'">
                    <input type="text" id="db_licencia" value="'.$res["licencia"].'">
                    <input type="text" id="db_emarca" value="'.$res["marca"].'">
                    <input type="text" id="db_emodelo" value="'.$res["modelo"].'">
                    <input type="text" id="db_eserie" value="'.$res["serie"].'">    
                    <input type="text" id="db_eip" value="'.$res["ip"].'">
                    <input type="text" id="db_epasw" value="'.$res["paswor"].'">
                    <input type="text" id="db_epmac" placeholder="MAC" value="'.$res["mack_pc"].'">
                    <input type="date" id="db_edate" value="'.$res["fecha_entrada"].'"></br>
                    <!agregamos el estado del equipo!>
                            Estado
                            <select id="estadop">
                                <optgroup label="Estado actual">
                                    <option value="'.$res["estado"].'">'.$res["estado"].'</option>
                                </optgroup>
                                <optgroup label="Nuevo estado">
                                <option value="Excelente">Excelente</option>
                                <option value="Bueno">Bueno</option>
                                <option value="Deficiente">Deficiente</option>
                                </optgroup>
                            </select>
                    <!otros dispositivo>
                </div>
            </form>
        </section>
        </div>';                               
        }
    }

    public function sof($valor){
        $query = $this->connect()->prepare("SELECT * FROM software WHERE empleado=?");
        $query->execute([$valor]);
        $resultado=$query->fetchAll();
        echo '
            <div class="docs">
            <section id="sof">      
                <div class="estilo">
                    Datos del software </br>
                        <input type="text" placeholder="Software *" id="nombre">
                        <input type="text" placeholder="Edición" id="edicion">
                        <input type="button" onclick="guardars();" value="Agregar">
                        <table class="software">
                          <thead>
                            <th>Nombre</th>
                            <th>Edicion</th>                    
                          </thead>
                          <tbody id="tablas">';
        foreach ($resultado as $res) {
        echo '              <tr><td class"nombre">'.$res["nombre"].'</td>
                            <td class"edicion">'.$res["edicion"].'</td></tr>
                        ';
        }
        echo '</tbody>
                        </table><br>
                        <input type="number" name="" placeholder="Numero de fila" id="s">
                        <input type="button" value="Eliminar" onclick="eliminas()"></br></br>           
                </div>
                    <input type="button" value="Modificar equipo" class="boton" onclick="">
            </section>
            </div>
            ';                                   
    }

    public function dis($valor){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo WHERE empleado=?");
        $query->execute([$valor]);
        $resultado=$query->fetchAll();
        echo '<form>
                <div class="docs">
                    <section id="dis">
                        <div class="estilo">
                        Datos del dispositivo</br>
                        <input type="text" name="" placeholder="Tipo de dispositivo *" id="opd">
                        <input type="text" name="" placeholder="Codigo activo" id="c_act">
                        <input type="text" name="" placeholder="Marca *" id="marca">
                        <input type="text" name="" placeholder="Modelo *" id="modelo">
                        <input type="text" name="" placeholder="No. serie *" id="n_serie">
                        <input type="date" name="" id="date"></br>
                            <!agregamos el estado del dispositivo!>
                            Estado
                            <select id="d_estado">
                                <option value="exelente">Exelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="deficiente">Deficiente</option>
                            </select>
                            <input type="button" value="Agregar Dipositivo" onclick="guardard()" id="enviar"></br></br>
                            <table class="dispositi">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Cod. Activo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>No. serie</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="tablita">';
                                foreach ($resultado as $res) {
                                echo '<tr>
                                <td class"nombre">'.$res["nombre"].'</td>
                                <td class"edicion">'.$res["no_activo"].'</td>
                                <td class"edicion">'.$res["marca"].'</td>
                                <td class"edicion">'.$res["modelo"].'</td>
                                <td class"edicion">'.$res["serie"].'</td>
                                <td class"edicion">'.$res["fecha_entrada"].'</td>
                                <td class"edicion">'.$res["estado"].'</td>
                                </tr>';
                                }
                                echo '</tbody>
                            </table>
                            <input type="number" name="" placeholder="Numero de fila" id="f">
                            <input type="button" value="Eliminar" onclick="elimina()"></br></br>
                        </div>
                    <input type="button" value="Modificar" class="boton" onclick="">
                </section>
            </form> 
            </div>';
    }
}