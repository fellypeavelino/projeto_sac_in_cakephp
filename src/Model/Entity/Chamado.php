<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chamado Entity
 *
 * @property int $id
 * @property int $clientes_id
 * @property int $pedidos_id
 * @property string $titulo
 * @property string $observacao
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Pedido $pedido
 */
class Chamado extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
