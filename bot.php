<<?php

  $botToken = "1485741333:AAGCNxAyZobgi0MtfYhkUGUbyuogA1sTtWE";
  $website = "https://api.telegram.org/bot".$botToken;


  $update = file_get_contents('php://input');
  $update = json_decode($update, TRUE);

  $chatId = $update['message']['from']['id'];
  $nome = $update['message']['from']['first_name'];
  $text = $update['message']['text'];





  switch ($text)
  {
    case "bene":
        sendMessage($chatId,"ottimo")
        break;
    case "Tu?"
        sendMessage($chatId,"Eh... Sono ancora in via di sviluppo!");
        break;
    default:
      $tastierabenvenuto = '["Bene"],["Tu?"],["'.$nome.'"]';
      sendMessage($chatId,"Ciao <b>$nome</b>! Come stai?",$tastierabenvenuto);
      break;
  }








  $agg = json_encode($update,JSON_PRETTY_PRINTE);


  $tastierabenvenuto = '["Bene"],["Tu?"],["'.$nome.'"]';
  sendMessage($chatId,"Ciao <b>$nome</b>! Come stai?",$tastierabenvenuto);



  function sendMessage($chatId,$text,$tastiera)
  {
    if(isset($tastiera))
    {
      $tastierino = '&reply_markup={"keyboard":['.$tastiera.'],"resize_keyboard":true}';
    }
    $url = $GLOBALS[website]."/sendMessage?chat_id=$chatId&parse_mode=HTML&text=".urlencode($text).$tastierino;
    file_get_contents($url);
  }

 ?>
