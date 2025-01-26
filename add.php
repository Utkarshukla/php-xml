<?php
        session_start();
        if(isset($_POST['add'])){
                //open xml file
                $users = simplexml_load_file('files/members.xml');
                $user = $users->addChild('user');
                $user->addChild('id', $_POST['id']);
                $user->addChild('firstname', $_POST['firstname']);
                $user->addChild('lastname', $_POST['lastname']);
                $user->addChild('address', $_POST['address']);
                // Save to file
                // file_put_contents('files/members.xml', $users->asXML());
                // Prettify / Format XML and save
                $dom = new DomDocument();
                $dom->preserveWhiteSpace = false;
                $dom->formatOutput = true;
                $dom->loadXML($users->asXML());
                $dom->save('files/members.xml');
                // Prettify / Format XML and save
 
                $_SESSION['message'] = 'Member added successfully';
                header('location: index.php');
        }
        else{
                $_SESSION['message'] = 'Fill up add form first';
                header('location: index.php');
        }
?>