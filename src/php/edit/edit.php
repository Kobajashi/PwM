<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 21.06.2016
 * Time: 20:59
 */
    require_once("../server.php");
    require_once("../createContent.php");

    $server     = new server;
    $createCont = new createContent;

    session_start();
    $_SESSION['editId'] = $_GET['id'];
    $toEditContent = $server->getDataFrom("cont".$_SESSION["userID"]);

    $toEditContent = $toEditContent[$_SESSION['editId']];

    $link = $_SERVER['DOCUMENT_ROOT'] . "/PwM/src/layout/edit.html";
    if (file_exists($link)) {
        $fh = fopen($link, r);
        $pc = fread($fh, filesize($link));
        fclose($fh);
    } else {
        echo "Fuck you";
    }

    $markers = array(
        'formular' => $createCont->generateEditContent($toEditContent),
    );

    $content = $createCont->replaceMarkers($markers, $pc);

    echo $content;