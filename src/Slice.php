<?php
/**
 * Created by PhpStorm.
 * User: ruixinglong
 * Date: 2018/8/15
 * Time: 下午1:48
 */

namespace Rxlisbest\FFmpegTranscoding;


class Slice extends FFmpeg
{
    public function exec($input, $output){
        $output_0 = $output . '.' . $this->config['slice']['avthumb'];

        $transcoding = new Transcoding($this->config);
        $cmd = $transcoding->exec($input, $output_0);

        $cmd = $this->getCmd($output_0, $output);
        system($cmd, $result);
        unlink($output_0);
        return $result;
    }

    protected function getCmd($input, $output){
        $cmd = $this->config['ffmpeg']['bin'] . " -i ${input}";
        $cmd .= " -c copy";
        $cmd .= " -map 0";
        $cmd .= " -f segment";
        $cmd .= " -segment_list ${output}";
        $cmd .= " -segment_time " . $this->config['slice']['segment_time'];
        $cmd .= " ${output}.%5d.ts";
        $cmd .= ' >> ' . $this->config['output']['log'] . ' 2>&1';
        return $cmd;
    }
}