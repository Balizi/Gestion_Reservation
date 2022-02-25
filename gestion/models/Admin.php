<?php

class Admin
{

    static public function Login($data)
    {
        $username=$data['username'];
        try
        {
            echo "<script>alert($username');</script>";
            $query='SELECT * from admin WHERE username=:username';
            $stmt=DB::Connect()->prepare($query);
            $stmt->execute(array(':username'=>$username));
            $admin=$stmt->fetch(PDO::FETCH_OBJ);
            // die(print_r($admin));
            return $admin;
        }catch(PDOException $ex)
        {
            echo 'erreur' . $ex->getMessage();
        }
    }


    public static function CreateAdmin($data)
    {
        $quey='INSERT INTO admin(fullname,username,password) VALUES(:fullname,:username,:password)';
        $stmt=DB::Connect()->prepare($quey);
        $stmt->bindParam(':fullname',$data['fullname']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':password',$data['password']);
        if($stmt->execute())
        {
            return 'OK';
        }
        else{
            return 'error';
        }
        $stmt->close();
        $stmt=null;
    }
}

?>