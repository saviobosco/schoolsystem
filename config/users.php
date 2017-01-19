<?php
return [
'OAuth.providers.facebook.options.clientId' => 'YOUR APP ID',
'OAuth.providers.facebook.options.clientSecret' => 'YOUR APP SECRET',
'OAuth.providers.twitter.options.clientId' => 'YOUR APP ID',
'OAuth.providers.twitter.options.clientSecret' => 'YOUR APP SECRET',
//etc
    'Users' => [
        //Table used to manage users
        'table' => 'MyUsers',
        //configure Auth component
        'auth' => true,
        'Email' => [
            //determines if the artiste should include email
            'required' => true,
            //determines if registration workflow includes email validation
            'validate' => false,
        ],
        'Registration' => [
            //determines if the register is enabled
            'active' => true,
            //determines if the reCaptcha is enabled for registration
            'reCaptcha' => true,
        ],
        'Tos' => [
            //determines if the artiste should include tos accepted
            'required' => true,
        ],
        'Social' => [
            //enable social login
            'login' => false,
        ],
        //Avatar placeholder
        'Avatar' => ['placeholder' => 'CakeDC/Users.avatar_placeholder.png'],
        'RememberMe' => [
            //configure Remember Me component
            'active' => true,
        ],
    ],
//default configuration used to auto-load the Auth Component, override to change the way Auth works
    'Auth' => [
        'authenticate' => [
            'all' => [
                'finder' => 'active',
            ],
            'CakeDC/Users.RememberMe',
            'Form',
        ],
        'authorize' => [
            'CakeDC/Users.Superuser',
            'CakeDC/Users.SimpleRbac',
        ],
        /*'loginAction' => [
            'plugin' => null,
            'controller' => 'Admins',
            'action' => 'login',
            'prefix' => false
        ],
        'loginRedirect' => [
            'plugin' => null,
            'controller' => 'Students',
            'action' => 'index',
            'prefix' => false
        ],*/
    ],
];

