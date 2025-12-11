<?php
require "models/db.php";
//CLIENT FUNCTIONS -------------------------------------
 function get_events() {
    $pdo = get_pdo();
    $sql = 'SELECT * FROM `events` WHERE event_date >= CURRENT_DATE();';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
 }
 function get_event_by_id($id) {
   $pdo = get_pdo();
   $sql = 'SELECT * FROM events WHERE id = :id';
   $stmt = $pdo->prepare($sql);
   $stmt->execute([':id'=>$id]);
   return $stmt->fetch();
 }
 function register($event_id, $email, $name) {
    $pdo = get_pdo();
    $sql = 'INSERT INTO registrations (event_id, email, name) VALUES (:id, :email, :name);';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$event_id, ':email'=>$email,':name'=>$name]);
 }
 //ADMIN FUNCTIONS -------------------------------------
  function list_registered_by_event($event_id) {
    $pdo = get_pdo();
    $sql = 'SELECT r.*, e.title FROM registrations AS r JOIN events AS e on r.event_id =e.id WHERE r.event_id = :id; ';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$event_id]);
    return $stmt->fetchAll(Pdo::FETCH_ASSOC); //fetches into Associative array (is the default so not technically necessary, but eases my worries lol)

    //Turn into A Group By clause
 }
 function find_admin(string $username) {
    $pdo = get_pdo();
    $sql = "SELECT * FROM `admins` WHERE username = :u";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':u'=>$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
 }
 function add_event($title, $description, $location, $event_date) {
    $pdo = get_pdo();
    $sql = "INSERT INTO events (title, description, location, event_date) VALUES (:title, :description, :location, :eventdate)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title'=>$title, ':description'=>$description, ':location'=>$location, ':eventdate'=>$event_date]);
 }
 function edit_event(int $id, string $title, string $description, string $location, $event_date) {
    $pdo = get_pdo();
    $sql = "UPDATE events
                SET title = :title,
                description = :description,
                location = :location,
                event_date = :eventdate
                WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
         ':id' => $id,
        ':title' => $title,
        ':description' => $description,
        ':location' => $location,
        ':eventdate' => $event_date
        
    ]);
    return $stmt->rowCount(); //returns rowCount so we can say "X rows changed in edit, ect ect"
 }
 function delete_event(int $id) {
    $pdo = get_pdo();
    $sql = "DELETE FROM events WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id'=>$id
    ]);
 }
?>