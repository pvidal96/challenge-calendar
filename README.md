# Calendar Challenge

Service designed to enrich the calendar meetings of a user with the information that could be useful to prepare for the meeting.

# Database structure

![alt text](https://github.com/pvidal96/challenge-calendar/blob/main/diagrams/database.png)

V0.1: configs table should be replaced for a simpler .env file


# Project structure

A quick overview of how the project could be structured.

## Models

One Eloquent model per database table. User, Meeting, and Attendee will be linked to each other.

## Services

The main logic functions of this software. In this case, they are represented as services.

### CalendarAgenda

This service will retrieve the agenda and update the corresponding meetings on the database for a given user.
To reduce the number of calls to the Calendar API, it will get only the meetings that were added/updated since the last check.

Possible main functions:
-getUpdatedAgenda(User $u, DateInterval)
-updateAgenda

### PersonData
This service will retrieve the data of a specific person given an email address. 

It will first get the information from the database. If it doesn't exist or it's expired (30+ days old) it will call the PersonData API to update it.

Possible main functions:
-getPersonData(string $email)
-getFromDatabase(string $email)
-getFromAPI(string $email)

### MeetingInfo
This service is in charge of gathering the necessary data for the email. 

## Views
The blade/HTML file that represents the email template.

## Crons
The code will be executed when scheduled in order to send the emails at 8 AM.