# Common Baby Names Directory

A PHP application to display and search for the most common names by letter and year. The application provides pagination for results, and each name links to detailed statistics.

## Features

- Displays a list of the top 15 common names
- Paginated search by letter
- Individual name statistics page with name details sorted by year
- Alphabet navigation for easy letter-based filtering
- Utilizes prepared statements for secure database queries

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/baby-name-explorer.git
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Set up your database:

    - Ensure a MySQL database is ready.
    - Configure database access in a configuration file (e.g., `.env` or directly in the code).
    - Import the database schema and seed data if available.

4. Configure your server settings (optional):

    This app is designed for local development but can be hosted on any server with PHP support.

## Usage

- **Homepage**: Shows a list of the top common names.
- **Alphabet Navigation**: Select a letter to view names starting with that letter.
- **Name Details**: Click a name to view specific details and statistics.

### Example Usage

1. Open the homepage to see the list of top common names.
2. Click a letter to filter by names starting with that letter.
3. Select a name to view details for that name by year.

## File Structure

- **`inc/all.inc.php`**: Handles core includes and setups for the project.
- **`views/pages/`**: Holds different view templates.
- **`views/layout/main.view.php`**: Primary layout file wrapping content views.
- **Pagination and Filtering Functions**:
  - `fetch_names_initial`: Fetches names based on the selected letter.
  - `count_names_initial`: Returns the count of unique names for pagination.
  - `fetch_top_names`: Fetches the top 15 names based on total count.
  - `fetch_by_name`: Fetches detailed information for a selected name.

## Contributing

1. Fork the project.
2. Create a feature branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add a new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Open a Pull Request.

---

Thank you for using Common Baby Names Directory! Contributions and feedback are welcome.
