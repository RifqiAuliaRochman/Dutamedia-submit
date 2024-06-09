# user API Spec

## Register User

Endpoint : POST /api/users

Request Body :

```json 
{
    "username" : "Rifqi",
    "password": "123456",
    "name": "Rifqi Rochman"
}
```

Response Body (Success):

```json
{
    "data": "OK"
}
```

Response Body (Failed):

```json 
{
    "errors": "Username Must Not Blank"
}
```

## Login User


Endpoint : POST /api/auth/login

Request Body :

```json 
{
    "username" : "Rifqi",
    "password": "123456"
}
```

Response Body (Success):

```json
{
    "data": {
        "token": "TOKEN",
        "expiredAt": 
    }
}
```

Response Body (Failed):

```json 
{
    "errors": "Username or Password wrong"
}
```

## Update User

Endpoint : PATCH /api/users/current

Request Header:
- X-API-TOKEN : Token (Mandatory)

Request Body :

```json 
{
    "name": "Rifqi",
    "password": "new password"
}
```

Response Body (Success):

```json
{
    "data": "OK"
}
```

Response Body (Failed):

```json 
{
    "data": "KO",
    "errors": "Username Must Not Blank"
}
```

## Get User

Endpoint : GET /api/users/current

Request Header:
- X-API-TOKEN : Token (Mandatory)

Response Body (Success):

```json
{
    "data": {
        "username": "Rifqi",
        "name": "Rifqi Rochman"
    }
}
```

Response Body (Failed):

```json 
{
    "errors": "Unauthorized"
}
```

## Logout User

Endpoint : DELETE /api/auth/logout

Request Header:
- X-API-TOKEN : Token (Mandatory)

Response Body (Success):

```json
{
    "data": "OK"
}
```