<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string name
 * @property string linkedin_url
 * @property integer employees
 */
class CompanyData extends JsonResource
{
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->linkedin_url = $data['linkedin_url'];
        $this->employees = $data['employees'];
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
            'name' => $this->name,
            'linkedin_url' => $this->linkedin_url,
            'employees' => $this->employees,
        ];
    }
}
