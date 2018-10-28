<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/27/18
 * Time: 5:43 PM
 */

include_once ROOT.'/models/Users.php';

class UsersController
{
    public function actionUsersAll()
    {
        $user = Users::getUsersList();
        $listUsers = array();
        $i = 0;
        if ($user != null) {
            while ($row = $user->fetch()){
                $listUsers[$i] = $row;
                $i++;
            }
//            echo "<pre>";
//            print_r($listUsers);
            include_once ROOT.'/views/UsersAll/index.php';
//            include_once ROOT.'/controllers/UsersAllView.php';

//            UsersAllView::usersAllView($listUsers);
            echo ROOT.'/views/UsersAll/index.php';
            return $listUsers;
        }
        return true;
    }

    public function actionUserId($user_id)
    {
        $user = Users::getUserId($user_id);
        if ($user != null) {
            $row = $user->fetch();
            if (!$row){
                return $this->actionUsersAll();
            }
            echo "<pre>";
            print_r($row);
            return $row;
        }
        return true;
    }

    public function actionUserDelId($user_id)
    {
        Users::delUserId($user_id);
        return true;
    }
}