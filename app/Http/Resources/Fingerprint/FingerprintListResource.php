<?php

namespace App\Http\Resources\Fingerprint;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FingerprintListResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->transformCollection($this->collection),
            'meta' => [
                "success" => true,
                "message" => "Success get fingerprint lists",
                'pagination' => $this->metaData()
            ]
        ];
    }

    private function transformData($data)
    {
        return [
            'id' => $data->id,
            'name' => $data->name,
            'serial_number' => $data->serial_number,
            'active' => $data->active ? 'Active' : 'Inactive',
        ];
    }

    private function transformCollection($collection)
    {
        // return $collection->transform(function ($data) {
        //     return $this->transformData($data);
        return $collection->map(function ($data) { // mengubah transform ke map
            return $this->transformData($data);
        });
    }

    private function metaData()
    {
        return [
            "total" => $this->total(),
            "count" => $this->count(),
            "per_page" => (int)$this->perPage(),
            "current_page" => $this->currentPage(),
            "total_pages" => $this->lastPage(),
            "links" => [
                "next" => $this->nextPageUrl()
            ],
        ];
    }
}
