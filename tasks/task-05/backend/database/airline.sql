-- ==============================================================================
-- AIRLINE MANAGEMENT SYSTEM - PHYSICAL DATABASE SCHEMA
-- ==============================================================================

-- 1. Create independent tables first (No Foreign Keys)

CREATE TABLE Airline (
    AirlineID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(150) NOT NULL,
    Address VARCHAR(255),
    ContactPerson VARCHAR(100),
    PhoneNumber VARCHAR(50),
    CurrentBalance DECIMAL(15,2) NOT NULL DEFAULT 0.00
);

CREATE TABLE Route (
    RouteID INT PRIMARY KEY AUTO_INCREMENT,
    Origin VARCHAR(100) NOT NULL,
    Destination VARCHAR(100) NOT NULL,
    Distance DECIMAL(10,2) NOT NULL,
    Classification VARCHAR(50) NOT NULL
);

-- ==============================================================================
-- 2. Create tables that depend on the Airline table

CREATE TABLE Employee (
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    AirlineID INT NOT NULL,
    Name VARCHAR(150) NOT NULL,
    BirthDate DATE NOT NULL,
    Gender ENUM('M', 'F') NOT NULL,
    Position VARCHAR(100) NOT NULL,
    FOREIGN KEY (AirlineID) REFERENCES Airline(AirlineID) ON DELETE CASCADE
);

CREATE TABLE Aircraft (
    AircraftID INT PRIMARY KEY AUTO_INCREMENT,
    AirlineID INT NOT NULL,
    Model VARCHAR(100) NOT NULL,
    Capacity INT NOT NULL,
    FOREIGN KEY (AirlineID) REFERENCES Airline(AirlineID) ON DELETE CASCADE
);

CREATE TABLE Transaction (
    TransactionID INT PRIMARY KEY AUTO_INCREMENT,
    AirlineID INT NOT NULL,
    Type ENUM('buy', 'sell') NOT NULL,
    Amount DECIMAL(15,2) NOT NULL,
    Description TEXT,
    TransactionDate DATE NOT NULL, -- Renamed from 'Date' to avoid reserved keyword conflicts
    FOREIGN KEY (AirlineID) REFERENCES Airline(AirlineID) ON DELETE CASCADE
);

-- ==============================================================================
-- 3. Create Crew Tables (Normalized 1:1 and 1:N structure)

CREATE TABLE Crew (
    CrewID INT PRIMARY KEY AUTO_INCREMENT,
    AircraftID INT UNIQUE NOT NULL, -- UNIQUE enforces the 1:1 relationship
    FOREIGN KEY (AircraftID) REFERENCES Aircraft(AircraftID) ON DELETE CASCADE
);

CREATE TABLE CrewMember (
    MemberID INT PRIMARY KEY AUTO_INCREMENT,
    CrewID INT NOT NULL,
    Name VARCHAR(150) NOT NULL,
    Role ENUM('Major Pilot', 'Assistant Pilot', 'Hostess') NOT NULL,
    FOREIGN KEY (CrewID) REFERENCES Crew(CrewID) ON DELETE CASCADE
);

-- ==============================================================================
-- 4. Create Junction Table (Many-to-Many resolution)

CREATE TABLE FlightSchedule (
    AircraftID INT NOT NULL,
    RouteID INT NOT NULL,
    DepartureDateTime DATETIME NOT NULL,
    ArrivalDateTime DATETIME NOT NULL,
    NumberOfPassengers INT NOT NULL,
    TicketPrice DECIMAL(10,2) NOT NULL,
    
    -- Using a composite primary key
    PRIMARY KEY (AircraftID, RouteID, DepartureDateTime), 
    
    FOREIGN KEY (AircraftID) REFERENCES Aircraft(AircraftID) ON DELETE CASCADE,
    FOREIGN KEY (RouteID) REFERENCES Route(RouteID) ON DELETE CASCADE
);