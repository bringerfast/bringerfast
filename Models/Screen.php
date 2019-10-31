<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 31/10/19
 * Time: 3:55 PM
 */

namespace Models;


use Connection\DB;
use Throwable;

class Screen
{
    private $table = 't_screens';
    private $fields = ['screen_id','r_theatre_id','r_class_type_id','screen_name','total_seats'];

    /**
     * @return array
     */
    public static function all(){
        try{
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
            $AllRows = [];
            while ($row = $stmt->fetch()){
                $AllRows[] = $row;
            }
            return $AllRows;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function insert($data){
        try{
            $sql = "INSERT INTO t_screens (r_theatre_id,r_class_type_id,screen_name,total_seats) 
                    VALUES (:r_theatre_id,:r_class_type_id,:screen_name,:total_seats)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_theatre_id'=>$data['screenTheatreId'],
                ':r_class_type_id'=>$data['screenClassTypeId'],
                ':screen_name'=>$data['screenName'],
                ':total_seats'=>$data['screenSeat']
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($screen_id){
        try{
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
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE 
                        t_screens 
                    SET 
                       r_theatre_id=:r_theatre_id,
                       r_class_type_id=:r_class_type_id,
                       screen_name=:screen_name,
                       total_seats=:total_seats
                    WHERE 
                        screen_id =:screen_id
                    ";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_theatre_id' => $data['screenTheareId'],
                ':r_class_type_id' => $data['screenClassTypeId'],
                ':screen_name' => $data['screenName'],
                ':total_seats' => $data['screenSeat'],
                ':screen_id' => $data['screenId']
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($screen_id){
        try{
            $sql = 'DELETE FROM 
                        t_screens 
                    WHERE 
                        screen_id = :screen_id';
            $q = DB::getConnection()->prepare($sql);
            $q->execute([':screen_id' => $screen_id]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}