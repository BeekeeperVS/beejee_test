<?php
return [
    'rules' => [
        '([a-z]+)' => 'site/$1',
        '([a-z]+)/([0-9]+)' => 'site/$1/$2',
        '([a-z]+)/([a-z]+)' => 'site/$1',
        '' => 'site/index',
        'index' => 'site/index',
    ],
];
