--
-- File generated with SQLiteStudio v3.2.1 on Wed Apr 24 18:50:11 2019
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Events
CREATE TABLE Events (eventID INTEGER PRIMARY KEY AUTOINCREMENT, openDate DATETIME, resolveDate DATETIME, description TEXT, duration DATETIME, tags VARCHAR (40) REFERENCES Tags (name), createdBy REFERENCES Users (email), jira TEXT, related REFERENCES Events (eventID), subject TEXT);
INSERT INTO Events (eventID, openDate, resolveDate, description, duration, tags, createdBy, jira, related, subject) VALUES (1, '2019-04-22 17:28:01', NULL, 'test', NULL, NULL, 'test@oht.com', NULL, NULL, NULL);
INSERT INTO Events (eventID, openDate, resolveDate, description, duration, tags, createdBy, jira, related, subject) VALUES (2, '2019-04-22 17:28:01', NULL, 'test2', NULL, NULL, 'test@oht.com', NULL, NULL, NULL);
INSERT INTO Events (eventID, openDate, resolveDate, description, duration, tags, createdBy, jira, related, subject) VALUES (3, '2019-04-22 17:28:01', NULL, 'test3', NULL, NULL, 'test@oht.com', NULL, NULL, NULL);
INSERT INTO Events (eventID, openDate, resolveDate, description, duration, tags, createdBy, jira, related, subject) VALUES (4, '2019-04-22 17:28:01', NULL, 'as', NULL, NULL, 'test@oht.com', '2', 3, '1');

-- Table: Tags
CREATE TABLE Tags (name VARCHAR (40) PRIMARY KEY);

-- Table: Updates
CREATE TABLE Updates (updateDate PRIMARY KEY, eventId REFERENCES Events (eventID), user REFERENCES Users (Email), duration DATETIME);

-- Table: Users
CREATE TABLE Users (email TEXT (40) PRIMARY KEY NOT NULL CHECK (Email LIKE '%___@___%'), name TEXT (40), role TIME (40));
INSERT INTO Users (email, name, role) VALUES ('test@oht.com', 'tester', 'user');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
