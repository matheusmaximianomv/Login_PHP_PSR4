<?php

namespace App\Models;

class User {
    private $name, $description, $url_image, $email, $github, $dt_birth, $office, $phone, $city, $bio;
    
    public function __construct(string $name, string $description, string $url_image, string $email, string $github, string $dt_birth, string $office, string $phone, string $city, string $bio) {
        $this->name = $name; 
        $this->description = $description;
        $this->url_image = $url_image; 
        $this->email = $email;  
        $this->github = $github;  
        $this->dt_birth = $dt_birth; 
        $this->office = $office;
        $this->phone = $phone; 
        $this->city = $city; 
        $this->bio = $bio;
    }
    
    public function getName()
    {
        return trim($this->name);
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of bio
     */ 
    public function getBio()
    {
        return trim($this->bio);
    }

    /**
     * Set the value of bio
     *
     * @return  self
     */ 
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return trim($this->description);
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return trim($this->email);
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of github
     */ 
    public function getGithub()
    {
        return trim($this->github);
    }

    /**
     * Set the value of github
     *
     * @return  self
     */ 
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get the value of dt_birth
     */ 
    public function getDt_birth()
    {
        return trim($this->dt_birth);
    }

    /**
     * Set the value of dt_birth
     *
     * @return  self
     */ 
    public function setDt_birth($dt_birth)
    {
        $this->dt_birth = $dt_birth;

        return $this;
    }

    /**
     * Get the value of office
     */ 
    public function getOffice()
    {
        return trim($this->office);
    }

    /**
     * Set the value of office
     *
     * @return  self
     */ 
    public function setOffice($office)
    {
        $this->office = $office;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return trim($this->phone);
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return trim($this->city);
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of url_image
     */ 
    public function getUrl_image()
    {
        return trim($this->url_image);
    }

    /**
     * Set the value of url_image
     *
     * @return  self
     */ 
    public function setUrl_image($url_image)
    {
        $this->url_image = $url_image;

        return $this;
    }
}