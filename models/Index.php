<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26.01.2017
 * Time: 19:14
 */

namespace models;

class Index extends \Database
{


    public function getAllBooks()
    {

        $query = $this->query("SELECT bk.name as book_name, au.name as author_name, au.last_name , gs.genre , 
                                              bk.count_pages, bk.publishing_year, ps.name as publication_name,bk.date_of_receipt  
from books bk  
LEFT OUTER JOIN authors au on bk.author_id = au.author_id 
LEFT OUTER JOIN genres gs on bk.genres_id = gs.genres_id 
LEFT OUTER JOIN publishers ps on bk.publisher_id = ps.publisher_id");
        $result = $this->assoc($query);

        return $result;
    }

    public function getAllAuthors()
    {
        $query = $this->query("Select au.name , au.last_name , au.year_of_birth, au.year_death, ct.country From authors au 
LEFT OUTER JOIN countries ct on au.citizenship=ct.country_id");
        $result = $this->assoc($query);
        return $result;
    }

    public function getAllPublishers()
    {
        $query = $this->query("SELECT pub.name , cnt.country , cit.city , adr.street, adr.house , adr.zip_code
                               from publishers pub
inner join  addresses  adr on pub.address_id = adr.address_id
inner join  cities cit  on cit.city_id = adr.city_id
inner join countries cnt on cit.country_id= cnt.country_id");
        $result = $this->assoc($query);
        return $result;
    }

    /**
     * @return mysqli
     */

}