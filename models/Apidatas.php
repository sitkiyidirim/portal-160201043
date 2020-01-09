<?php

namespace kouosl\AirCron\models;

use Yii;

/**
 * This is the model class for table "AircronLogs".
 *
 */
class Apidatas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'AircronLogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'cronvalue'], 'required'],
            [['id'], 'integer'],
            [['id'], 'unique', 'targetAttribute' => ['userid', 'gameid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'gameid' => 'Gameid',
            'score' => 'Score',
        ];
    }
}
