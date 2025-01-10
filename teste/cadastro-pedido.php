<?php

$curl = curl_init();

//login
curl_setopt($curl, CURLOPT_URL,'http://localhost:8070/usuario' );
curl_exec($curl);

curl_setopt($curl, CURLOPT_URL,'http://localhost:8070/usuario/loging' );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, array(
    'cpf'=>'49760055856',
    'password'=>'admin'
));
curl_exec($curl);



$pedidos =[
    ['inputs'=> array(
            'afl' => 2345,
            'nome' => 'brayan lucas de oliveira pereira',
            'email' => 'brayanlucasop@gmail.com',
            'cpf' => '49760055856',
            'rg' => '34534534553',
            'enderco_cliente'=> 'rua mozart',
            'cep_cliente'=>'3343463456',
            'endereco_montagem'=>'vila galvao',
            'cep_montagem'=>'02280375',
            'telefone' =>'11975921579',
            'descricao pedido'=>'1 guarda roupa solteiro, caixas e portas brancas',
            'valor_total'=> '3500',
            'valor_promob'=>'5000',
            'descricao_pagamento'=>'metade a vista e o resto em 6x'
            )]
    ];


foreach($pedidos as $pedido){
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pedido['inputs']);
}

$response = curl_exec($curl);
echo $response;
curl_close($curl);




