-- Create the ATIWEB database
CREATE DATABASE IF NOT EXISTS ATIWEB;

-- Use the ATIWEB database
USE ATIWEB;

-- Create the Course table
CREATE TABLE IF NOT EXISTS Course (
    CourseID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    TitleInShort VARCHAR(50) NOT NULL,
    Description TEXT NOT NULL
);

-- Insert sample data into the Course table
INSERT INTO Course (Title, TitleInShort, Description) VALUES
('HNDA', 'Higher National Diploma in Accountancy', 'Accountancy program description'),
('HNDIT', 'Higher National Diploma in Information Technology', 'IT program description'),
('HNDE', 'Higher National Diploma in Engineering', 'Engineering program description');

-- Create the Lecturer table
CREATE TABLE IF NOT EXISTS Lecturer (
    LecID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Designation VARCHAR(50) NOT NULL,
    CourseID INT,
    Gender ENUM('Male', 'Female') NOT NULL,
    Password VARCHAR(255) NOT NULL,
    FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
);


INSERT INTO Lecturer (Name, Email, Designation, CourseID, Gender, Password) VALUES
('John Doe', 'john.doe@example.com', 'Senior Lecturer I', 1, 'Male', '#12345678');
