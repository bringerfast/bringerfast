<?php
/**
 * Created by PhpStorm.
 * User: Banu
 * Date: 25/10/19
 * Time: 3:38 AM
 */

namespace Models;


use Connection\DB;
use Throwable;

class Movie
{
    private $table = 't_moives';
    private $fields = ['movie_id','r_movie_category_id','name','release_date','actor','actress','director','duration','description','banner_image','list_image'];

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
                ':description' => $data['movieDescription'],
                ':banner_image'=>$data['movieBannerImage'],
                ':list_image'=>$data['movieListImage']
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($movie_id){
        try{
            $stmt = DB::getConnection()->prepare(" 
              SELECT 
                  movies.r_movie_category_id, 
                  movies.*,
                  movies.* 
              FROM 
                  t_movies as movies
              INNER JOIN 
                  t_movie_categories as movie_categories
                  ON movie_categories.movie_category_id = movies.r_movie_category_id
              WHERE movie_id = :movie_id LIMIT 1"
            );
            $stmt->execute([':movie_id' => $movie_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE 
                      t_movies 
                    SET 
                      r_movie_category_id=:r_movie_category_id,
                      name=:name,
                      release_date=:release_date,
                      actor=:actor,
                      actress=:actress,
                      producer=:producer,
                      director=:director,
                      duration=:duration,
                      description=:description,
                      banner_image=:banner_image,
                      list_image=:list_image
                    WHERE 
                      movie_id =:movie_id
                    ";
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
                ':list_image'=>$data['movieListImage'],
                ':movie_id' => $data['movieId']
            ]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($movie_id){
        try{
            $sql = 'DELETE FROM 
                        t_movies 
                    WHERE 
                        movie_id = :movie_id';
            $q = DB::getConnection()->prepare($sql);
            $q->execute([':movie_id' => $movie_id]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}