<?php
	include 'config.php';
	include 'functions.php';

	$content = file_get_contents('php://input');

	$events = json_decode($content, true);

	if (isset($events['events']))
	{
		foreach ($events['events'] as $event) 
		{
			if ($event['type'] == 'message' && $event['message']['type'] == 'text') 
			{
				sendLine('บอทตอบว่า => '. $event['message']['text'] . '|' . $event['replyToken']);
			}
		}
	}

/*
	EXAMPLE 
	================
	{
	  "destination": "xxxxxxxxxx",
	  "events": [
		{
		  "replyToken": "0f3779fba3b349968c5d07db31eab56f",
		  "type": "message",
		  "mode": "active",
		  "timestamp": 1462629479859,
		  "source": {
			"type": "user",
			"userId": "U4af4980629..."
		  },
		  "message": {
			"id": "325708",
			"type": "text",
			"text": "Hello, world"
		  }
		},
		{
		  "replyToken": "8cf9239d56244f4197887e939187e19e",
		  "type": "follow",
		  "mode": "active",
		  "timestamp": 1462629479859,
		  "source": {
			"type": "user",
			"userId": "U4af4980629..."
		  }
		}
	  ]
	}
*/
?>