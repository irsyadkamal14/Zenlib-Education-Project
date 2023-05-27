<?php
    include('settings/scurity.php');  
    if(isset($_POST['addbtn']))
    {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $datebook = $_POST['datebook'];
        $discription = $_POST['discription'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $viewer = $_POST['viewer'];
        $author = $_POST['author'];
        
        $convert = explode(".", $thumbnail);
        $extension = "brg-".round(microtime(true)).".".end($convert);
        $sumber = $_FILES['thumbnail']['tmp_name'];

        if (empty($title) || empty($subtitle) || empty($datebook) || empty($discription) || empty($viewer) || empty($author) || file_exists("assets/db/" . $extension)){
            $_SESSION['status'] =  "Mohon Lengkapi";
            header('Location: addbook.php');
        }else{  
            echo $thumbnail;
            if(move_uploaded_file($sumber, "assets/db/".$extension)){
                $query = "INSERT INTO book (title,subtitle,datebook,discription,thumbnail,viewer) VALUES ('$title','$subtitle','$datebook','$discription','$extension',
                '$viewer','$author')";
                $query_run = mysqli_query($connection, $query); 
                if($query_run){
                    $_SESSION['success'] = "Data Berhasil Di Tambahkan";
                    header('Location: addbook.php');
                }
                else{
                    $_SESSION['status'] = "Data Gagal di Tambahkan";
                    header('Location: addbook.php');
                }
            }else{
                $_SESSION['status'] = "Thumbnail Gagal di Tambahkan";
                header('Location: addbook.php');
            } 
        }
    }

    if(isset($_POST['edit_book']))
    {
        $id = $_POST['edit_id'];
        $title = $_POST['edit_title'];
        $subtitle = $_POST['edit_subtitle'];
        $datebook = $_POST['edit_datebook'];
        $discription = $_POST['edit_discription'];
        $thumbnail = $_FILES['edit_thumbnail']['name'];
        $old_thumbnail = $_POST['old_thumbnail'];
        $viewer = $_POST['edit_viewer'];
        $author = $_POST['edit_author'];
         
        $convert = explode(".", $thumbnail);
        $extension = "brg-".round(microtime(true)).".".end($convert);
        $sumber = $_FILES['edit_thumbnail']['tmp_name'];

        if(empty($thumbnail)){
            $query = "UPDATE book SET title='$title', subtitle='$subtitle', datebook='$datebook', discription='$discription', viewer='$viewer', author='$author' WHERE id='$id' ";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $_SESSION['success'] = "Data Berhasil di Perbarui";
                $_SESSION['status_code'] = "success";
                header('Location: addbook.php'); 
            }
            else
            {
                $_SESSION['status'] = "Data Gagal di Perbarui";
                $_SESSION['status_code'] = "error";
                header('Location: addbook.php'); 
            }
        }else{
            unlink("assets/db/$old_thumbnail");
            if(move_uploaded_file($sumber, "assets/db/".$extension)){
                $query = "UPDATE book SET title='$title', subtitle='$subtitle', datebook='$datebook', discription='$discription', viewer='$viewer', author='$author', thumbnail='$extension'  WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query); 
                if($query_run){
                    $_SESSION['success'] = "Data Berhasil Di Tambahkan";
                    header('Location: addbook.php');
                }
                else{
                    $_SESSION['status'] = "Data Gagal di Tambahkan";
                    header('Location: addbook.php');
                }
            }else{
                $_SESSION['status'] = "Thumbnail Gagal di Tambahkan";
                header('Location: addbook.php');
            } 
        }
    }

    if(isset($_POST['delete_book']))
    {
        $thumbnail_id = $_POST['thumbnail_id'];
        $id = $_POST['delete_id'];
        unlink("assets/db/$thumbnail_id");
        echo "Id $thumbnail_id";
        $query = "DELETE FROM book WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Data Berhasil di Hapus";
            $_SESSION['status_code'] = "success";
            header('Location: addbook.php'); 
        }
        else
        {
            $_SESSION['status'] = "Data Gagal di Hapus";       
            $_SESSION['status_code'] = "error";
            header('Location: addbook.php'); 
        }    
    }

    if(isset($_POST['delete_user']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM users WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Pengguna Berhasil di Hapus";
            $_SESSION['status_code'] = "success";
            header('Location: user.php'); 
        }
        else
        {
            $_SESSION['status'] = "Penguna Gagal di Hapus";       
            $_SESSION['status_code'] = "error";
            header('Location: user.php'); 
        }    
    }

    if(isset($_POST['btn_submit']))
    {
        $email_login = $_POST['email']; 
        $password_login = $_POST['password']; 
        

        if($email_login == "admin@gmail.com" && $password_login == "admin123"){
            $_SESSION['username'] = "Admin";
            // $_SESSION['status'] = "Login Berhasil";
            $_SESSION['status_code'] = "success";
            header('Location: dashboard.php', true, 301);
        }else{
            $password_login = md5($password_login); 
            $query = "SELECT * FROM users WHERE email='$email_login' AND password='$password_login' LIMIT 1";
            $query_run = mysqli_query($connection, $query);
            if(mysqli_fetch_array($query_run))
            {
                    $_SESSION['username'] = $email_login;
                    // $_SESSION['status'] = "Login Berhasil";
                    $_SESSION['status_code'] = "success";
                    header('Location: index.php');   
            } 
            else
            {
                    // $_SESSION['status'] = "Email / Password is Invalid";
                    $_SESSION['status_code'] = "error";
                    header('Location: index.php');
            }
        }
    }

    if(isset($_POST['logout_btn']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header('Location: index.php', true, 301);
        exit();
    }
    
    if(isset($_POST["btn_register"]))  
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $password = md5($password);
        $confirm = md5($confirm);  

        $email_query = "SELECT * FROM users WHERE email='$email' ";
        $email_query_run = mysqli_query($connection, $email_query);
        if(mysqli_num_rows($email_query_run) > 0)
        {
            // $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
            // $_SESSION['status_code'] = "error";
            header('Location: index.php');  
            // echo "Email Sama";
        }
        else
        {
            if($password === $confirm)
            {
                $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
                $query_run = mysqli_query($connection, $query);
                
                if($query_run)
                {
                    // echo "Saved";
                    // $_SESSION['status'] = "Admin Profile Added";
                    // $_SESSION['status_code'] = "success";
                    header('Location: index.php');
                }
                else 
                {
                    echo "Failed Saved";
                    // $_SESSION['status'] = "Admin Profile Not Added";
                    // $_SESSION['status_code'] = "error";
                    header('Location: index.php');  
                }
            }
            else 
            {
                echo "PW Tidak Sesuai";
                // $_SESSION['status'] = "Password and Confirm Password Does Not Match";
                // $_SESSION['status_code'] = "warning";
                header('Location: index.php');  
            }
        }

    }
?>
