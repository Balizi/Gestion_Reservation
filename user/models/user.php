<?php

    class User
    {
        public static function CreateUser($data)
        {
            $quey='INSERT INTO user(nom,prenom,telephone,email,password) VALUES(:nom,:prenom,:telephone,:email,:password)';
            $stmt=DB::Connect()->prepare($quey);
            $stmt->bindParam(':nom',$data['nom']);
            $stmt->bindParam(':prenom',$data['prenom']);
            $stmt->bindParam(':telephone',$data['telephone']);
            $stmt->bindParam(':email',$data['email']);
            $stmt->bindParam(':password',$data['password']);
            if($stmt->execute())
            {
                return 'OK';
                // Redirect::to('login');
            }
            else{
                return 'error';
            }
            $stmt->close();
            $stmt=null;
        }


        public static function Login($data)
        {
            $email=$data['email'];
            try{
                $query='SELECT * FROM user WHERE email=:email';
                $stmt=DB::Connect()->prepare($query);
                $stmt->execute(array(":email"=>$email));
                $res=$stmt->fetchAll();
                foreach($res as $re)
                {
                    $id=$re['id'];
                }
                $_SESSION['user'] = $id;
                
                if($stmt->execute())
                {
                    return 'OK';
                }
            }
            catch(PDOException $ex)
            {
                echo 'Error '.$ex->getMessage();
            }
        }

    }
?>