<?php
	function sendLine($content)
	{
		global $line_token;
		
		// Access Token
		$access_token =  $line_token;

		$result = explode('|', $content);
	 
		$messages = array(
			'type' => 'text',
			'text' => $result[0],
		);

		$post = json_encode(array(
			'replyToken' => $result[1],
			'messages' => array($messages),
		));

		// URL ของบริการ Replies สำหรับการตอบกลับด้วยข้อความอัตโนมัติ
		$url = 'https://api.line.me/v2/bot/message/reply';
		$headers = array('Content-Type: application/json', 'Authorization: Bearer '.$access_token);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result;
	}
?>