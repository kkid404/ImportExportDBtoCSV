<?php

namespace TestTask\Models;

class Formatter
{
    public function formatData(ConnectSql $sql, array $list)
    {
        $conn = $sql->Getdb();
        $id = mysqli_real_escape_string($conn, $list[0]);
        $name = mysqli_real_escape_string($conn, $list[1]);
        $name_trans = mysqli_real_escape_string($conn, $list[2]);
        $price = mysqli_real_escape_string($conn, $list[3]);
        $small_text = mysqli_real_escape_string($conn, $list[4]);
        $big_text = mysqli_real_escape_string($conn, $list[5]);
        $user_id_base = mysqli_real_escape_string($conn, $list[6]);

        if(empty($small_text)){
            $small_text = mysqli_real_escape_string($conn, $this->formatSmallText($big_text));
        }

        return ["id" => $id, "name" => $name, "name_trans" => $name_trans,
                "price" => $price, "small_text" => $small_text, "big_text" => $big_text, "user_id" => $user_id_base];
    }

    public function formatSmallText($big_text){
        $len = 30;
        $small_text = mb_substr($big_text, 0, $len);
        return $small_text;
    }
}