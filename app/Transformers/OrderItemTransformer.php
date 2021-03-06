<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Entities\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{
	protected $defaultIncludes = [ 'product' ];

	/**
	 * Transform the \OrderItem entity
	 * @param \OrderItem $model
	 *
	 * @return array
	 */
	public function transform ( OrderItem $model )
	{
		return [
			'id' => (int)$model->id,
			'product_id' => (int)$model->product_id,
			'price' => $model->price,
			'qtd' => $model->qtd
		];
	}

	public function includeProduct ( OrderItem $model )
	{
		return $this->item ( $model->product, new ProductTransformer() );
	}

}
