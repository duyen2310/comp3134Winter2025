  GNU nano 6.2                                                                          a4_stored.php                                                                                    
<?php
$lines = file('a4_toread.txt');
foreach ($lines as $line) {
    if (strpos($line, '<?php') !== false) {
        $php_code = str_replace(['<?php', '?>'], '', $line);
        eval($php_code);
    } else {
        echo $line . "<br>";
    }
}
?>
