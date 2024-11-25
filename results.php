<?php
session_start();

// Retrieve session data
$quiz = $_SESSION['quiz'];
$operation = $_SESSION['operation'];
$answers = $_POST['answers'];
$totalQuestions = count($quiz);