<?php




/** 
 *  Database connection
 *  new mysqli();
 *  new PDO();
 * 
 *  $connection->query('CREATE DATABASE/TABLE name'); // create database
 *  $connection->query('DROP DATABASE/TABLE name');  // drop database
 *  
 *  $sql = 'CREATE TABLE users(
    id int(11),
    name varchar(100),
    email varchar(100),
    phone varchar(100),
    roll varchar(20),
    status tinyint(1)
)';
 * 
 * $sql = 'INSERT INTO users(name, phone, email) VALUES ("nahian", "01308663002", "nahi@gmail.com")';
 * $sql = 'DELETE FROM users WHERE id="1"';
 * $sql = 'UPDATE users SET name="Test name", email="test@gmail.com" WHERE id="1"';
 * $sql = 'SELECT * FROM users';
 * $sql = 'SELECT * FROM users WHERE id="1"';
 * 
 * 
 *  fetch(), fetchAll(), fetch_all(), fetch_assoc(), fetch_array()
 * 
 */

// $connection = new mysqli('localhost', 'root', '', 'php');
// $sql = 'UPDATE users SET name="Test name", email="test@gmail.com" WHERE id="2"';
// $connection->query($sql);

// $connection->query('INSERT INTO users(name, phone, email) VALUES ("nahian", "01308663002", "nahi@gmail.com")');

$host = 'localhost';
$userName = 'root';
$password = '';
$table = 'php';

$connection = new mysqli($host, $userName, $password, $table );



