<?php

namespace app\models;

use app\models\query\VisitsQuery;
use Yii;

/**
 * This is the model class for table "visits".
 *
 * @property int $id_visitor
 * @property int $id_client
 * @property int $id_services
 * @property int $id_employee
 * @property string $date
 * @property string $time
 * @property string $service_rendered
 *
 * @property Clients $client
 * @property Employee $employee
 * @property Services $services
 */
class Visits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_services', 'id_employee', 'date', 'time', 'service_rendered'], 'required'],
            [['id_client', 'id_services', 'id_employee'], 'integer'],
            [['date', 'time'], 'safe'],
            [['service_rendered'], 'string', 'max' => 20],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['id_client' => 'id_client']],
            [['id_services'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['id_services' => 'id_services']],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['id_employee' => 'id_employee']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_visitor' => 'Id Visitor',
            'id_client' => 'Клиент',
            'id_services' => 'Услуга',
            'id_employee' => 'Специалист',
            'date' => 'Дата',
            'time' => 'Время',
            'service_rendered' => 'Service Rendered',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|ClientsQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id_client' => 'id_client']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery|EmployeeQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id_employee' => 'id_employee']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery|ServicesQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::class, ['id_services' => 'id_services']);
    }

    /**
     * {@inheritdoc}
     * @return VisitsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VisitsQuery(get_called_class());
    }
}
