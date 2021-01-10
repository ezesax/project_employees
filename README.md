# Project Manager API

The Project Manager API is a tool that pretends to help you to manage the projects and their employees in a company.

## Usage

We will then leave the different endpoints from this api.

### Projects
#### Get all projects


```bash
get: /project
```
Response example

```bash
{
    "message": "Server message",
    "data": [
        {
            "id": 1,
            "name": "Project Name",
            "description": "Project description",
            "created_at": "Created at date",
            "updated_at": "Updated at date"
        }
    ]
}
```

* message: string
* data: project object array


#### Get project by id


```bash
get: /project/{projectId}
```

Response example

```bash
{
    "message": "Server message",
    "data": {
            "id": 1,
            "name": "Project Name",
            "description": "Project description",
            "created_at": "Created at date",
            "updated_at": "Updated at date"
}
```

* message: string
* data: project object

#### Create new project


```bash
post: /project
```

Body example

```bash
{
    "name":"Project Name",
    "description":"Project description"
}
```

* name: string
* description: string

Response example

```bash
{
    "message": "Server Message",
    "data": {
        "name": "Project name",
        "description": "Project description",
        "updated_at": "Updatedat date",
        "created_at": "Created at date",
        "id": Project id
    }
}
```

* name: string
* description: string
* updated_at: date
* created_at: date
* id: int

#### Update an existing project


```bash
put: /project/{projectId}
```

Body example

```bash
{
    "name":"Project new name",
    "description":"Project new description"
}
```

* name: string
* description: string

Response example

```bash
{
    "message": "Server Message",
    "data": {
        "id": Project id
        "name": "Project name",
        "description": "Project description",
        "updated_at": "Updatedat date",
        "created_at": "Created at date"
    }
}
```

* id: int
* name: string
* description: string
* updated_at: date
* created_at: date

#### Delete project


```bash
delete: /project/{projectId}
```

Response example

```bash
{
    "message": "Server Message",
    "data": null
}
```

### Employees
#### Get all employees


```bash
get: /employees
```
Response example

```bash
{
    "message": "Server message",
    "data": [
        {
            "id": employee id,
            "name": "Employee Name",
            "lastname": "Employee Lastname",
            "birthday": "Employee birthday",
            "roll_on_date": "Employee roll_on date",
            "project_id": Employee project id,
            "created_at": "Created at date",
            "updated_at": "updated at date",
            "project": {
                "id": Project id,
                "name": "Project name",
                "description": "Project description",
                "created_at": "Project created at date",
                "updated_at": "Project updated at date"
            }
        }
	]
}
```

* message: string
* data: employee object array


#### Get employee by id


```bash
get: /employee/{employeeId}
```

Response example

```bash
{
    "message": "Server message",
    "data":
        {
            "id": employee id,
            "name": "Employee Name",
            "lastname": "Employee Lastname",
            "birthday": "Employee birthday",
            "roll_on_date": "Employee roll_on date",
            "project_id": Employee project id,
            "created_at": "Created at date",
            "updated_at": "updated at date",
    }
}
```

* message: string
* data: employee object

#### Create new employee


```bash
post: /employee
```

Body example

```bash
    {
        "name": "Employee Name",
        "lastname": "Employee Lastname",
        "birthday": "Employee birthday",
        "roll_on_date": "Employee roll_on_date",
        "project_id": Project id
    }
```

* name: string
* lastname: string
* birthday: date (format: 'YYYY-MM-DD')
* roll_on_date: date (format: 'YYYY-MM-DD')
* project_id: int

Response example

```bash
{
    "message": "Server message",
    "data": {
        "name": "Employee Name",
        "lastname": "Employee Lastname",
        "birthday": "Employee birthday",
        "roll_on_date": "Employee roll_on_date",
        "project_id": Project id
        "updated_at": "Updated at date",
        "created_at": "Created at date",
        "id": Employee id
    }
}
```

* name: string
* lastname: string
* birthday: date (format: 'YYYY-MM-DD')
* roll_on_date: date (format: 'YYYY-MM-DD')
* project_id: int
* updated_at: date
* created_at: date
* id: int

#### Update an existing employee


```bash
put: /employee/{employeeId}
```

Body example

```bash
	{
        "name": "Employee Name",
        "lastname": "Employee Lastname",
        "birthday": "Employee birthday",
        "roll_on_date": "Employee roll_on_date",
        "project_id": Project id
    }
```

* name: string
* lastname: string
* birthday: date (format: 'YYYY-MM-DD')
* roll_on_date: date (format: 'YYYY-MM-DD')
* project_id: int

Response example

```bash
{
    "message": "Server Message",
    "data": {
            "id": employee id,
            "name": "Employee Name",
            "lastname": "Employee Lastname",
            "birthday": "Employee birthday",
            "roll_on_date": "Employee roll_on date",
            "project_id": Employee project id,
            "created_at": "Created at date",
            "updated_at": "updated at date",
    }
}
```

* id: int
* name: string
* lastname: string
* birthday: date (format: 'YYYY-MM-DD')
* roll_on_date: date (format: 'YYYY-MM-DD')
* project_id: int
* updated_at: date
* created_at: date

#### Delete employee


```bash
delete: /employee/{employeeId}
```

Response example

```bash
{
    "message": "Server Message",
    "data": null
}
```
