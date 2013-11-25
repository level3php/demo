# features/album.feature
Feature: Testing a Hypermedia API

    Scenario: Finding a User
        Given that I want to find a Album
        When I request "/album/1"
        Then the response status code should be 200
        And the "Content-Type" header is equal to "application/hal+json"
        And the "title" property equals "For Those About To Rock We Salute You"
        And the "artist" relation have 1 links
        And the "artist" relation links to "/artist/1"
        And the "tracks" relation have 10 links
        And the "tracks" relation links to "/track/1"
