
___
[![Maintainability](https://api.codeclimate.com/v1/badges/a72d37bbfd556b4cfe28/maintainability)](https://codeclimate.com/github/DmGorokhov/php-ToDo-App/maintainability)

### Main project stack:
*PHP(v.8.1), Laravel(v.10.10), Livewire3*

___
### 1. Assigment task description
Write a web app on Laravel Livewire base which has the following functionality:
* registration, authorization, change user password.
* user can change the profile status to private or public.
* user can create multiple private and public todo lists.
* user can share his public todo-lists (by sending a direct link to a specific list).
___
### 2. Requirements
___
* Docker compose V2
* Composer >2.6.5
* npm > 10.2.3
* node > 20.10.0
* Make (is used to run shortcut console-command)

To install **Docker**, use the information from the official website [docs.docker.com](https://docs.docker.com/engine/install/).
If you have installed compose, make sure it is upgraded to V2 version.

---

### 3. Installation

Cloning the repository

```bash
git clone git@github.com:DmGorokhov/php-ToDo-App.git
cd php-ToDo-App
```
By default in .env.example set sqlite database ENV VARS.
You can modfify it if prefer other database for development

3.1.1 Setup app on local machine.
```bash
make setup
```
OR...  

3.1.2 Build docker container
```bash
make build
```
- both cases will install app with seed db for development pusposes
---
### 4. Usage

On local machine
```
make start  # starts  web server, sqlite database
```
With docker
```
make start-in-container  # starts docker container as daemon process
```
```
make stop  # stops docker container
```
