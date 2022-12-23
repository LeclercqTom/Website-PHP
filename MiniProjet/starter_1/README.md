# R3.01 PHP Leclercq Tom / Brunel Bastien

PHP website with registration, login and profile editing system
last version dated 23/12/2022

## Installation

We have coded this project with Laragon software and Postgresql with WSL for the database part
For execute this project :

 **1. Laragon**

Download laragon software
You can install it with :

```bash
https://laragon.org/download/index.html
```

 **2. WSL**

It serves as a bridge between windows and linux
Follow the steps with the link below

```bash
https://learn.microsoft.com/fr-fr/windows/wsl/install
```

 **3. Ubuntu20.04**

It's a linux shell.
You can install it in your Microsoft Store

**4. PostgreSQL**

PostgreSQL has the advantage of being particularly respectful of data integrity and compatible with all SQL language standards.
Launch Ubuntu and Follow the steps with the link below

```bash
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-postgresql-on-ubuntu-20-04-fr
```

**5. MailDev**

MailDev allows you to simulate a local mailbox server. It will allow you to access the account creation confirmation emails.

Enter the following commands in your Laragon terminal:

```bash
composer require --dev symfony/var-dumper 
composer require phpmailer/phpmailer 
npm install -g maildev 
maildev
```

you can then connect to [this website](http://127.0.0.1:1080/#/) to access to the local server

## Usage

All the steps to launch the project (to be checked)



1. create a postgresql database from the table creation script
2. Launch laragon and upload the mini project using the "www file" button
3. modify the logDatabase file with your database connection information
4. Launch a laragon terminal and move into the mini project (cd command)
5. Launch the site locally using the command: php -S 127.0.0.1:8000
6. Access the site via this link http://localhost:8000/MiniProjet/starter_1/

## Explain the fonctionnalities (features) of the website

Register with password complexity check and email verification



Login once register with ability to disconnect



You can also view and edit your profile information
