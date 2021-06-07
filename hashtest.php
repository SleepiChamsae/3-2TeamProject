<?php

function Encrypt($str, $secret_key='secret key', $secret_iv='secret iv')

{

    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 32)    ;

    return str_replace("=", "", base64_encode(

                 openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))

    );

}

function Decrypt($str, $secret_key='secret key', $secret_iv='secret iv')

{

    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 32);

    return openssl_decrypt(

            base64_decode($str), "AES-256-CBC", $key, 0, $iv

    );

}

$str = "테스트.";

$secret_key = "123456789";

$secret_iv = "#@$%^&*()_+=-";

$encrypted = Encrypt($str, $secret_key, $secret_iv);

echo "암호화 문자열 => " .$encrypted. "<br />\n";

$decrypted = Decrypt($encrypted, $secret_key, $secret_iv);

echo "복호화 문자열 => " .$decrypted. "\n";