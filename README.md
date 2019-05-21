# ffmpeg-transcoding
- 要求
```
    1、安装ffmpeg
    2、cli模式运行
```
- 安装
```
composer require rxlisbest/ffmpeg-transcoding=~0.1.0
```
- 用法
```
$config = [
    'ffmpeg' => [
        'bin' => '/usr/local/bin/ffmpeg' // ffmpeg执行路径
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
