# Kompletecare Interview Test

## Commands

- shorten sail command -> ```sh alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'```
- Authenticate a User ->  ```sh sail artisan app:authenticate-user```

## Deliverables

Implementation criteria [CLICK HERE](/SEVENZ%20HEALTHCARE%20BACKEND%20DEVELOPER%20TEST.pdf)

### API Endpoints

- GET -> Lab tests
- POST -> lab tests
- POST -> Authenticate User

## TASKS

- post request of the lab-test to the database✅
- mailing service to <peopleoperations@kompletecare.com>✅
- Mail should include My name at the footer of the submission mail✅
- Endpoint will have an authentication for only authenticated users can access this endpoints✅
- provide the auth token for use by the frontend developer✅
- Postman JSON Payload [click here](/payload.json)

 Bonus if you can implement the 2 endpoints to 1 using lighthouse-php graphql❌
 send the link to this submisstion to <peopleoperations@kompletecare.com>
 Submission is by email to <peopleoperations@kompletecare.com>. Specify the endpoints and the bearer auth token to be used for testing in your submission.

