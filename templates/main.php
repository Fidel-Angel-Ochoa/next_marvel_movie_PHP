<?php 

// $variables = var_dump($data);
?>
<!-- <pre style="font-size: 10px; overflow:scroll; height: 200px;">
?=$variables; ?>
</pre> -->
<main>
    <section >
        <h2>La proxima produccion de marvel</h2>
    </section>
  
    <section>
        <img src="<?=$data["poster_url"]?>" width="300" alt="Poster de <?=$data["title"];?>" 
        style="border-radius: 20px ;"
        />
    </section>

    <hgroup>
        <h3><?= $title;?> - <?= $data["until_message"]?></h3>
        <p>Fecha de estreno <?= $release_date;?></p>
        <p>La siguiete es: <?=$data["following_production"]["title"];?>; <?=$data["following_production"]["type"];?></p> 
        <!-- '$data' content the array 'following_production',we can call the variable direct ($following_production) and not only calling the whole varible ($data["following_production"]["type"]) because we use 'extract'  -->
    </hgroup>
</main>
