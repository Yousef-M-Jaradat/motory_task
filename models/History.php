<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property int $service_id
 * @property string $action
 * @property string|null $details
 * @property string $created_at
 *
 * @property Services $service
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'action'], 'required'],
            [['service_id'], 'integer'],
            [['details'], 'string'],
            [['created_at'], 'safe'],
            [['action'], 'string', 'max' => 255],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'action' => 'Action',
            'details' => 'Details',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }
}
