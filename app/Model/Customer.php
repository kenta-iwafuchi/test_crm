<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Customer
 * @author user
 */
class Customer extends AppModel {
      public $belongsTo = ['Agency'];
    public function findByName($agency){
        $option = [
            'conditions' => [
                'agency_name' => $agency
            ],
            'recursive' => 1
        ];
        return $this->find('first',$option);
}
    public $validate = [
        'name'=>[
            'required'=>[
                'rule'=>'notblank',
                'message'=>'名前を入れろ！！！！'
            ]
        ],
        'password'=>[
            'required'=>[
                'rule'=>'notBlank',
                'message'=>'パスワードいれろコラ！'
            ]
        ]
    ];
}
