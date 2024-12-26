<?php

namespace App\Actions\Common;

use App\Data\CountryData;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCountries
{
    use AsAction;

    public function asController(ActionRequest $request)
    {
        return response()->json($this->handle($request->query('filter')));
    }

    public function handle(string $filter = null)
    {
        $countries = [];

        if ($filter) {
            $country = country($filter);

            if ($country) {
                $countries[] = [
                    'code' => $country->getIsoAlpha2(),
                    'name' => $country->getName(),
                    'flag' => $country->getFlag(),
                    'currency' => $country->getCurrency()['iso_4217_code']
                ];
            }
        } else {
            $countries = collect(countries())
                ->map(function ($country) {
                    return [
                        'code' => $country['iso_3166_1_alpha2'],
                        'name' => $country['name'],
                        'flag' => country($country['iso_3166_1_alpha2'])->getFlag(),
                        'currency' => $country['currency']
                    ];
                })
                ->values();
        }

        return [
            'countries' => CountryData::collect($countries)
        ];
    }
}
