<?php
include 'db.php';
class User extends DB{
    private $nombre;
    private $username;
    private $userid;
    //consultas de datos existentes
    public function useExists($user){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE n_user = :user');
        $query->execute(['user' => $user]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function ageExists($agen){
        $query = $this->connect()->prepare('SELECT * FROM agencia WHERE n_agencia =?');
        $query->execute([$agen]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function areExists($are){
        $query = $this->connect()->prepare('SELECT * FROM area WHERE nombre =?');
        $query->execute([$are]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function pueExists($nomb){
        $query = $this->connect()->prepare('SELECT * FROM puesto WHERE nombre =?');
        $query->execute([$nomb]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function empExists($empl){
        $query = $this->connect()->prepare('SELECT * FROM empleado WHERE nombres =?');
        $query->execute([$empl]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function usemExists($us){
        $query = $this->connect()->prepare('SELECT * FROM empleado WHERE usuario =?');
        $query->execute([$us]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function acpcExists($us){
        $query = $this->connect()->prepare('SELECT * FROM pc WHERE no_activo=?');
        $query->execute([$us]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            return $res["no_activo"];            
        }
    }

    public function acdiExists($us){
        $query = $this->connect()->prepare('SELECT * FROM dispositivo WHERE no_activo=?');
        $query->execute([$us]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            return $res["no_activo"];            
        }
    }

    public function acreExists($us){
        $query = $this->connect()->prepare('SELECT * FROM red WHERE no_activo=?');
        $query->execute([$us]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            return $res["no_activo"];            
        }
    }

    public function ipeExists($us){
        $query = $this->connect()->prepare('SELECT * FROM pc WHERE ip=?');
        $query->execute([$us]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            return $res["ip"];            
        }
    }

    public function ipdExists($us){
        $query = $this->connect()->prepare('SELECT * FROM dispositivo WHERE ip=?');
        $query->execute([$us]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            return $res["ip"];            
        }
    }

    public function iprExists($us){
        $query = $this->connect()->prepare('SELECT * FROM red WHERE no_ip=?');
        $query->execute([$us]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            return $res["no_ip"];            
        }
    }


    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE n_user = :user AND pass = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE n_user = :user');
        $query->execute(['user' => $user]);
        foreach ($query as $currentUser) {
            $this->username = $currentUser['nombre'];
            $this->userid = $currentUser['n_user'];
        }
    }
    public function getNombre(){
        return $this->username;
    }
    public function getiduser(){
        return $this->userid;
    }

    //registrar un nuevo usuario
    public function inse_use(){
        $us=$_POST['reg_user'];
        $pa=$_POST['reg_pas'];
        $nom=$_POST['reg_nom'];
        $ema=$_POST['email'];
        $sql="INSERT INTO users(n_user,pass,correo,nombre)
                VALUES('$us','$pa','$ema','$nom')";
            if ($this->connect()->query($sql)===true) {
                header("location:index.php");
            }else{
            }
    }
    //actualizar user
    public function auser(){
        $rus=$_POST['auser'];
        $us=$_POST['areg_user'];
        $pa=$_POST['areg_pas'];
        $nom=$_POST['areg_nom'];
        $ema=$_POST['aemail'];
        $sql5 =("UPDATE users SET n_user=?, pass=?, correo=?, nombre=? where n_user=?");
        $stmt5=$this->connect()->prepare($sql5);
        if ($stmt5->execute([$us,$pa,$ema,$nom,$rus])) {
            echo "<script>alert('Usario actualizado')window.location.href='registro.php';</script>";
        }else{
            echo "<script>alert('Error')</script>";
        }
    }
    public function verus(){
        $query = $this->connect()->prepare("SELECT * FROM users");
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo '<option value="'.$res["n_user"].'">'.$res["n_user"].' </option>';            
        }
    }

    //---------Consultas--------------
    public function verage(){
        $query = $this->connect()->prepare("SELECT * FROM agencia");
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo '<option value="'.$res["n_agencia"].'">'.$res["n_agencia"].' '.$res["nombre"].' </option>';            
        }
    }
    public function verare(){
        $query = $this->connect()->prepare("SELECT * FROM area");
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo '<option value="'.$res["nombre"].'">'.$res["nombre"].'</option>';            
        }
    }
    public function verpuesto(){
        $query = $this->connect()->prepare("SELECT * FROM puesto");
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo '<option value="'.$res["nombre"].'">'.$res["nombre"].'</option>';            
        }
    }
    public function veremple(){
        $query = $this->connect()->prepare("SELECT * FROM empleado Where estado=''");
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo '<option value="'.$res["nombres"].'">'.$res["nombres"].' </option>';            
        }
    }

    public function verdisa($emple){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo WHERE empleado=?" );
        $query->execute([$emple]);
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo ('<tbody>
                <td>'.$res["id"].'</td>
                <td>'.$res["nombre"].'</td>
                <td>'.$res["no_activo"].'</td>
                <td>'.$res["marca"].'</td>
                <td>'.$res["modelo"].'</td>
                <td>'.$res["serie"].'</td>
                <td>'.$res["ip"].'</td>
                <td>'.$res["fecha_entrada"].'</td>
                <td>'.$res["estado"].'</td>
                </tbody>');          
        }
    }

    public function verpc(){
        $query = $this->connect()->prepare("SELECT * FROM pc");
        $query->execute();
        echo "<br> <h2>Datos de equipo </h2><b>";
        echo "<table>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<td>Estado</td>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    public function verdc(){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo");
        $query->execute();
        echo "<br> <h2>Datos del dispositivo </h2><br>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    //ver por empleado
    public function verempleado($valor){
        $query = $this->connect()->prepare("SELECT * FROM pc WHERE empleado=? and estatus=' '");
        $query->execute([$valor]);
        echo "<p>".$valor."</p>";
        echo "<br> <h2>Datos de equipo </h2>";
        echo "<table id='vrpcem'>";     
                echo "<tr>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<td> Estado</td>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>";
    }
    public function verempleados($valor){
        $query = $this->connect()->prepare("SELECT * FROM software WHERE empleado=?");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del software </h2>";
        echo "<table id='resultado2'>";     
                echo "<tr>";
                echo "<th> Nombre de software </th>";
                echo "<th> Edición </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    public function verempleadodc($valor){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo WHERE empleado=?");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del dispositivo </h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    //ver por area
    public function verearea($valor){
        $query = $this->connect()->prepare("SELECT p.empleado, p.no_activo, p.tipo, p.so, p.edicion, p.licencia, p.marca, p.modelo, p.serie, p.ip, p.fecha_entrada, p.mack_pc, p.estado
            FROM empleado e, pc p
            WHERE ?=e.area and e.nombres=p.empleado;");
        $query->execute([$valor]);
        echo "<h2>$valor</h2>";
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<td> Estado </td>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>";
    }
    public function vereareas($valor){
        $query = $this->connect()->prepare("SELECT p.nombre, p.edicion, p.empleado
        FROM empleado e, software p
        WHERE ?=e.area and e.nombres=p.empleado;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del software </h2>";
        echo "<table id='resultado2'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre de software </th>";
                echo "<th> Edición </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    public function verareasdc($valor){
        $query = $this->connect()->prepare("SELECT e.nombres, p.nombre, p.no_activo, p.marca, p.modelo, p.serie, p.fecha_entrada, p.estado
            FROM empleado e, dispositivo p
            WHERE ?=e.area and e.nombres=p.empleado;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del dispositivo</h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["nombres"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    //ver por agencia
    public function vereagancia($valor){
        $query = $this->connect()->prepare("SELECT p.empleado, p.no_activo, p.tipo, p.so, p.edicion, p.licencia, p.marca, p.modelo, p.serie, p.ip, p.fecha_entrada, p.mack_pc, p.estado
            FROM empleado e, pc p
            WHERE ?=e.agencia and e.nombres=p.empleado and e.estado='';");
        $query->execute([$valor]);
        echo "<h2>$valor</h2>";
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>";
    }
    public function vereagencias($valor){
        $query = $this->connect()->prepare("SELECT e.nombres, p.nombre, p.edicion
        FROM empleado e, software p
        WHERE ?=e.agencia and e.nombres=p.empleado;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del software </h2>";
        echo "<table id='resultado1'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre de software </th>";
                echo "<th> Edición </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["nombres"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    public function veragenciadc($valor){
        $query = $this->connect()->prepare("SELECT p.empleado, p.nombre, p.no_activo, p.marca, p.modelo, p.serie, p.fecha_entrada, p.estado
            FROM empleado e, dispositivo p
            WHERE ?=e.agencia and e.nombres=p.empleado;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del dispositivo</h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    //ver por activo
    public function veractivo($valor){
        $query = $this->connect()->prepare("SELECT * FROM pc WHERE no_activo=?;");
        $query->execute([$valor]);
        echo "<h2>$valor</h2>";
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>";
    }
    public function vereactivos($valor){
        $query = $this->connect()->prepare("SELECT p.empleado, d.nombre, d.edicion
        FROM software d, pc p
        WHERE ?=p.no_activo and d.empleado=p.empleado;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del software </h2>";
        echo "<table id='resultado2'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre de software </th>";
                echo "<th> Edición </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    public function vereactivospc($valor){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo Where no_activo=?;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del dispositivo</h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }

    //ver por estado
    public function vereestado($valor){
        $query = $this->connect()->prepare("SELECT * FROM pc WHERE estado=?;");
        $query->execute([$valor]);
        echo "<h2>$valor</h2>";
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>";
    }
    public function verestadosdc($valor){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo WHERE estado=?;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del dispositivo</h2>";
        echo "<table id='resultado2'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    public function verred($valor){
        $query = $this->connect()->prepare("SELECT * FROM red WHERE estado=?;");
        $query->execute([$valor]);
        echo "<br> <h2>Datos del dispositivo</h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Agencia </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Ip </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["agencia"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["no_ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }

    //Consultas de soporte
    

    public function todosoporte(){
     $query = $this->connect()->prepare("SELECT * FROM soporte");
        $query->execute();
        echo "<br> <h2>Todos los tickets</h2>";
        echo "<div class='ared'>
        <table id='resultado'>";     
                echo "<div><tr>";
                echo "<th> ID ticket</th>";
                echo "<th> Tecnico </th>";
                echo "<th> Empleado </th>";
                echo "<th> Agencia </th>";
                echo "<th> Puesto </th>";
                echo "<th> Dirección Ip </th>";
                echo "<th> Problema </th>";
                echo "<th> Estado </th>";
                echo "<th> Fecha de entrada </th>";
                echo "<th> Fecha de solución </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["id"]."</td>";
                echo "<td>".$res["tecnico"]."</td>";
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["agencia"]."</td>";
                echo "<td>".$res["puesto"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["problema"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "<td>".$res["fecha_activo"]."</td>";
                echo "<td>".$res["fecha_solucion"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table> </div>";    
    }

    public function adcopor(){
        $query = $this->connect()->prepare("SELECT * FROM users WHERE nombre!='Administrador'");
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            echo '<option value="'.$res["nombre"].'">'.$res["nombre"].' </option>';            
        }
    }
    function hora(){
        $query = $this->connect()->prepare('SELECT now()');
        $query->execute();
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $res["now()"];            
        }      
    }
    public function verexip(){
        $query = $this->connect()->prepare("SELECT * FROM pc");
        $query->execute();
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $fecha= $res["fecha_entrada"];
                $dia = date("j");
                $mes = date("n");
                $anio= date("Y");

                $anioN= substr($fecha,0,4);
                $mesN = substr($fecha,5,2);
                $diaN = substr($fecha,8,2); 
                if ($mesN>$mes) {
                    $edad = $anio - $anioN -1;
                } else if($mes==$mesN && $diaN > $dia){
                        $edad = $anio - $anioN -1;
                    }
                    else{
                        $edad = $anio - $anioN;
                    }
            if ($edad<=3) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>"; 
            }                                     
        }
        echo "</table>";
    }
    public function verexip1(){
        $query = $this->connect()->prepare("SELECT * FROM pc");
        $query->execute();
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $fecha= $res["fecha_entrada"];
                $dia = date("j");
                $mes = date("n");
                $anio= date("Y");

                $anioN= substr($fecha,0,4);
                $mesN = substr($fecha,5,2);
                $diaN = substr($fecha,8,2); 
                if ($mesN>$mes) {
                    $edad = $anio - $anioN -1;
                } else if($mes==$mesN && $diaN > $dia){
                        $edad = $anio - $anioN -1;
                    }
                    else{
                        $edad = $anio - $anioN;
                    }
            if ($edad>=3) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>"; 
            }                                     
        }
        echo "</table>";
    }
    public function verexid(){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo");
        $query->execute();
        echo "<h2>Datos de dispositivo </h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $fecha= $res["fecha_entrada"];
                $dia = date("j");
                $mes = date("n");
                $anio= date("Y");

                $anioN= substr($fecha,0,4);
                $mesN = substr($fecha,5,2);
                $diaN = substr($fecha,8,2); 
                if ($mesN>$mes) {
                    $edad = $anio - $anioN -1;
                } else if($mes==$mesN && $diaN > $dia){
                        $edad = $anio - $anioN -1;
                    }
                    else{
                        $edad = $anio - $anioN;
                    }
            if ($edad<=3) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>"; 
            }                                     
        }
        echo "</table>";
    }
    public function verexid1(){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo");
        $query->execute();
        echo "<h2>Datos de dispositivo </h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $fecha= $res["fecha_entrada"];
                $dia = date("j");
                $mes = date("n");
                $anio= date("Y");

                $anioN= substr($fecha,0,4);
                $mesN = substr($fecha,5,2);
                $diaN = substr($fecha,8,2); 
                if ($mesN>$mes) {
                    $edad = $anio - $anioN -1;
                } else if($mes==$mesN && $diaN > $dia){
                        $edad = $anio - $anioN -1;
                    }
                    else{
                        $edad = $anio - $anioN;
                    }
            if ($edad>=3) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>"; 
            }                                     
        }
        echo "</table>";
    }
    public function verexir(){
        $query = $this->connect()->prepare("SELECT * FROM red");
        $query->execute();
        echo "<h2>Datos de dispositivo </h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Agencia </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Ip </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $fecha= $res["fecha_entrada"];
                $dia = date("j");
                $mes = date("n");
                $anio= date("Y");

                $anioN= substr($fecha,0,4);
                $mesN = substr($fecha,5,2);
                $diaN = substr($fecha,8,2); 
                if ($mesN>$mes) {
                    $edad = $anio - $anioN -1;
                } else if($mes==$mesN && $diaN > $dia){
                        $edad = $anio - $anioN -1;
                    }
                    else{
                        $edad = $anio - $anioN;
                    }
            if ($edad<=3) {
                echo "<td>".$res["agencia"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["no_ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";
            }                                     
        }
        echo "</table>";
    }
    public function verexir1(){
        $query = $this->connect()->prepare("SELECT * FROM red");
        $query->execute();
        echo "<h2>Datos de dispositivo </h2>";
        echo "<table id='resultado3'>";     
                echo "<tr>";
                echo "<th> Agencia </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Ip </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
            $fecha= $res["fecha_entrada"];
                $dia = date("j");
                $mes = date("n");
                $anio= date("Y");

                $anioN= substr($fecha,0,4);
                $mesN = substr($fecha,5,2);
                $diaN = substr($fecha,8,2); 
                if ($mesN>$mes) {
                    $edad = $anio - $anioN -1;
                } else if($mes==$mesN && $diaN > $dia){
                        $edad = $anio - $anioN -1;
                    }
                    else{
                        $edad = $anio - $anioN;
                    }
            if ($edad>=3) {
                echo "<td>".$res["agencia"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["no_ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>"; 
            }                                     
        }
        echo "</table>";
    }
    public function verbajapc(){
       $query = $this->connect()->prepare("SELECT * FROM pc WHERE estatus='Inactivo';");
        $query->execute();
        echo "<h2></h2>";
        echo "<h2>Datos de equipo </h2>";
        echo "<table id='resultado'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> No activo </th>";
                echo "<th> Tipo </th>";
                echo "<th> SO </th>";
                echo "<th> Edicion </th>";
                echo "<th> Licencia </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> IP </th>";
                echo "<th> Fecha </th>";
                echo "<th> MAC </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["tipo"]."</td>";
                echo "<td>".$res["so"]."</td>";
                echo "<td>".$res["edicion"]."</td>";
                echo "<td>".$res["licencia"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["ip"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["mack_pc"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>";
    }

    public function verbajadp(){
        $query = $this->connect()->prepare("SELECT * FROM dispositivo WHERE estatus='Inactivo';");
        $query->execute();
        echo "<br> <h2>Datos del dispositivo</h2>";
        echo "<table id='resultado2'>";     
                echo "<tr>";
                echo "<th> Empleado </th>";
                echo "<th> Nombre </th>";
                echo "<th> No activo </th>";
                echo "<th> Marca </th>";
                echo "<th> Modelo </th>";
                echo "<th> Serie </th>";
                echo "<th> Fecha </th>";
                echo "<th> Estado </th>";
                echo "<tr>";
        $resultado=$query->fetchAll();
        foreach ($resultado as $res) {
                echo "<td>".$res["empleado"]."</td>";
                echo "<td>".$res["nombre"]."</td>";
                echo "<td>".$res["no_activo"]."</td>";
                echo "<td>".$res["marca"]."</td>";
                echo "<td>".$res["modelo"]."</td>";
                echo "<td>".$res["serie"]."</td>";
                echo "<td>".$res["fecha_entrada"]."</td>";
                echo "<td>".$res["estado"]."</td>";
                echo "</tr>";                                   
        }
        echo "</table>"; 
    }
    function obtenerExtensionFichero($str)
    {
        return end(explode(".", $str));
    }

//cerrar la clase
}    
?>