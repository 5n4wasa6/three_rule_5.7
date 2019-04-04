<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class Mypage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"         => $this->id,
            "icon"       => $this->icon,
            "oneword"    => $this->oneword,
            "rule_one"   => $this->rule_one,
            "rule_two"   => $this->rule_two,
            "rule_three" => $this->rule_three
        ];
    }
}
