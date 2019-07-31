# ffmpeg-transcoding
- 要求
```
    1、安装ffmpeg
    2、cli模式运行
```
- 安装
```
composer require rxlisbest/ffmpeg-transcoding
```
- 用法
```
$config = [
    'ffmpeg' => [
        'bin' => '/usr/local/bin/ffmpeg' // ffmpeg执行路径（必填）
    ],
    'option' => [
        'ab' => '128k', // 声音码率
        'acodec' => 'aac', // 音频格式
        'r' => '30', // 帧率
        'vb' => '900k', // 视频码率
        'vcodec' => 'libx264', // 视频格式
        's' => '1920x1080', // 分辨率
        'ar' => '44100', // 设置音频采样率
    ],
    'slice' => [
        'segment_time' => '30', // 切片时间
    ]
];

// 普通转码
use Rxlisbest\FFmpegTranscoding\Transcoding;
$transcoding = new Transcoding($config);
$input = getcwd() . '/' . 'test.3gp';
$output = getcwd() . '/' . 'test.mp4';
$transcoding->exec($input, $output);

// 转m3u8
use Rxlisbest\FFmpegTranscoding\Slice;
$transcoding = new Slice($config);
$input = getcwd() . '/' . 'test.3gp';
$output = getcwd() . '/' . 'test.m3u8';
$transcoding->exec($input, $output);
```
