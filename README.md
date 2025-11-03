# ToDo List API

API sederhana untuk mengelola daftar ToDo. Semua endpoint diawali dengan prefix `/api/lists`.


## Endpoints

### 1. Get All ToDo Lists
- **Method:** `GET`
- **URL:** `/api/lists/`
- **Description:** Mengambil semua daftar ToDo.
- **Response Example:**
```json
{
    "message": "Success",
    "lists": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "title": "List no 1",
                "description": "deskripsi list no 1",
                "priority": "low",
                "due_date": "2025-11-03",
                "is_completed": null,
                "created_at": "2025-11-03T07:14:55.000000Z",
                "updated_at": "2025-11-03T07:14:55.000000Z"
            },
            {
                "id": 2,
                "title": "List no 1",
                "description": "deskripsi list no 1",
                "priority": "low",
                "due_date": "2025-11-03",
                "is_completed": 0,
                "created_at": "2025-11-03T07:24:56.000000Z",
                "updated_at": "2025-11-03T07:24:56.000000Z"
            },
            {
                "id": 3,
                "title": "List no 1",
                "description": "deskripsi list no 1",
                "priority": "low",
                "due_date": "2025-11-03",
                "is_completed": 0,
                "created_at": "2025-11-03T07:48:08.000000Z",
                "updated_at": "2025-11-03T07:48:08.000000Z"
            },
            {
                "id": 4,
                "title": "List no 2",
                "description": "deskripsi list no 2",
                "priority": "low",
                "due_date": "2025-11-03",
                "is_completed": 0,
                "created_at": "2025-11-03T07:48:25.000000Z",
                "updated_at": "2025-11-03T07:48:25.000000Z"
            }
        ],
        "first_page_url": "http://localhost:8000/api/lists?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/lists?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/lists?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/lists",
        "per_page": 10,
        "prev_page_url": null,
        "to": 4,
        "total": 4
    }
}
```

### 2. Store ToDo Lists
- **Method:** `POST`
- **URL:** `/api/lists/`
- **Description:** Menyimpan daftar ToDo.
- **Request Body:**
```json
{
  "title": "List no 2",
  "description": "deskripsi list no 2",
  "priority": "low",
  "due_date": "2025-11-03",
  "is_completed": 0
}
```
- **Response Example:**
```json
{
    "message": "Success",
    "list": {
        "title": "List no 2",
        "description": "deskripsi list no 2",
        "priority": "low",
        "due_date": "2025-11-03",
        "is_completed": 0,
        "updated_at": "2025-11-03T07:48:25.000000Z",
        "created_at": "2025-11-03T07:48:25.000000Z",
        "id": 4
    }
}
```

### 3. Update ToDo Lists
- **Method:** `PUT`
- **URL:** `/api/lists/{id}`
- **Description:** Menyimpan daftar ToDo.
- **Request Body:**
```json
{
  "title": "List no 2 Edit",
  "description": "deskripsi list no 2 Edit",
  "priority": "high",
  "due_date": "2025-11-03",
  "is_completed": 1
}
```
- **Response Example:**
```json
{
    "message": "Update Success",
    "list": {
        "id": 1,
        "title": "List no 1 Edit",
        "description": "deskripsi list no 1 Edit",
        "priority": "low",
        "due_date": "2025-11-03",
        "is_completed": "1",
        "created_at": "2025-11-03T07:14:55.000000Z",
        "updated_at": "2025-11-03T07:52:40.000000Z"
    }
}
```

### 4. Delete ToDo Lists
- **Method:** `GET`
- **URL:** `/api/lists/{id}`
- **Description:** Mengambil semua daftar ToDo.
- **Response Example:**
```json
{
    "message": "Delete Success",
    "list": {
        "id": 1,
        "title": "List no 1 Edit",
        "description": "deskripsi list no 1 Edit",
        "priority": "low",
        "due_date": "2025-11-03",
        "is_completed": 1,
        "created_at": "2025-11-03T07:14:55.000000Z",
        "updated_at": "2025-11-03T07:52:40.000000Z"
    }
}
```

