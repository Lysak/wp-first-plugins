<?php 
    function dl_deactivate() {
        $date = "[" . date("Y-m-d H:i:s") . "]";
        error_log($date . " " ."Плагин деактивирован". "\r\n", 3, dirname(__FILE__) . '/dl_errors_log.log');
    }