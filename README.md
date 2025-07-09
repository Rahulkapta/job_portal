# Job Portal – PHP MySQL Project

A full-featured job portal built using **PHP**, **MySQL**, and **Bootstrap** that supports three roles: **Admin**, **Recruiter**, and **Job Seeker**. Each role has its own dashboard and capabilities to manage job listings, applications, and users.



## Features

### Authentication
- Secure user registration & login
- Roles: `admin`, `recruiter`, `seeker`
- Session-based access control

###  Recruiter Dashboard
- Post new jobs with fields: title, description, company, location, salary
- Edit or delete existing jobs
- View posted jobs in styled cards

###  Job Seeker Dashboard
- Browse all jobs with recruiter info
- Apply with:
  - Cover letter
  - LinkedIn profile
  - Resume link
  - Phone number
- Prevents reapplying to the same job

### Admin Dashboard
- View all users with roles
- View all posted jobs
- (Extendable to delete/manage users or jobs)

---

## Tech Stack

| Technology | Description              |
|------------|--------------------------|
| PHP        | Server-side scripting    |
| MySQL      | Relational database      |
| Bootstrap  | Frontend styling & UI    |
| HTML/CSS   | Structure & Design       |
| XAMPP      | Local development server |

---

## Database Schema

- `users (id, name, email, password, role)`
- `jobs (id, title, description, company_name, location, salary, user_id)`
- `applications (id, job_id, seeker_id, cover_letter, resume_link, phone, linkedin, applied_at)`

 Sample SQL: [`job_portal.sql`](./database.sql)


