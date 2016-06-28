<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Entities\OrderItem;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Entities\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['cupom', 'items', 'user', 'deliveryman'];

    /**
     * Transform the \Order entity
     * @param \Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id'         => (int) $model->id,
            'total'      => $model->total,
            'created' => $model->created_at
        ];
    }

    public function includeUser(Order $model)
    {
        return $this->item($model->user, new UserTransformer());
    }

    public function includeCupom(Order $model)
    {
        if(!$model->cupom)
            return null;

        return $this->item($model->cupom, new CupomTransformer());
    }

    public function includeItems(Order $model)
    {
        return $this->collection($model->items, new OrderItemTransformer());
    }

    public function includeDeliveryman(Order $model)
    {
        return $this->item($model->items, new DeliverymanTransformer());
    }
}
