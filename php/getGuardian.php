<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit;
    }

    $apikey = "a678916d-cf5c-49ad-95b3-498164a7c6d5";
    $url = "https://content.guardianapis.com/search?api-key=".$apikey;
    //https://open-platform.theguardian.com/explore/

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $data = curl_exec($ch);

    $json = json_decode($data, true);

    curl_close($ch);

    $newJson = array();

    for ($i = 0; $i < $json['response']['pageSize']; $i++) {
        $newJson[] = array('id' => $json['response']['results'][$i]['id'], 
                        'type' => $json['response']['results'][$i]['type'], 
                        'webPublicationDate' => $json['response']['results'][$i]['webPublicationDate'],
                        'webTitle' => $json['response']['results'][$i]['webTitle'],
                        'webUrl' => $json['response']['results'][$i]['webUrl'],
                        'pillarName' => $json['response']['results'][$i]['pillarName'],
                    );
    }

    echo json_encode($newJson);
?>