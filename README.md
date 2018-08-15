# ffmpeg-transcoding
- 安装
```
composer require rxlisbest/ffmpeg-transcoding=~0.1.0
```
- 用法
```
// 普通转码
use Rxlisbest\FFmpegTranscoding\Transcoding;
$transcoding = new Transcoding();
$input = getcwd() . '/' . 'test.3gp';
$output = getcwd() . '/' . 'test.mp4';
$transcoding->exec($input, $output);


// 转m3u8
use Rxlisbest\FFmpegTranscoding\Slice;
$transcoding = new Slice();
$input = getcwd() . '/' . 'test.3gp';
$output = getcwd() . '/' . 'test.m3u8';
$transcoding->exec($input, $output);
```
