<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 */
class ClientesController extends AppController
{

    public function validAjax($email = null){
        /*$pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);*/
        $cliente = $this->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'email'
        ])
        ->where(['Clientes.email' => $email])
        ->toArray();
        if (count($cliente) > 0) {
            echo json_encode(["success"=>true]);
        }else{
             echo json_encode(["success"=>false]);
        }
        die;
    }

    public function cadastrar(){
        $this->loadModel("Chamados");
        $this->loadModel("Pedidos");
        $chamado = $this->Chamados->newEntity();
        $pedido = $this->Pedidos->newEntity();
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            if ($this->Clientes->save($cliente)) {
                $data = $this->request->data;
                echo $data["clientes_id"] = $cliente->id;
                $pedido = $this->Pedidos->find('list', [
                    'keyField' => 'numero',
                    'valueField' => 'id'
                ])
                ->where(['Pedidos.numero' => $data['numero']])
                ->toArray();
                $data["pedidos_id"] = $pedido[$data['numero']];
                $chamado = $this->Chamados->patchEntity($chamado, $data);
                $this->Chamados->save($chamado);
                ///$this->Flash->success(__('The cliente has been saved.'));
                $this->Flash->success(__('Cadastrado com sucesso.'));
                return $this->redirect(['controller'=>'chamados','action' => 'index']);
            } else {
                $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cliente','chamado','pedido'));
        $this->set('_serialize', ['cliente']);

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
        $this->set('_serialize', ['clientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Chamados']
        ]);

        $this->set('cliente', $cliente);
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
