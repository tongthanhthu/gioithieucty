<?php

namespace App\Services;
use App\Repositories\ChooseUs\ChooseUsRepository;


/**
 * Class ChooseUsService
 * @package App\Services\ChooseUsService
 */
class ChooseUsService
{
    protected $chooseUsRepo;

    public function __construct(ChooseUsRepository $chooseUsRepo)
    {
        $this->chooseUsRepo = $chooseUsRepo;
    }

    public function getChooseUs()
    {
        $chooseUs = $this->chooseUsRepo->first();
        return $chooseUs;
    }

    public function store($params)
    {
       return $this->chooseUsRepo->create($params);
    }

    public function update($id,$params)
    {
        return $this->chooseUsRepo->where('id',$id)->update($params);
    }

    public function getYoutubeEmbedUrl($param)
    {
        $url = $param;
        $parsedUrl = parse_url($url);
        if (isset($parsedUrl['query'])) {
            $parsedQuery = [];
            parse_str($parsedUrl['query'], $parsedQuery);
            if (isset($parsedQuery['v'])) {
                return 'https://www.youtube.com/embed/' . $parsedQuery['v'];
            }
        }
        return $url;
    }

}


