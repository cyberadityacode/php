**Structured Entity Relationship Diagram (ERD)** with tables, primary/foreign keys, and relationships for **SuperCRUD** project.

---

## Entity Relationship Diagram (ERD)

```plaintext
+--------------------+        +-------------------+         +------------------+
|      users         |        |   task_statuses   |         |   task_details   |
+--------------------+        +-------------------+         +------------------+
| PK  user_id        |<---+   | PK  status_id     |<-----+  | PK  task_det_id  |
|     username       |    |   |     status_label  |      |  | FK  task_id      |
|     email          |    |   +-------------------+      |  |     task_description
|     password_hash  |    |                               |  |     completed_at
|     created_at     |    |                               |  |     last_updated_at
+--------------------+    |                               |  +------------------+
                          |                               |
                          |                               |
+--------------------------v----------------+             |
|                 tasks                     |-------------+
+------------------------------------------+
| PK  task_id                               |
|     task_name                             |
| FK  status_id     → task_statuses.status_id
| FK  created_by    → users.user_id
| FK  updated_by    → users.user_id
|     created_at                            |
|     updated_at                            |
+------------------------------------------+
```

---

## Table Relationships

### `users`

* Primary Key: `user_id`
* Referenced by `tasks.created_by` and `tasks.updated_by`

### `task_statuses`

* Primary Key: `status_id`
* Referenced by `tasks.status_id`

### `tasks`

* Primary Key: `task_id`
* Foreign Keys:

  * `status_id` → `task_statuses.status_id`
  * `created_by`, `updated_by` → `users.user_id`
* Referenced by: `task_details.task_id`

### `task_details`

* Primary Key: `task_det_id`
* Foreign Key: `task_id` → `tasks.task_id` (with `ON DELETE CASCADE`)

---

## Notes

* You have **1\:N relationships**:

  * One user can **create/update many tasks**.
  * One task can have **one status**.
  * One task can have **many task\_details**.
* `task_details` can be used for **extended notes**, version logs, or history of a task.
* `task_statuses` is a **lookup table**, which allows future extensibility (e.g., "Archived", "Deferred").

---


