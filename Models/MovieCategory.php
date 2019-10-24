<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 25/10/19
 * Time: 2:37 AM
 */

namespace Models;


use Connection\DB;
use PDOException;

class MovieCategory
{
    private $table = 't_movie_categries';
    private $fields = ['movie_category_id','movie_category_name'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_movie_categories");
            $result = $stmt->execute();
            if (!$result){
                throwError('Error notified from MovieCategory model at line :'.__LINE__);
            }
            $AllRows = [];
            while ($row = $stmt->fetch()){
                $AllRows[] = $row;
            }
            return $AllRows;
        } catch (PDOException $e){
            throwError('Error notified from MovieCategory at line :'.__LINE__."<br>".$e->getMessage());
        }
    }

    public static function insert($data){
        try{
            $sql = "INSERT INTO t_movie_categories (movie_category_name) VALUES (?)";
            $stmt= DB::getConnection()->prepare($sql);
            $result = $stmt->execute([$data['movieCategoryName']]);
            if (!$result){
                throwError('Error notified from MovieCategory model at line :'.__LINE__);
            }
            return true;
        } catch (PDOException $e){
            throwError('Error notified from MovieCategory at line :'.__LINE__."<br>".$e->getMessage());
        }
    }

    public static function select($movie_category_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_movie_categories WHERE movie_category_id = :movie_category_id LIMIT 1");
            $result = $stmt->execute([':movie_category_id' => $movie_category_id]);
            if (!$result){
                throwError('Error notified from MovieCategory model at line :'.__LINE__);
            }
            return $stmt->fetch();
        } catch (PDOException $e){
            throwError('Error notified from MovieCategory at line :'.__LINE__."<br>".$e->getMessage());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_movie_categories SET movie_category_name=:movie_category_name WHERE movie_category_id=:movie_category_id";
            $stmt= DB::getConnection()->prepare($sql);
            $result = $stmt->execute([':movie_category_name'=>$data['movieCategoryName'],':movie_category_id'=>$data['movieCategoryId']]);
            if (!$result){
                throwError('Error notified from MovieCategory model at line :'.__LINE__);
            }
        } catch (PDOException $e){
            throwError('Error notified from MovieCategory at line :'.__LINE__."<br>".$e->getMessage());
        }
    }

    public static function delete($movie_category_id){
        try{
            $sql = 'DELETE FROM t_movie_categories WHERE movie_category_id = :movie_category_id';
            $q = DB::getConnection()->prepare($sql);
            $result = $q->execute([':movie_category_id' => $movie_category_id]);
            if (!$result){
                throwError('Error notified from MovieCategory model at line :'.__LINE__);
            }
        } catch (PDOException $e) {
            throwError('Error notified from MovieCategory at line :'.__LINE__."<br>".$e->getMessage());
        }
    }
}