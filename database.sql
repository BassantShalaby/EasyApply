DROP DATABASE easy_apply;
CREATE DATABASE easy_apply;
USE easy_apply;

CREATE TABLE countries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now()
); 

CREATE TABLE cities (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    country_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE organizations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    token varchar(255) NOT NULL,
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
    password VARCHAR(255) NOT NULL,
    bio TEXT,
    cv VARCHAR(255),
    picture VARCHAR(255),
    phone VARCHAR(20),
    title VARCHAR(50),
    experience ENUM('entry-level', 'junior', 'mid-level' , 'senior', 'lead'),
    exp_years INT ,
    gender ENUM('male', 'female'),
    token varchar(255) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE applicants_skills (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    applicant_id BIGINT UNSIGNED,
    skill_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (applicant_id) REFERENCES applicants(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE
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
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE jobs_skills (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_id BIGINT UNSIGNED,
    skill_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE applies (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    applicant_id BIGINT UNSIGNED,
    job_id BIGINT UNSIGNED,
    status ENUM('applied','pending', 'approved', 'rejected'),
    reason TEXT,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (applicant_id) REFERENCES applicants(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =================================================================== INSERTION ==========================================================================

INSERT INTO countries (name) VALUES
('United States'),
('Canada'),
('United Kingdom'),
('Germany'),
('France'),
('Italy'),
('Egypt');

INSERT INTO cities (name, country_id) VALUES
('New York', 1),
('Los Angeles', 1),
('Toronto', 2),
('Vancouver', 2),
('London', 3),
('Manchester', 3),
('Berlin', 4),
('Munich', 4),
('Paris', 5),
('Marseille', 5),
('Rome', 6),
('Milan', 6),
('Cairo', 7),
('Alexandria', 7),
('Luxor', 7),
('Aswan', 7),
('Giza', 7),
('Sharm El Sheikh', 7),
('Hurghada', 7),
('Dahab', 7),
('Asyut', 7),
('Fayoum', 7),
('Cairo', 7),
('Alexandria', 7),
('Giza', 7),
('Port Said', 7),
('Suez', 7),
('Luxor', 7),
('Asyut', 7),
('Mansoura', 7),
('Al-Minya', 7),
('Hurghada', 7),
('Qena', 7),
('Sohag', 7),
('Beni Suef', 7),
('Aswan', 7),
('Faiyum', 7),
('Damietta', 7),
('Ismailia', 7),
('Al-Mahalla Al-Kubra', 7),
('Kafr El Sheikh', 7),
('Matruh', 7),
('Port said', 7),
('Sohag', 7);

INSERT INTO organizations (name, email, password,token, phone, link, country_id, city_id, industry, logo, info) VALUES
('Tech Solutions Inc.', 'info@techsolutions.com', 'password1', '123','+123456789', NULL, 1, 1, 'Technology', 'logo1.png', 'Leading technology solutions provider'),
('Global Enterprises', 'contact@globent.com', 'password2', '123', '+987654321', NULL, 2, 2, 'Consulting', 'logo2.png', 'International consulting firm'),
('ABC Corporation', 'info@abccorp.com', 'password3', '123', '+1122334455', NULL, 3, 3, 'Finance', 'logo3.png', 'Financial services company');

INSERT INTO skills (name) VALUES
('Programming'),
('Database Management'),
('Project Management'),
('Communication'),
('Problem Solving');

INSERT INTO categories (name) VALUES
('IT'),
('Finance'),
('Consulting'),
('Healthcare'),
('Technology'),
('Manufacturing'),
('Retail'),
('Hospitality'),
('Automotive'),
('Construction'),
('Education'),
('Entertainment'),
('Food & Beverage'),
('Real Estate'),
('Transportation'),
('Utilities'),
('Telecommunications');

INSERT INTO skills_categories (skill_id, category_id) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 3);

INSERT INTO applicants (first_name, last_name,token, birthdate, email, country_id, city_id, password, bio, cv, picture, phone, title, experience, exp_years, gender) VALUES
('John', 'Doe','', '1990-05-15', 'john.doe@example.com', 1, 1, 'password', 'Experienced software engineer', 'cv.pdf', 'john.jpg', '+123456789', 'Software Engineer', 'senior', 5, 'male'),
('Jane', 'Smith', '','1995-08-20', 'jane.smith@example.com', 2, 2, 'password', 'Recent graduate seeking entry-level position', 'resume.doc', 'jane.jpg', '+987654321', 'Graduate', 'entry-level', 0, 'female');

INSERT INTO applicants_skills (applicant_id, skill_id) VALUES
(1, 1),
(1, 2),
(2, 4);


INSERT INTO jobs (org_id, title, description, open_vacancies, hired, applied, job_status, level, exp_years, city_id, location_type, salary_max, salary_min, gender, emp_type, category_id, requirements)
VALUES
(1, 'Software Engineer', 'Develop and maintain software applications.', 5, 2, 10, 'Open', 'Mid Level', 3, 1, 'Remote', 80000.00, 60000.00, 'Any', 'Full Time', 1, 'Bachelor''s degree in Computer Science or related field.'),
(2, 'Data Analyst', 'Analyze and interpret data to provide insights.', 3, 1, 5, 'Open', 'Junior', 2, 2, 'Hybrid', 70000.00, 50000.00, 'Any', 'Full Time', 2, 'Experience with SQL and data visualization tools.'),
(3, 'Marketing Specialist', 'Create and implement marketing campaigns.', 2, 0, 3, 'Open', 'Entry Level', 1, 3, 'Onsite', 60000.00, 40000.00, 'Any', 'Full Time', 3, 'Strong communication and creativity skills.');

INSERT INTO jobs_skills (job_id, skill_id)
VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 4),
(3, 5);

INSERT INTO applies (applicant_id, job_id, status) VALUES
(1, 1, 'pending'),
(2, 2, 'applied');