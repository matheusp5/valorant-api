<?php

$api = json_decode(file_get_contents("https://valorant-api.com/v1/competitivetiers?language=pt-BR"));
echo "<pre>";

#print_r($api);

for ($rank = 0; $rank <= count($api->data[3]->tiers)-1; $rank++) {
    echo "Rank: " . ucfirst(strtolower($api->data[3]->tiers[$rank]->tierName));
    ?>  
    <img src="<?php echo $api->data[3]->tiers[$rank]->smallIcon ?>">
    <?php
}

?>