<?php

namespace App\Library\Services;

use App\Library\Services\Contracts\ActivityServiceInterface;
use App\Enums\ActivityTypeEnum;
use App\Enums\FavoriteStatus;
use App\Enums\ReadStatus;

class ActivityService implements ActivityServiceInterface {

    public function statusController($data_activity, $activity)
    {
        switch ($activity) {
            case "reading" : 
                $data_activity->read_status = ReadStatus::READING;
                $data_activity->type_id = ActivityTypeEnum::READING;
                break;
            case "unreading" : 
                $data_activity->read_status = ReadStatus::NONE;
                $data_activity->type_id = ActivityTypeEnum::UNREADING;
                break;
            case "read" :
                $data_activity->read_status = ReadStatus::READ;
                $data_activity->type_id = ActivityTypeEnum::READ;
                break;
            case "unread" : 
                $data_activity->read_status = ReadStatus::NONE;
                $data_activity->type_id = ActivityTypeEnum::UNREADING;
                break;
            case "favorite" : 
                $data_activity->favorite_status = FavoriteStatus::FAVORITE;
                $data_activity->type_id = ActivityTypeEnum::FAVORITE;
                break;
            case "unfavorite" : 
                $data_activity->favorite_status = FavoriteStatus::NONE;
                $data_activity->type_id = ActivityTypeEnum::UNFAVORITE;  
                break;  
        }
    }
}