<?php
function analizarCadena($cadena) {
    $caracteres = str_split($cadena);
    
    $numerosReales = [];
    $numerosEnteros = [];
    $letras = [];
    $operadoresLogicos = [];
    $operadoresAritmeticos = [];
    $operadoresComparacion = [];
    $operadoresAsignacion = [];
    $parentesis = [];
    $llaves = [];
    $separadores = [];

    $tempNumero = "";

    foreach ($caracteres as $caracter) {
    // Identificar dígitos, números reales y enteros
    if (is_numeric($caracter) || $caracter === '.') {
        $tempNumero .= $caracter;
    } else {
        if (!empty($tempNumero)) {
            if (strpos($tempNumero, '.') !== false) {
                // Verificar si el número real ya existe en el array
                if (!in_array($tempNumero, $numerosReales)) {
                    $numerosReales[] = $tempNumero;
                }
            } else {
                // Verificar si el número entero ya existe en el array
                if (!in_array($tempNumero, $numerosEnteros)) {
                    $numerosEnteros[] = $tempNumero;
                }
            }
            $tempNumero = "";
        }
        
        // Identificar letras
        if (ctype_alpha($caracter)) {
            // Verificar si la letra ya existe en el array
            if (!in_array($caracter, $letras)) {
                $letras[] = $caracter;
            }
        }
        // Identificar operadores lógicos
        elseif (in_array($caracter, ['&', '|', '!', '<', '>'])) {
            // Verificar si el operador lógico ya existe en el array
            if (!in_array($caracter, $operadoresLogicos)) {
                $operadoresLogicos[] = $caracter;
            }
        }
        // Identificar operadores aritméticos
        elseif (in_array($caracter, ['+', '-', '*', '/', '%'])) {
            // Verificar si el operador aritmético ya existe en el array
            if (!in_array($caracter, $operadoresAritmeticos)) {
                $operadoresAritmeticos[] = $caracter;
            }
        }
        // Identificar operadores de comparación
        elseif (in_array($caracter, ['==', '===', '!=', '<>', '!==', '<', '>', '<=', '>='])) {
            // Verificar si el operador de comparación ya existe en el array
            if (!in_array($caracter, $operadoresComparacion)) {
                $operadoresComparacion[] = $caracter;
            }
        }
        // Identificar operadores de asignación
        elseif (in_array($caracter, ['=', '+=', '-=', '*=', '/=', '%='])) {
            // Verificar si el operador de asignación ya existe en el array
            if (!in_array($caracter, $operadoresAsignacion)) {
                $operadoresAsignacion[] = $caracter;
            }
        }
        
        // Identificar paréntesis
        elseif ($caracter === '(' || $caracter === ')') {
            // Verificar si el paréntesis ya existe en el array
            if (!in_array($caracter, $parentesis)) {
                $parentesis[] = $caracter;
            }
        }
        // Identificar llaves
        elseif ($caracter === '{' || $caracter === '}' || $caracter === '[' || $caracter === ']' ) {
            // Verificar si la llave ya existe en el array
            if (!in_array($caracter, $llaves)) {
                $llaves[] = $caracter;
            }
        }
        // Identificar separadores (coma)
        elseif ($caracter === ',') {
            // Verificar si el separador ya existe en el array
            if (!in_array($caracter, $separadores)) {
                $separadores[] = $caracter;
            }
        }
    }
}


    if (!empty($tempNumero)) {
        if (strpos($tempNumero, '.') !== false) {
            $numerosReales[] = $tempNumero;
        } else {
            $numerosEnteros[] = $tempNumero;
        }
    }
    

    if (!empty($numerosEnteros)) {
        echo "<strong>Números enteros encontrados:</strong> " . implode(', ', $numerosEnteros) . "<br>";
    }

    if (!empty($numerosReales)) {
        echo "<strong>Números reales encontrados:</strong> " . implode(', ', $numerosReales) . "<br>";
    }

    if (!empty($letras)) {
        echo "<strong>Letras encontradas:</strong> " . implode(', ', $letras) . "<br>";
    }

    if (!empty($operadoresLogicos)) {
        echo "<strong>Operadores lógicos encontrados:</strong> " . implode(', ', $operadoresLogicos) . "<br>";
    }

    if (!empty($operadoresAritmeticos)) {
        echo "<strong>Operadores aritméticos encontrados:</strong> " . implode(', ', $operadoresAritmeticos) . "<br>";
    }

    if (!empty($operadoresComparacion)) {
        echo "<strong>Operadores de comparación encontrados:</strong> " . implode(', ', $operadoresComparacion) . "<br>";
    }

    if (!empty($operadoresAsignacion)) {
        echo "<strong>Operadores de asignación encontrados:</strong> " . implode(', ', $operadoresAsignacion) . "<br>";
    }

    if (!empty($parentesis)) {
        echo "<strong>Paréntesis encontrados:</strong> " . implode(', ', $parentesis) . "<br>";
    }

    if (!empty($llaves)) {
        echo "<strong>Llaves encontradas:</strong> " . implode(', ', $llaves) . "<br>";
    }

    if (!empty($separadores)) {
        echo "<strong>Separadores encontrados:</strong> " . implode(', ', $separadores) . "<br>";
    }
}

function analizarCadenaVariable($cadena) {
    // Divide el código en líneas
    $lineas = explode("\n", $cadena);

    $variablesPHP = [];

    foreach ($lineas as $linea) {
        // Encuentra todas las coincidencias de declaraciones de variables
        preg_match_all('/\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $linea, $matches);

        // Agrega las variables encontradas al array
        $variablesPHP = array_merge($variablesPHP, $matches[0]);
    }

    // Elimina duplicados
    $variablesPHP = array_unique($variablesPHP);

    // Muestra las variables encontradas si hay alguna
    if (!empty($variablesPHP)) {
        echo "<strong>Variables de PHP encontradas:</strong> " . implode(', ', $variablesPHP) . "<br>";
    }
}

function analizarPalabrasReservadas($cadena) {
    // Lista de palabras reservadas de PHP
    $palabrasReservadas = [
        'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone',
        'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty',
        'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit',
        'extends', 'final', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements',
        'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list',
        'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once',
        'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor',
    ];

    // Divide el código en palabras
    $palabras = preg_split('/\b/', $cadena);

    // Encuentra las palabras reservadas en el código
    $palabrasEncontradas = array_intersect($palabrasReservadas, $palabras);

    // Elimina duplicados
    $palabrasEncontradas = array_unique($palabrasEncontradas);

    // Muestra las palabras reservadas encontradas si hay alguna
    if (!empty($palabrasEncontradas)) {
        echo "<strong>Palabras reservadas de PHP encontradas:</strong> " . implode(', ', $palabrasEncontradas) . "<br>";
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadena = $_POST['cadena'];
    analizarCadena($cadena);
	analizarCadenaVariable($cadena);
	analizarPalabrasReservadas($cadena);
}
?>
