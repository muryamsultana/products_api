Scenario: Create a programmer
  Given I have the payload:
    """
    {
      "nickname": "ObjectOrienter",
      "avatarNumber" : "2",
      "tagLine": "I'm from a test!"
    }
    """
  When I request "POST /api/programmers"
  Then the response status code should be 201
  And the "Location" header should be "/api/programmers/ObjectOrienter"
  And the "nickname" property should equal "ObjectOrienter"