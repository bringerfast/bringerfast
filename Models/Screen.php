<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 31/10/19
 * Time: 3:55 PM
 */

namespace Models;


use Classes\Model;
use Connection\DB;
use Throwable;
use PDO;

class Screen extends Model
{
    protected $table = 't_screens';
    protected $primaryKey = 'screen_id';
    protected $fields = ['r_theatre_id','r_class_type_id','screen_name','total_seats'];

    /**
     * @return array
     */
    public static function allWithRelation(){
        try{
            $child = get_called_class();
            $object = new $child();
            $stmt = DB::getConnection()->prepare("
              SELECT 
                  screens.r_theatre_id, 
                  screens.r_class_type_id, 
                  screens.*,
                  theatres.*, 
                  class_types.* 
              FROM 
                  t_screens as screens
              INNER JOIN 
                  t_theatres as theatres
                  ON theatres.theatre_id = screens.r_theatre_id
              INNER JOIN 
                  t_class_types as class_types
                  ON class_types.class_type_id = screens.r_class_type_id
            ");
            $stmt->execute();
            $objects = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
                $tempObject = new $child();
                foreach ($data as $key => $value){
                    $tempObject->$key = $value;
                }
                array_push($objects,$tempObject);
            }
            $object->objects = $objects;
            return $object;
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function selectWithRelation($screen_id){
        try{
            $child = get_called_class();
            $object = new $child();
            $stmt = DB::getConnection()->prepare(" 
              SELECT 
                  screens.r_theatre_id, 
                  screens.r_class_type_id, 
                  screens.*,
                  theatres.*, 
                  class_types.* 
              FROM 
                  t_screens as screens
              INNER JOIN 
                  t_theatres as theatres
                  ON theatres.theatre_id = screens.r_theatre_id
              INNER JOIN 
                  t_class_types as class_types
                  ON class_types.class_type_id = screens.r_class_type_id
              WHERE screen_id = :screen_id LIMIT 1"
            );
            $stmt->execute([':screen_id' => $screen_id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach ($data as $key => $value){
                $object->$key = $value;
            }
            return $object;
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

}