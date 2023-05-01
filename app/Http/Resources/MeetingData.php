<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer id
 * @property DateTime changed
 * @property DateTime start
 * @property DateTime end
 * @property string title
 * @property array accepted
 * @property array rejected
 */
class MeetingData extends JsonResource
{
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->changed = $data['changed'];
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->title = $data['title'];
        $this->accepted = $data['accepted'];
        $this->rejected = $data['rejected'];
    }


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'changed' => $this->changed,
            'start' => $this->start,
            'end' => $this->end,
            'title' => $this->title,
            'accepted' => $this->accepted,
            'rejected' => $this->rejected,
        ];
    }
}
