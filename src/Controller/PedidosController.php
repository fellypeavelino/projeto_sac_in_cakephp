<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController
{

    public function validAjax($id = null){
        /*$pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);*/
        $pedido = $this->Pedidos->find('list', [
            'keyField' => 'id',
            'valueField' => 'numero'
        ])
        ->where(['Pedidos.numero' => $id])
        ->toArray();
        if (count($pedido) > 0) {
            echo json_encode(["success"=>true]);
        }else{
             echo json_encode(["success"=>false]);
        }
        die;
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos'));
        $this->set('_serialize', ['pedidos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);

        $this->set('pedido', $pedido);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pedido'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pedido'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
