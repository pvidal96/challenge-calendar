<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer total
 * @property integer per_page
 * @property string current_page
 * @property MeetingData data
 */
class CalendarData extends JsonResource
{
    public function __construct(array $data)
    {
        $this->total = $data['total'];
        $this->per_page = $data['per_page'];
        $this->current_page = $data['current_page'];

        $meetings = [];

        foreach ($data['data'] as $meeting) {
            $meetings[] = new MeetingData($meeting);
        }

        $this->data = $meetings;
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
            'total' => $this->total,
            'per_page' => $this->per_page,
            'current_page' => $this->current_page,
            'data' => MeetingData::collection($this->data),
        ];
    }
}
