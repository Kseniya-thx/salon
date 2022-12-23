<?php

namespace app\models;

use app\models\query\ServicesQuery;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id_services
 * @property string $name_of_service
 * @property int $employee
 * @property string $price
 * @property int $group_service
 *
 * @property Employee $employee0
 * @property GroupServices $groupService
 * @property Visits[] $visits
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_of_service', 'employee', 'price', 'group_service'], 'required'],
            [['employee', 'group_service'], 'integer'],
            [['name_of_service', 'price'], 'string', 'max' => 120],
            [['employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee' => 'id_employee']],
            [['group_service'], 'exist', 'skipOnError' => true, 'targetClass' => GroupServices::class, 'targetAttribute' => ['group_service' => 'id_group_services']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_services' => 'ID',
            'name_of_service' => 'Наименование',
            'employee' => 'Сотрудник',
            'price' => 'Цена',
            'group_service' => 'Группа услуг',
        ];
    }

    /**
     * Gets query for [[Employee0]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id_employee' => 'employee']);
    }

    /**
     * Gets query for [[GroupService]].
     *
     * @return \yii\db\ActiveQuery|GroupServicesQuery
     */
    public function getGroupService()
    {
        return $this->hasOne(GroupServices::class, ['id_group_services' => 'group_service']);
    }

    /**
     * Gets query for [[Visits]].
     *
     * @return \yii\db\ActiveQuery|VisitsQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visits::class, ['id_services' => 'id_services']);
    }

    /**
     * {@inheritdoc}
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }
}
