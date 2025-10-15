<?php
// Get ALL USERS
function getAll($conn)
{
    $sql = "SELECT * FROM post
             WHERE publish=1  ORDER BY post_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

//getAllDeep
function getAllDeep($conn)
{
    $sql = "SELECT * FROM post";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}



//getAllPostsByCategory
function getAllPostsByCategory($conn, $category_id)
{
    $sql = "SELECT * FROM post WHERE category=? AND publish=1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$category_id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}

// getById
function getById($conn, $id)
{
    $sql = "SELECT * FROM post 
            WHERE  post_id=? AND publish=1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// getById Deep - Admin
function getByidDeep($conn, $id)
{
    $sql = "SELECT * FROM post 
            WHERE  post_id= ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

// getCategoryById
function getCategoryById($conn, $id)
{
    $sql = "SELECT * FROM category WHERE  id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}

//Search($conn, $key);

function Search($conn, $key)
{
    $key = "%{$key}%";

    $sql = "SELECT * FROM post 
             WHERE publish=1 AND (post_title LIKE ? 
             OR post_text LIKE ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}


//
function get5Categories($conn)
{
    $sql = "SELECT * FROM category LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}




//getAllPostsByCategory



function getUserById($conn, $id)
{
    $sql = "SELECT id,fname,username FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetch();
        return $data;
    } else {
        return 0;
    }
}


function getAllCategories($conn)
{
    $sql = "SELECT * FROM category ORDER BY category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $data = $stmt->fetchAll();
        return $data;
    } else {
        return 0;
    }
}



// Delete By ID

function deleteById($conn, $id)
{
    $sql = "DELETE FROM post WHERE post_id= ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if ($res) {
        return 1;
    } else {
        return 0;
    }
}


// Get Blog by recent time
function getRecentPosts($conn, $limit)
{
    $stmt = $conn->prepare("SELECT post_id, post_title, post_text, cover_url, created_at FROM post ORDER BY created_at DESC LIMIT :limit");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getPopularPosts($conn, $limit = 5) {
    try {
        $sql = "
            SELECT 
                post.post_id, 
                post.post_title, 
                post.cover_url, 
                post.post_text, 
                IFNULL(COUNT(post_like.post_id), 0) AS likes
            FROM post
            LEFT JOIN post_like ON post.post_id = post_like.post_id
            GROUP BY post.post_id
            ORDER BY likes DESC
            LIMIT :limit
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching popular posts: " . $e->getMessage());
    }
}
