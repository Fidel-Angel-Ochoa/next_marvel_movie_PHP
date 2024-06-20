<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        private string $title,
        private int $days_until,
        private array $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview,
    )
    { }

    public function get_until_message(): string
    {
        $days = $this->days_until;

        return match(true){
            $days==0  =>"Hoy se estrena!",
            $days==1  =>"Mañana se estrena!",
            $days <8  =>"Esta semana se estrena!",
            $days< 31 =>"Este mes se estrena!",
            default   =>"$days dias hasta el estreno"
        };

    } 

    
    public static function fetch_and_create_movie(string $api_url): NextMovie # 'string' specify the entry type, 'array' specify the output type. 
    {
        # inicializamos una nueva sesion de cULR ; ch = cURL handler
        $ch = curl_init($api_url);
        // indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /* ejecutamos la peticion
        y guardamos el resultado
        */
        $result = curl_exec($ch);
        
        $data = json_decode($result, true); # 'true' means that the data is transformed to an associative array
        
        curl_close($ch); # close the curl sesion

        // # otra alternativa es utilizar file_get_contents
        // $result = file_get_content(API_URL); # si solo quieres hacer un GET de una API, este metodo no da mas opciones.
        // $data = json_decode($result, true); # 'true' means that the data is transformed to an associative array

        // var_dump($data); # see what the data have
        
        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_production"] ?? "unknown",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
        );
    }

    public function get_data()
    {
        return get_object_vars($this);
    }

}