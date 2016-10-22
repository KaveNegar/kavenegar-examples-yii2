<?php
namespace Kavenegar\Yii2;

use yii\base\Component;
use yii\base\InvalidConfigException;

class Kavenegar extends Component
{
    public $apikey;
    private $_api = null;

    public function init()
    {
        if (!$this->apikey) {
            throw new InvalidConfigException('apikey is required');
        }
    }	
    public function KavenegarApi()
    {
        if ($this->_api === null) {
           $this->_api = new \Kavenegar\KavenegarApi($this->apikey);
        }
        return $this->_api;
    }
} 
