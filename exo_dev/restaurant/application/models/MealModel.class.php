<?php
class MealModel {

    public function listAll(){
        $db = new Database();

        return $db->query('SELECT * from Meal;');

    }
}