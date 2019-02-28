<?php
/**
 * Created by PhpStorm.
 * User: semrahakan
 * Date: 28/02/2019
 * Time: 13:41
 */

namespace App\Business;


class ChineseSign
{
     private $sign;
     private $info;

     public function __construct(string $sign, string $info)
     {
         $this->sign = $sign;
         $this->info = $info;
     }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }

    /**
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo(string $info): void
    {
        $this->info = $info;
    }

    public function getName(){
         return $this->sign;
     }
}