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
    public function exec($input, $output)
    {
        $output_0 = $output . '.' . $this->config['slice']['avthumb'];

        // transcoding
        $transcoding = new Transcoding($this->config);
        $result = $transcoding->exec($input, $output_0);

        if ($result === 0) {
            $cmd = $this->getCmd($output_0, $output);
            system($cmd, $result);

            // delete source file after slice
            if ($result === 0) {
                unlink($output_0);
            }
        }
        return $result;
    }

    protected function getCmd($input, $output)
    {
        $cmd = sprintf("%s -i %s -c copy -map 0 -f segment -segment_list %s -segment_time %s %s.%%5d.ts >> %s 2>&1", $this->config['ffmpeg']['bin'], $input, $output, $this->config['slice']['segment_time'], $output, $this->config['output']['log']);
        return $cmd;
    }
}