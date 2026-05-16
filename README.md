# CarListings

A RESTful API built with Laravel to fetch available automobiles, auto manufacturers.



### Overview

This API provides endpoints to manage [fetch resources, e.g. automobiles, manufaturer, car model etc.].
It also provides support for filtering data using query string parameters. This project is built with PHP Laravel and follows RESTful conventions. 



### API Summary

|Method  | Endpoint                                        | Description
|----    |------------------------------------             |--------------------------------
|GET     |api/v1/manufacturers                             |List all manufacturers
|GET     |api/v1/manufacturers/\{id\}                      |Retrieves a specific manufacturer
|GET     |api/v1/automobiles/vehicles/\{name (e.g honda)\}           |Retrieves all automobiles for a specific manufacturer
|GET     |api/v1/automobiles                               |Retrieves all automobiles
|GET     |api/v1/automobiles?make[eq]=honda&year[gt]=2014  |Retrieves all automobiles matching the query string parameters

### Definitions
[eq] => (=), [gt] => (>), [lt] => (<)