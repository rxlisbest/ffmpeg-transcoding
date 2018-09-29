<?php
/**
 * Created by PhpStorm.
 * User: ruixinglong
 * Date: 2018/8/15
 * Time: 下午1:47
 */

namespace Rxlisbest\FFmpegTranscoding;

use Noodlehaus\Config;

class FFmpeg
{
    protected $config;

    public function __construct($config = [])
    {
        if(!preg_match("/cli/i", php_sapi_name())){
            throw new \Exception("This library can only be used in php-cli.");
        }
        $this->config = Config::load(dirname(__FILE__) . '/config.ini');
        foreach($config as $k => $v){
            $data = $this->config[$k];
            foreach($v as $kk => $vv){
                if(isset($this->config[$k][$kk])){
                    $data[$kk] = $vv;
                }
            }
            $this->config->set($k, $data);
        }
    }
}