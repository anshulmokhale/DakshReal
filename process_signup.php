<?php
include_once('layout/includes/connection.php');
include_once('layout/includes/function.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $usertype = $_POST["usertype"];

    // Additional fields based on user type
    if ($usertype === "agent") {
        $experience = $_POST["experience"];
        $working_companies = $_POST["working_companies"];
        $desc = $_POST["desc"];
    } elseif ($usertype === "company") {
        $company_name = $_POST["company_name"];
        $phone_no = $_POST["phone_no"];
        $website_url = $_POST["website_url"];
        $company_email = $_POST["company_email"];
        $company_size = $_POST["company_size"];
        $join_profile_notes = $_POST["join_profile_notes"];
    }

    // Perform form validation (you can add more validation as needed)
    $errors = [];
    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($phonenumber)) {
        $errors[] = "Phone Number is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }
    if ($password !== $confirmpassword) {
        $errors[] = "Passwords do not match.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        // No validation errors, proceed with database insertion

        // Convert the password to MD5 hash
        $hashedPassword = md5($password);

        // Prepare and execute the SQL query based on the user type
        if ($usertype === "user") {
            $query = "INSERT INTO users (name, email, phone_number, password, usertype) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysql_connection->prepare($query);
            $stmt->bind_param("sssss", $fullname, $email, $phonenumber, $hashedPassword, $usertype);
        } elseif ($usertype === "agent") {
            $query = "INSERT INTO users (name, email, phone_number, password, usertype, experience, working_companies, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysql_connection->prepare($query);
            $stmt->bind_param("ssssssss", $fullname, $email, $phonenumber, $hashedPassword, $usertype, $experience, $working_companies, $desc);
        } elseif ($usertype === "company") {
            $query = "INSERT INTO users (name, email, phone_number, password, usertype, company_name, phone_no, website_url, company_email, company_size, join_profile_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysql_connection->prepare($query);
            $stmt->bind_param("sssssssssss", $fullname, $email, $phonenumber, $hashedPassword, $usertype, $company_name, $phone_no, $website_url, $company_email, $company_size, $join_profile_notes);
        }

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<p>Registration successful! You can now login.</p>";
        } else {
            echo "<p>Oops! Something went wrong. Please try again later.</p>";
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
    $mysql_connection->close();
}
