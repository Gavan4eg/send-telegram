<?php

namespace Gavan4eg\SendTelegram;


class SendTelegram
{
    /** @var string $botApiToken */
    private $botApiToken;

    /** @var string $chatID */
    private $chatID;

    public function __construct($botApiToken = null, $chatID = null)
    {
        if ($botApiToken === null) {
            $this->botApiToken = config('sendtelegram.name.token');
        } else {
            $this->botApiToken = $botApiToken;
        }

        if ($chatID === null) {
            $this->chatID = config('sendtelegram.name.chat');
        } else {
            $this->chatID = $chatID;
        }

//        if ($this->botApiToken === null || $this->chatID === null) {
//            throw new InvalidArgumentException('botApiToken or chat is not configured properly.');
//        }
    }

    public function send($text)
    {
        $data = [
            'chat_id' => $this->chatID,
            'text' => join("\n", $text),
            'parse_mode' => 'HTML',
        ];

        file_get_contents("https://api.telegram.org/bot$this->botApiToken/sendMessage?" . http_build_query($data));
    }

    public function sendLink($text, $textButton, $link)
    {
        $data = [
            'chat_id' => $this->chatID,
            'text' => join("\n", $text),
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        [
                            'text' => $textButton,
                            'url' => $link,
                        ]
                    ]
                ]
            ])
        ];

        file_get_contents("https://api.telegram.org/bot$this->botApiToken/sendMessage?" . http_build_query($data));
    }
}
