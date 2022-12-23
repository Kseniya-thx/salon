<?php

namespace app\models;

use app\models\query\GroupServicesQuery;
use Yii;

/**
 * This is the model class for table "group_services".
 *
 * @property int|null $id_group_services
 * @property string|null $name_of_services
 */
class GroupServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group_services'], 'integer'],
            [['name_of_services'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_group_services' => 'ID',
            'name_of_services' => 'Наименование группы',
        ];
    }

    /**
     * {@inheritdoc}
     * @return GroupServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupServicesQuery(get_called_class());
    }
}
