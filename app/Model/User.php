<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * CakePHP User
 * @author user
 */
class User extends AppModel {
    
    public $validate = array(
        'username'=>array(
            'required'=>array(
                'rule'=>'notBlank',
                'message'=>'名前を入力してください'
            )
        ),
        'password'=>array(
            'required'=>array(
                'rule'=>'notBlank',
                'message'=>'パスワードを入力してください'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}