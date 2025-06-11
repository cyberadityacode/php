# Super CRUD with PHP, React and MySQL

Database - supercrud

> Table Schema

1. task_statuses

Lookup table for allowed statuses.

```sql
CREATE TABLE task_statuses (
  status_id INT AUTO_INCREMENT PRIMARY KEY,
  status_label VARCHAR(50) UNIQUE NOT NULL
);
```

Seeding Values with InProgress, Halted, Completed.

```sql
INSERT INTO task_statuses(status_label) VALUES('InProgress'), ('Halted'), ('Completed');

```

2. users

```sql
CREATE TABLE users(
	user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

3. tasks
   Core task entity with metadata and audit support.

```sql
CREATE TABLE tasks(
	task_id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    status_id INT NOT NULL,
    created_by INT NOT NULL,
    updated_by INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (status_id) REFERENCES task_statuses(status_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id),
    FOREIGN KEY (updated_by) REFERENCES users(user_id)
);
```

4. task_details

Contains long text, searchable description + timestamps.

```sql
CREATE TABLE task_details(
	task_det_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT NOT NULL,
    task_description TEXT,
    completed_at DATETIME,
    last_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(task_id) REFERENCES tasks(task_id) ON DELETE CASCADE
);
```

5. Full-Text Index on Description
   Enable full-text search (InnoDB supports it since MySQL 5.6+):

```sql
ALTER TABLE task_details ADD FULLTEXT(task_description);
```

You can now perform efficient natural language searches like:

```sql
SELECT * FROM task_details
WHERE MATCH(task_description) AGAINST('urgent report' IN NATURAL LANGUAGE MODE);
```


