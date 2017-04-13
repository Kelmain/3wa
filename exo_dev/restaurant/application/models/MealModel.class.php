<?php
class MealModel {

    public function listAll(){
        $db = new Database();

        return $db->query('SELECT * from Meal;');

    }

    public function listOne($Id){
        $db = new Database();

       return $db->queryOne('SELECT * from Meal WHERE Id = ?;', [$Id]);

    }
}