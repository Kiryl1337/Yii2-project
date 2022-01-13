<?php
/**
 * Created by PhpStorm.
 * User: Kiryl
 * Date: 12.12.2019
 * Time: 20:36
 */

namespace app\models;


use yii\base\Model;

class UploadFile extends Model
{
    public $file;

    public function rules()
    {
        return [[['file'], 'file', 'extensions' => 'zip', 'skipOnEmpty' => false]];
    }
}