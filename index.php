<?php

$token = "2140618719:AAGiQdTeWpmKJMSb2J2hgy9CfqgklXOLlyE";
define('API_KEY',$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
            function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendChatAction($chat_id, $action)
{
    return bot('sendChatAction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}
function SendMessage($chat_id, $text, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_to_message_id = null, $reply_markup = null)
{
    return bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'disable_web_page_preview' => $disable_web_page_preview,
        'disable_notification' => false,
        'reply_to_message_id' => $reply_to_message_id,
        'reply_markup' => $reply_markup
    ]);
}
#منا تبدي لتغير شي تبيعه تنشره بدون متذكر مصدر اطشك مثل سايكو فريخ .
$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}
if($update->edited_message){
	$message = $update->edited_message;
	$message_id = $message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
	}
	if($update->channel_post){
	$message = $update->channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$title = $message->chat->title;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->edited_channel_post){
	$message = $update->edited_channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->inline_query){
		$inline = $update->inline_query;
		$message = $inline;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$query = $message->query;
$text = $query;
		}
	if($update->chosen_inline_result){
		$message = $update->chosen_inline_result;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$inline_message_id = $message->inline_message_id;
$message_id = $inline_message_id;
$text = $message->query;
$query = $text;
		}
		$tc = $update->message->chat->type;
		$re = $update->message->reply_to_message;
		$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_messagid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[back]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
