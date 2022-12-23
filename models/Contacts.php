<?php

namespace app\models;

use app\models\query\ContactsQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id_client
 * @property string $e_mail
 * @property string $telegram
 */
class Contacts extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['e_mail', 'telegram'], 'required'],
            [['e_mail', 'telegram'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_client' => 'Клиент',
            'e_mail' => 'E Mail',
            'telegram' => 'Telegram',
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id_client' => 'id_client']);
    }

    /**
     * {@inheritdoc}
     * @return ContactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactsQuery(get_called_class());
    }
}
