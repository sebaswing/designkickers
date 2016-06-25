<?php

function busquedacouch(){
include("functions.php");
$link = conectar($ubicacion, $categoria);

                      if(isset($ubicacion) or isset($categoria))
                      {
	                      if($ubicacion!=null and $categoria!=null)
	                      {
	                      	  $sql= "SELECT DISTINCT c.mail nombre,
	                                    c.id_couch idCouch,
	                                    c.id_categoria idcategoria,
	                                    c.fecha_cierre fecha_cierre, 
	                                    c.id_ciudad ciudad,
	                                    c.descripcion descripcion,
	                                    c.titulo titulo,
	                                    c.eliminado eliminado,
	                                    f.fotoperfil esPerfil,
	                                    f.imagen foto,
	                                    f.type tipo,
	                                    u.numTarjeta tarjeta
	                             FROM couch c INNER JOIN fotografia f INNER JOIN usuario u
	                             WHERE (f.id_couch=c.id_couch and c.mail = '".$_SESSION['mail']."' and c.eliminado=1 and f.fotoperfil=1 and u.mail=c.mail and c.id_ciudad='".$ubicacion."'
	                             and c.id_categoria='".$categoria."') ORDER BY f.id_fotografia DESC";
	                      }
	                      else if($ubicacion!=null)
	                      {
	                      	  $sql= "SELECT DISTINCT c.mail nombre,
	                                    c.id_couch idCouch,
	                                    c.id_categoria idcategoria,
	                                    c.fecha_cierre fecha_cierre, 
	                                    c.id_ciudad ciudad,
	                                    c.descripcion descripcion,
	                                    c.titulo titulo,
	                                     c.eliminado eliminado,
	                                    f.fotoperfil esPerfil,
	                                    f.imagen foto,
	                                    f.type tipo,
	                                    u.numTarjeta tarjeta
	                             FROM couch c INNER JOIN fotografia f INNER JOIN usuario u
	                             WHERE (f.id_couch=c.id_couch and c.mail = '".$_SESSION['mail']."'  and c.eliminado=1 and f.fotoperfil=1 and u.mail=c.mail and c.id_ciudad='".$ubicacion."') ORDER BY f.id_fotografia DESC";
	                      }
	                      else if ($categoria!=null) 
	                      {
	                      	  $sql= "SELECT DISTINCT c.mail nombre,
	                                    c.id_couch idCouch,
	                                    c.id_categoria idcategoria,
	                                    c.fecha_cierre fecha_cierre, 
	                                    c.id_ciudad ciudad,
	                                    c.descripcion descripcion,
	                                    c.titulo titulo,
	                                    c.eliminado eliminado,
	                                    f.fotoperfil esPerfil,
	                                    f.imagen foto,
	                                    f.type tipo,
	                                    u.numTarjeta tarjeta
	                             FROM couch c INNER JOIN fotografia f INNER JOIN usuario u
	                             WHERE (f.id_couch=c.id_couch and c.mail = '".$_SESSION['mail']."'  and f.fotoperfil=1 and c.eliminado=1 and u.mail=c.mail and c.id_categoria='".$categoria."') ORDER BY f.id_fotografia DESC";
	                      }
	                       else 
                      		{	
		                      $sql= "SELECT DISTINCT c.mail nombre,
		                                    c.id_couch idCouch,
		                                    c.id_categoria idcategoria,
		                                    c.fecha_cierre fecha_cierre, 
		                                    c.id_ciudad ciudad,
		                                    c.descripcion descripcion,
		                                    c.titulo titulo,
		                                    c.eliminado eliminado,
		                                    f.fotoperfil esPerfil,
		                                    f.imagen foto,
		                                    f.type tipo,
		                                    u.numTarjeta tarjeta
		                             FROM couch c INNER JOIN fotografia f INNER JOIN usuario u
		                             WHERE (f.id_couch=c.id_couch and c.mail = '".$_SESSION['mail']."' and c.eliminado=1 and f.fotoperfil=1 and u.mail=c.mail) ORDER BY f.id_fotografia DESC";
	                       }
		                  }
                      else 
                      {	
	                      $sql= "SELECT DISTINCT c.mail nombre, 
	                      						c.id_couch idCouch, 
	                      						c.id_categoria idcategoria, 
	                      						c.fecha_cierre fecha_cierre, 
	                      						c.id_ciudad ciudad, 
	                      						c.descripcion descripcion, 
	                      						c.titulo titulo, 
	                      						c.eliminado eliminado, 
	                      						c.mail correoC, 
	                      						f.fotoperfil esPerfil, 
	                      						f.imagen foto, 
	                      						f.type tipo, 
	                      						u.numTarjeta tarjeta 
	                      						FROM couch c INNER JOIN fotografia f INNER JOIN usuario u 
	                      						WHERE (f.id_couch=c.id_couch and c.mail = '".$_SESSION['mail']."' and c.eliminado=1 and f.fotoperfil=1 and u.mail=c.mail) ORDER BY f.id_fotografia DESC";
                       }
return $sql;
					   }
					   ?>