<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Visits]].
 *
 * @see \app\models\Visits
 */
class VisitsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Visits[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Visits|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
