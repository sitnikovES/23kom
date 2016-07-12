<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */

    public $password;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'status'], 'required'],
            [['username', 'password'], 'filter', 'filter'=>'trim'],

            [['status'], 'integer'],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            [['username'], 'string', 'max' => 15],

            ['password', 'required', 'on'=>'create'],
            ['username', 'unique', 'message'=>'Это имя уже занято'],
            [['auth_key', 'password_hash'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'password_hash' => 'Password Hash',
            'status' => 'Статус',
            'auth_key' => 'Auth Key',
        ];
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        //return ($password == $this->password_hash);
        return Yii::$app->security->validatePassword($password, $this->password_hash);

    }


    public function setPassword($password){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

   public function beforeSave($insert){
        if (parent::beforeSave($insert)) {

            if(empty($this->auth_key)){
                //$this->auth_key = $this->generateAuthKey();
                //$this->auth_key = $this->password;
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            //$this->setPassword()
            //if ($this->isNewRecord) {
            //    $this->auth_key = $this->generateAuthKey();
            //}
            return true;
        }
        return false;
    }
}
