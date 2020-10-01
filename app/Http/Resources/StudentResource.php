<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
<<<<<<< HEAD
        return parent::toArray($request);
=======
        return [    
            'id' => $this->id,
            'batch' => $this->batches,
        ];  
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
    }
}
