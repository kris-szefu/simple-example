# Simple example
This is a simple PHP endpoint

## Installation
Prerequistes are PHP7.2 + composer

To instal dependencies just hit
```
composer install
```

## Running

To run simple webserver just put
```
composer run
```

To run it in dev mode execute
```
composer run-dev
```

### Endpoint

Service should have one avaiable endpoint under
```
/items/{itemId}/price/{countryCode}/
```

## Unit tests

To run simple unit tests you need to run
```
composer tests-unit
```

Code coverage would be avaiable under ./coverage/ directory

## Api tets 

To run simple unit tests you need to run
```
composer tests-api
```