<?php

namespace app\models;

use app\models\query\ClientsQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "clients".
 *
 * @property int $id_client
 * @property string $fio
 * @property string $mob_telefon
 * @property string $phonetic
 * @property string $address
 *
 * @property Visits[] $visits
 */
class Clients extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'mob_telefon', 'phonetic', 'address'], 'required'],
            [['fio', 'address'], 'string', 'max' => 255],
            [['mob_telefon'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_client' => 'ID',
            'fio' => 'Имя',
            'mob_telefon' => 'Телефон',
            'phonetic' => 'Постоянство',
            'address' => 'Адрес',
        ];
    }

    /**
     * Gets query for [[Visits]].
     *
     * @return ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visits::class, ['id_client' => 'id_client']);
    }

    /**
     * {@inheritdoc}
     * @return ClientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientsQuery(get_called_class());
    }
}
