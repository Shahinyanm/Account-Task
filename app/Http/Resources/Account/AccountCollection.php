<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($account) {
            return (new AccountResource($account));
        });

        return parent::toArray($request);
    }
}
