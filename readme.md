# Online "Ngon" Restaurant

## Overview

This project was created during my second year of university as part of my coursework for the subject "Software Systems Development Technology". Because my first project was written in PHP, I'd like to use a PHP-related framework for this project. So Laravel was chosen. I had no prior knowledge of the framework, therefore I relied on tutorials and Google when I became stuck while working on this project. Aside from Laravel, I believe one key thing I learned through this project and the course "Software Systems Development Technology" is how to approach an issue, think of a solution/application for the problem, and what steps must be taken while developing the application. I recognize the significance of project documentation. Making an application entails more than simply coding. The process I learned can be applied to any project and works well in groups.

## Description

The project's goal is to create a web application called "INTERNET RESTAURANT" that will be used to sell dishes and will be utilized by users who want to purchase a dish remotely via the Internet (using a mobile device or PC). People may now buy practically everything online, including clothing, electronics, and consumer items. There is also the option to buy groceries through the website. The network has a large number of food delivery-related websites, such as "Yandex.eda," "Delivery Club," and others. The above-mentioned websites have complicated user interfaces. The built website will have an easy-to-use interface.

Below are some UML diagrams I drawed for the project. Sorry if some of they are all in Russians)

![image](https://user-images.githubusercontent.com/28446653/135719263-776607d0-9f90-4cb0-8baf-22c74f87a69a.png)
<b>UML Use Case Diagram</b>

Basiclly, there are two types of users: Client and Admin. 

Client Functionality:
- View dishes by category;
- Formation of an order;
- Search for the desired dish;
- Viewing the description of the selected dish;
- View information about the restaurant;
- Registration;
- View the list of orders;

Admin Functionality:
- Adding new dishes;
- Changing information about a dish;
- Removing a dish;
- View all dishes;
- Viewing the list of orders;
- Viewing the list of client users;

![image](https://user-images.githubusercontent.com/28446653/135719621-3db521ae-deaa-48ed-9a4a-c2e42243e80b.png)
<b>Database schema</b>

![image](https://user-images.githubusercontent.com/28446653/135719748-77c534fb-af47-4f0e-b298-2b416fde6f4f.png)
<b>Class diagram</b>

## Built With
- Laravel
- HTML
- CSS
- Bootstrap
- SQL

## Getting Started

This project uses LAMP tech stack and Laravel.

Laravel is a framework for building web applications with easy-to-use syntax. This choice is due to the following reasons:
• Laravel simplifies common development tasks such as routing, authentication, sessions, and caching;
• The framework has an excellent ORM and database layer (eloquent);
• The framework supports the chosen programming approach;
• The framework has a Blade Template Engine that helps you work with typical PHP / HTML code;

P/s: I really like Blade Template Engine of Laravel.

This software package was developed using the Xampp environment. It is the most widely used PHP development environment. The main reason is that Apache distributions for the Apache server, MariaDB, PHP, and Perl are all included in the XAMPP software package. Xampp is mostly used for localhost or local server. This local server is installed on your desktop or laptop computer. Before uploading a website to a remote web server, XAMPP is usually used to test the website. XAMPP provides me with an appropriate environment for testing a PHP project on my local system.

### Prerequisites
There are many good tutorials online on how to download, install and use Laravel and Xampp.

### Setup
There are already some basic data in the sql file. But you can always add more if you like.

### Usage
Some screenshots of the web are below:

![image](https://user-images.githubusercontent.com/28446653/135720169-359eaaef-a08c-41c5-bc1a-56f04fc32920.png)

![image](https://user-images.githubusercontent.com/28446653/135720172-5fc600c2-3118-4df4-8b00-4fa85f708a3c.png)

![image](https://user-images.githubusercontent.com/28446653/135720177-d157a7f1-3c98-480d-8edd-b21e2e2c6e7f.png)

![image](https://user-images.githubusercontent.com/28446653/135720181-8ca7b589-bd3a-4621-9131-203e89272416.png)

![image](https://user-images.githubusercontent.com/28446653/135720185-4f976b4e-522c-4136-95b9-59730605852c.png)

![image](https://user-images.githubusercontent.com/28446653/135720190-6cccd869-f49f-4dae-95e6-97947352a8c8.png)

![image](https://user-images.githubusercontent.com/28446653/135720195-cef8cbad-e98c-4460-bdf6-e7dad90809cd.png)

![image](https://user-images.githubusercontent.com/28446653/135720200-0f4d1d74-a762-4b7a-83aa-edbffa93110d.png)

![image](https://user-images.githubusercontent.com/28446653/135720205-a4db7a54-744b-4dc4-a8ac-76afcf7f39b9.png)

![image](https://user-images.githubusercontent.com/28446653/135720210-7ee97b5c-229d-4ff3-b4ae-efe29f7a9437.png)

## Improvements
Good things from the first project are also the good things of this project. Moreoever, my supervisor assessed that the application was technologically advanced 🙂 thanks to the well-developed program model, well-defined subtasks, and data structures. The software is written in an appealing style, and the code is easily readable. Wherever possible, code reuse is used. Also, the generated modules are sufficiently self-contained.

But of course, I still think I could do better. The web has many things to improve:
- It is right now not responsive.
- The coding still can be improved.
- Many functions can be added: paying funciton for example.
- At the time, the web is only concerned with one restaurant. The web can be improved by ordering dishes from a variety of restaurants.









