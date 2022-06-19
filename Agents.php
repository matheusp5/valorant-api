<?php

$api = json_decode(file_get_contents("https://valorant-api.com/v1/agents?language=pt-BR"));
echo "<pre>";
#print_r($api);

for ($agents = 0; $agents <= count($api->data)-2; $agents++) {
    echo "Nome: " . $api->data[$agents]->displayName . "<br>";
    echo "Descrição: " . $api->data[$agents]->description . "<br>";
    ?>
    <img src="<?php echo $api->data[$agents]->displayIcon ?>">
    <?php
}

?>