<?php
include __DIR__.'/vendor/autoload.php';
require_once('API/Guide.php');
define("BOT_NAME", "Raid");

use Discord\Discord;

$discord = new Discord([
    'token' => 'MjI1MTU1NzQ4OTMyMzU0MDQ5.Crk9xQ.fQj8Wxxcffesay7aXb51WsPcZfY',
]);


$discord->on('ready', function ($discord) {
    echo "Raid Bot is ready!", PHP_EOL;
    // Listen for messages.
    $discord->on('message', function ($message, $discord) {
        echo "{$message->author->username}: {$message->content}",PHP_EOL;
        


        //Class Guides----------------------------------------------------------------------------------
        $guideException = "Guide not found. Guide format: /guide [spec], e.g: /guide shadow, /guide retribution, /guide restoration shaman, /guide restoration druid";
        if (preg_match("/^\/guide/i", $message->content))
        {
            $spec = explode(' ',$message->content);
            $message->channel->broadcastTyping();
            if(!isset($spec[1]))
            {
                $spec[1] = "";
            }

            if(!isset($spec[2]))
            {
                $spec[2] = "";
            }
            $guide = new Guide();
            $guide_list = $guide->searchGuide($spec[1],$spec[2]);
            print_r($guide_list);
            $message->channel->sendMessage($guide_list);

            //$message->channel->sendMessage($guideException);
            
			//$message->channel->sendMessage("https://howtopriest.com/viewtopic.php?f=19&t=8402");
            //$message->channel->sendMessage("http://i.imgur.com/4XxPlQ0.png");
	    }
	    	

    	
    });
});

$discord->run();