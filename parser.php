<?php

$t = time();


function curl_get_contents($page_url, $pause_time, $retry)
{
    $error_page = array();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Автоматом идём по редиректам
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0); // Не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); // Не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_URL, $page_url); // Куда отправляем
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Возвращаем, но не выводим на экран результат
    $response['html'] = curl_exec($ch);
    $info = curl_getinfo($ch);
    if($info['http_code'] != 200 && $info['http_code'] != 404) {
        $error_page[] = array(1, $page_url, $info['http_code']);
        if($retry) {
            sleep($pause_time);
            $response['html'] = curl_exec($ch);
            $info = curl_getinfo($ch);
            if($info['http_code'] != 200 && $info['http_code'] != 404)
                $error_page[] = array(2, $page_url, $info['http_code']);
        }
    }
    $response['code'] = $info['http_code'];
    $response['errors'] = $error_page;
    curl_close($ch);
    return $response;
}



function get_link($t) {

    $link_arr['price_list'] = array();
    $page_url = "vk.com/"+''/**/;
    $response_arr = curl_get_contents($page_url, 5, 5);
    $page = $response_arr['html'];
    $page_code = $response_arr['code'];
    $link_arr['error_page'] = $response_arr['errors'];

    file_put_contents('page.txt', $page);
    $page = file_get_contents('page.txt');
#TODO:если файл page изменился(добавилиись новые photo), то скачать новые изображения, если нет, то ничего не делать
    $page = iconv("WINDOWS-1251", "UTF-8//IGNORE", $page);
    $page = htmlspecialchars_decode($page,ENT_QUOTES);

    $buffer1 = array();
    $buffer2 = array();


    $regexp1 = '("w":"https:\\\/\\\/\w*\-\w*\.\w*\.\w*\\\/([A-Za-z0-9-\\\/.\w{3}]*))';
    preg_match_all($regexp1, $page, $buffer1, PREG_SET_ORDER,1);
    $size = count($buffer1);
    $regexp2 = '(https:\\\/\\\/\w*\-\w*\.\w*\.\w*\\\/([A-Za-z0-9-\\\/.\w{3}]*))';

    for($i=0;$i<$size;$i++)
    {
        preg_match_all($regexp2, $buffer1[$i][0], $buffer2[$i], PREG_SET_ORDER,1);
    }
    download($size,$buffer2,$t);
}
function delDir() {
    $dir = 'img';
    $files = array_diff(scandir($dir), ['.','..']);
    foreach ($files as $file) {
        (is_dir($dir.'/'.$file)) ? delDir($dir.'/'.$file) : unlink($dir.'/'.$file);
    }
    return rmdir($dir);
}


function download($size,$buffer2,$t)
{
    delDir();
    @mkdir('img');
     for($i=0;$i<$size;$i++)
     {
         echo $buffer2[$i][0][0];
        $str = $buffer2[$i][0][0];
        $str = str_replace('\\','',$str);
        file_put_contents('img/ph'.$i.'.jpg',file_get_contents($str));
     }

    runtime($t);
}


/* --- 1.4.4 --- Вывод работы скрипта */
function runtime($time_start) {
    if(!empty($time_start))
        echo "Время работы: " . (time() - $time_start) . "\n";
}
get_link($t);

?>
<a class="btn btn-outline-primary ml-3" href="index.php">Вернуться</a>
