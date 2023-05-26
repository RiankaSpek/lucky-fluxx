# Project Plan

By:
Rick Hogenhout, Danyla Huntjens, Rianka Spek and Mingus van Wankum.

For: 
SpaceX – intercontinental travel


## Table of contents

- Introduction
- Goal
- Target audience
- User stories
- Planning
- Wireframe
- Database design
- Technical specifications


## Introduction

Our client has asked us to make a prototype for a flight scheduling system. What makes this request special, is the use of rockets, to get to your destination much faster. 

We’ll provide a website with a calendar interface for customers and a maintenance window for SpaceX engineers. 

In the interface, customers will be able to book their travels, accommodations and activities for their vacation. They will be asked to provide some personal information, as is usual in travel, and a special permit, to confirm they are eligible for travel by rocket. 

In the maintenance window, requests for repairs and such will appear. They will automatically be assigned to an engineer and blocked in the flight schedule. 


## Goal

Our goal is to make it have an easy and functioning flight scheduling system so that everyone can have an easy time scheduling and everyone knows where the flight takes place and at what time what number of people can board it. We also would like to make an overview for the maintenance and repair flights with a maintenance window.


## Target audience

Our target audience are people who are intrigued with travel by rockets but some are a bit skeptical with the CO2 emission and some say it’s still a bit too futuristic.


## User stories

| As a(n)   | in order to                          | I want   
| --------- | ------------------------------------ | ---------                                                                                                      |
| customer  | plan my vacation                     | to see available flights and seats                                                                             |
| customer  | prepare for my travels               | a clear flight calendar                                                                                        |
| customer  | book my flight                       | to know where and how to obtain permits                                                                        |
| customer  | make my vacation a delight           | to be able to book activities while I’m there                                                                  |
| customer  | book my flight                       | to know where the departures are                                                                               |
| customer  | be well informed                     | to find information about my flight, regarding its carbon footprint or general health concerns, on the website |
| developer | make my prototype efficiently        | a wireframe                                                                                                    |
| developer | make my prototype efficiently        | a clear backlog of (assigned) user stories                                                                     |
| developer | make my prototype efficiently        | a database design                                                                                              |
| developer | save information                     | a proper database                                                                                              |
| developer | get recognized                       | a logo that will resemble what the site/company is about.                                                      |
| developer | create a comfortable user experience | an easy and high end web design                                                                                |
| engineer  | keep everyone safe and comfortable   | to be informed where maintenance or repairs are needed                                                         |
| engineer  | keep everyone safe and comfortable   | to be informed when maintenance or repairs are needed                                                          |

### User stories challenge: Recruitment program

| As a(n)   | in order to                          | I want
| --------- | ------------------------------------ | ---------
| potential pilot | learn about the SpaceX Pilot Recruitment Program | to visit the SpaceX Pilot Recruitment Program landing page. |
| potential pilot | understand the requirements and certifications needed | to review the job requirements, necessary certifications, and application process. |
| potential pilot | apply for the program | to create an account or log in to the SpaceX Careers portal. |
| potential pilot | submit my application | to fill in and submit the online application form, providing personal information, professional experience, and relevant certifications. |
| potential pilot | provide additional supporting documents | to upload my resume, cover letter, and copies of licenses and certifications. |


## Planning 

Day 1 : Gerenaral project orientation, brainstorm sessions and writing the project plan.

Day 2 : Finish writing the project plan. Make a beginning for the website structure and design, also the calendar interface.

Day 3 : Maintenance window and beginning with repair flights sending.

Day 4 : Finalize the maintenance window and repair flights. Fix the bugs.

Day 5 : Last commits and final presentation.

