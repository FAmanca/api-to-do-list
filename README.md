# ToDo List API

API sederhana untuk mengelola daftar ToDo. Semua endpoint diawali dengan prefix `/api/lists`.

## Base URL
https://magang.sekolahan.id

## Endpoints

### 1. Get All ToDo Lists
- **Method:** `GET`
- **URL:** `/api/lists/`
- **Description:** Mengambil semua daftar ToDo.
- **Response Example:**
```json
{
    "status": true,
    "message": "Success",
    "lists": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "title": "List no 1",
                "description": "deskripsi list no 1",
                "priority": "low",
                "created_at": "2025-11-03T07:14:55.000000Z",
                "updated_at": "2025-11-03T07:14:55.000000Z"
            },
            {
                "id": 2,
                "title": "List no 1",
                "description": "deskripsi list no 1",
                "priority": "low",
                "created_at": "2025-11-03T07:24:56.000000Z",
                "updated_at": "2025-11-03T07:24:56.000000Z"
            },
            {
                "id": 3,
                "title": "List no 1",
                "description": "deskripsi list no 1",
                "priority": "low",
                "created_at": "2025-11-03T07:48:08.000000Z",
                "updated_at": "2025-11-03T07:48:08.000000Z"
            },
            {
                "id": 4,
                "title": "List no 2",
                "description": "deskripsi list no 2",
                "priority": "low",
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
  "priority": "low|medium|high",
}
```
- **Response Example:**
```json
{
    "status": true,
    "message": "Success",
    "list": {
        "title": "List no 2",
        "description": "deskripsi list no 2",
        "priority": "low",
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
}
```
- **Response Example:**
```json
{
    "status": true,
    "message": "Update Success",
    "list": {
        "id": 1,
        "title": "List no 1 Edit",
        "description": "deskripsi list no 1 Edit",
        "priority": "low",
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
    "status": true,
    "message": "Delete Success",
    "list": {
        "id": 1,
        "title": "List no 1 Edit",
        "description": "deskripsi list no 1 Edit",
        "priority": "low",
        "created_at": "2025-11-03T07:14:55.000000Z",
        "updated_at": "2025-11-03T07:52:40.000000Z"
    }
}
```
### 5. Update Profile
- **Method:** `PATCH`
- **URL:** `/api/profile/update/{id}`
- **Description:** Mengubah/MengUpdate foto profile.
- **Request Body:**
```json
{
    "Username": "atmint",
    "email": "atmint@gmail.com",
    "password": "Test123",
    "image_path": "test.png",

}
```
- **Response Example:**
```json
{
    "status": true,
    "message": "Update Successful"
}
```

### 6. Login User
- **Method:** `POST`
- **URL:** `/api/auth/login`
- **Description:** Login User.
- **Request Body:**
```json
{
  "email": "atmint@gmail.com",
  "password": "Test123",
}
```
- **Response Example:**
```json
{
    "status": true,
    "message": "Login Successful"
}
```

### 5. Get Profile
- **Method:** `GET`
- **URL:** `/api/get/{id}`
- **Description:** Mengambil data profile.
- **Response Example:**
```json
{
    "status": true,
    "message": "Success get user data",
    "data": {
        "id": 1,
        "username": "UserEditBaru",
        "email": "usertest@example.com",
        "email_verified_at": null,
        "image_path": "https://magang.sekolahan.id/upload/img/oscNYAepxI9NGlkGwtsw4VXyHrapZoTJ0Y1iRnLB.png",
        "created_at": "2025-11-12T01:15:21.000000Z",
        "updated_at": "2025-11-12T08:43:20.000000Z"
    }
```
