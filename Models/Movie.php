<?php
/**
 * Created by PhpStorm.
 * User: Banu
 * Date: 25/10/19
 * Time: 3:38 AM
 */

namespace Models;


use Connection\DB;
use function MongoDB\BSON\toJSON;
use Throwable;

class Movie
{
    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_movies");
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
            $sql = "INSERT INTO t_movies (
                      r_movie_category_id,
                      name,
                      release_date,
                      actor,
                      actress,
                      producer,
                      director,
                      duration,
                      description,
                      banner_image,
                      list_image
                    ) 
                    VALUES (
                            :r_movie_category_id,
                            :name,
                            :release_date,
                            :actor,
                            :actress,
                            :producer,
                            :director,
                            :duration,
                            :description,
                            :banner_image,
                            :list_image
                            )";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_movie_category_id'=>$data['movieCategory'],
                ':name'=>$data['movieName'],
                ':release_date'=>$data['movieRelesedOn'],
                ':actor'=>$data['movieActor'],
                ':actress'=>$data['movieActress'],
                ':producer'=>$data['movieProducer'],
                ':director'=>$data['movieDirector'],
                ':duration'=>$data['movieDuration'],
                ':description'=>$data['movieDescription'],
                ':banner_image'=>$data['movieBannerImage'],
                ':list_image'=>$data['movieListImage']
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($user_id){
        try{
            $stmt = DB::getConnection()->prepare(" 
              SELECT 
                  users.r_role_id, 
                  users.*,
                  roles.* 
              FROM 
                  t_users as users
              INNER JOIN 
                  t_roles as roles
                  ON roles.role_id = users.r_role_id
              WHERE user_id = :user_id LIMIT 1"
            );
            $stmt->execute([':user_id' => $user_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE 
                        t_users 
                    SET 
                        r_role_id =:r_role_id, 
                        name =:name,
                        email =:email,
                        mobile =:mobile,
                        password =:password,
                        status =:status
                    WHERE 
                        user_id =:user_id
                    ";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_role_id'=>$data['userRole'],
                ':name'=>$data['userName'],
                ':email'=>$data['userEmail'],
                ':mobile'=>$data['userMobile'],
                ':password'=>$data['userPassword'],
                ':status'=>$data['userStatus'],
                ':user_id'=>$data['userId'],
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($user_id){
        try{
            $sql = 'DELETE FROM 
                        t_users 
                    WHERE 
                        user_id = :user_id';
            $q = DB::getConnection()->prepare($sql);
            $q->execute([':user_id' => $user_id]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}