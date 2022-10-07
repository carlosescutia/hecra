<?php

// Datos de calidad del producto estadístico
$calc_indicadores_calidad_pe = array();

// Comparabilidad
// Reglas de la subsección: 
//      si indicador 64 = 0 
//          valor = indicador 63
//      else
//          valor = sumaproducto (valor, peso)
//      fin
//
// Reglas de la subsección: si indicador 64 = 0, entonces valor = indicador 63, else valor = sumaproducto
//
$valor = 0;
$valor_ryp = 0;
$curr_subseccion = 27;
$nom_subseccion = 'Comparabilidad';
$peso1 = 0.2;
$peso2 = 0.236;
$valor64 = 0;
$valor63 = 0;
$valor_ryp64 = 0;
$valor_ryp63 = 0;
// Obtener indicador 64
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        if ($datos_calidad_indicadores_pe_item['cve_indicador_calidad'] == 64) {
            $valor64 = $datos_calidad_indicadores_pe_item['valor'];
            $valor_ryp64 = $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
// Obtener indicador 63
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        if ($datos_calidad_indicadores_pe_item['cve_indicador_calidad'] == 63) {
            $valor63 = $datos_calidad_indicadores_pe_item['valor'];
            $valor_ryp63 = $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
if ($valor64 == 0) {
    $valor = $valor63;
} else {
    // calcular valores mediante suma producto
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
            $valor += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor'];
        }
    }
}
if ($valor_ryp64 == 0) {
    $valor_ryp = $valor_ryp63;
} else {
    // calcular valores mediante suma producto
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
            $valor_ryp += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
array_push($calc_indicadores_calidad_pe, array(
        'subseccion' => $curr_subseccion, 
        'nom_subseccion' => $nom_subseccion,
        'valor' => $valor,
        'valor_ryp' => $valor_ryp,
        'peso1' => $peso1,
        'peso2' => $peso2
    )
);

// Relevancia
// Reglas de la subsección: 
//      valor = sumaproducto (valor, peso)
//
$valor = 0;
$valor_ryp = 0;
$curr_subseccion = 28;
$nom_subseccion = 'Relevancia';
$peso1 = 0.2;
$peso2 = 0.236;
// calcular valores mediante suma producto
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        $valor += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor'];
        $valor_ryp += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor_ryp'];
    }
}
array_push($calc_indicadores_calidad_pe, array(
        'subseccion' => $curr_subseccion, 
        'nom_subseccion' => $nom_subseccion,
        'valor' => $valor,
        'valor_ryp' => $valor_ryp,
        'peso1' => $peso1,
        'peso2' => $peso2
    )
);

// Coherencia
// Reglas de la subsección: 
//      si indicador 69 = 0 
//          si indicador 70 = 0
//              valor = 0
//          else
//              valor = indicador 70
//          fin
//      else
//          si indicador 70 = 0
//              valor = indicador 69
//          else
//              valor = sumaproducto (valor, peso)
//          fin
//      fin
//
$valor = 0;
$valor_ryp = 0;
$curr_subseccion = 29;
$nom_subseccion = 'Coherencia';
$peso1 = 0.15;
$peso2 = 0;
$valor69 = 0;
$valor70 = 0;
$valor_ryp69 = 0;
$valor_ryp70 = 0;
// Obtener indicador 69
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        if ($datos_calidad_indicadores_pe_item['cve_indicador_calidad'] == 69) {
            $valor69 = $datos_calidad_indicadores_pe_item['valor'];
            $valor_ryp69 = $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
// Obtener indicador 70
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        if ($datos_calidad_indicadores_pe_item['cve_indicador_calidad'] == 70) {
            $valor70 = $datos_calidad_indicadores_pe_item['valor'];
            $valor_ryp70 = $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
if ($valor69 == 0) {
    if ($valor70 == 0) {
        $valor = 0;
    } else {
        $valor = $valor70;
    }
} else {
    if ($valor70 == 0) {
        $valor = $valor69;
    } else {
        // calcular valores mediante suma producto
        foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
            if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
                $valor += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor'];
            }
        }
    }
}
if ($valor_ryp69 == 0) {
    if ($valor_ryp70 == 0) {
        $valor_ryp = 0;
    } else {
        $valor_ryp = $valor_ryp70;
    }
} else {
    if ($valor_ryp70 == 0) {
        $valor_ryp = $valor_ryp69;
    } else {
        // calcular valores mediante suma producto
        foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
            if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
                $valor_ryp += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor_ryp'];
            }
        }
    }
}
array_push($calc_indicadores_calidad_pe, array(
        'subseccion' => $curr_subseccion, 
        'nom_subseccion' => $nom_subseccion,
        'valor' => $valor,
        'valor_ryp' => $valor_ryp,
        'peso1' => $peso1,
        'peso2' => $peso2
    )
);