if($re){
	$forward_type = $re->forward_from->type;
$forward_name = $re->forward_from->first_name;
$forward_user = $re->forward_from->username;
	}else{
$forward_type = $message->forward_from->type;
$forward_name = $message->forward_from->first_name;
$forward_user = $message->forward_from->username;
$forward_id = $message->forward_from->id;
if($forward_name == null){
	$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$forward_title = $message->forward_from_chat->title;
	}
}
$title = $message->chat->title;
$admin = "1725971254";
///
$saiko = json_decode(file_get_contents("saiko.json"),1);
if($saiko['gch'] == null){
$saiko['gch'] = "❎";
file_put_contents("saiko.json",json_encode($saiko));
}
$xch = $saiko['ch'];
///
$members = explode("\n",file_get_contents("members.txt"));
$count = count($members) -1;
if($tc == 'private' and !in_array($from_id,$members)){
file_put_contents('members.txt',$from_id."\n",FILE_APPEND);
}
///
$oop = $xch;
$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$oop&user_id=".$from_id);
$zr = str_replace("@","",$oop);
if($saiko['ch'] != null){
if($saiko['gch'] == "✅"){
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
عذراً يجب عليك الاشتراك في القناه لتستطيع استخدام البوت ⚠️
⏺ :  $oop
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اضغط هنا ✅' ,'url'=>"t.me/$zr"]],
]])
]);return false;
}
}
}
if($text == "/start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
قائمة الادمن 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الاحصائيات 📈' ,'callback_data'=>"1"]],
[['text'=>'تغير الـstart 📮' ,'callback_data'=>"4"],['text'=>'قناة الاشتراك 📊' ,'callback_data'=>"2"]],
[['text'=>'الاشعارات ℹ️' ,'callback_data'=>"6"],['text'=>'الادمنية 👨🏼‍💼' ,'callback_data'=>"5"]],
[['text'=>'اذاعة 📨' ,'callback_data'=>"10"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "back"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قائمة الادمن 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الاحصائيات 📈' ,'callback_data'=>"1"]],
[['text'=>'تغير الـstart 📮' ,'callback_data'=>"4"],['text'=>'قناة الاشتراك 📊' ,'callback_data'=>"2"]],
[['text'=>'الاشعارات ℹ️' ,'callback_data'=>"6"],['text'=>'الادمنية 👨🏼‍💼' ,'callback_data'=>"5"]],
[['text'=>'اذاعة 📨' ,'callback_data'=>"10"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
عدد الاعضاء : *$count*
  ⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($saiko['ch'] == null){
$ch = "لا توجد قناة حاليا";
}elseif($saiko['ch'] != null){
$ch = $saiko['ch'];
}
$nch = $saiko['gch'];
if($data == "2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قنوات الاشتراك الاجباري 🔽
🔢 القناة : $ch
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف القناة 🗑️' ,'callback_data'=>"del_ch"],['text'=>'اضف قناة ➕' ,'callback_data'=>"add_ch"]],
[['text'=>'الاشتراك الاجباري '.$nch.'' ,'callback_data'=>"3"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "3" ){
if($saiko['gch']!="✅"){
$iu = "✅";
}else{
$iu ="❎";
}
$saiko['gch'] = $iu;
file_put_contents("saiko.json",json_encode($saiko));
$nch = $saiko['gch'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف القناة 🗑️' ,'callback_data'=>"del_ch"],['text'=>'اضف قناة ➕' ,'callback_data'=>"add_ch"]],
[['text'=>'الاشتراك الاجباري '.$nch.'' ,'callback_data'=>"3"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "add_ch"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ارفعني ادمن في القناه وارسل معرف القناه مع @ ⏳
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ok'] = "ok_ch";
file_put_contents("saiko.json",json_encode($saiko));
exit();
}
if(preg_match("/@/",$text) and $saiko['ok'] == "ok_ch" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تم اضافه القناة الى الاشتراك الاجباري",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ok'] = "no";
$saiko['ch'] = $text;
file_put_contents("saiko.json",json_encode($saiko));
}
if(!preg_match("/@/",$text) and $saiko['ok'] == "ok_ch" and !$data and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حدث خطاء تاكد من معرف القناة ⚠️",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "del_ch" and $ch != "لا توجد قناة حاليا"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم حذف القناة $ch ✅
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ch'] = null;
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "del_ch" and $ch == "لا توجد قناة حاليا"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
لا توجد قناة ليتم حذفها ⚠️
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
}
if($data == "4"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
يمكنك الان ارسال رسالة الـstart ⏳
رسالة الـstart الحالية : $start
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "ok_start";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text and $saiko['ok'] == "ok_start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم تغير رسالة الـstart الى ℹ️:
$text
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
$saiko['start'] = $text;
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "5"){
$key=[];
foreach ($saiko['admin'] as $ad){
$key[inline_keyboard][]=[[text=>"$ad",callback_data=>"del#$ad"]];
}
$key[inline_keyboard][]=[[text=>"اضف ادمن ➕",callback_data=>"add_admin"]];
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"back"]];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
يمكنك رفع ادمن وحذف ادمن عن طريق الازرار 🔽
⎯ ⎯ ⎯ ⎯
يمكن للادمن التحقق من الاحصائيات فقط ⚠️
",
reply_markup=>json_encode($key)
]);
}
$ex = explode("#", $data);
if($ex[0] == "del"){
$ser = array_search($ex[1],$saiko["admin"]);
unset($saiko["admin"][$ser]);
file_put_contents("saiko.json",json_encode($saiko));
$key=[];
foreach ($saiko['admin'] as $ad){
$key[inline_keyboard][]=[[text=>"$ad",callback_data=>"del#$ad"]];
}
$key[inline_keyboard][]=[[text=>"اضف ادمن ➕",callback_data=>"add_admin"]];
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"back"]];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
reply_markup=>json_encode($key)
]);
}
if($data == "add_admin"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
الان ارسل ايدي الشخص ℹ️
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "ok_admin";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text  and $from_id == $admin and $saiko['ok'] == "ok_admin" and !in_array($text,$members)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$text ليس عضو بالبوت ⚠️
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
$test = $saiko['admin'];
if($text and $from_id == $admin and $saiko['ok'] == "ok_admin" and in_array($text,$test)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
العضو مرفوع ادمن ⚠️
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
exit();
}
if($text and $from_id == $admin and $saiko['ok'] == "ok_admin" and in_array($text,$members)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم اضافه $text ادمن ✅
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['admin'][] = $text;
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text== "/start" and in_array($from_id,$saiko['admin'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
عدد الاعضاء : *$count*
  ⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
$d6 = $saiko['d6'];
$d7 = $saiko['d7'];
if($data == "6"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
اضغط لتعديل على القفل و الفتح 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "d6" ){
if($saiko['d6']!="✅"){
$dp = "✅";
}else{
$dp ="❎";
}
$saiko['d6'] = $dp;
file_put_contents("saiko.json",json_encode($saiko));
$d6 = $saiko['d6'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "d7" ){
if($saiko['d7']!="✅"){
$as = "✅";
}else{
$as ="❎";
}
$saiko['d7'] = $as;
file_put_contents("saiko.json",json_encode($saiko));
$d7 = $saiko['d7'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($message and $text != "/start" and $from_id != $admin and $d7 == "✅" and !$data){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
 'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
if($user == null){
$user = "None";
}elseif($user != null){
$user = $user;
}
if($text == "/start" and $from_id != $admin and $d6 == "✅" and !in_array($from_id,$members)){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
تم دخول عضو جديد الى البوت ℹ️ :
الاسم : [$name]
المعرف : [@$user]
الايدي : [$from_id](tg://user?id=$from_id)
⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
]);
}
#اذاعه .
if($data == "10"){
               bot('EditMessageText',[
 'chat_id'=>$chat_id, 
 'message_id'=>$message_id,
'text'=>"
ارسل الرساله التي تريد اذاعتها يمكن ان تكون (نص، صوره ، فديو، الخ) ⏳
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "send";
file_put_contents("saiko.json",json_encode($saiko));
}
if(!$data and $saiko['ok'] == 'send' and $from_id == $admin){
    foreach($members as $ASEEL){
        file_put_contents("saiko.json",json_encode($saiko));
     if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
     }
              for($i=0;$i<count($members); $i++){
$ok = bot('sendChatAction' , ['chat_id' =>$members[$i],
'action' => 'typing' ,])->ok;
if($members[$i] != "" and $ok != 1){
file_put_contents("A5.txt","$members[$i]
",FILE_APPEND);
}}
$ooo = explode("\n",file_get_contents("A5.txt"));
$iii = count($ooo) - 1;
$mmm = $count - $iii;
     bot('sendmessage',[
 'chat_id'=>$chat_id, 
'text'=>"
تم الانتهاء من الاذاعة ✅
⎯ ⎯ ⎯ ⎯
تم ارسالها الى $mmm
لم ترسل الى $iii
⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
 'reply_to_meesage_id'=>$message_id,
]);

     unlink("A5.txt");
 file_put_contents("saiko.json",json_encode($saiko));
    }
    ////////
if ($text == "/start"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"اهلا بك في 🔖

 بوت الـ قران الكريم 🕌🖤

ارسل امر  (( /Q )) لعرض سـور القران الكريم 🔊

او ارسل اسم السورة 🎋

كـ مثال :: سورة الفاتحه

مطور 💡:- @Ailnoor 💡",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"تـابع جـديدنـا ⛽️",'url'=>"https://telegram.me/php_i"]],
            [['text'=>"لـ ارائكم هنا 🥀",'url'=>"https://telegram.me/alsaed_ali_bot"]],
            [['text'=>"قناتنا 🗃",'url'=>"https://telegram.me/i_lo_v_e"]],
            ]
        ])
        ]);
}

if($text == "/Q" or $text == "/q"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🗃ســور الـقران الكـريـم 🗃

ا ֆ • • • • • • • • • • • • • ֆ

🕌1-سورة الفاتحه
🕌2-البقرة
🕌3-سورة ال عمران
🕌4-سورة النساء
🕌5-سورة المائدة
🕌6-سورة الانعام
🕌7-سورة الأعراف
🕌8-سورة الأنفال
🕌9-سورة التوبة
🕌10-سورة يونس
🕌11-سورة هود
🕌12-سورة يوسف
🕌13-سورة الرعد
🕌14-سورة أبراهيم
🕌15-سورة الحجر
🕌16-سورة النحل
🕌17-سورة الاسراء
🕌18-سورة الكهف
🕌19-سورة مريم
🕌20-سورة طه
🕌21-سورة الأنبياء
🕌22-سورة الحج
🕌23-سورة المؤمنون
🕌24-سورة النور
🕌25-سورة الفرقان
🕌26-سورة الشعراء
🕌27-سورة النحل
🕌28-سورة القصص
🕌29-سورة العنكبوت
🕌30-سورة الروم
🕌31-سورة لقمان
🕌32-سورة السجدة
🕌33-سورة الاحزاب
🕌34-سورة سبأ
🕌35-سورة فاطر
🕌36-سورة يس
🕌37-سورة الصافات
🕌38-سورة ص
🕌39-سورة الزمر
🕌40-سورة غافر
🕌41-سورة فصلت
🕌42-سورة الشورئ
🕌43-سورة الزخرف
🕌44-سورة الدخان
🕌45-سورة الجاثيه
🕌46-سورة الاحقاف
🕌47-سورة محمد
🕌48-سورة الفتح
🕌49-سورة الحجرات
🕌50-سورة ق
🕌51-سورة الذاريات
🕌52-سورة الطور
🕌53-سورة النجم
🕌54-سورة القمر
🕌55-سورة الرحمن
🕌56-سورة الواقعه
🕌57-سورة الحديد
🕌58-سورة المجادلة
🕌59-سورة الحشر
🕌60-سورة الممتحنة
🕌61-سورة الصف
🕌62-سورة الجمعة
🕌63-سورة المنافقون
🕌64-سورة التغابن
🕌65-سورة الطلاق
🕌66-سورة التحريم
🕌67-سورة الملك
🕌68-سورة القلم
🕌69-سورة الحاقة
🕌70-سورة المعارج
🕌71-سورة نوح
🕌72-سورة الجن
🕌73-سورة المزمل
🕌74-سورة المدثر
🕌75-سورة القيامة
🕌76-سورة الانسان
🕌77-سورة المرسلات
🕌78-سورة النبأ
🕌79-سورة النازعات
🕌80-سورة عبس
🕌81-سورة التكوير
🕌82-سورة الانفطار
🕌83-سورة المطففين
🕌84-سورة الانشقاق
🕌85-سورة البروج
🕌86-سورة الطارق
🕌87-سورة الاعلئ
🕌88-سورة الغاشية
🕌89-سورة الفجر
🕌90-سورة البلد
🕌91-سورة الشمس
🕌92-سورة الليل
🕌93-سورة الضحئ
🕌94-سورة الشرح
🕌95-سورة التين
🕌96- سورة العلق  
🕌97- سورة القدر
🕌98-سورة البينة
🕌99-سورة الزلزلة
🕌100-سورة العاديات
🕌101-سورة القارعة
🕌102-سورة التكاثر
🕌103-سورة العصر
🕌104-سورة الهمزة
🕌105-سورة الفيل
🕌106-سورة قريش
🕌107-سورة الماعون
🕌108-سورة الكوثر
🕌109-سورة الكافرون
🕌110-سورة النصر
🕌111-سورة المسد
🕌112-سورة الاخلاص
🕌113-سورة الفلق
🕌114-سورة الناس
ا ֆ • • • • • • • • • • • • • ֆ

#مطور 💡:- @Ailnoor",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "سورة الفاتحه" or $text == "سوره الفاتحه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/15",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره البقره" or $text == "سورة البقره"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/4",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة ال عمران" or $text == "سوره ال عمران"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/5",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره النساء" or $text == "سورة النساء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/7",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المائده" or $text == "سوره المائده"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/8",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الانعام" or $text == "سورة الأنعام"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/9",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الانعام" or $text == "سورة الانعام"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/10",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاعراف" or $text == "سوره الاعراف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/11",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الانفال" or $text == "سوره الانفال"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/12",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره التوبه" or $text == "سورة التوبه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/13",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره يونس" or $text == "سورة يونس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/14",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة هود" or $text == "سوره هود"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/17",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة يوسف" or $text == "سوره يوسف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/18",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الرعد" or $text == "سوره الرعد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/21",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره ابراهيم" or $text == "سورة ابراهيم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/25",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحجر" or $text == "سورة الحجر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/29",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة النحل" or $text == "سوره النحل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/33",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الاسراء" or $text == "سورة الاسراء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/37",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الكهف" or $text == "سوره الكهف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/41",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة مريم" or $text == "سوره مريم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/45",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سوره طه" or $text == "سورة طه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/47",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الانبياء" or $text == "سورة الانبياء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/49",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الحج" or $text == "سوره الحج"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/51",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المؤمنون" or $text == "سوره المؤمنون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/53",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره النور" or $text == "سورة النور"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/56",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفرقان" or $text == "سوره الفرقان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/58",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الشعراء" or $text == "سوره الشعراء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/60",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره القصص" or $text == "سورة القصص"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/62",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره العنكبوت" or $text == "سورة العنكبوت"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/66",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الروم" or $text == "سوره الروم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/68",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة لقمان" or $text == "سوره لقمان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/70",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة السجده" or $text == "سوره السجده"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/72",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاحزاب" or $text == "سوره الاحزاب"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/74",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة سبأ" or $text == "سوره سبأ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/76",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره فاطر" or $text == "سورة فاطر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/78",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره يس" or $text == "سورة يس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/80",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الصافات" or $text == "سوره الصافات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/82",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة ص" or $text == "سوره ص"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/84",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الزمر" or $text == "سورة الزمر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/86",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة غافر" or $text == "سوره غافر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/88",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة فصلت" or $text == "سوره فصلت"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/91",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الشورئ" or $text == "سوره الشورئ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/93",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الزحرف" or $text == "سوره الزحرف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/95",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الدخان" or $text == "سوره الدخان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/97",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الجاثية" or $text == "سوره الجاثيه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/99",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاحقاف" or $text == "سوره الاحقاف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/101",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة محمد" or $text == "سوره محمد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/103",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفتح" or $text == "سوره الفتح"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/105",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحجرات" or $text == "سورة الحجرات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/107",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة ق" or $text == "سوره ق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة الذاريات" or $text == "سوره الذاريات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/111",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الطور" or $text == "سوره الطور"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/115",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة القمر" or $text == "سوره القمر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/121",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة الرحمن" or $text == "سوره الرحمن"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/123",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الواقعه" or $text == "سوره الواقعه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/125",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الحديد" or $text == "سوره الحديد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/127",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورةه المجادله" or $text == "سوره المجادله"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/129",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحشر" or $text == "سورة الحشر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/131",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الممتحنه" or $text == "سوره الممتحنه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/133",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الصف" or $text == "سوره الصف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/135",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سوره الجمعه" or $text == "سورة الجمعه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/137",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المنافقون" or $text == "سوره المنافقون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/139",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة التغابن" or $text == "سوره التغابن"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/141",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الطلاق" or $text == "سوره الطلاق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/143",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة التحريم" or $text == "سوره التحريم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/145",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الملك" or $text == "سوره الملك"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/147",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سوره القلم" or $text == "سورة القلم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/149",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المعارج" or $text == "سوره المعارج"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/152",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة نوح" or $text == "سوره نوح"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/154",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الجن" or $text == "سوره الجن"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/156",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المزمل" or $text == "سوره المزمل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/158",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المدثر" or $text == "سوره المدثر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/160",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورةه القيامه" or $text == "سوره القيامه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/162",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الانسان" or $text == "سوره الانسان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/164",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المرسلات" or $text == "سوره المرسلات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/166",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة نبأ" or $text == "سوره نبأ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/168",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة النازعات" or $text == "سوره النازعات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/170",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره عبس" or $text == "سوره عبس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/172",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة التكوير" or $text == "سوره التكوير"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/174",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الانفطار" or $text == "سورة الانفطار"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/176",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره المطففين" or $text == "سورة المطففين"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/178",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الانشقاق" or $text == "سورة الانشقاق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/180",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة البروج" or $text == "سورة البروج"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/302",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الطارق" or $text == "سورة الطارق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/304",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الاعلئ" or $text == "سورة الاعلئ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/306",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الغاشيه" or $text == "سوره الغاشيه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/308",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفجر" or $text == "سوره الفجر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/310",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة البلد" or $text == "سوره البلد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/312",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الشمس" or $text == "سورة الشمس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/314",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الليل" or $text == "سوره الليل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/316",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الضحئ" or $text == "سوره الضحئ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/318",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الشرح" or $text == "سوره الشرح"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/320",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة التين" or $text == "سوره التين"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/322",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة العلق" or $text == "سوره العلق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/324",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره القدر" or $text == "سورة القدر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/326",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الزلزلة" or $text == "سورة الزلزله"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/328",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره البينة" or $text == "سورة البينة"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/330",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة العاديات" or $text == "سوره العاديات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/332",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره القارعه" or $text == "سورة القارعه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/334",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره التكاثر" or $text == "سورة التكاثر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/336",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره العصر" or $text == "سورة العصر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/338",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الهمزة" or $text == "سورة الهمزة"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/340",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفيل" or $text == "سوره الفيل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/342",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة قريش" or $text == "سوره قريش"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/344",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الماعون" or $text == "سوره الماعون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/346",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "" or $text == ""){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الكوثر" or $text == "سوره الكوثر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/348",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الكافرون" or $text == "سورة الكافرون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/350",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة النصر" or $text == "سوره النصر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/352",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المسد" or $text == "سوره المسد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/354",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاخلاص" or $text == "سوره الاخلاص"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/356",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفلق" or $text == "سوره الفلق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/358",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الناس" or $text == "سورة الناس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/360",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحاقة" or $text == "سورة الحاقة"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/364",
 reply_to_message_id =>$message->message_id, 
]);
}

    
