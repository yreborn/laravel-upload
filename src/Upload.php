<?php

namespace Yreborn\LaravelUpload;

use Illuminate\Config\Repository;
use OSS\OssClient;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;
use Qcloud\Cos\Client;

class Upload
{

    protected $config;

    /**
     * Upload constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config->get('config');
    }

    /**
     * @param $local_path
     * @param $oss_pate
     * @return null
     * @throws \Exception
     */
    public function aliUpload($local_path,$oss_pate)
    {
        try {
            $ossClient = new OssClient($this->config['ali_access_key_id'], $this->config['ali_access_key_secret'], $this->config['ali_endpoint']);
            $result = $ossClient->uploadFile($this->config['ali_bucket'], $oss_pate, $local_path);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $result;
    }

    /**
     * @param $local_path
     * @param $oss_pate
     * @return mixed
     * @throws \Exception
     */
    public function qnUpload($local_path,$oss_pate)
    {
        try {
            $auth = new Auth($this->config['qn_access_key'], $this->config['qn_secret_key']);
            $token = $auth->uploadToken($this->config['qn_bucket']);
            $uploadMgr = new UploadManager();
            list($result, $error) = $uploadMgr->putFile($token, $oss_pate, $local_path);
            if($error){ throw new \Exception($error); }
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
        return $result;
    }

    /**
     * @param $local_path
     * @param $oss_path
     * @return object|string
     */
    public function txUpload($local_path,$oss_path)
    {
        try {
            $key = [
                'region' => $this->config['tx_region'],
                'credentials' => [
                    'secretId' => $this->config['tx_secret_id'],
                    'secretKey' => $this->config['tx_secret_key']
                ],
            ];
            $cosClient = new Client($key);
            $result = $cosClient->upload($this->config['tx_bucket'], $oss_path, fopen($local_path, 'rb'));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $result;
    }
}