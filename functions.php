<?php

declare(strict_types=1); # this enable the strict typing for this file. Always at the top

# to get access to a variable outside of the function we need use global(inside) or pass it as parameter in the function.

function render_template (string $template, array $data = []) 
{
    extract($data);
    require "templates/$template.php";    
};

function get_data(string $url): array # 'string' specify the entry type, 'array' specify the output type. 
{
    # inicializamos una nueva sesion de cULR ; ch = cURL handler
    $ch = curl_init($url);
    // indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* ejecutamos la peticion
    y guardamos el resultado
    */
    $result = curl_exec($ch);
    
    $data = json_decode($result, true); # 'true' means that the data is transformed to an associative array
    
    curl_close($ch); # close the curl sesion
    return $data;
}

function get_until_message(int $days): string
{
    return match(true){
        $days==0  =>"Hoy se estrena!",
        $days==1  =>"Mañana se estrena!",
        $days <8  =>"Esta semana se estrena!",
        $days< 31 =>"Este mes se estrena!",
        default   =>"$days dias hasta el estreno"
    };

} 


// # otra alternativa es utilizar file_get_contents
// $result = file_get_content(API_URL); # si solo quieres hacer un GET de una API, este metodo no da mas opciones.
// $data = json_decode($result, true); # 'true' means that the data is transformed to an associative array

// var_dump($data); # see what the data have
?>