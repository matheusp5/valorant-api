<?php
echo "<pre>";
$api = json_decode(file_get_contents("https://valorant-api.com/v1/weapons?language=pt-BR"));

if(!isset($_GET['weapon'])) {
    if($api->status == 200) {
    for ($valorant = 0; $valorant <= count($api->data)-2; $valorant++) {
        ?>
        <a href="Weapons.php?weapon=<?php echo $api->data[$valorant]->displayName ?>"> 
        <?php
        echo $api->data[$valorant]->displayName;
        ?> <img src=" <?php echo $api->data[$valorant]->displayIcon; ?>"> </a> <?php
    }
    } else {
        echo "Ocorreu um erro!";
    }
} else {
    if($_GET['weapon'] != "") {
        $weapon = addslashes($_GET['weapon']);
        $equippables = [
            "Odin" => 0,
            "Ares" => 1,
            "Vandal" => 2,
            "Bulldog" => 3,
            "Phantom" => 4,
            "Judge" => 5,
            "Bucky" => 6,
            "Frenzy" => 7,
            "Classic" => 8,
            "Ghost" => 9,
            "Sheriff" => 10,
            "Shorty" => 11,
            "Operator" => 12,
            "Guardian" => 13,
            "Marshal" => 14,
            "Spectre" => 15,
            "Stinger" => 16,
        ];
        $id = $equippables[$weapon];
        echo $api->data[$id]->displayName; ?> 
        <img src=" <?php echo $api->data[$id]->displayIcon; ?>"> <?php echo "<br>";
        echo "Fire Rate: " . $api->data[$id]->weaponStats->fireRate . "<br>";
        echo "Tamanho do Pente: " . $api->data[$id]->weaponStats->magazineSize . " Munições" . "<br>";
        if(isset($api->data[$id]->weaponStats->damageRanges[1])) {
            echo "Dano na Cabeça: " . $api->data[$id]->weaponStats->damageRanges[1]->headDamage . "<br>";
            echo "Dano na Corpo: " . $api->data[$id]->weaponStats->damageRanges[1]->bodyDamage . "<br>";
            echo "Dano na Perna: " . $api->data[$id]->weaponStats->damageRanges[1]->legDamage . "<br>";   
        } else {
            echo "Dano na Cabeça: " . $api->data[$id]->weaponStats->damageRanges[0]->headDamage . "<br>";
            echo "Dano na Corpo: " . $api->data[$id]->weaponStats->damageRanges[0]->bodyDamage . "<br>";
            echo "Dano na Perna: " . $api->data[$id]->weaponStats->damageRanges[0]->legDamage . "<br>";   
        }
        echo "Preço na Loja: " . $api->data[$id]->shopData->cost . "<br>";
        echo "Categoria: " . $api->data[$id]->shopData->categoryText . "<br>";
        #print_r($api->data[$id]->weaponStats);
        echo "<h1>Skins</h1>";
        
        for ($skin = 0; $skin <= count($api->data[$id]->skins)-1; $skin++ ) {
            echo "Nome: " . $api->data[$id]->skins[$skin]->displayName;
            ?>
            <img src="<?php echo $api->data[$id]->skins[$skin]->displayIcon ?> ">
            <?php
        }
    }
}

