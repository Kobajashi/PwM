<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 19:20
 */
require_once("createContent.php");

$createCont = new createContent();

session_start();
if($_SESSION['login'] == true)
{
    $link = realpath('../layout/index.html');
    if(file_exists($link))
    {
        $fh = fopen($link, r);
        $pc = fread($fh, filesize($link));
        fclose($fh);
    }
    else
    {
        echo "Fuck you";
    }

    $markers = [
        'content'  => $createCont->generateContent(),
        'username' => $_SESSION['user'],
    ];

    $content = $createCont->replaceMarkers($markers, $pc);

    echo $content;

}
else
{
    $link = realpath('../layout/login.html');
    if(file_exists($link))
    {
       $pc = file_get_contents($link);
    }
    else
    {
        echo "Fuck you";
    }

    echo $pc;
}