<?php

namespace MrEduar\Balance;

trait ReferencedBySandboxBalance
{
    /**
     * Get all of the model's balance references.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function balanceReferences()
    {
        return $this->morphMany(SandboxBalance::class, 'ref');
    }
}