// Disponiblidad y transparencia
// Reglas de la subsección: 
//      valor = sumaproducto (valor, peso)
//
$valor = 0;
$valor_ryp = 0;
$curr_subseccion = 30;
$nom_subseccion = 'Disponibilidad y transparencia';
$peso1 = 0.15;
$peso2 = 0.176;
// calcular valores mediante suma producto
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        $valor += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor'];
        $valor_ryp += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor_ryp'];
    }
}
array_push($calc_indicadores_calidad_pe, array(
        'subseccion' => $curr_subseccion, 
        'nom_subseccion' => $nom_subseccion,
        'valor' => $valor,
        'valor_ryp' => $valor_ryp,
        'peso1' => $peso1,
        'peso2' => $peso2
    )
);

// Precisión y exactitud
// Reglas de la subsección: 
//      si indicador 73 = 0 
//          valor = sumaproducto (valor, peso + 0.0166) EXCLUYENDO indicador 73
//      else
//          valor = sumaproducto (valor, peso) 
//      fin
//
$valor = 0;
$valor_ryp = 0;
$curr_subseccion = 31;
$nom_subseccion = 'Precisión y exactitud';
$peso1 = 0.15;
$peso2 = 0.176;
$valor73 = 0;
$valor_ryp73 = 0;
// Obtener indicador 73
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        if ($datos_calidad_indicadores_pe_item['cve_indicador_calidad'] == 73) {
            $valor73 = $datos_calidad_indicadores_pe_item['valor'];
            $valor_ryp73 = $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
if ($valor73 == 0) {
    // calcular valores mediante suma producto EXCLUYENDO indicador 73 y sumando 0.0166 a peso
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion && $datos_calidad_indicadores_pe_item['cve_indicador_calidad'] !== 73) {
            $valor += ($datos_calidad_indicadores_pe_item['peso'] + 0.0166) * $datos_calidad_indicadores_pe_item['valor'];
        }
    }
} else {
    // calcular valores mediante suma producto 
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
            $valor += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor'];
        }
    }
}
if ($valor_ryp73 == 0) {
    // calcular valores mediante suma producto EXCLUYENDO indicador 73 y sumando 0.0166 a peso
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion && $datos_calidad_indicadores_pe_item['cve_indicador_calidad'] !== 73) {
            $valor_ryp += ($datos_calidad_indicadores_pe_item['peso'] + 0.0166) * $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
} else {
    // calcular valores mediante suma producto 
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
            $valor_ryp += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
array_push($calc_indicadores_calidad_pe, array(
        'subseccion' => $curr_subseccion, 
        'nom_subseccion' => $nom_subseccion,
        'valor' => $valor,
        'valor_ryp' => $valor_ryp,
        'peso1' => $peso1,
        'peso2' => $peso2
    )
);

// Oportunidad y puntualidad
// Reglas de la subsección: 
//      si indicador 80 = 0 
//          valor = sumaproducto (valor, peso + 0.0166) EXCLUYENDO indicador 80
//      else
//          valor = sumaproducto (valor, peso) 
//      fin
//
$valor = 0;
$valor_ryp = 0;
$curr_subseccion = 32;
$nom_subseccion = 'Oportunidad y puntualidad';
$peso1 = 0.15;
$peso2 = 0.176;
$valor80 = 0;
$valor_ryp80 = 0;
// Obtener indicador 80
foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
    if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
        if ($datos_calidad_indicadores_pe_item['cve_indicador_calidad'] == 80) {
            $valor80 = $datos_calidad_indicadores_pe_item['valor'];
            $valor_ryp80 = $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
if ($valor80 == 0) {
    // calcular valores mediante suma producto EXCLUYENDO indicador 80 y sumando 0.17 a peso
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion && $datos_calidad_indicadores_pe_item['cve_indicador_calidad'] !== 80) {
            $valor += ($datos_calidad_indicadores_pe_item['peso'] + 0.17) * $datos_calidad_indicadores_pe_item['valor'];
        }
    }
} else {
    // calcular valores mediante suma producto 
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
            $valor += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor'];
        }
    }
}
if ($valor_ryp80 == 0) {
    // calcular valores mediante suma producto EXCLUYENDO indicador 80 y sumando 0.17 a peso
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion && $datos_calidad_indicadores_pe_item['cve_indicador_calidad'] !== 80) {
            $valor_ryp += ($datos_calidad_indicadores_pe_item['peso'] + 0.17) * $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
} else {
    // calcular valores mediante suma producto 
    foreach ($datos_calidad_indicadores_pe as $datos_calidad_indicadores_pe_item) {
        if ($datos_calidad_indicadores_pe_item['cve_subseccion'] == $curr_subseccion) {
            $valor_ryp += $datos_calidad_indicadores_pe_item['peso'] * $datos_calidad_indicadores_pe_item['valor_ryp'];
        }
    }
}
array_push($calc_indicadores_calidad_pe, array(
        'subseccion' => $curr_subseccion, 
        'nom_subseccion' => $nom_subseccion,
        'valor' => $valor,
        'valor_ryp' => $valor_ryp,
        'peso1' => $peso1,
        'peso2' => $peso2
    )
);

