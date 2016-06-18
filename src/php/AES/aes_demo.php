<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 17.06.2016
 * Time: 21:22
 */

    include("./AESclass.php");

    //$z = "abcdefgh01234567"; // 128-bit key
    //$z = "abcdefghijkl012345678901"; // 192-bit key
    $z = "abcdefghijuklmno0123456789012345"; // 256-bit key

    $aes = new AES($z);

    $data = file_get_contents("./example.txt");

    $start = microtime(true);
    echo "\n\nCipher-Text:\n" . $aes->encrypt($data) . "\n";
    //echo "\n\nPlain-Text:\n" . $aes->decrypt($aes->encrypt($data)) . "\n";
    $end = microtime(true);

    echo "\n\nExecution time: " . ($end - $start);
