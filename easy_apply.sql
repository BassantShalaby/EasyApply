-- Create Country table
CREATE TABLE Country (
    country_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create City table
CREATE TABLE City (
    city_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create Organization table
CREATE TABLE Organization (
    org_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
	phone VARCHAR(255) NOT NULL,
	link VARCHAR(255) ,
    country_id INT UNSIGNED,
    city_id INT UNSIGNED,
    industry VARCHAR(255),
    logo VARCHAR(255),
    info TEXT,
    FOREIGN KEY (country_id) REFERENCES Country(country_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES City(city_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Skills table
CREATE TABLE Skills (
    skill_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create Category table
CREATE TABLE Category (
    category_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Create Skill_Category table (Many-to-Many relationship)
CREATE TABLE Skill_Category (
    skill_id INT UNSIGNED,
    category_id INT UNSIGNED,
    PRIMARY KEY (skill_id, category_id),
    FOREIGN KEY (skill_id) REFERENCES Skills(skill_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES Category(category_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Applicant table
CREATE TABLE Applicant (
    applicant_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    birth_date DATE,
    email VARCHAR(255) NOT NULL,
    country_id INT UNSIGNED,
    city_id INT UNSIGNED,
    password VARCHAR(255) NOT NULL,
    bio TEXT,
    CV VARCHAR(255),
    pic VARCHAR(255),
    phone VARCHAR(20),
    title VARCHAR(255),
    experience ENUM('entry_level', 'intermediate' , 'expert'),
    exp_years INT ,
    gender ENUM('male', 'female'),
    age INT,
    FOREIGN KEY (country_id) REFERENCES Country(country_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES City(city_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Job table
CREATE TABLE Job (
    job_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    open_vacancies INT,
    hired INT,
    applied INT,
    job_status ENUM('closed', 'open'),
    experience ENUM('entry_level', 'intermediate' , 'expert'),
    exp_years INT ,
    publish_date DATE,
    expiry_date DATE,
    country_id INT UNSIGNED,
    city_id INT UNSIGNED,
    location_type ENUM('remote', 'hyprid' , 'on_site'),
    salary_max DECIMAL(10, 2),
    salary_min DECIMAL(10, 2),
    gender ENUM('male', 'female', 'any'),
    emp_type ENUM('part_time', 'full_time'),
    category_id INT UNSIGNED,
    FOREIGN KEY (country_id) REFERENCES Country(country_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (city_id) REFERENCES City(city_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (category_id) REFERENCES Category(category_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Job_Requirements table (One-to-Many relationship)
CREATE TABLE Job_Requirements (
    job_id INT UNSIGNED,
    requirement TEXT,
    FOREIGN KEY (job_id) REFERENCES Job(job_id) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Create Applicant_Skills table (Many-to-Many relationship)
CREATE TABLE Applicant_Skills (
    applicant_id INT UNSIGNED,
    skill_id INT UNSIGNED,
    PRIMARY KEY (applicant_id, skill_id),
    FOREIGN KEY (applicant_id) REFERENCES Applicant(applicant_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES Skills(skill_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Applying table (Many-to-Many relationship)
CREATE TABLE Applying (
    applicant_id INT UNSIGNED,
    job_id INT UNSIGNED,
    status ENUM('pending', 'approved', 'rejected'),
    why TEXT,
    PRIMARY KEY (applicant_id, job_id),
    FOREIGN KEY (applicant_id) REFERENCES Applicant(applicant_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (job_id) REFERENCES Job(job_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Location table (One-to-One relationship)
CREATE TABLE Location (
    city_id INT UNSIGNED,
    country_id INT UNSIGNED,
    PRIMARY KEY (city_id, country_id),
    FOREIGN KEY (city_id) REFERENCES City(city_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (country_id) REFERENCES Country(country_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ====================================================

-- Insert fake data into Country table for Arab countries
INSERT INTO Country (name) VALUES 
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
INSERT INTO City (name) VALUES 
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
INSERT INTO Location (city_id, country_id) VALUES 
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
INSERT INTO Country (name) VALUES 
('United States'),
('United Kingdom'),
('Canada'),
('Australia'),
('Germany');

-- Insert fake data into City table for cities in non-Arab countries
INSERT INTO City (name) VALUES 
('New York'), ('Los Angeles'), ('Chicago'), ('Houston'), ('Phoenix'),     -- United States
('London'), ('Birmingham'), ('Manchester'), ('Liverpool'), ('Glasgow'),   -- United Kingdom
('Toronto'), ('Montreal'), ('Vancouver'), ('Calgary'), ('Ottawa'),        -- Canada
('Sydney'), ('Melbourne'), ('Brisbane'), ('Perth'), ('Adelaide'),         -- Australia
('Berlin'), ('Hamburg'), ('Munich'), ('Cologne'), ('Frankfurt');         -- Germany

-- Insert fake data into Location table for non-Arab countries
INSERT INTO Location (city_id, country_id) VALUES 
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
