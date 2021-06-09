<?php

    $query = "INSERT INTO obj_alerta(nombre, apellido, doc, num_doc, telefono, direccion, nivel, programa, ficha, jornada, sede, cusa_reporte, reporte_diri, accion, documento_soporte, nombre_ins, apellido_ins, telefono_ins, correo_ins, responsable, fecha_registro)
    VALUES(:nombre, :apellido, :doc, :num_doc, :telefono, :direccion, :nivel, :programa, :ficha, :jornada, :sede, :cusa_reporte, :reporte_diri, :accion, :imagenProducto, :nombre_ins, :apellido_ins, :telefono_ins, :correo_ins, :responsable, NOW())";

    $resultado = Conexion::conectar()->prepare($query);

    $resultado->bindParam(":nombre",$nombre);
    $resultado->bindParam(":apellido",$apellido);
    $resultado->bindParam(":doc",$doc);
    $resultado->bindParam(":num_doc",$num_doc);
    $resultado->bindParam(":telefono",$telefono);
    $resultado->bindParam(":direccion",$direccion);
    $resultado->bindParam(":nivel",$nivel);
    $resultado->bindParam(":programa",$programa);
    $resultado->bindParam(":ficha",$ficha);
    $resultado->bindParam(":jornada",$jornada);
    $resultado->bindParam(":sede",$sede);
    $resultado->bindParam(":cusa_reporte",$cusa_reporte);
    $resultado->bindParam(":reporte_diri",$reporte_diri);
    $resultado->bindParam(":accion",$accion);
    $resultado->bindParam(":imagenProducto",$imagenProducto);
    $resultado->bindParam(":nombre_ins",$nombre_ins);
    $resultado->bindParam(":apellido_ins",$apellido_ins);
    $resultado->bindParam(":telefono_ins",$telefono_ins);
    $resultado->bindParam(":correo_ins",$correo_ins);
    $resultado->bindParam(":responsable",$responsable);
    $resultado->execute();

?>