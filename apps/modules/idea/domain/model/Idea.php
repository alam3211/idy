<?php

namespace Idy\Idea\Domain\Model;

class Idea
{
    private $id;
    private $title;
    private $description;
    private $author;
    private $ratings;
    private $votes;
    
    public function __construct(IdeaId $id, $title, $description, $author, $email, $votes = 0)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->email = $email;
        $this->ratings = array();
        $this->votes = $votes;
    }

    public function id() 
    {
        return $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function votes()
    {
        return $this->votes;
    }

    public function author()
    {
        return $this->author;
    }

    public function email()
    {
        return $this->email;
    }
    public function addRating($user, $ratingValue)
    {
        $newRating = new Rating($user, $ratingValue);

        if ($newRating->isValid()) {
            $exist = false;
            foreach ($this->ratings as $existingRating) {
                if ($existingRating->equals($newRating)) {
                    $exist = true;
                }
            }

            if (!$exist) {
                array_push($this->ratings, $newRating);
            } else {
                throw new Exception('Author ' . $newRating->author() . ' has given a rating.');
            }

            DomainEventPublisher::instance()->publish(
                new IdeaRated($this->author->name(), $this->author->email(), 
                    $this->title, $ratingValue)
            );

        }
    }

    public function vote()
    {   
        $this->votes = $this->votes + 1;
    }

    public function averageRating()
    {
        $numberOfRatings = count($this->rating);
        $totalRatings = 0;

        foreach ($this->ratings as $rating) {
            $totalRatings += $rating->value();
        }

        return $totalRatings / $numberOfRatings;
    }

    public static function makeIdea($title, $description, $author, $email)
    {
        $newIdea = new Idea(new IdeaId(), $title, $description, $author, $email);
        
        return $newIdea;
    }

}