<?php

return [
    'methods' => explode(',', env('MESSAGE_SEND_METHODS', 'database,file')),
];
