<?php

class Worker
{
   private $nik;
   private $name;
   private $worker_id;
   private $password;
   private $join_at;
   private $timestamp;
   private $address;
   private $country;
   private $gender;
   private $city;
   private $image;
   private $about;

   private $role;

   public function getNik()
   {
      return $this->nik;
   }

   public function setNik($nik)
   {
      $this->nik = $nik;
   }

   public function getName()
   {
      return $this->name;
   }

   public function setName($name)
   {
      $this->name = $name;
   }

   public function getWorkerId()
   {
      return $this->worker_id;
   }

   public function setWorkerId($workerId)
   {
      $this->worker_id = $workerId;
   }

   public function getPassword()
   {
      return $this->password;
   }

   public function setPassword($password)
   {
      $this->password = $password;
   }

   public function getJoinAt()
   {
      return $this->join_at;
   }

   public function setJoinAt($join_at)
   {
      $this->join_at = $join_at;
   }

   public function getRole()
   {
      if (!isset($this->role)) {
         $this->role = new Role();
      }

      return $this->role;
   }

   public function setRole($role)
   {
      $this->role = $role;
   }

   public function getTimestamp()
   {
      return $this->timestamp;
   }

   public function setTimestamp($timestamp)
   {
      $this->timestamp = $timestamp;
   }

   public function getAddress()
   {
      return $this->address;
   }

   public function setAddress($address)
   {
      $this->address = $address;
   }

   public function getCountry()
   {
      return $this->country;
   }

   public function setCountry($country)
   {
      $this->country = $country;
   }

   public function getGender()
   {
      return $this->gender;
   }

   public function setGender($gender)
   {
      $this->gender = $gender;
   }

   public function getCity()
   {
      return $this->city;
   }

   public function setCity($city)
   {
      $this->city = $city;
   }

   public function getImage()
   {
      return $this->image;
   }

   public function setImage($image)
   {
      $this->image = $image;
   }

   public function getAbout()
   {
      return $this->about;
   }

   public function setAbout($about)
   {
      $this->about = $about;
   }

   public function __set($name, $value)
   {
      if (!isset($this->role)) {
         $this->role = new Role();
      }

      switch ($name) {
         case 'worker_role':
            $this->role->setWorkerRole($value);
            break;
      }
   }
}
