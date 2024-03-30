# EasyApply

This is a job portal website developed as a project for ITI intensive code camp. The website facilitates job seekers in finding suitable job opportunities and allows employers to post job listings.

## Features

- **Job Listings:** Job seekers can view a list of available job opportunities.
- **Job Search:** Users can search for jobs based on keywords, location, category, etc.
- **Job Details:** Detailed information about each job listing, including job description, requirements, and application instructions.
- **User Authentication:** Users can sign up, log in, and manage their profiles.
- **Employer Dashboard:** Employers can register, log in, and post job listings.
- **Admin Panel:** Admins have access to manage users, job listings, and other site content.

## Technologies Used

- **PHP:** The backend of the website is developed using vanilla PHP.
- **MySQL:** Database management system for storing user data, job listings, etc.
- **HTML/CSS:** Frontend styling and structure.
- **JavaScript:** Enhancing user experience and frontend interactions.
- **MVC Design Pattern:** Organizing the codebase into Model, View, and Controller components for better maintainability and scalability.

## Installation

1. **Clone the Repository:**
    ```bash
    git clone git@github.com:BassantShalaby/EasyApply.git
    ```

2. **Database Setup:**
    - Create a MySQL database.
    - Import the `database.sql` file to set up the required tables.

3. **Configuration:**
    - Configure the database connection in `config/db.php`.

4. **Start the Server:**
    - ```bash
        composer install
        ```
    - If you have PHP installed, you can use the built-in server:
        ```bash
        php -S localhost:8000 -t public
        ```
    - Access the website at `http://localhost:8000` in your web browser.

## Usage

- **Job Seekers:** Sign up or log in to search for jobs, view job details, and apply for positions.
- **Employers:** Register or log in to post job listings, manage job postings, and view applicant details.
- **Admins:** Log in to the admin panel (`/admin`) to manage users, job listings, and site content.

## Contributors

- [Bassant Shalaby](https://github.com/BassantShalaby)
- [Heba Arakha](https://github.com/hebaArakha)
- [Menna Selim](https://github.com/mennakhalilselim)
- [Sfa Adel](https://github.com/SfaAdel)

## Acknowledgments

This project uses the "JobEntry - Job Portal Website Template" theme template by [HTML Codex](https://htmlcodex.com) Distributed By [ThemeWagon](https://themewagon.com) . Original theme template available [here](https://htmlcodex.com/job-portal-website-template).


