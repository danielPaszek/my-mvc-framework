<?php 
namespace app\core;

class Session {
    public const FLASH_KEY = 'flash_messages';
    public function __construct() {
        session_start();
        $flashmsg = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashmsg as $key => &$msg) {
            // mark to be removed after
            $msg['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashmsg;
    }
        
    public function setFlash($key, $message) {
        $_SESSION[self::FLASH_KEY][$key] = [
            'value' => $message,
            'remove' => false
        ];
    }
    public function getFlash($key) {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }
    public function __destruct()
    {
        //remove marked messages
        $flashmsg = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashmsg as $key => &$msg) {
            // mark to be removed after
            if($msg['remove']) {
                unset($flashmsg[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashmsg;
    }
}