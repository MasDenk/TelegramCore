<?php
/* ===============================================================
*      Callback from Api Telegram And Variabale
* ================================================================ */
$update				= json_decode(file_get_contents("php://input"));

// Normal Message
$chatid				= isset($update->message->chat->id) ? $update->message->chat->id : '';
$groupname			= isset($update->message->chat->title) ? $update->message->chat->title : '';
$userid				= isset($update->message->from->id) ? $update->message->from->id : '';
$firstname			= isset($update->message->from->first_name) ? $update->message->from->first_name : '';
$username			= isset($update->message->from->username) ? $update->message->from->username : '';
$chattype			= isset($update->message->chat->type) ? $update->message->chat->type : ''; // private, supergroup
$message			= isset($update->message->text) ? $update->message->text : '';
$messageid			= isset($update->message->message_id) ? $update->message->message_id : '';

// Replay Message
$replytomessageid	= isset($update->message->reply_to_message->message_id) ? $update->message->reply_to_message->message_id : '';
$replytomessagetext	= isset($update->message->reply_to_message->text) ? $update->message->reply_to_message->text : '';

// Callback Message
$callbackid			= isset($update->callback_query->id) ? $update->callback_query->id : '';
$callbackdata		= isset($update->callback_query->data) ? $update->callback_query->data : '';
$callbackfromid		= isset($update->callback_query->from->id) ? $update->callback_query->from->id : '';
$callbackfname		= isset($update->callback_query->from->first_name) ? $update->callback_query->from->first_name : '';
$callbackusername	= isset($update->callback_query->from->username) ? $update->callback_query->from->username : '';
$callbackchatid		= isset($update->callback_query->message->chat->id) ? $update->callback_query->message->chat->id : '';
$callbackuserid		= isset($update->callback_query->message->reply_to_message->from->id) ? $update->callback_query->message->reply_to_message->from->id : '';
$callbackmessageid	= isset($update->callback_query->message->message_id) ? $update->callback_query->message->message_id : '';

// New Join Chat Member
$new_user		= isset($update->message->new_chat_member) ? 'Yes' : 'No';
$new_userid		= isset($update->message->new_chat_member->id) ? $update->message->new_chat_member->id : '';
$new_isbot		= isset($update->message->new_chat_member->is_bot) ? $update->message->new_chat_member->is_bot : '';
$new_username	= isset($update->message->new_chat_member->username) ? $update->message->new_chat_member->username : '';
$new_userfname	= isset($update->message->new_chat_member->first_name) ? $update->message->new_chat_member->first_name : '';
$new_userlname	= isset($update->message->new_chat_member->last_name) ? $update->message->new_chat_member->last_name : '';

// Left Chat Member
$left_user		= isset($update->message->left_chat_member) ? 'Yes' : 'No';
$left_userid	= isset($update->message->left_chat_member->id) ? $update->message->left_chat_member->id : '';
$left_usertype	= isset($update->message->left_chat_member->is_bot) ? 'bot' : 'member';
$left_username	= isset($update->message->left_chat_member->username) ? $update->message->left_chat_member->username : '';

// Forward from
$text_forwards		= isset($update->message->forward_from) ? 'Yes' : 'No';
$forwards_id		= isset($update->message->forward_from->id) ? $update->message->forward_from->id : '';
$forwards_fname		= isset($update->message->forward_from->first_name) ? $update->message->forward_from->first_name : '';
$forwards_username	= isset($update->message->forward_from->username) ? $update->message->forward_from->username : '';

$newjoin_chat	= isset($update->my_chat_member->chat->id) ? $update->my_chat_member->chat->id : '';

/* ===============================================================
*      Untuk menggunakannya
* ================================================================ */

echo $chatid; // untuk mengetahui channel, group, atau ID si pengirim chat
?>
