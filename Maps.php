<?php

$api = json_decode(file_get_contents("https://valorant-api.com/v1/maps?language=pt-BR"));
echo "<pre>";

#print_r($api);

for ($maps = 0; $maps <= count($api->data)-1; $maps++) {
    echo "Mapa: " . $api->data[$maps]->displayName . "<br>";
    echo "Coordenadas: " . $api->data[$maps]->coordinates . "<br>";
    ?>
    <img src="<?php echo $api->data[$maps]->splash ?>">
    <?php
}

?>