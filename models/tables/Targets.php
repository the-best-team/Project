<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30/03/2019
 * Time: 19:55
 */


namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "targets".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $user_id
 * @property string $date_create
 * @property string $date_change
 * @property string $date_plane
 * @property string $date_resolve
 * @property int $status_id
 *
 * @property Status $status
 * @property Users $user
 */
class Targets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'targets';
    }

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_change'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_change'],
                ],
                'value' => new Expression('NOW()'),

            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['user_id', 'status_id'], 'integer'],
            [['date_create', 'date_change', 'date_plane', 'date_resolve'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'user_id' => 'User ID',
            'date_create' => 'Date Create',
            'date_change' => 'Date Change',
            'date_plane' => 'Date Plane',
            'date_resolve' => 'Date Resolve',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['target_id' => 'id']);
    }
}