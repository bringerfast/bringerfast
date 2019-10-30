<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 31/10/19
 * Time: 3:05 AM
 */

namespace Models;

use Connection\DB;
use Throwable;
class Show
{
    private $table = 't_shows';
    private $fields = ['show_id','show_name'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_shows");
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
            $sql = "INSERT INTO t_shows (show_name) VALUES (?)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([$data['showName']]);
            return true;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($show_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_shows WHERE show_id = :show_id LIMIT 1");
            $stmt->execute([':show_id' => $show_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_shows SET show_name=:show_name WHERE show_id=:show_id";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([':show_name'=>$data['showName'],':show_id'=>$data['showId']]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($show_id){
        try{
            $sql = 'DELETE FROM t_shows WHERE show_id = :show_id';
            $stmt = DB::getConnection()->prepare($sql);
            $stmt->execute([':show_id' => $show_id]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}