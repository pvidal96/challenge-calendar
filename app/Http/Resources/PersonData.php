<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string first_name
 * @property string last_name
 * @property string avatar
 * @property string title
 * @property string linkedin_url
 * @property CompanyData company
 */
class PersonData extends JsonResource
{
    public function __construct(array $data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->avatar = $data['avatar'];
        $this->title = $data['title'];
        $this->linkedin_url = $data['linkedin_url'];
        $this->company = new CompanyData($data['company']);
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'avatar' => $this->avatar,
            'title' => $this->title,
            'linkedin_url' => $this->linkedin_url,
            'company' => $this->company,
        ];
    }
}
