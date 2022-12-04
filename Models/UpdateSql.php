<?php

namespace TestTask\Models;


class UpdateSql
{
    public function importCsv($csv, ConnectSql $sql, int $user_id)
    {
        if (($handle = fopen($csv, "r")) !== FALSE) {
            $add = 0;
            $update = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $res = $this->updateSql($sql, $data, $user_id);
                if ($res == 1) {
                    $update++;
                } elseif ($res == 2) {
                    $add++;
                }
            }
            fclose($handle);
            return ["add" => $add, "update" => $update];
        }
    }

    public function updateSql(ConnectSql $sql, array $list, int $user_id)
    {
        if (count($list) == 7) {
            $conn = $sql->getDb();
            $format = new Formatter();
            $resFormat = $format->formatData($sql, $list);
            $cur = "SELECT * FROM products WHERE user_id = $user_id AND id = {$resFormat['id']}";
            $res = $conn->query($cur);
            $res = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if($res && $res !== $resFormat) {
                $cur = "UPDATE products 
                        SET name = '{$resFormat['name']}', name_trans = '{$resFormat['name_trans']}', 
                        price = '{$resFormat['price']}', small_text = '{$resFormat['small_text']}', 
                        big_text = '{$resFormat['big_text']}', user_id = '{$resFormat['user_id']}'
                        WHERE id = '{$resFormat['id']}'";
                if($conn->query($cur)){
                    $conn->close();
                    return 1;
                } 
            } else {
                $cur = "INSERT INTO products (id, name, name_trans, 
                        price, small_text, big_text, user_id)
                        VALUES ({$resFormat['id']}, '{$resFormat['name']}', '{$resFormat['name_trans']}', 
                        {$resFormat['price']}, '{$resFormat['small_text']}', '{$resFormat['big_text']}', 
                        {$resFormat['user_id']})";
                if($conn->query($cur)){
                    $conn->close();
                    return 2;
                } 
                
            }
            $conn->close();
        } else {
            throw new \Exception("there are fewer or more arguments than necessary");
        }
    }

    public function exportCsv(ConnectSql $sql)
    {

        $file = fopen('export_'.time().'.csv', 'w+');
        $conn = $sql->getDb();
        $cur = "SELECT * FROM products";
        $res = mysqli_query($conn, $cur);
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            fputcsv($file, $row);
        }
        fclose($file);
    }
}