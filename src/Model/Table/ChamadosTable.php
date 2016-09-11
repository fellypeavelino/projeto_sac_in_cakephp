<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chamados Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clientes
 * @property \Cake\ORM\Association\BelongsTo $Pedidos
 *
 * @method \App\Model\Entity\Chamado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chamado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chamado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chamado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chamado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chamado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chamado findOrCreate($search, callable $callback = null)
 */
class ChamadosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('chamados');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Clientes', [
            'foreignKey' => 'clientes_id'
        ]);
        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedidos_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->requirePresence('observacao', 'create')
            ->notEmpty('observacao');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['clientes_id'], 'Clientes'));
        $rules->add($rules->existsIn(['pedidos_id'], 'Pedidos'));

        return $rules;
    }
}
