<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (request('lang')=='ar') {
            return [
                'id' => $this->id,
                $this->mergeWhen($this->cityAr, [
                    'city' => $this->cityAr,
                ]),
                $this->mergeWhen($this->countryAr, [
                    'country' => $this->countryAr,
                ]),
                $this->mergeWhen($this->titleAr, [
                    'special' => $this->titleAr,
                ]),
                $this->mergeWhen($this->country_id, [
                    'country_id' => $this->country_id,
                ]),


            ];
        }
        elseif (request('lang')=='en') {
            return [
                'id' => $this->id,
                $this->mergeWhen($this->cityEn, [
                    'city' => $this->cityEn,
                ]),
                $this->mergeWhen($this->countryEn, [
                    'country' => $this->countryEn,
                ]),
                $this->mergeWhen($this->titleEn, [
                    'special' => $this->titleEn,
                ]),
                $this->mergeWhen($this->country_id, [
                    'country_id' => $this->country_id,
                ]),

            ];
        }
        else{
            return [
                'id' => $this->id,
                $this->mergeWhen($this->cityUr, [
                    'city' => $this->cityUr,
                ]),
                $this->mergeWhen($this->countryUr, [
                    'country' => $this->countryUr,
                ]),
                $this->mergeWhen($this->titleUr, [
                    'special' => $this->titleUr,
                ]),
                $this->mergeWhen($this->country_id, [
                    'country_id' => $this->country_id,
                ]),
            ];
        }
    }
}
