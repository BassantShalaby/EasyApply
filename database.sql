drop database easy_apply;
create database easy_apply;
use easy_apply

CREATE TABLE countries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now()
);

CREATE TABLE cities (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now()
);

CREATE TABLE organizations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(20) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	link VARCHAR(255),
    country_id BIGINT UNSIGNED,
    city_id BIGINT UNSIGNED,
    industry VARCHAR(100),
    logo VARCHAR(255),
    info TEXT,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE skills (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now()
);

CREATE TABLE categories(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now()
);

-- Create skills_categories table (Many-to-Many relationship)
CREATE TABLE skills_categories (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    skill_id BIGINT UNSIGNED,
    category_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE applicants (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birthdate DATE,
    email VARCHAR(100) NOT NULL,
    country_id BIGINT UNSIGNED,
    city_id BIGINT UNSIGNED,
    password VARCHAR(20) NOT NULL,
    bio TEXT,
    cv VARCHAR(255),
    picture VARCHAR(255),
    phone VARCHAR(20),
    title VARCHAR(50),
    experience ENUM('entry-level', 'junior', 'mid-level' , 'senior', 'lead'),
    exp_years INT ,
    gender ENUM('male', 'female'),
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE jobs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    org_id BIGINT UNSIGNED,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    open_vacancies SMALLINT,
    hired SMALLINT,
    applied SMALLINT,
    job_status ENUM('Closed', 'Open'),
    level ENUM('Entry Level', 'Junior', 'Mid Level' , 'Senior', 'Lead'),
    exp_years TINYINT,
    country_id BIGINT UNSIGNED,
    city_id BIGINT UNSIGNED,
    location_type ENUM('Remote', 'Hybrid' , 'Onsite'),
    salary_max DECIMAL(10, 2),
    salary_min DECIMAL(10, 2),
    gender ENUM('Male', 'Female', 'Any'),
    emp_type ENUM('Part Time', 'Full Time'),
    category_id BIGINT UNSIGNED,
    requirements TEXT,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    expiry_date TIMESTAMP AS (DATE_ADD(created_at,INTERVAL 5 MONTH)),
    FOREIGN KEY (org_id) REFERENCES organizations(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Create Applicant_Skills table (Many-to-Many relationship)
CREATE TABLE applicant_skills (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    applicant_id BIGINT UNSIGNED,
    skill_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (applicant_id) REFERENCES applicants(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE job_skills (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_id BIGINT UNSIGNED,
    skill_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Create applyies table (Many-to-Many relationship)
CREATE TABLE applies (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    applicant_id BIGINT UNSIGNED,
    job_id BIGINT UNSIGNED,
    status ENUM('pending', 'approved', 'rejected'),
    reason TEXT,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (applicant_id) REFERENCES applicants(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create locations table (One-to-One relationship)
CREATE TABLE locations (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    city_id BIGINT UNSIGNED,
    country_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ========================================================================================================================
-- Insert fake data into countries table
INSERT INTO countries (name) VALUES
('USA'),
('UK'),
('Canada'),
('Australia');

-- Insert fake data into cities table
INSERT INTO cities (name) VALUES
('New York'),
('usac1'),
('usac2'),
('London'),
('Toronto'),
('Sydney');

-- Insert fake data into organizations table
INSERT INTO organizations (name, email, password, phone, country_id, city_id, industry, logo, info) VALUES
('Tech Solutions Inc.', 'info@techsolutions.com', 'password1', '+123456789', 1, 1, 'Technology', 'logo1.png', 'Leading technology solutions provider'),
('Global Enterprises', 'contact@globent.com', 'password2', '+987654321', 2, 2, 'Consulting', 'logo2.png', 'International consulting firm'),
('ABC Corporation', 'info@abccorp.com', 'password3', '+1122334455', 3, 3, 'Finance', 'logo3.png', 'Financial services company');

-- Insert fake data into skills table
INSERT INTO skills (name) VALUES
('Programming'),
('Database Management'),
('Project Management'),
('Communication'),
('Problem Solving');

-- Insert fake data into categories table
INSERT INTO categories (name) VALUES
('IT'),
('Finance'),
('Consulting'),
('Healthcare');

-- Insert fake data into skills_categories table
INSERT INTO skills_categories (skill_id, category_id) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 3);

-- Insert fake data into applicants table
INSERT INTO applicants (first_name, last_name, birthdate, email, country_id, city_id, password, bio, cv, picture, phone, title, experience, exp_years, gender) VALUES
('John', 'Doe', '1990-05-15', 'john.doe@example.com', 1, 1, 'password', 'Experienced software engineer', 'cv.pdf', 'john.jpg', '+123456789', 'Software Engineer', 'senior', 5, 'male'),
('Jane', 'Smith', '1995-08-20', 'jane.smith@example.com', 2, 2, 'password', 'Recent graduate seeking entry-level position', 'resume.doc', 'jane.jpg', '+987654321', 'Graduate', 'entry-level', 0, 'female');

-- Insert fake data into jobs table
INSERT INTO jobs (title, description, open_vacancies, hired, applied, job_status, level, exp_years, country_id, city_id, location_type, salary_max, salary_min, gender, emp_type, category_id) VALUES
('Software Engineer', 'Develop and maintain software applications', 3, 1, 10, 'Open', 'Mid Level', 3, 1, 1, 'Remote', 80000.00, 60000.00, 'Any', 'Full Time', 1),
('Financial Analyst', 'Analyze financial data and prepare reports', 2, 0, 5, 'Open', 'Junior', 1, 3, 3, 'Onsite', 70000.00, 50000.00, 'Any', 'Full Time', 2);


-- Insert fake data into applicant_skills table
INSERT INTO applicant_skills (applicant_id, skill_id) VALUES
(1, 1),
(1, 2),
(2, 4);

-- Insert fake data into applyies table
INSERT INTO applies (applicant_id, job_id, status) VALUES
(1, 1, 'pending'),
(2, 2, 'approved');

-- Insert fake data into locations table
INSERT INTO locations (city_id, country_id) VALUES
(1, 1),
(2, 1),
(3, 1),
(2, 2);


