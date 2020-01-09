<?php
/**
 * Created by PhpStorm.
 * User: Таня
 * Date: 03.01.2020
 * Time: 18:27
 */
$out = 'Нужно передать id пользователя';

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
                    'email' => 'jack123456789@mail.ru',
                    'phone' => '8 912 763 53 47',
                    'address' => 'Александровская 19',
                    'sex' => 'мужской',
                    'age' => 31,
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
                    'email' => '-',
                    'phone' => '8 912 756 23 82',
                    'address' => 'Александровская 19',
                    'sex' => 'мужской',
                    'age' => 36,
                ]
            ]
    ]
];


if (!empty($_REQUEST['user'])) {

    $id = intval($_REQUEST['user']);
    if (!empty($users[$id])) {
        $out = $users[$id];
    } else {
        $out = 'Нет такого пользователя';
    }
} else {
    $out = array_keys($users);
}

echo json_encode($out);