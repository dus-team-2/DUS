<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-09
 * Time: 14:51
 */

    //1-1 get, only get 1 record by the certain condition
    function get_by_from($get,$by,$table,$content){
        $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
        $statement = $pdo->query("SELECT ".$get." FROM ".$table." WHERE ".$by."='".$content."';");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_all($table){
        $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
        $statement = $pdo->query("SELECT COUNT(*) FROM ".$table);
        $numberback = $statement->fetch(PDO::FETCH_ASSOC);
        $num = $numberback['COUNT(*)'];
        $statement = $pdo->query("SELECT * FROM ".$table);
        $result_array = array();
        for($i=0;$i<$num;$i++)
        {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            array_push($result_array,$result);
        }

        return $result_array;
    }

    //get multiple records by the certain condition
    function get_some_by_filter($table,$filter,$filter_value){
        $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
        $statement = $pdo->query("SELECT COUNT(*) FROM ".$table." WHERE " .$filter. "=".$filter_value);
        $numberback = $statement->fetch(PDO::FETCH_ASSOC);
        $num = $numberback['COUNT(*)'];
        $statement = $pdo->query("SELECT * FROM ".$table." WHERE " .$filter. "=".$filter_value);
        $result_array = array();
        for($i=0;$i<$num;$i++)
        {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            array_push($result_array,$result);
        }

        return $result_array;
    }

    function get_some_by_filter_with_order($table,$filter,$filter_value,$order,$order_value){
        $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
        $statement = $pdo->query("SELECT COUNT(*) FROM ".$table." WHERE " .$filter. "=".$filter_value);
        $numberback = $statement->fetch(PDO::FETCH_ASSOC);
        $num = $numberback['COUNT(*)'];
        $statement = $pdo->query("SELECT * FROM ".$table." WHERE " .$filter. "=".$filter_value." ORDER BY ". $order ." ". $order_value);
        $result_array = array();
        for($i=0;$i<$num;$i++)
        {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            array_push($result_array,$result);
        }

        return $result_array;
    }

    function remove_by_id($table,$id)
    {
        $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS', 'dqrs89', 'dqrs89ru34nner');
        $statement = $pdo->query("DELETE FROM " . $table . " WHERE id='" . $id . "'");
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement = $pdo->query("SELECT FROM " . $table . " WHERE id='" . $id . "'");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return false;
        } else {
            return true;
        }
    }

    function search_by_from($table, $by_item1, $by_item2,  $content){
        $whole_table = get_all($table);
        $result = array();
        for ($i=0; $i<count($whole_table); $i++){
            if(strpos($whole_table[$i][$by_item1], $content)!== false || strpos($whole_table[$i][$by_item2], $content)!== false){
                array_push($result, $whole_table[$i]);
            }
        }
        return $result;
    }

    function search_by_from_with_filter($table, $by_item1, $by_item2,  $content, $filter_by, $filter_content){
        $whole_table = get_some_by_filter($table, $filter_by, $filter_content);
        $result = array();
        for ($i=0; $i<count($whole_table); $i++){
            if(strpos($whole_table[$i][$by_item1], $content)!== false || strpos($whole_table[$i][$by_item2], $content)!== false){
                array_push($result, $whole_table[$i]);
            }
        }
        return $result;
    }

    function delete_from_by($table, $by, $value){
        $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS', 'dqrs89', 'dqrs89ru34nner');
        $statement = $pdo->query("DELETE FROM " . $table . " WHERE ". $by ."='" . $value . "'");
        $statement->fetch(PDO::FETCH_ASSOC);
        $statement = $pdo->query("SELECT * FROM " . $table . " WHERE ". $by ."='" . $value . "'");
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return false;
        } else {
            return true;
        }
    }
