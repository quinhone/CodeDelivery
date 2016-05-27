<?php

namespace CodeDelivery\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = [
		'user_id',
		'cupom_id',
		'user_deliveryman_id',
		'total',
		'status',
	];

	public function cupom()
	{
		return $this->hasOne(Cupom::class);
	}

	public function items()
	{
		return $this->hasMany(OrderItem::class);
	}

	public function deliveryman()
	{
		return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
	}

	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

}
