<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 31/10/19
 * Time: 3:39 AM
 */

namespace Models;

use Connection\DB;
use Throwable;
class Theatre
{
    private $table = 't_theatres';
    private $fields = ['theatre_id','r_user_id','theatre_name','address','contact'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_theatres");
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
            $sql = "INSERT INTO t_theatres (r_user_id,theatre_name,address,contact) 
                    VALUES (:r_user_id,:theatre_name,:address,:contact)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_user_id'=>$data['userId'],
                ':theatre_name'=>$data['theatreName'],
                ':address'=>$data['theatreAddress'],
                ':contact'=>$data['theatreContact']
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($theatre_id){
        try{
            $stmt = DB::getConnection()->prepare(" 
              SELECT 
                  theatres.r_user_id, 
                  theatres.*,
                  users.* 
              FROM 
                  t_theatres as theatres
              INNER JOIN 
                  t_users as users
                  ON users.user_id = theatres.r_user_id
              WHERE theatre_id = :theatre_id LIMIT 1"
            );
            $stmt->execute([':theatre_id' => $theatre_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE 
                        t_theatres 
                    SET 
                        r_user_id =:r_user_id, 
                        theatre_name =:theatre_name,
                        address =:address,
                        contact =:contact
                    WHERE 
                        theatre_id =:theatre_id
                    ";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_user_id'=>$data['userId'],
                ':theatre_name'=>$data['theatreName'],
                ':address'=>$data['theatreAddress'],
                ':contact'=>$data['theatreContact'],
                ':theatre_id'=>$data['theatreId'],
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($theatre_id){
        try{
            $sql = 'DELETE FROM 
                        t_theatres 
                    WHERE 
                        theatre_id = :theatre_id';
            $q = DB::getConnection()->prepare($sql);
            $q->execute([':theatre_id' => $theatre_id]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}