<?php

namespace App\Entity;

Use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * @Var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     * 
     */
    private $firstname;

    /**
     * @Var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     * 
     */
    private $lastname;
    /**
     * @Var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern="/[0,9]{10}/"
     * 
     * )
     * 
     */
    private $phone;
    /**
     * @Var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     * 
     */
    private $email;
    /**
     * @Var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=10, max=100)
     * 
     */
    private $message;
       /**
     * @Var datetime|null
     *
     * @Assert\NotBlank()
     * 
     * 
     */
    private $date;
    
    /**
     * 
     *
     * @var Products|null
     */
    private $products;
    
    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     */
    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set the value of products
     */
    public function setProducts($products): self
    {
        $this->products = $products;

        return $this;
    }

}
