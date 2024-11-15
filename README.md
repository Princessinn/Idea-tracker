# Idea Tracker

A Laravel-based web application for capturing and organizing creative project ideas. This application allows users to store, manage, and track their creative ideas across different categories.

## Features

- *Create* new ideas with title, category, description, and priority level
- *View* all ideas with pagination (10 items per page)
- *Update* existing ideas
- *Delete* ideas no longer needed
- *Search* functionality to filter ideas by title or category
- *Priority-based sorting* to focus on high-priority ideas
- Input validation to ensure data integrity

## Technical Implementation

### Database Structure

The application uses a single table named ideas with the following structure:

sql
ideas
- id (primary key)
- title (string, required)
- category (string, required)
- description (text, required)
- priority_level (integer, required)
- created_at (timestamp)
- updated_at (timestamp)


### Key Laravel Features Utilized

1. *Model*: Eloquent model with proper validation rules
2. *Controllers*: RESTful resource controller implementing CRUD operations
3. *Views*: Blade templates with components and layouts
4. *Form Validation*: Server-side validation using Laravel's validator
5. *Eloquent Features*: Query scopes for search and filtering
6. *Blade Components*: Reusable components for forms and cards
7. *Route Resource*: Utilization of Laravel's resource routing

### Good Practices Implemented

1. Database table follows First Normal Form (1NF)
2. Consistent color scheme and typography for readability
3. Responsive layout for desktop resolution (1366x768)
4. Clear navigation structure
5. Input validation with user feedback
6. Meaningful error messages
7. Clean code structure following Laravel conventions

## Installation Instructions

1. Clone the repository
2. Run composer install
3. Copy .env.example to .env and configure database settings
4. Run php artisan key:generate
5. Run php artisan migrate --seed
6. Run php artisan serve

The application will be available at http://localhost:8000

## Design Decisions

- *Single Table Design*: While categories could be normalized into a separate table, keeping them in the main table adheres to the assignment requirement of using a single table while maintaining data integrity.
- *Priority Levels*: Implemented as integers (1-5) for easy sorting and filtering.
- *Search Implementation*: Uses a simple but effective search across title and category fields.
- *Pagination*: Set to 10 items per page for optimal user experience.
