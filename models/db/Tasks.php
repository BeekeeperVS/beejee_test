<?php


namespace models\db;


use vendor\components\DBModel;

class Tasks extends DBModel
{
    /**
     * @var int $id
     * @var string $user_name
     * @var string $email
     * @var string $text
     * @var int $status
     */
    public $id;
    public $user_name;
    public $email;
    public $text;
    public $status;

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'tasks';
    }
}