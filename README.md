[![Build Status](https://travis-ci.org/DrNgo/weather-api.svg?branch=master)](https://travis-ci.org/DrNgo/weather-api)
[![Maintainability](https://api.codeclimate.com/v1/badges/03f2cf075d35276b23a5/maintainability)](https://codeclimate.com/github/DrNgo/weather-api/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/03f2cf075d35276b23a5/test_coverage)](https://codeclimate.com/github/DrNgo/weather-api/test_coverage)
# weather-api
Get current weather via zip code using http://openweathermap.org API

## Table of Contents

- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Services](#services)
  - [Start services](#start-services)
  - [Stopping services](#stopping-services)
  - [Deleting services](#deleting-services)
- [Usage](#usage)

## Prerequisites

The guide assumes that you are using a Mac for development.

- Install [Docker for Mac](https://docs.docker.com/engine/installation/mac/)
- Install [Apache Ant](http://ant.apache.org/index.html) 
- Get API key from http://openweathermap.org

## Getting Started

To get started run the following:

- Copy example config (if you have not already)
  - `$ cp .env.example .env`
  - Add the API key to the weather_key in the .env file
- Build the application
  - `$ ant`
- Start containers
  - `$ docker-compose up -d` (or `$ docker-compose up` to run in the foreground)
- Ensure services are started (see [Services](#services))
  - `$ docker-compose ps`

## Services

### Start services

- For the very first time
  - `$ docker-compose up -d`
- Every time after that
  - `$ docker-compose start`

### Stopping services

- `$ docker-compose stop`

### Deleting services

- `$ docker-compose down`

## Usage

Once the Docker instance is loaded and running
- Open your web browser to localhost/{zip}
