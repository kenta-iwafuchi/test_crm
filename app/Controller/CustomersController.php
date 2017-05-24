<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP CustomerController
 * @author user
 */
class CustomersController extends AppController {

    public $components = ['Flash'];
    public $helpers = ['Html','Form','Flash'];
    public $paginate = array(
        'limit' => '10',
        
    );
    public function index() {
        $line_type = [1=>'au光',2=>'Docomo光'];
        $plans  = ['データのみ３GB','データのみ６GB','データのみ１０GB',
                   'SMS付き３GB','SMS付き6GB','SMS付き10GB',
                   '音声通話３GB','音声通話６GB','音声通話10GB'];
        $statuses = ['契約中','解約済み'];
        $condtion = array();
        $this->Customer->recursive = 0;
        $this->loadModel('Agency');
        $agencies = $this->Agency->find('all');
        if ($this->request->data) {
            if(!empty($this->request->data['Customer']['name'])){
                
            }
            if(!empty($this->request->data['Customer']['line_type'])){
                $condtion[] = array('line_type' => $this->request->data['Customer']['line_type']);
            }
            if(!empty($this->request->data['Customer']['contract_type'])){
                $condtion[] = array('contract_type' => $this->request->data['Customer']['contract_type']);
            }
                
            if(!empty($this->request->data['Customer']['agency_id'])){
                $condtion[] = array('agency_id' => $this->request->data['Customer']['agency_type']);
            }
            if(!empty($this->request->data['Customer']['status'])){
                $condtion[] = array('status' => $this->request->data['Customer']['status']);
            }
        }
        //$this->Customer->find('all', array('conditions' => $condtion));
        
        
        $this->set('agencies',$agencies);
        $this->set('customers',$this->paginate('Customer', $condtion));
        $this->set('plans',$plans);
        $this->set('line_type',$line_type);
        $this->set('statuses',$statuses);
        
        $data = $this->paginate();
        $this->set('data',$data);
    }

    public function entry(){
         $plans = ['データのみ３GB','データのみ６GB','データのみ１０GB',
          'SMS付き３GB','SMS付き6GB','SMS付き10GB',
          '音声通話３GB','音声通話６GB','音声通話10GB'];
          $line_type = [1=>'au光',2=>'Docomo光'];
        $this->loadModel('Agency');
        $agencies = $this->Agency->find('all');
        $this->set('agencies',$agencies);
        // yoneyama
        $hash_agencies = [];
        
        foreach ($agencies as $key => $agency) {
                    
            $hash_agencies[$agency['Agency']['id']] = $agency['Agency']['agency_name'];
          
        }
        $this->set('hash_agencies',$hash_agencies);
        //
        $this->set('plans',$plans);
        $this->set('line_type',$line_type);
        if($this->request->is('post')){

            $this->Customer->create();
        
            if($this->Customer->save($this->request->data)){
                $this->Flash->success(__('登録完了'));
                return $this->redirect(['controller'=>'Customers','action'=>'index']);
            
            }
        }
    }
    
    public function edit($id = null){
         $plans = ['データのみ３GB','データのみ６GB','データのみ１０GB',
          'SMS付き３GB','SMS付き6GB','SMS付き10GB',
          '音声通話３GB','音声通話６GB','音声通話10GB'];
          $line_type = [1=>'au光',2=>'Docomo光'];
        $this->loadModel('Agency');
        $agencies = $this->Agency->find('all');
        $hash_agencies = [];
        foreach ($agencies as $key => $agency) {
            $hash_agencies[$agency['Agency']['id']] = $agency['Agency']['agency_name'];
         exit;   
        }
        $this->set('hash_agencies',$hash_agencies);
        $this->set('plans',$plans);
        $this->set('line_type',$line_type);
        $this->Customer->id = $id;
        if(!$this->Customer->exists()){
            throw new NotFoundException(__('ここおこあｋｓｆかｓご'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->Customer->save($this->request->data)){
                $this->Flash->success(__('保存した'));
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('dameeeeeee'));
        }else{
            $this->request->data = $this->Customer->findById($id);
            unset($this->request->data['customer']['name']);
        }
    }
}