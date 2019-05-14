<?php
/**
 * Created by PhpStorm.
 * User: ZYQ
 * Date: 2019-05-10
 * Time: 14:27
 */

function update_user($id, $username, $gender, $pic, $is_uni_member, $date_of_birth, $tel, $address){
    $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
    $statement = $pdo->query("UPDATE user SET username='".$username."', gender='".$gender."', pic='".$pic."', is_uni_member='".$is_uni_member."', date_of_birth='".$date_of_birth."', tel='".$tel."', address='".$address."' WHERE id='".$id."';");
    $statement->fetch(PDO::FETCH_ASSOC);

}

function update_password($user_id, $new_password){
    $pdo = new PDO('mysql:host=myeusql.dur.ac.uk;dbname=Xdqrs89_SE2_DUS','dqrs89','dqrs89ru34nner');
    $statement = $pdo->query("UPDATE user SET password='".$new_password."' WHERE id='".$user_id."';");
    $statement->fetch(PDO::FETCH_ASSOC);
}