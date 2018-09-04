<?php
/**
 * Created by PhpStorm.
 * User: ruixinglong
 * Date: 2018/8/14
 * Time: 下午3:09
 */

namespace Rxlisbest\FFmpegTranscoding;

class Transcoding extends FFmpeg
{
    public function exec($input, $output){
        $cmd = $this->getCmd($input, $output);
        system($cmd, $result);
        return $result;
    }

    protected function getCmd($input, $output){
        $cmd = $this->config['ffmpeg']['bin'] . " -i ${input}";
        foreach($this->config['option'] as $k => $v){
            $cmd .= " -${k} ${v}";
        }
        $cmd .= " -y ${output}";
        $cmd .= ' >> ' . $this->config['output']['log'] . ' 2>&1';
        return $cmd;
    }


}