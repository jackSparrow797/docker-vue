<?php
/**
 * Created by PhpStorm.
 * User: Таня
 * Date: 03.01.2020
 * Time: 18:27
 */
$out = 'Нужно передать id пользователя';
if (!empty($_REQUEST['user'])) {
    $users = [
        1 => [
            'id' => 1,
            'data' =>
                [
                    'main' => [
                        'name' => 'Максим',
                        'surname' => 'Ларкин',
                        'secondname' => 'Сергеевич',
                        'post' => 'программист',
                    ],
                    'personal' => [
                        'email' => 'maxlarkin2007@gmail.com',
                        'phone' => '8 982 122 33 50',
                        'address' => 'Александровская 19',
                        'sex' => 'мужской',
                        'age' => 12,
                    ]
                ]
        ],
        2 => [
            'id' => 2,
            'data' =>
                [
                    'main' => [
                        'name' => 'Евгений',
                        'surname' => 'Медведев',
                        'secondname' => 'Анатольевич',
                        'post' => 'программист',
                    ],
                    'personal' => [
                        'email' => 'maxlarkin2007@gmail.com',
                        'phone' => '8 982 122 33 50',
                        'address' => 'Александровская 19',
                        'sex' => 'мужской',
                        'age' => 12,
                    ]
                ]
        ],
        3 => [
            'id' => 3,
            'data' =>
                [
                    'main' => [
                        'name' => 'Татьяна',
                        'surname' => 'Медведева',
                        'secondname' => 'Васильевна',
                        'post' => 'мерчендайзер',
                    ],
                    'personal' => [
                        'email' => 'maxlarkin2007@gmail.com',
                        'phone' => '8 982 122 33 50',
                        'address' => 'Александровская 19',
                        'sex' => 'мужской',
                        'age' => 12,
                    ]
                ]
        ]
    ];

    $id = intval($_REQUEST['user']);
    if (!empty($users[$id])) {
        $out = $users[$id];
    } else {
        $out = 'Нет такого пользователя';
    }
}

echo json_encode($out);