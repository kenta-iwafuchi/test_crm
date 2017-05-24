<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates


App::uses('AppController', 'Controller');

/**
 * CakePHP AgenciesController
 * @author user
 */
class AgenciesController extends AppController {

    
    public $components = ['Flash'];
    public $helper = ['Html','Form','Flash'];
    

    public function index() {
        $this->Agency->recursive = 0;
        $this->set('agencies', $this->paginate());
    }
//登録ページ
    public function entry() {
        if($this->request->is('post')){
            $this->Agency->create();
            if($this->Agency->save($this->request->data)){
                $this->Flash->success(__('ﾄｳﾛｸｶﾝﾘｮｳ'));
                return $this->redirect(['controller'=>'Agencies','action'=>'index']);
            }
        }
    }
//消去処理
    public function delete($id = null){
        $this->request->allowMethod('post');
        
        $this->Agency->id = $id;
        if (!$this->Agency->exists()){
            throw new NotFoundException(__('Invalid agency'));
        }
        if ($this->Agency->delete()){
            $this->Flash->success(__('ショウキョカンリョウシマシタ'));
            return $this->redirect(['action' => 'index']);
        }
    }
//編集
    public function edit($id = null){
        $this->Agency->id = $id;
        if(!$this->Agency->exists()){
            throw new NotFoundException(__('だいりてぇぇえぇぇんーーーーーーーーーーーーーーーーーー'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->Agency->save($this->request->data)){
                $this->Flash->success(__('保存したよよおっよおよよよよよよお'));
                return $this->redirect(['action' => 'index']);
            }
        $this->Flash->error(__('やりなおしぃいぃぃｘwwwwwwww'));
        }else{
            $this->request->data = $this->Agency->findById($id);
        unset($this->request->data['agency']['agency_name']);
            
        }
    }
}