| Feature               | Responsible     | Done by   | 
| --------------------  | --------------- | --------- |
| Project plan          | Everyone        | Day 1 - 2 |
| Wireframe             | Rianka          | Day 2     |
| Database design       | Danyla          | Day 2     |
| General
| Homepage              | Rianka          | Day 2     |
| CO2 footprint         | Rianka          | Day 2     |
| Set up database       | Mingus & Rianka | Day 2 - 3 |
| Starport locations    | Rianka          | Day 3     |
| Styling               | Danyla & Rianka | Day 3 - 4 |  
| Logo                  | Mingus          | Day 3     |
| Customer journey 
| Calendar              | Rick            | Day 3     |
| Permit                | Danyla          | Day 4     |
| Book fligth           | Rick & Rianka   | Day 4     |
| Booking personal info | Rianka          | Day 3 - 4 |
| Pilot recruitment
| Landing page          | Danyla          | Day 3     |
| Job requirements      | Danyla          | Day 3-4   |
| Register/login        | Danyla          | Day 4     |
| Application form      | Danyla          | Day 4     |
| Upload documents      | Danyla          | Day 4     |
| Flight scheduling
| Check availibility    | Rick            | Day 3     |
| Repair flight         | Mingus          | Day 4     |
| Maintenance window    | Mingus          | Day 4     |
| Assign engineer       | t.b.d           | t.b.d     |





## Wireframe
![wireframe 1](/docs/wireframe1.png)
![wireframe 2](/docs/wireframe2.png)


## Database design


### UML/ERD
![UML/ERD](/docs/erd.png)

### Tables
#### Table: `flights`
| Column name               | Data type | Addition    |
| ------------------------- | --------- | ----------- |
| id                        | INT       | primary key |
| departure_location        | VARCHAR   |             |
| arrival_location          | VARCHAR   |             |
| departure_time            | DATETIME  |             |
| arrival_time              | DATETIME  |             |
| duration                  | INT       |             |
| seats_total               | INT       |             |
| seats_available           | INT       |             |
| maintenance_window        | DATETIME  |             |
| repair_flight             | BOOLEAN   |             |
| departure_type            | VARCHAR   |             |
| arrival_type              | VARCHAR   |             |
| departure_transit         | ENUM      |             |
| arrival_transit           | ENUM      |             |
| carbon_footprint          | INT       |             |
| price                     | INT       |             |

### Table: `customers`
| Column name   | Data type | Addition    |
| ------------- | --------- | ----------- |
| id            | INT       | primary key |
| first_name    | VARCHAR   |             |
| last_name     | VARCHAR   |             |
| date_of_birth | DATE      |             |
| email         | VARCHAR   |             |
| phone         | VARCHAR   |             |
| address       | VARCHAR   |             |
| postal_code   | VARCHAR   |             |
| city          | VARCHAR   |             |
| country       | VARCHAR   |             |
| permit        | BOOLEAN   |             |

### Table: `bookings`
| Column name | Data type | Addition    |
| ----------- | --------- | ----------- |
| id          | INT       | primary key |
| customer_id | INT       | foreign key |
| flight_id   | INT       | foreign key |
| date        | DATETIME  |             |
| total_price | INT       |             |

### Table: `maintenance`
| Column name | Data type | Addition    |
| ----------- | --------- | ----------- |
| id          | INT       | primary key |
| flight_id   | INT       | foreign key |
| date        | DATETIME  |             |
| launch_pad  | VARCHAR   |             |

### Table: `starports`
| Column name   | Data type | Addition    |
| ------------- | --------- | ----------- |
| id            | INT       | primary key |
| name          | VARCHAR   |             |
| location      | VARCHAR   |             |
| type          | VARCHAR   |             |
| transit_types | VARCHAR   |             |

### Table: `permits`
| Column name | Data type | Addition    |
| ----------- | --------- | ----------- |
| id          | INT       | primary key |
| customer_id | INT       | foreign key |
| approved    | BOOLEAN   |             |


## Technical specifications

This prototype will be making use of the following techniques:

- PHP
- JavaScript
- CSS
- Database PDO
- SQL
- Tailwind CSS

You can find our repository at: <https://bitlab.bit-academy.nl/803ce71e-0a33-11ec-a943-4213e7ee7fac/55180096-0a5a-11ec-a943-4213e7ee7fac/lucky-fluxx> 
