<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => "AAAAJTNcgiM:APA91bHSfwqVgPaEV3st60ov7r-K5cG-94e9j_Oen895pU1OScBEohFcV7X6Zia74lt_bkpoowbpwWugtnDeDvXCivhMHtCc1AJ1ROOvxAEdngtSAuCECu894S0a6qcLQhtlSOgYb_M9",
        'sender_id' => "159775490595",
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
