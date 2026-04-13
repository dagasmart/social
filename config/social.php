<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Social 服务配置
    |--------------------------------------------------------------------------
    | 在对应平台开放平台注册应用后，填入 Client ID 和 Client Secret
    */

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/auth/google/callback',
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/auth/github/callback',
    ],

    'wechat' => [
        'client_id' => env('WECHAT_CLIENT_ID'),
        'client_secret' => env('WECHAT_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/auth/wechat/callback',
    ],

    'qq' => [
        'client_id' => env('QQ_CLIENT_ID'),
        'client_secret' => env('QQ_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/auth/qq/callback',
    ],

    'dingtalk' => [
        'client_id' => env('DINGTALK_CLIENT_ID'),
        'client_secret' => env('DINGTALK_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/auth/dingtalk/callback',
    ],

    'feishu' => [
        'client_id' => env('FEISHU_CLIENT_ID'),
        'client_secret' => env('FEISHU_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/auth/feishu/callback',
    ],

];
