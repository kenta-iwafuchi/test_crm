<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Agencies
 * @author user
 */
class Agency extends AppModel {
    public $validate = [
        'username'=>[
            'required'=>[
                'rule'=>'notBlank',
                'message'=>'名前を入力してください'
            ]
        ]
    ];
   
}