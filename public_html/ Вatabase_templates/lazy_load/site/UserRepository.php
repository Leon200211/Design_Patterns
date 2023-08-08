<?php

class UserRepository
{
    /** @var mixed Reference to a database or ORM database manager object. */
    private $database;

    // ... Example is simplified for readability.

    /**
     * Get user and set the reference to call when requiring posts from the
     * database by the given ID.
     *
     * @param int $id
     *
     * @return User
     */
    public function findOneById($id)
    {
        $database = $this->database;
        $query = $database->query('SELECT * FROM user WHERE id = :id');
        $query->setParameter('id', $id);

        $user = new User($query->getResult());

        $reference = function($user) use($id, $database) {
            $query = $database->query('SELECT * FROM post WHERE user_id = :id');
            $query->setParameter('id', $id);
            $userData = $query->getResult();

            $posts = [];
            foreach ($userData as $data) {
                $posts[] = new Post($data);
            }

            return $posts;
        };

        $user->setReference($reference);

        return $user;
    }
}