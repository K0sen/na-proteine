<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Password reset request form
 */
class Log extends Model
{
    public $status = 'OK' . PHP_EOL;
    public $separator = '--------------------' . PHP_EOL;
    private $file;
    private $head;
    private $body;
    private $user;
    private $date;

    public function __construct()
    {
        parent::__construct();
        $this->date = date('m.d.y H:i:s');
        $this->user = Yii::$app->user->getId();
    }

    public function addOrder(array $products)
    {
        $this->file = '../log/orders.txt';
        if($this->user) {
            $user = User::findIdentity($this->user);
            $user = $user->username . ' | e-mail: ' . $user->email;
        } else {
            $user = 'Guest';
        }

        $this->head = $this->date . ' > ' .  $user . PHP_EOL;
        foreach ($products as $id => $count) {
            $p_name = Product::findOne($id)->name;
            $this->body .= $id . ': ' . $p_name . ' count: ' . $count . PHP_EOL;
        }
        $this->record();
    }

    public function record()
    {
        $data =
            $this->separator .
            $this->head .
            $this->body .
            $this->status .
            "\n";
        file_put_contents($this->file, $data, FILE_APPEND);
    }
}