<?php
session_start();

// Retrieve settings from the form submission
$operation = $_POST['operation']; // The selected operation ( add, subtract, multiply,and divide.)
$level = $_POST['level'];         // Difficulty level (1 for easy, 2 for hard)
$questions = $_POST['questions']; // Number of quiz questions ( 10, 20, 30)


$_SESSION['operation'] = $operation;
$_SESSION['level'] = $level;
$_SESSION['questions'] = $questions;

