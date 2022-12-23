<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id_employee
 * @property string $surname
 * @property string $name
 * @property string $middle_name
 * @property int $job_title
 * @property string $address
 * @property string $mob_telefon
 *
 * @property Positions $jobTitle
 * @property Services[] $services
 * @property Visits[] $visits
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'middle_name', 'job_title', 'address', 'mob_telefon'], 'required'],
            [['job_title'], 'integer'],
            [['surname', 'name', 'middle_name', 'address'], 'string', 'max' => 255],
            [['mob_telefon'], 'string', 'max' => 20],
            [['job_title'], 'exist', 'skipOnError' => true, 'targetClass' => Positions::class, 'targetAttribute' => ['job_title' => 'id_positions']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_employee' => 'Специалист',
            'surname' => 'Фамилия мастера',
            'name' => 'Имя мастера',
            'middle_name' => 'Отчество',
            'job_title' => 'Должность',
            'address' => 'Адрес',
            'mob_telefon' => 'Моб. телефон',
        ];
    }

    /**
     * Gets query for [[JobTitle]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\PositionsQuery
     */
    public function getJobTitle()
    {
        return $this->hasOne(Positions::class, ['id_positions' => 'job_title']);
    }

    public function getfullName()
    {

        return $this->name . ' ' . $this->surname;

    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ServicesQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::class, ['employee' => 'id_employee']);
    }

    /**
     * Gets query for [[Visits]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\VisitsQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visits::class, ['id_employee' => 'id_employee']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\EmployeeQuery(get_called_class());
    }
}