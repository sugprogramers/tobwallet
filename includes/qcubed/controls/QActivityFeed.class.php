<?php

/**
 * Description of QActivityFeed
 *
 * @author Harold
 */
class QActivityFeed extends QPanel {

    public $upload_path;
    public $user;
    public $arrayActivityFeed;

    public function __construct($objParentObject, $strControlId = null, $idUser = null) {
        parent::__construct($objParentObject, $strControlId);

        $this->upload_path = __UPLOAD_PATH__ . "/profile";
        $this->user = Users::LoadByIdUsers($idUser);
        $this->reloadArray();
    }

    public function reloadArray() {
        $this->arrayActivityFeed = Useractivity::LoadArrayByIdUsers($this->user->IdUsers);
    }

    public function GetControlHtml() {
        $this->reloadArray();
        $widgetContent = '<ul class="list-group list-group-dividered list-group-full">';
        $end = QDateTime::Now()->qFormat("YYYY-MM-DD hhhh:mm:ss");
        foreach ($this->arrayActivityFeed as $activity) {

            $img = "";
            if ($activity->ProfilePicture == '' || is_null($activity->ProfilePicture)) {
                $img = __SUBDIRECTORY__ . "/template/assets/images/ic_profile.png";
            } else {
                $img = $this->upload_path . '/' . $activity->ProfilePicture;
            }
            $init = $activity->CreateDateTime->qFormat("YYYY-MM-DD hhhh:mm:ss");
            $time = $this->getTimeDifference($init, $end);

            $date_time = $activity->CreateDateTime->qFormat("hh:mm:ss z - MM/DD/YYYY");
            $widgetContent .= '<li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="avatar avatar-online" href="javascript:void(0)">
                                            <img src="' . $img . '" alt=""><i></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <small class="pull-right">' . $time . ' ago</small>
                                            <a class="name">' . $activity->FromName . '</a> ' . $activity->Description . '.
                                        </h4>
                                        <small>' . $date_time . '</small>
                                    </div>
                                </div>
                            </li>';
        }

        $widgetContent .= '</ul>';

        return $widgetContent;
    }

    public function getTimeDifference($dateInit, $dateEnd) {

        $start_date = new DateTime($dateInit);
        $since_start = $start_date->diff(new DateTime($dateEnd));
//        echo $since_start->days . ' days total<br>';
//        echo $since_start->y . ' years<br>';
//        echo $since_start->m . ' months<br>';
//        echo $since_start->d . ' days<br>';
//        echo $since_start->h . ' hours<br>';
//        echo $since_start->i . ' minutes<br>';
//        echo $since_start->s . ' seconds<br>';
        // $diff = $end - $start;
        $val = "";
        if ($since_start->s > 0) {
            if ($since_start->s == 1) {
                $val = $since_start->s . " second ";
            } else {
                $val = $since_start->s . " seconds ";
            }
        }

        if ($since_start->i > 0) {
            if ($since_start->i == 1) {
                $val = $since_start->i . " minute ";
            } else {
                $val = $since_start->i . " minutes ";
            }
        }

        if ($since_start->h > 0) {
            if ($since_start->h == 1) {
                $val = $since_start->h . " hour ";
            } else {
                $val = $since_start->h . " hours ";
            }
        }

        if ($since_start->d > 0) {
            if ($since_start->d == 1) {
                $val = $since_start->d . " day ";
            } else {
                $val = $since_start->d . " days ";
            }
        }

        if ($since_start->m > 0) {
            if ($since_start->m == 1) {
                $val = $since_start->m . " month ";
            } else {
                $val = $since_start->m . " months ";
            }
        }

        if ($since_start->m > 0) {
            if ($since_start->y == 1) {
                $val = $since_start->y . " year ";
            } else {
                $val = $since_start->y . " years ";
            }
        }

        return $val;
    }

}
