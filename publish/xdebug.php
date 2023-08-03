<?php
declare(strict_types=1);
/**
 * @author   crayxn <https://github.com/crayxn>
 * @contact  crayxn@qq.com
 */

return [
    // the php path.
    // e.g. /usr/bin/php
    'bin_path' => 'php',
    // -d xdebug.client_host="127.0.0.1" -d xdebug.client_port=9000 -d xdebug.mode=debug
    'xdebug' => [
        'client_host' => \Hyperf\Support\env('XDEBUG_CLIENT_HOST','127.0.0.1'),
        'client_port' => (int)\Hyperf\Support\env('XDEBUG_CLIENT_POST',9000),
        'mode' => 'debug',
    ],
    'server_name' => \Hyperf\Support\env('XDEBUG_SERVER_NAME','Unnamed'),
];