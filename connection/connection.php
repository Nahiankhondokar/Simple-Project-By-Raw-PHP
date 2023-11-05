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
 *  $sql = 'SELECT * FROM users WHERE name LIKE "%a%"';
 *  $sql = 'SELECT * FROM users WHERE location="dhaka" AND location="feni"';
 *  $sql = 'SELECT * FROM users WHERE location="dhaka" OR location="feni"';
 *  $sql = 'SELECT * FROM users WHERE name IN ("nahian", "prosenjit")';
 *  $sql = 'SELECT * FROM users WHERE age BETWEEN 5 AND 20';
 *  $sql = 'SELECT MIN(age) AS minAge FROM users';
 *  $sql = 'SELECT MAX(age) AS maxAge FROM users';
 *  $sql = 'SELECT AVG(age) AS avgAge FROM users';
 *  $sql = 'SELECT SUM(age) AS sumAge FROM users';
 *  $sql = 'SELECT COUNT(age) AS countAge FROM users';
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



