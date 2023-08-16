<?php
    $apiKey = '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';

    $data = [
        'model' => 'text-davinci-003',
        'prompt' => 'Responde como un Técnico de soporte IT: Problemas de inicio de sesión al SAP',
        'temperature' => 0.7,
        'max_tokens' => 300,
        'n' => 1,
        'stop' => ['\n']
    ];

    $ch = curl_init('https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' .$apiKey
    ));

    $response = curl_exec($ch);
    $responseArr = json_decode($response, true);

    /*print($response);*/

    echo $responseArr['choices'][0]['text'];
?>