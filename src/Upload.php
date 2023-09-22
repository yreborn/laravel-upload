<?php

namespace Yreborn\LaravelUpload;

use Illuminate\Config\Repository;

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

    public function upload()
    {
        return  $this->config['parent_key'];
    }

    public function index(): string
    {
        return 'test';
    }

    
}