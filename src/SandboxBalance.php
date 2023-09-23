<?php

namespace MrEduar\Balance;

use Illuminate\Database\Eloquent\Model;

class SandbboxBalance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balanceable_type',
        'balanceable_id',
        'amount',
        'ref_type',
        'ref_id',
        'description',
    ];

    /**
     * Balance constructor.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('sandbox-balance.table', 'sandbox_balance_history'));
    }

    /**
     * Get the balance amount transformed to currency.
     *
     * @return float|int
     */
    public function getAmountAttribute()
    {
        return $this->attributes['amount'];
    }

    /**
     * Get the parent of the balance record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function balanceable()
    {
        return $this->morphTo();
    }

    /**
     * Obtain the model for which the balance sheet movement was made
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function referenceable()
    {
        return $this->morphTo();
    }
}
