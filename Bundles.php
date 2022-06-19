<?php

$api = json_decode(file_get_contents("https://valorant-api.com/v1/bundles?language=pt-BR"));
echo "<pre>";

#print_r($api);

for ($bundles = 0; $bundles <= count($api->data)-1; $bundles++) {
    echo "Pacote: " . $api->data[$bundles]->displayName;
    ?>
    <img src="<?php echo $api->data[$bundles]->displayIcon ?>">
    <?php
}

?>