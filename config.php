<?php

return array(
    // Bootstrap the configuration file with AWS specific features
    'includes' => array('_aws'),
    'services' => array(
        // All AWS clients extend from 'default_settings'. Here we are
        // overriding 'default_settings' with our default credentials and
        // providing a default region setting.
        'default_settings' => array(
            'params' => array(
                'credentials' => array(
                    'key'    => 'AKIAJ5U6K4QKOLLOALTA',
                    'secret' => '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',
                ),
                'region' => 'us-east-1',
                
            ),'request.options' => array(
                    'proxy' => 'http://192.168.0.250:8085'
                )
        )
    )
);