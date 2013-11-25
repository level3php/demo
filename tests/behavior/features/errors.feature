Feature: Testing the error handling
    Scenario:
        Given that I want to find a non existing repository
        When I request "/foo"
        Then the response status code should be 404
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"

    Scenario:
        Given that I want to find a non existing resource
        When I request "/album/foo"
        Then the response status code should be 404
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"

    Scenario:
        Given that I want to delete a valid resource
        When I request "/album/1"
        Then the response status code should be 405
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"

    Scenario:
        Given that I want to create a resource with empty data
        When I request "/playlist"
        Then the response status code should be 400
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"

    Scenario:
        Given that I want to update a resource with empty data
        When I request "/playlist/1"
        Then the response status code should be 400
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"

    Scenario:
        Given that I want to modify a resource with empty data
        When I request "/playlist/1"
        Then the response status code should be 400
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"

    Scenario:
        Given that I want to create a resource with empty data
            And I have a "Content-Type" header equal to "application/foo"
            And I have "name" property equal to "foo"
        When I request "/playlist"
        Then the response status code should be 400
            And the "Content-Type" header is equal to "application/hal+json"
            And the "Access-Control-Allow-Origin" header is equal to "*"
            And the "X-RateLimit-Limit" header is equal to "1000"
