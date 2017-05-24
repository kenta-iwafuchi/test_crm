<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP UsersController
 * @author user
 */
class UsersController extends AppController {

    public $components = ['Flash'];
    public $helpers = ['Html','Form','Flash'];
    


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function index() {
 // AppController にある paginate の設定を追加する。
        //
        $data = $this->paginate('User',[
            'User.deleted' => 0]);
        $this->set('users',$data);    
        
    }
    
    //管理者新規登録
    public function entry() {
        if($this->request->is('post')){
             $this->User->create();
             if($this->User->save($this->request->data)){
                 $this->Flash->success(__('登録完了しました。'));
                 return $this->redirect(array('controller'=>'Users','action'=>'index'));
            }
        }
             
    }
    //管理者編集
    public function edit($id = null){
       
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException(__('ユーザーおらんぞ？'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('ほぞんしたよー'));
                return $this->redirect(array('action'=>'index'));
            }
        $this->Flash->error(__('うまくいかなかったからもう一回やってね。')
        );
        
        }else{
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['user']['password']);
        }
        
    }
    
    public function delete($id = null){
       $this->request->allowMethod('post');
       $this->User->id = $id;
        $user_id = sprintf('%d',$id);
        if(!isset($user_id)) {
        }
        // $user_id をモデルの仮レコード的な部分に一時代入する。
        $this->User->id = $user_id;
        // 先ほど代入したidに対応するレコードを指定。
        if($this->User->savefield('deleted',1)) {
            $this->Flash->success(__('削除に成功しました。'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('削除に失敗しました。やり直してください。'));
        }
    
    }
    
    public function login(){
     if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Flash->error(__('パスワードかユーザーネームが違います'));
        }
    }
    }
    
    public function logout(){
        $this->redirect($this->Auth->logout());
    }

}