// Valor final
// Reglas: 
//      si valor de subseccion coherencia = 0 
//          valor = sumaproducto (valor, peso2) EXCLUYENDO subseccion coherencia
//      else
//          valor = sumaproducto (valor, peso1) 
//      fin
//
$valor = 0;
$valor_ryp = 0;
// Obtener coherencia
foreach ($calc_indicadores_calidad_pe as $calc_indicadores_calidad_pe_item) {
    if ($calc_indicadores_calidad_pe_item['subseccion'] == 29) {
        $valor_coherencia = $calc_indicadores_calidad_pe_item['valor'];
        $valor_ryp_coherencia = $calc_indicadores_calidad_pe_item['valor_ryp'];
    }
}
if ($valor_coherencia == 0) {
    // calcular valores mediante suma producto EXCLUYENDO coherencia 
    foreach ($calc_indicadores_calidad_pe as $calc_indicadores_calidad_pe_item) {
        if ($calc_indicadores_calidad_pe_item['subseccion'] !== 29) {
            $valor += $calc_indicadores_calidad_pe_item['peso2'] * $calc_indicadores_calidad_pe_item['valor'];
        }
    }
} else {
    // calcular valores mediante suma producto 
    foreach ($calc_indicadores_calidad_pe as $calc_indicadores_calidad_pe_item) {
        $valor += $calc_indicadores_calidad_pe_item['peso1'] * $calc_indicadores_calidad_pe_item['valor'];
    }
}
if ($valor_ryp_coherencia == 0) {
    // calcular valores mediante suma producto EXCLUYENDO coherencia 
    foreach ($calc_indicadores_calidad_pe as $calc_indicadores_calidad_pe_item) {
        if ($calc_indicadores_calidad_pe_item['subseccion'] !== 29) {
            $valor_ryp += $calc_indicadores_calidad_pe_item['peso2'] * $calc_indicadores_calidad_pe_item['valor_ryp'];
        }
    }
} else {
    // calcular valores mediante suma producto 
    foreach ($calc_indicadores_calidad_pe as $calc_indicadores_calidad_pe_item) {
        $valor_ryp += $calc_indicadores_calidad_pe_item['peso1'] * $calc_indicadores_calidad_pe_item['valor_ryp'];
    }
}
$calidad_pe = array();
array_push($calidad_pe, array(
        'valor' => $valor,
        'valor_ryp' => $valor_ryp
    )
);

$valores_grafico_producto_etiquetas = array();
$valores_grafico_producto_valores = array();
foreach ($calc_indicadores_calidad_pe as $calc_indicadores_calidad_pe_item) {
    array_push($valores_grafico_producto_etiquetas, $calc_indicadores_calidad_pe_item['nom_subseccion']);
    array_push($valores_grafico_producto_valores, $calc_indicadores_calidad_pe_item['valor']);
}
