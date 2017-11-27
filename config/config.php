<?php

return [
    /*
     * Here goes your console application configuration. You should
     * define your application list of commands and your Laravel
     * Service Providers configuration.
     */
    'app' => [

        /*
         * Here goes the application name.
         */
        'name' => 'ChangeLogger',

        /*
         * Here goes the application version.
         */
        'version' => '0.1.0',

        /*
         * If true, development commands won't be available as the app
         * will be in the production environment.
         */
        'production' => false,

        /*
         * Here goes the application default command.
         *
         * You may want to remove this line in order to ask the user what command he
         * wants to execute.
         */
        'default-command' => App\Commands\ChangeloggerCommand::class,

        /*
         * Here goes the application list of commands.
         *
         * Besides the default command the user can also call
         * any of the commands specified below.
         */
        'commands' => [
        ],

        'commands-namespaces' => [
            "App\Commands",
        ],

        /*
         * Here goes the application list of Laravel Service Providers.
         * Enjoy all the power of Laravel on your console.
         */
        'providers' => [
            App\Providers\AppServiceProvider::class,
        ],
    ],


    /*
     * Here goes the application cache configuration.
     *
     * @see https://github.com/laravel/laravel/blob/master/config/cache.php
     *      in order to understand how to configure other drivers.
     */
    'cache' => [
        'default' => 'array',
        'stores' => [
            'array' => [
                'driver' => 'array',
            ],
        ],
    ],
];
