<?php

require dirname(__FILE__, 2) . '/vendor/autoload.php';

$secretId = "SECRETID"; //替换为用户的 secretId，请登录访问管理控制台进行查看和管理，https://console.cloud.tencent.com/cam/capi
$secretKey = "SECRETKEY"; //替换为用户的 secretKey，请登录访问管理控制台进行查看和管理，https://console.cloud.tencent.com/cam/capi
$region = "ap-beijing"; //替换为用户的 region，已创建桶归属的region可以在控制台查看，https://console.cloud.tencent.com/cos5/bucket
$cosClient = new Qcloud\Cos\Client(
    array(
        'region' => $region,
        'schema' => 'https', //协议头部，默认为http
        'credentials'=> array(
            'secretId'  => $secretId,
            'secretKey' => $secretKey)));
try {
    // 提交画质增强任务 https://cloud.tencent.com/document/product/460/84775
    // start --------------- 使用模版 ----------------- //
    $result = $cosClient->createMediaVideoEnhanceJobs(array(
        'Bucket' => 'examplebucket-125000000', //存储桶名称，由BucketName-Appid 组成，可以在COS控制台查看 https://console.cloud.tencent.com/cos5/bucket
        'Tag' => 'VideoEnhance',
        'Input' => array(
            'Object' => 'test.mp4',
        ),
        'Operation' => array(
            'TemplateId' => '', // 画质增强模板 ID
            'Output' => array(
                'Region' => $region,
                'Bucket' => 'examplebucket-125000000',
                'Object' => 'tmp/output.mp4',
            ),
//            'UserData' => 'xxx',
//            'JobLevel' => '0',
//            'WatermarkTemplateId' => array(
//                'WatermarkTemplateId-1',
//                'WatermarkTemplateId-2',
//            ),
//            'Watermark' => array(
//                array(
//                    'Type' => '',
//                    'Pos' => '',
//                    'LocMode' => '',
//                    'Dx' => '',
//                    'Dy' => '',
//                    'StartTime' => '',
//                    'EndTime' => '',
//                    'Image' => array(
//                        'Url' => '',
//                        'Mode' => '',
//                        'Width' => '',
//                        'Height' => '',
//                        'Transparency' => '',
//                        'Background' => '',
//                    ),
//                    'Text' => array(
//                        'FontSize' => '',
//                        'FontType' => '',
//                        'FontColor' => '',
//                        'Transparency' => '',
//                        'Text' => '',
//                    ),
//                    'SlideConfig' => array(
//                        'SlideMode' => '',
//                        'XSlideSpeed' => '',
//                        'YSlideSpeed' => '',
//                    ),
//                ),
//            ),
//            'DigitalWatermark' => array(
//                'Message' => '',
//                'Type' => '',
//                'Version' => '',
//                'IgnoreError' => '',
//                'State' => '',
//            ),
        ),
//        'CallBack' => '',
//        'CallBackFormat' => '',
//        'CallBackType' => '',
//        'CallBackMqConfig' => array(
//            'MqRegion' => '',
//            'MqMode' => '',
//            'MqName' => '',
//        ),
    ));
    // 请求成功
    print_r($result);
    // end --------------- 使用模版 ----------------- //

    // start --------------- 自定义参数 ----------------- //
    $result = $cosClient->createMediaVideoEnhanceJobs(array(
        'Bucket' => 'examplebucket-125000000', //存储桶名称，由BucketName-Appid 组成，可以在COS控制台查看 https://console.cloud.tencent.com/cos5/bucket
        'Tag' => 'VideoEnhance',
        'Input' => array(
            'Object' => 'test.mp4',
        ),
        'Operation' => array(
            // 画质增强参数
            'VideoEnhance' => array(
                'Transcode' => array(
                    'Container' => array(
                        'Format' => 'mp4',
                    ),
                    'Video' => array(
                        'Codec' => 'H.264',
                        'Width' => '1280',
                        'Height' => '920',
                        'Fps' => '30',
                    ),
                    'Audio' => array(
                        'Codec' => 'aac',
                        'Samplerate' => '44100',
                        'Bitrate' => '128',
                        'Channels' => '4',
                    ),
                ),
                'SuperResolution' => array(
                    'Resolution' => 'sdtohd',
                    'EnableScaleUp' => 'true',
                    'Version' => 'Enhance',
                ),
                'SDRtoHDR' => array(
                    'HdrMode' => 'HDR10',
                ),
                'ColorEnhance' => array(
                    'Contrast' => '50',
                    'Correction' => '100',
                    'Saturation' => '100',
                ),
                'MsSharpen' => array(
                    'SharpenLevel' => '5',
                ),
                'FrameEnhance' => array(
                    'FrameDoubling' => 'true',
                ),
            ),
            'Output' => array(
                'Region' => $region,
                'Bucket' => 'examplebucket-125000000',
                'Object' => 'tmp/output.mp4',
            ),
//            'UserData' => 'xxx',
//            'JobLevel' => '0',
//            'WatermarkTemplateId' => array(
//                'WatermarkTemplateId-1',
//                'WatermarkTemplateId-2',
//            ),
//            'Watermark' => array(
//                array(
//                    'Type' => '',
//                    'Pos' => '',
//                    'LocMode' => '',
//                    'Dx' => '',
//                    'Dy' => '',
//                    'StartTime' => '',
//                    'EndTime' => '',
//                    'Image' => array(
//                        'Url' => '',
//                        'Mode' => '',
//                        'Width' => '',
//                        'Height' => '',
//                        'Transparency' => '',
//                        'Background' => '',
//                    ),
//                    'Text' => array(
//                        'FontSize' => '',
//                        'FontType' => '',
//                        'FontColor' => '',
//                        'Transparency' => '',
//                        'Text' => '',
//                    ),
//                    'SlideConfig' => array(
//                        'SlideMode' => '',
//                        'XSlideSpeed' => '',
//                        'YSlideSpeed' => '',
//                    ),
//                ),
//            ),
//            'DigitalWatermark' => array(
//                'Message' => '',
//                'Type' => '',
//                'Version' => '',
//                'IgnoreError' => '',
//                'State' => '',
//            ),
        ),
//        'CallBack' => '',
//        'CallBackFormat' => '',
//        'CallBackType' => '',
//        'CallBackMqConfig' => array(
//            'MqRegion' => '',
//            'MqMode' => '',
//            'MqName' => '',
//        ),
    ));
    // 请求成功
    print_r($result);
    // end --------------- 自定义参数 ----------------- //
} catch (\Exception $e) {
    // 请求失败
    echo($e);
}
