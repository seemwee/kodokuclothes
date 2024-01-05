<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6638656707:AAHQF8--G3ZkPbvxr_fOGj7wXC4IKq-Gi7Y";

//Сюда вставляем chat_id
$chat_id = "-1002144795078";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $size = ($_POST['size']);
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $tel = ($_POST['tel']);
    $country = ($_POST['country']);
    $city = ($_POST['city']);
    $postnumber = ($_POST['postnumber']);
    $postcode = ($_POST['code']);
    $email = ($_POST['email']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'hopeless t-shirt'
        'Розмір:' => $size,
        'Імʼя:' => $firstname,
        'Фамілія:' => $lastname,
        'Телефон:' => $tel,
        'Країна:' => $country,
        'Місто:' => $city,
        'Відділення:' => $postnumber,
        'Поштовий код:' => $postcode,
        'Email:' => $email
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Thank you for the order! We will contact you shortly.');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Something went wrong. Please try submitting the form again.');
    }
}

?>