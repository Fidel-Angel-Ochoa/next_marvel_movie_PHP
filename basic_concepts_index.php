<?php
    $name= "Fidel!!";
    $isDev= true;
    $age= 61;

    // to check the type of data
    is_string($name);
    is_bool($isDev);
    is_int($age);

    // define is a global constant, we use it in all the code.
    // the best practice is have a file just for the global constants to avoid bugs and failures. 
    define('LOGO_URL','https://www.php.net/images/logos/new-php-logo.svg' );

    $output="Hola, $name <br /> con una edad de $age. ";   
    
    $isOld=$age > 18;

    // // if stament
    // if ($isOld) {
    //     echo "<h2>Viejo mañoso</h2>";
    // } else if ($isDev) {
    //     echo "<h2>Ni viejo ni morro,<br /> pero si mañoso y caliente</h2>";
    // } else {
    //     echo "<h2>Morro caliente</h2>";
    // }

    // // ternary
    // $outputAge= $isOld
    //     ? 'mayor de edad'
    //     : 'menor de edad'

    // Match
    // first case:
    // $outputAge = match ($age) {
        // 0,1,2 => "Eres un bebe,$name 👶🏼",
        // 3,4,5,6,7,8,9,10 => "Eres un niño,$name 🧒🏽",
        // 11,12,13,14,15,16,17,18 => "Eres adolescente,$name 👨🏽‍🎓",
        // 19,20,21,22,23,24,25,26,27,28,29,30 => "Eres joven,$name 🙎🏽‍♂️",
        // default => "Eres Adulto, 👨🏽"
        // }

    // second case:
    $outputAge = match (true) {
        $age<3 => "Eres un bebe,$name 👶🏼",
        $age < 11 => "Eres un niño,$name 🧒🏽",
        $age < 18 => "Eres adolescente,$name 👨🏽‍🎓",
        $age == 18 => "aleluya puedes tomar cervesa, $name 🍺",
        $age < 31 => "Eres joven,$name 🙎🏽‍♂️",
        $age < 41 => "Eres adulto joven, $name 👨🏽 ",
        $age < 61 => "Eres adulto viejo, $name ",
        default => "Un veterano! pasa sabiduria, $name 🧓🏽"
    };

    // Arrays
    $bestLanguages = ["PHP", "JavaScript", "Python",1]; // you could mix types of data
    $bestLanguages[]="Java"; // to add a value to the last
    $bestLanguages[3]="TypeScript"; // to replace a value in a specific index

    // Asociative ARRAYS(similar to an object)
    $person = [
        "name" => "Juancho",
        "age" => "34",
        "isDev" => true,
        "languages" => ["PHP", "javaScript","Python"],
    ];

    $person["name"] = "Fidel"; // to change the value of the key 'name'
    $person["languages"][] = "Java"; // Adding a new value to the specific key, by default is the last
?>

<h2><?= $outputAge?></h2>

<ul>
    <!-- 'For' cycle -->
    <!-- 'key' is the index of the value -->
    <?php foreach ($bestLanguages as $key => $language) : ?>
        <li><?= $key . " " . $language ?></li> <!-- concatenate and showing the values -->
    <?php endforeach; ?>
</ul>


<!-- another way to use if, but need to be write 'elseif' -->
<?php if ($isOld) :?>
    <h2>viejo mañoso</h2>
<?php elseif ($isDev) :?>
    <h2>ni morro ni viejo, mañoso y caliente</h2>
<?php else :?>
    <h2>morro y caliente</h2>
<?php endif ;?>


<img src="<?= LOGO_URL?>" alt="PHP logo" width="200">
<h1>
    <?= $output ?>
</h1>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>