<?php

require_once('model/loginManager.php');
require_once('model/dashboardManager.php');
require_once('model/writteManager.php');
require_once('model/postAdminManager.php');
require_once('model/modifPostManager.php');
require_once('model/configManager.php');



/*page login*/
    function login(){
        class login{
            public function submitLogin($email,$pseudo){
                $loginManager = new ced\Blog\projet4\loginManager(); 
                $result = $loginManager->is_Admin($email,$pseudo);
                return $result;
            }
        }    
    require('view/frontend/login.php');
    }
/* page center of dashboard with comment*/
    function dashboard(){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        /*admins*/
        $countAdmins = $dashboardManager->tableCountAdmins();
        /*posts*/
        $countPosts = $dashboardManager->tableCountPosts();
        /*comments*/
        $countComments = $dashboardManager->tableCountComments();
        $countCommentsSeen = $dashboardManager->tableCountCommentsSeen();
        $tableCountCommentsSeenToValid = $dashboardManager->tableCountCommentsSeenToValid();
        $countCommentsSeenSignal = $dashboardManager->tableCountCommentsSeenSignal();
        $nbPages = $dashboardManager -> nbPagesBoardComments();
        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
            $cPage=$_GET['p'];
        }
        else{
            $cPage=1;
        }
        $comments = $dashboardManager -> getComments($cPage);

        require('view/frontend/dashboard.php');
    }
    /*delete comment*/
    function deleteComment($commentId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> deleteComment($commentId);    

        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
        }
        else {
        header('Location:index.php?page=dashboard');
        }
    }
    /*update comment validation*/
    function updateValidComment($commentId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> updateComments($commentId);    
        
        if ($affectedLines === false) {
            throw new Exception('Impossible de update le commentaire !');
        }
        else {
        header('Location:index.php?page=dashboard');
        }
    }
/*page publication of dashboard*/
    function publications(){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        /*admins*/
        $countAdmins = $dashboardManager->tableCountAdmins();
        /*comment*/
        $countComments = $dashboardManager->tableCountComments();
        /*posts*/
        $countPosts = $dashboardManager->tableCountPosts();
        $countPostsPublish = $dashboardManager->tableCountPostsPublish();
        $countPostsNoPublish = $dashboardManager->tableCountPostsNoPublish();
        $nbPages = $dashboardManager -> nbPagesBoardPosts();
        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
            $cPage=$_GET['p'];
        }
        else{
            $cPage=1;
        }
        $posts = $dashboardManager -> getPosts($cPage);

        require('view/frontend/publications.dash.php');
    }
    /*update no publish post */
    function updapteNoPublishPost($postId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> updatePostNoPublish($postId);    

        if ($affectedLines === false) {
            throw new Exception('Impossible de retirer la publication !');
        }
        else {
            header('Location:index.php?page=publications.dash&p=1');
        }
    }
    /*update publish post */
    function updaptePublishPost($postId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> updatePostPublish($postId);    

        if ($affectedLines === false) {
            throw new Exception('Impossible de publier l\' article !');
        }
        else {
            header('Location:index.php?page=publications.dash&p=1');
        }
    }
    /*delete post and comment from the post*/
    function delete_Post($postId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines = $dashboardManager -> deletePost($postId);
        $affectedLines = $dashboardManager -> deleteCommentsWithPost($postId);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer l\' article !');
        }
        else {
            header('Location:index.php?page=publications.dash&p=1');
        }
            
    }
/*page admins of dashboard*/
    function admins(){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();

        /*admins*/
        $countAdmins = $dashboardManager->tableCountAdmins();
        $datas = $dashboardManager->selectAdmins();
        /*comment*/
        $countComments = $dashboardManager->tableCountComments();
        /*posts*/
        $countPosts = $dashboardManager->tableCountPosts();
        

        require('view/frontend/admins.dash.php');
    }
    /* delete admin*/
    function deleteAdmin($adminId){
        $dashboardManager = new ced\Blog\projet4\dashboardManager();
        $affectedLines=$dashboardManager->deleteAdmins($adminId);

        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer l\' article !');
        }
        else {
            header('Location:index.php?page=admins.dash');
        }
    }
/*page  post view of file admin*/
    function adminPost(){
        $postAdmin=new ced\Blog\projet4\postAdminManager();
        $post = $postAdmin->getPosts($_GET['id']);

        if ($post == false) {
            throw new Exception('Ce n\'est pas la bonne page');
        }
        else {
            require('view/frontend/adminpost.php');
        }

        
    }
/*page modif article view*/
    function modifPost(){
        $postAdmin=new ced\Blog\projet4\postAdminManager();
        $post = $postAdmin->getPosts($_GET['id']);

        if ($post == false) {
            throw new Exception('Ce n\'est pas la bonne page');
        }
        else {
            require('view/frontend/modifpost.php');
        }       
    }
    function modif_Post($postId, $title, $content, $posted){
        $modifUpdatePost=new ced\Blog\projet4\modifPostManager();
        $affectedLines = $modifUpdatePost->modifPost($postId, $title, $content, $posted);
        
        header('Location:index.php?page=publications.dash&p=1');
    }
/*page deconnexion*/
    function deconnexion(){
        require('view/frontend/deconnexion.php');
    }
/* page writte a article */
    function writte(){
        require('view/frontend/writte.php');
    }   
    function post_Post($title, $content,$writer, $image, $posted){
        $postManager=new ced\Blog\projet4\writteManager();
        $affectedLines = $postManager->postPost($title, $content,$writer, $image, $posted);
        
        header('Location:index.php?page=publications.dash&p=1');
    }
/* page configuration */
    function config(){
        class config{
            public function verifConfig($pseudo,$email){
                $configManager=new ced\Blog\projet4\configManager();
                $data = $configManager->selectAdmins($pseudo,$email);
                
                return $data;
            }
        }

        function add_Admins($name,$pseudo,$email,$password){
            $configManager=new ced\Blog\projet4\configManager();
            $affectedLines = $configManager->addAdmins($name,$pseudo,$email,$password);
            header('Location:index.php?page=admins.dash');
        }
        require('view/frontend/config.php');
    }