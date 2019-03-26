--
-- File generated with SQLiteStudio v3.2.1 on Tue Mar 26 21:44:56 2019
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Events
CREATE TABLE Events (eventID INT PRIMARY KEY NOT NULL, openDate DATETIME, resolveDate DATETIME, description TEXT, duration DATETIME, tags VARCHAR (40) REFERENCES Tags (name), createdBy REFERENCES Users (Email));

-- Table: Tags
CREATE TABLE Tags (name VARCHAR (40) PRIMARY KEY);

-- Table: Updates
CREATE TABLE Updates (updateDate PRIMARY KEY, eventId REFERENCES Events (eventID), user REFERENCES Users (Email), duration DATETIME);

-- Table: Users
CREATE TABLE Users (email TEXT (40) PRIMARY KEY NOT NULL CHECK (Email LIKE '%___@___%'), name TEXT (40), role TIME (40));

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
