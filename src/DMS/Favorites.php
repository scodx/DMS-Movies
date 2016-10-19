<?php
/**
 * Created by PhpStorm.
 * User: scodx
 * Date: 10/18/16
 * Time: 21:21
 */

namespace DMS;


class Favorites
{

    const DEFAULT_DB    = __DIR__ ."/db.php";
    private $db         = "";
    private $favorites  = array();

    /**
     * @return string
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param string $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function getFavorites()
    {
        $omdb = new omdbapi();
        $favorites = array();
        foreach ($this->getDb()->findAll("movies") as $fav) {
            $favorites[] = $omdb->getById($fav["imdbID"]);
        };
        return $favorites;
    }

    /**
     * @param array $favorites
     */
    public function setFavorites($favorites)
    {
        $this->favorites = $favorites;
    }


    /**
     * Favorites constructor.
     */
    public function __construct(DB $db)
    {
        $this->setDb($db);
        return $this;
    }




}