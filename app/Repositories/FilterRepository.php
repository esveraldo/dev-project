<?php

namespace App\Repositories;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Support\Facades\File;

class FilterRepository
{
    public function filterResults($query, $filters)
    {
        //Filters
        foreach ($filters as $key => $filter) {
            if ($filter != null) {
                if (sizeof($filter) == 1) {
                    if ($key == 'lists') {
                        $filter[0] == 'Y' ? $query = $query->whereHas($key) : null;
                        $filter[0] == 'N' ? $query = $query->whereDoesntHave($key) : null;
                    } elseif ($key == 'stores') {
                        $query->whereHas($key, function ($var) use ($filter) {
                            $var->where('store_id', $filter[0]);
                        });
                    } elseif ($key == 'products') {
                        $query->whereHas('lists', function ($var) use ($filter, $key) {
                            $var->whereHas($key, function ($check) use ($filter) {
                                $check->where('product_id', $filter[0]);
                            });
                        });
                    } else {
                        $query = $query->where($key, $filter[0]);
                    }
                } elseif (sizeof($filter) > 1) {
                    $query = $query->where(function ($var) use ($filter, $key) {
                        foreach ($filter as $count => $item) {
                            if ($count == 0) {
                                if ($key == 'lists') {
                                    $item == 'Y' ? $var->whereHas($key) : null;
                                    $item == 'N' ? $var->whereDoesntHave($key) : null;
                                } elseif ($key == 'stores') {
                                    $var->whereHas($key, function ($check) use ($item) {
                                        $check->where('store_id', $item);
                                    });
                                } elseif ($key == 'products') {
                                    $var->whereHas('lists', function ($check) use ($item, $key) {
                                        $check->whereHas($key, function ($has) use ($item) {
                                            $has->where('product_id', $item);
                                        });
                                    });
                                } elseif ($key == 'birth') {
                                    $var->where($key, '<=', $item);
                                } else {
                                    $var->where($key, $item);
                                }
                            } else {
                                if ($key == 'lists') {
                                    $item == 'Y' ? $var->orWhereHas($key) : null;
                                    $item == 'N' ? $var->orWhereDoesntHave($key) : null;
                                } elseif ($key == 'stores') {
                                    $var->orWhereHas($key, function ($check) use ($item) {
                                        $check->where('store_id', $item);
                                    });
                                } elseif ($key == 'products') {
                                    $var->orWhereHas('lists', function ($check) use ($item, $key) {
                                        $check->whereHas($key, function ($has) use ($item) {
                                            $has->where('product_id', $item);
                                        });
                                    });
                                } elseif ($key == 'birth') {
                                    $var->where($key, '>=', $item);
                                } else {
                                    $var->orWhere($key, $item);
                                }
                            }
                        }
                    });
                }
            }
        }

        return $query->get();
    }

    public function filterUsers($profile_id)
    {
        if ($profile_id != 0) {
            $campaign = Campaign::find($profile_id);

            $whereAge = $campaign->ages != null ? \GuzzleHttp\json_decode($campaign->ages) : null;
            $whereBirth = null;
            $whereList = $campaign->lists != null ? \GuzzleHttp\json_decode($campaign->lists) : null;
            $whereStore = $campaign->stores != null ? \GuzzleHttp\json_decode($campaign->stores) : null;
            $wherePlatform = $campaign->platforms != null ? \GuzzleHttp\json_decode($campaign->platforms) : null;
            $whereGender = $campaign->genders != null ? \GuzzleHttp\json_decode($campaign->genders) : null;
            $whereState = $campaign->states != null ? \GuzzleHttp\json_decode($campaign->states) : null;
            $whereCity = $campaign->cities != null ? \GuzzleHttp\json_decode($campaign->cities) : null;
            $whereNeighborhood = $campaign->neighborhoods != null ? \GuzzleHttp\json_decode($campaign->neighborhoods) : null;
            $whereProduct = $campaign->products != null ? \GuzzleHttp\json_decode($campaign->products) : null;

            if ($whereAge != null) {
                if ($whereAge != '10,100') {
                    $whereBirth = explode(',', $whereAge);
                    $whereBirth = array(
                        date("Y-m-d", strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " - " . $whereBirth[0] . " year")),
                        date("Y-m-d", strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " - " . $whereBirth[1] . " year"))
                    );
                } else {
                    $whereBirth = null;
                }
            }

            $filters = Array(
                'lists' => $whereList,
                'platform' => $wherePlatform,
                'gender' => $whereGender,
                'birth' => $whereBirth,
                'state' => $whereState,
                'city' => $whereCity,
                'neighborhood' => $whereNeighborhood,
                'stores' => $whereStore,
                'products' => $whereProduct,
            );

            $query = User::query();

            $users = $this->filterResults($query, $filters);
        } else {
            $users = User::all();
        }

        return $users;
    }

}