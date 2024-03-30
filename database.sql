CREATE DATABASE easy_apply;
drop database easy_apply;
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
    title VARCHAR(100) NOT NULL,
    description TEXT,
    open_vacancies SMALLINT,
    hired SMALLINT,
    applied SMALLINT,
    job_status ENUM('closed', 'open'),
    experience ENUM('entry-level', 'junior', 'mid-level' , 'senior', 'lead'),
    exp_years TINYINT,
    country_id BIGINT UNSIGNED,
    city_id BIGINT UNSIGNED,
    location_type ENUM('remote', 'hyprid' , 'on_site'),
    salary_max DECIMAL(10, 2),
    salary_min DECIMAL(10, 2),
    gender ENUM('male', 'female', 'any'),
    emp_type ENUM('part_time', 'full_time'),
    category_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    expiry_date TIMESTAMP AS (DATE_ADD(created_at,INTERVAL 5 MONTH)),
    FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES cities(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Job_Requirements table (One-to-Many relationship)
CREATE TABLE job_requirements (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_id BIGINT UNSIGNED,
    requirement TEXT,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT now() on update now(),
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE ON UPDATE CASCADE
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
INSERT INTO jobs (title, description, open_vacancies, hired, applied, job_status, experience, exp_years, country_id, city_id, location_type, salary_max, salary_min, gender, emp_type, category_id) VALUES
('Software Engineer', 'Develop and maintain software applications', 3, 1, 10, 'open', 'mid-level', 3, 1, 1, 'remote', 80000.00, 60000.00, 'any', 'full_time', 1),
('Financial Analyst', 'Analyze financial data and prepare reports', 2, 0, 5, 'open', 'junior', 1, 3, 3, 'on_site', 70000.00, 50000.00, 'any', 'full_time', 2);

-- Insert fake data into job_requirements table
INSERT INTO job_requirements (job_id, requirement) VALUES
(1, 'Proficiency in Java and Python'),
(2, 'Bachelor''s degree in Finance or related field');

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
(2, 2);
-- =========================================================================
-- Insert fake data into Country table for Arab countries
INSERT INTO countries (name) VALUES 
('Saudi Arabia'),
('United Arab Emirates'),
('Egypt'),
('Iraq'),
('Syria'),
('Jordan'),
('Lebanon'),
('Algeria'),
('Morocco'),
('Tunisia'),
('Libya'),
('Oman'),
('Kuwait'),
('Qatar'),
('Bahrain'),
('Yemen');

-- Insert fake data into City table for cities in Arab countries
INSERT INTO cities (name) VALUES 
('Riyadh'), ('Jeddah'), ('Dammam'), ('Medina'), ('Mecca'),         -- Saudi Arabia
('Dubai'), ('Abu Dhabi'), ('Sharjah'), ('Ajman'), ('Fujairah'),    -- United Arab Emirates
('Cairo'), ('Alexandria'), ('Giza'), ('Shubra El Kheima'), ('Port Said'), -- Egypt
('Baghdad'), ('Basra'), ('Mosul'), ('Erbil'), ('Karbala'),        -- Iraq
('Damascus'), ('Aleppo'), ('Homs'), ('Hama'), ('Latakia'),         -- Syria
('Amman'), ('Zarqa'), ('Irbid'), ('Salt'), ('Aqaba'),              -- Jordan
('Beirut'), ('Tripoli'), ('Sidon'), ('Tyre'), ('Zahle'),           -- Lebanon
('Algiers'), ('Oran'), ('Constantine'), ('Annaba'), ('Batna'),     -- Algeria
('Rabat'), ('Casablanca'), ('Fes'), ('Tangier'), ('Marrakesh'),    -- Morocco
('Tunis'), ('Sfax'), ('Sousse'), ('Kairouan'), ('Bizerte'),       -- Tunisia
('Tripoli'), ('Benghazi'), ('Misrata'), ('Tarhuna'), ('Zawiya'),   -- Libya
('Muscat'), ('Salalah'), ('Sohar'), ('Nizwa'), ('Sur'),            -- Oman
('Kuwait City'), ('Hawalli'), ('Farwaniya'), ('Mangaf'), ('Jahra'),-- Kuwait
('Doha'), ('Al Rayyan'), ('Umm Salal'), ('Al Wakrah'), ('Al Khor'),-- Qatar
('Manama'), ('Muharraq'), ('Riffa'), ('Hamad Town'), ("A'ali"),    -- Bahrain
('Sanaa'), ('Aden'), ('Taiz'), ('Al Hudaydah'), ('Ibb');           -- Yemen

-- Insert fake data into Location table
INSERT INTO locations (city_id, country_id) VALUES 
-- Saudi Arabia
(1, 1), (2, 1), (3, 1), (4, 1), (5, 1), 
-- United Arab Emirates
(6, 2), (7, 2), (8, 2), (9, 2), (10, 2),
-- Egypt
(11, 3), (12, 3), (13, 3), (14, 3), (15, 3),
-- Iraq
(16, 4), (17, 4), (18, 4), (19, 4), (20, 4),
-- Syria
(21, 5), (22, 5), (23, 5), (24, 5), (25, 5),
-- Jordan
(26, 6), (27, 6), (28, 6), (29, 6), (30, 6),
-- Lebanon
(31, 7), (32, 7), (33, 7), (34, 7), (35, 7),
-- Algeria
(36, 8), (37, 8), (38, 8), (39, 8), (40, 8),
-- Morocco
(41, 9), (42, 9), (43, 9), (44, 9), (45, 9),
-- Tunisia
(46, 10), (47, 10), (48, 10), (49, 10), (50, 10),
-- Libya
(51, 11), (52, 11), (53, 11), (54, 11), (55, 11),
-- Oman
(56, 12), (57, 12), (58, 12), (59, 12), (60, 12),
-- Kuwait
(61, 13), (62, 13), (63, 13), (64, 13), (65, 13),
-- Qatar
(66, 14), (67, 14), (68, 14), (69, 14), (70, 14),
-- Bahrain
(71, 15), (72, 15), (73, 15), (74, 15), (75, 15),
-- Yemen
(76, 16), (77, 16), (78, 16), (79, 16), (80, 16);

-- -----------------------------

-- Insert fake data into Country table for non-Arab countries
INSERT INTO countries (name) VALUES 
('United States'),
('United Kingdom'),
('Canada'),
('Australia'),
('Germany');

-- Insert fake data into City table for cities in non-Arab countries
INSERT INTO cities (name) VALUES 
('New York'), ('Los Angeles'), ('Chicago'), ('Houston'), ('Phoenix'),     -- United States
('London'), ('Birmingham'), ('Manchester'), ('Liverpool'), ('Glasgow'),   -- United Kingdom
('Toronto'), ('Montreal'), ('Vancouver'), ('Calgary'), ('Ottawa'),        -- Canada
('Sydney'), ('Melbourne'), ('Brisbane'), ('Perth'), ('Adelaide'),         -- Australia
('Berlin'), ('Hamburg'), ('Munich'), ('Cologne'), ('Frankfurt');         -- Germany

-- Insert fake data into Location table for non-Arab countries
INSERT INTO locations (city_id, country_id) VALUES 
-- United States
(81, 17), (82, 17), (83, 17), (84, 17), (85, 17),
-- United Kingdom
(86, 18), (87, 18), (88, 18), (89, 18), (90, 18),
-- Canada
(91, 19), (92, 19), (93, 19), (94, 19), (95, 19),
-- Australia
(96, 20), (97, 20), (98, 20), (99, 20), (100, 20),
-- Germany
(101, 21), (102, 21), (103, 21), (104, 21), (105, 21);

