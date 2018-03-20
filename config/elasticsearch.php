<?php

return [
    'hosts' => explode(',', env('ELASTICSEARCH_HOSTS')),
    'retries' => 1,
];
