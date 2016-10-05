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
    $toEditContent = $server->getDataFrom($_SESSION["userID"], $_GET['id']);

    $link = "../../layout/edit.html";
    if (file_exists($link)) {
        $fh = fopen($link, r);
        $pc = fread($fh, filesize($link));
        fclose($fh);
    } else {
        echo "Fuck you";
    }

    $markers = array(
        'formular' => $createCont->generateEditContent($toEditContent[0]),
    );

    $content = $createCont->replaceMarkers($markers, $pc);

    echo $content;