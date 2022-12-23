<?php

namespace app\models;

use app\models\query\PositionsQuery;
use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id_positions
 * @property string $name_of_job_title
 * @property int $services_group
 * @property string $schedule
 *
 * @property Employee[] $employees
 * @property GroupServices $servicesGroup
 */
class Positions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_of_job_title', 'services_group', 'schedule'], 'required'],
            [['services_group'], 'integer'],
            [['name_of_job_title', 'schedule'], 'string', 'max' => 255],
            [['services_group'], 'exist', 'skipOnError' => true, 'targetClass' => GroupServices::class, 'targetAttribute' => ['services_group' => 'id_group_services']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_positions' => 'ID',
            'name_of_job_title' => 'Должность',
            'services_group' => 'Группа услуг',
            'schedule' => 'Расписание',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['job_title' => 'id_positions']);
    }

    /**
     * Gets query for [[ServicesGroup]].
     *
     * @return \yii\db\ActiveQuery|GroupServicesQuery
     */
    public function getServicesGroup()
    {
        return $this->hasOne(GroupServices::class, ['id_group_services' => 'services_group']);
    }

    /**
     * {@inheritdoc}
     * @return PositionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PositionsQuery(get_called_class());
    }
}
