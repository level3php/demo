# features/album.feature
Feature: Testing a Hypermedia API

    Scenario: Finding a User
        Given that I want to find a Album
        When I request "/album/1"
        Then the response status code should be 200
        #Then the response is JSON
        And the "title" property equals "For Those About To Rock We Salute You"
        And the relation "artist" links to "/artist/1"
        And the relation "tracks" have 10 links
        And the relation "tracks" links to "/track/1"

    Scenario: Finding a Users
        Given that I want to find a "Album"
        #And that its with id 5

    Scenario: Finding a Users
        Given that I want to delete a "Album"
