---
title: API Reference

language_tabs:

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Auth


Login Controller

This controller handles authenticating users for the application and redirecting them to your home screen. The controller uses a trait to conveniently provide its functionality to your applications.
<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

#Creación


<!-- START_e427062cd1a117c871e8123b502ae80f -->
## Formulario de creación.

Show the form for creating a new article.

> Example request:


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET create`


<!-- END_e427062cd1a117c871e8123b502ae80f -->

<!-- START_19290c090b87bf5f682da8225c993a2b -->
## Guardar artículos.

Store a newly created articles in storage.

> Example request:



### HTTP Request
`POST article`


<!-- END_19290c090b87bf5f682da8225c993a2b -->

#Edición


<!-- START_20beb0671627a25967521e1665605445 -->
## Formulario de edición.

Show the form for editing the specified article.

> Example request:


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET edit/{article}`


<!-- END_20beb0671627a25967521e1665605445 -->

<!-- START_9bbde8f3a0410224d83088d6ddc613f2 -->
## Actulización de artículo.

Update the specified article in storage.

> Example request:



### HTTP Request
`PUT articles/{article}`


<!-- END_9bbde8f3a0410224d83088d6ddc613f2 -->

#Eliminación


<!-- START_aa3785d77e84c9c6db7a0248ecba30ae -->
## Eliminación artículo.

Remove the specified resource from storage.

> Example request:



### HTTP Request
`DELETE articles/{article}`


<!-- END_aa3785d77e84c9c6db7a0248ecba30ae -->

#General


<!-- START_7f51dddc361c8072bf2dca9e1312f757 -->
## Like.

Permite poner &quot;like&quot; al artículo especificado.

> Example request:



### HTTP Request
`POST articles/{article}/likes`


<!-- END_7f51dddc361c8072bf2dca9e1312f757 -->

<!-- START_a824fc42f761eee232ba6010c8f7641d -->
## Búsqueda.

Filtro de artículos en base a la palabra especifica.

> Example request:



### HTTP Request
`POST search`


<!-- END_a824fc42f761eee232ba6010c8f7641d -->

#Ver


<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Mostrar artículos.

Display a listing of the articles.

> Example request:


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Mostrar artículos.

Display a listing of the articles.

> Example request:


> Example response (200):

```json
null
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_869c8af2ead7fd5dae5a2e78d7d31f44 -->
## Mostrar artículo.

Display the specified resource.

> Example request:


> Example response (200):

```json
null
```

### HTTP Request
`GET articles/{article}`


<!-- END_869c8af2ead7fd5dae5a2e78d7d31f44 -->


