<?php

namespace Altum\Models;

class Project extends Model {


    public function get_projects($user_id) {

        $result = database()->query("SELECT * FROM `projects` WHERE `user_id` = {$user_id}");
        $data = [];

        while($row = $result->fetch_object()) {
            $data[$row->project_id] = $row;
        }

        return $data;
    }

    public function get_projectsByAdmin() {

        $result = database()->query("SELECT `projects`.* FROM `projects` JOIN users on `projects`.`user_id` = `users`.`user_id` WHERE `users`.`type` = 1");
        $data = [];

        while($row = $result->fetch_object()) {
            $data[$row->project_id] = $row;
        }

        return $data;
    }

}
