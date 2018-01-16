<?php

namespace App\back\AboutMe;

use App\PConnections;
use PDO;
use PDOException;

class AboutMe extends PConnections
{
    private $_mobileNumber;
    private $_myStory;
    private $_portfolioImage;
    private $_portfolioName;
    private $_graduateIn;
    private $_address;
    
    private $_email;
    private $_website;
    private $_facebook;
    private $_linkedin;
    private $_github;

    public function set($data = array()) {
    
        if ( array_key_exists ( "mobileNumber", $data ) ) {
            $this->_mobileNumber = $data['mobileNumber'];
        }
        
        if ( array_key_exists ( "myStory", $data ) ) {
            $this->_myStory = $data['myStory'];
        }
        
        if ( array_key_exists ( "portfolioImage", $data ) ) {
            $this->_portfolioImage = $data['portfolioImage'];
        }

        if ( array_key_exists ( "portfolioName", $data ) ) {
            $this->_portfolioName = $data['portfolioName'];
        }

        if ( array_key_exists ( "graduateIn", $data ) ) {
            $this->_graduateIn = $data['graduateIn'];
        }

        if ( array_key_exists ( "address", $data ) ) {
            $this->_address = $data['address'];
        }
    
        if ( array_key_exists ( "mobile", $data ) ) {
            $this->_mobile = $data['mobile'];
        }
    
        if ( array_key_exists ( "email", $data ) ) {
            $this->_email = $data['email'];
        }
    
        if ( array_key_exists ( "website", $data ) ) {
            $this->_website = $data['website'];
        }
    
        if ( array_key_exists ( "facebook", $data ) ) {
            $this->_facebook = $data['facebook'];
        }
    
        if ( array_key_exists ( "linkedin", $data ) ) {
            $this->_linkedin = $data['linkedin'];
        }
    
        if ( array_key_exists ( "github", $data ) ) {
            $this->_github = $data['github'];
        }

        return $this;
    }

    public function store() {

        try {
            $_stmt = $this->_connection->prepare("INSERT INTO `aboutme`(`mobileNumber`, `myStory`, `portfolioImage`, `portfolioName`, `graduateIn`, `address`, `email`, `website`, `facebook`, `linkedin`, `github`) VALUES (:mobileNumber,:myStory,:portfolioImage,:portfolioName,:graduateIn,:address,:email,:website,:facebook,:linkedin,:github);");

            $_result = $_stmt->execute(array(
                ':mobileNumber' =>$this->_mobileNumber,
                ':myStory' => $this->_myStory,
                ':portfolioImage' => $this->_portfolioImage,
                ':portfolioName' => $this->_portfolioName,
                ':graduateIn' => $this->_graduateIn,
                ':address' => $this->_address,
                ':email' => $this->_email,
                ':website' => $this->_website,
                ':facebook' => $this->_facebook,
                ':linkedin' => $this->_linkedin,
                ':github' => $this->_github,
            ));

            if ($_result) {
                $_SESSION['create'] = "Data Successfully Created!";

                header('Location:../index.php');

            }
        }
        catch (PDOException $e) {
            echo "there is some problem in Connection.php" . $e->getMessage();
        }

    }
    
    public function index() {
        try {
            $_stmt = $this->_connection->prepare("SELECT * FROM `aboutme` WHERE `mobileNumber` = 'zxc';");
            $_stmt->execute();
            $_result = $_stmt->fetchAll(PDO::FETCH_ASSOC);
            return$_result;
        }
        catch (PDOException $e) {
            
            echo "there is some problem in Connection.php" . $e->getMessage();
        }
        
    }

}