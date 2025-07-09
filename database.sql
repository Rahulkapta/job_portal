-- Create database
CREATE DATABASE IF NOT EXISTS job_portal;
USE job_portal;

-- Users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin', 'recruiter', 'seeker') NOT NULL
);

-- Jobs table
CREATE TABLE jobs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  company_name VARCHAR(100),
  location VARCHAR(100),
  salary VARCHAR(100),
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Applications table
CREATE TABLE applications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  job_id INT,
  seeker_id INT,
  cover_letter TEXT,
  resume_link VARCHAR(255),
  phone VARCHAR(20),
  linkedin VARCHAR(255),
  applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE,
  FOREIGN KEY (seeker_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Sample users
INSERT INTO users (name, email, password, role) VALUES
('Admin', 'admin@example.com', MD5('admin123'), 'admin'),
('Recruiter One', 'recruiter@example.com', MD5('recruit123'), 'recruiter'),
('Seeker One', 'seeker@example.com', MD5('seek123'), 'seeker');

-- Sample job
INSERT INTO jobs (title, description, company_name, location, salary, user_id) VALUES
('PHP Developer', 'Looking for a PHP developer with MySQL experience.', 'TechCorp', 'Delhi', '6-8 LPA', 2),
('Frontend Developer', 'ReactJS experience preferred.', 'DesignPro', 'Remote', '5-7 LPA', 2);
